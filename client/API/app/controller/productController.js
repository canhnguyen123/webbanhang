const unidecode = require('unidecode');
const productModel = require('../model/productModel')
const theloaiModel = require('../model/theloaiModel')
const { response } = require('express');

exports.getListHome = (req, res) => {
    const arr = [];
    
    theloaiModel.getListtheLoai((error, theloaiList) => {
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
