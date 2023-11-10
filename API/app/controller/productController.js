const unidecode = require('unidecode');
const productModel = require('../model/productModel')
const theloaiModel = require('../model/theloaiModel')
const { response } = require('express');

exports.getListHome = (req, res) => {
    const arr = [];
    
    theloaiModel.getCheckedtheLoai((error, theloaiList) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }

        // Lặp qua từng thể loại
        theloaiList.forEach(element => {
            const theloai_id = element.theloai_id;

            // Lấy danh sách sản phẩm theo từng thể loại
            productModel.getList((error, productList) => {
                if (error) {
                    return res.status(500).json({ error: 'Database query error' });
                }

                // Lặp qua từng sản phẩm để gán tên
                const productsWithNames = productList.map(product => {
                    // Gán tên cho sản phẩm ở đây

                    return {
                        product_id: product.product_id,
                        product_name: product.product_name,
                        product_img: product.img,
                        product_price: product.price
                    };
                });

                // Thêm thông tin thể loại và sản phẩm vào mảng arr
                arr.push({
                    theloai_id: theloai_id,
                    name: element.theloai_name,
                    products: productsWithNames // Thêm danh sách sản phẩm đã gán tên vào mảng products
                });

                // Nếu đã lặp qua tất cả thể loại, trả về kết quả
                if (arr.length === theloaiList.length) {
                    return res.json({ status: 'success', results: arr });
                }
            }, theloai_id);
        });
    });
}
exports.getDeatil = (req, res) => {
    const arr = [];
    const product_id = req.params.product_id;

    productModel.deatil((error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
        }

        const promises = results.map(item => {
            return new Promise((resolve, reject) => {
                const productItem = {
                    id: item.product_id,
                    name: item.product_name,
                    code: item.product_code,
                    theloai_name: item.theloai_name,
                    category_name: item.category_name,
                    phanloai_name: item.phanloai_name,
                    brand_name: item.brand_name,
                    brand_code: item.brand_code,
                    mota: item.product_mota,
                    dacdiem: item.product_dacdiem,
                    baoquan: item.product_baoquan,
                    images: [],
                    quantity: [],
                    colorList:[],
                    sizeList:[],
                };

                // Gọi hàm getDeatilImg để lấy danh sách hình ảnh
                productModel.getDeatilImg((error, resultsImg) => {
                    if (error) {
                        reject(error);
                    } else {
                        const arrImg = resultsImg.map(img => ({
                            link: img.productImg_name
                        }));
                        productItem.images = arrImg;

                        // Gọi hàm getDeatilQuantity bên trong callback của getDeatilImg
                        productModel.getDeatilQuantity((error, resultsQuantity) => {
                            if (error) {
                                reject(error);
                            } else {
                                const arrQuantity = resultsQuantity.map(quantity => ({
                                    size: quantity.productQuantity_size,
                                    color: quantity.productQuantity_color,
                                    quantity_: quantity.productQuantity,
                                    price: quantity.productQuantity_priceOut
                                }));
                                const uniqueColors = Array.from(new Set(resultsQuantity.map(q => q.productQuantity_color)));
                                const uniqueSizes = Array.from(new Set(resultsQuantity.map(q => q.productQuantity_size)));
                                const arrColor = uniqueColors.map(color => (color));
                                const arrSize = uniqueSizes.map(size => (size ));
                                productItem.quantity = arrQuantity;
                                productItem.colorList = arrColor;
                                productItem.sizeList = arrSize;
                                resolve(productItem);
                            }
                        }, item.product_id);
                    }
                }, item.product_id);
            });
        });

        Promise.all(promises)
            .then(arrItem => {
                res.json({ status: 'success', results: arrItem });
            })
            .catch(err => {
                console.error('Lỗi: ', err);
                res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
            });
    }, product_id);
};
exports.getCaseProduct = (req, res) => {
    const theloai_id = req.params.theloai_id;
    if(theloai_id>0&&!isNaN(theloai_id)){
        theloaiModel.getName((error, theloai) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
           if(theloai){
            productModel.getList((error, productList) => {
                if (error) {
                    return res.status(500).json({ error: 'Database query error' });
                }
                const listArr = productList.map(product => {
                   return {
                        product_id: product.product_id,
                        product_name: product.product_name,
                        product_img: product.img,
                        product_price: product.price
                    };
                });
                return res.json({ status: 'success', theloai_name:theloai[0].theloai_name ,results: listArr });
        
            }, theloai_id);
           }
           else{
            return res.json({ status: 'fail', mess:'Không tìm thấy danh sách sản phẩm theo thể loại này' });
           }
        }, theloai_id);
         }
    else{
        return res.json({ status: 'fail', mess:'Có lỗi xảy ra' });
    }
  
};

exports.getListsProduct = (req, res) => {
    const theloai_id = req.params.theloai_id;
    let limit = null;

    if (req.params.limit) {
        limit = parseInt(req.params.limit, 10); 

        if (isNaN(limit) || limit <= 0) {
            limit = null; 
        }
    }
    if(theloai_id>0&&!isNaN(theloai_id)){
        productModel.getList((error, productList) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
            const listArr = productList.map(product => {
               return {
                    id: product.product_id,
                    name: product.product_name,
                    img: product.img,
                    price: product.price
                };
            });
            return res.json({ status: 'success',results: listArr });
    
        }, theloai_id,limit);
    }
    else{
        return res.json({ status: 'fail', mess:'Có lỗi xảy ra' });
    }
  
};



