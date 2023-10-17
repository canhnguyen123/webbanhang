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
            return res.status(500).json({ error: 'Database query error' });
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
                    images: []
                };

                // Gọi hàm getDeatilImg để lấy danh sách hình ảnh
                productModel.getDeatilImg((error, resultsImg) => {
                    if (error) {
                        reject(error);
                    }

                    const arrImg = resultsImg.map(img => ({
                        link: img.productImg_name
                    }));

                    productItem.images = arrImg;
                    resolve(productItem);
                }, item.product_id);
            });
        });

        Promise.all(promises)
            .then(arrItem => {
                res.json({ status: 'success', results: arrItem });
            })
            .catch(err => {
                console.error('Error: ', err);
                res.status(500).json({ error: 'Database query error' });
            });
    }, product_id);
};



