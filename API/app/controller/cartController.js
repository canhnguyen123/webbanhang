const unidecode = require('unidecode');
const cartModel = require('../model/cartModel');
const allModel = require('../model/model')
const { response } = require('express');
const tableName = 'tbl_user';
const columnName = 'user_id';
exports.addCart = (req, res) => {
    const user_id = req.params.user_id;
    const product_id = req.body.product_id;
    const card_size = req.body.card_size;
    const card_color = req.body.card_color;
    const card_quatity = req.body.card_quantity;
    if(user_id!==0&&product_id!==0&&card_color!==""&&card_size!==""&&card_quatity!==0){
        allModel.checkUser((error, checkUserResults) => {
            if (error) {
                console.error('Lỗi xảy ra: ' + error.stack);
                return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
            }
            if (checkUserResults && checkUserResults.length > 0) {
                        cartModel.updateCartQuantity((error, results) => {
                    if (error) {
                        console.error('Lỗi xảy ra: ' + error.stack);
                        return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
                    }
                    if(results.affectedRows >0){
                        cartModel.getListCart((error, results) => {
                            if (error) {
                                console.error('Lỗi xảy ra: ' + error.stack);
                                return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
                            }
                            const arrList=results.map(index=>{
                                return{
                                    id:index.cart_id,
                                    size:index.card_size,
                                    color:index.card_color,
                                    quantity:index.card_quatity,
                                    img:index.product_image,
                                    name:index.product_name,
                                }
                            })
                            return res.json({ status: 'success', mess: "Cập nhật số lượng thành công",results:arrList });

                        },user_id,3)
                    }
                    else{
                        const arrCart={
                            user_id:user_id,
                            product_id:product_id,
                            card_size:card_size,
                            card_color:card_color,
                            card_quatity:card_quatity,
                        }
                        cartModel.addCart((error, results) => {
                            if (error) {
                                console.error('Lỗi xảy ra: ' + error.stack);
                                return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
                            }
                            cartModel.getListCart((error, results) => {
                                if (error) {
                                    console.error('Lỗi xảy ra: ' + error.stack);
                                    return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
                                }
                                const arrList=results.map(index=>{
                                    return{
                                        id:index.cart_id,
                                        size:index.card_size,
                                        color:index.card_color,
                                        quantity:index.card_quatity,
                                        img:index.product_image,
                                        name:index.product_name,
                                    }
                                })
                                return res.json({ status: 'success', mess: "Đã thêm vào giỏ hàng",results:arrList });
            
                            },user_id,3)
                        }, arrCart);
                    }
                },card_quatity,user_id,product_id,card_size,card_color);

            }else{
                return res.json({ status: 'fail', mess: "Không tìm thấy người dùng" });
            }
        },tableName,columnName,user_id)
       
    }
    else{
        return res.json({ status: 'fail', mess: "Kiểm tra lại kiểu dữ liệu" });

    }
};
exports.getListHome = (req, res) => {
    const user_id = req.params.user_id;
    if (!Number.isInteger(user_id) && user_id > 0) {
        cartModel.getListCart((error, results) => {
            if (error) {
                console.error('Lỗi xảy ra: ' + error.stack);
                return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
            }
            const arrList=results.map(index=>{
                return{
                    id:index.cart_id,
                    size:index.card_size,
                    color:index.card_color,
                    quantity:index.card_quatity,
                    img:index.product_image,
                    name:index.product_name,
                   }
            })
            return res.json({ status: 'success', mess: "Lấy về thành côg",results:arrList });
    
        },user_id,5)
    } else {
        return res.json({ status: 'fail', mess: "Không tìm thấy tài khoản" });
    }
    
};
exports.deleteCart = (req, res) => {
    const user_id = req.params.user_id;
    const arrId = req.body.arrId;
    let itemsToDelete = arrId.length;
    console.log(arrId)
    console.log(itemsToDelete)
    let deletedCount = 0; // Số mục đã bị xóa

    if (!Number.isInteger(user_id) && user_id > 0) {
        arrId.forEach((item) => {
            cartModel.deleteCart((error, results) => {
                if (error) {
                    console.error('Lỗi xảy ra: ' + error.stack);
                    return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
                }

                if (results.affectedRows > 0) {
                    deletedCount++;
                }

                // Kiểm tra nếu đã xóa tất cả các mục
                if (deletedCount === itemsToDelete) {
                    return res.json({ status: 'success', mess: "Xóa thành công" });
                }
            }, item);
        });
    } else {
        return res.json({ status: 'fail', mess: "Không tìm thấy tài khoản" });
    }
};


exports.getDeatil = (req, res) => {
    const user_id = req.params.user_id;
    const list_id = req.body.list_id;
    const arr = [];
    let completedCount = 0;

    if (!isNaN(user_id) && user_id > 0&&list_id.length>0) {
        list_id.forEach(item => {
            cartModel.getDetailProduct((error, results) => {
                if (error) {
                    console.error('Lỗi xảy ra: ' + error.stack);
                    return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
                }
                const product_id = results[0].product_id;
                const size = results[0].card_size;
                const color = results[0].card_color;
                cartModel.getPrice((error, priceResults) => {
                    if (error) {
                        console.error('Lỗi xảy ra: ' + error.stack);
                        return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
                    }
                    const price = priceResults[0].productQuantity_priceOut;
                    const quantity = results[0].card_quatity;

                    const arrList = {
                        product_id: results[0].product_id,
                        name: results[0].product_name,
                        quantity: quantity, 
                        img: results[0].product_image,
                        size: size,
                        color: color,
                        price: price, 
                    };

                    arr.push(arrList);

                    completedCount++;
                    if (completedCount === list_id.length) {
                        return res.json({ status: 'success', mess:"xóa thành công", results: arr });
                    }
                }, product_id, color, size);
            }, item);
        });
    } else {
        return res.json({ status: 'fail', mess: "Kiểm tra lại dữ  liệu" });
    }
};



exports.getList = (req, res) => {
    const user_id = req.params.user_id;
    const limit = 20;

    if (!Number.isInteger(user_id) && user_id > 0) {
        cartModel.getListCart((error, results) => {
            if (error) {
                console.error('Lỗi xảy ra: ' + error.stack);
                return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
            }

            const arrList = [];

            const fetchPriceForCartItem = (index) => {
                const size = results[index].card_size;
                const product_id = results[index].product_id;
                const color = results[index].card_color;

                cartModel.getPrice((priceError, priceResults) => {
                    if (priceError) {
                        console.error('Lỗi xảy ra: ' + priceError.stack);
                        return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
                    }

                    priceResults.forEach((a) => {
                        arrList.push({
                            id: results[index].cart_id,
                            size: size,
                            product_id: product_id,
                            color: color,
                            price: a.productQuantity_priceOut,
                            quantity: results[index].card_quatity,
                            img: results[index].product_image,
                            name: results[index].product_name,
                        });

                        if (index === results.length - 1) {
                            return res.json({ status: 'success', mess: "Lấy về thành công", results: arrList });
                        } else {
                            fetchPriceForCartItem(index + 1);
                        }
                    });
                }, product_id, color, size);
            };

            if (results.length > 0) {
                fetchPriceForCartItem(0);
            } else {
                return res.json({ status: 'success', mess: "Danh sách trống", results: [] });
            }
        }, user_id, limit);
    } else {
        return res.json({ status: 'fail', mess: "Không tìm thấy tài khoản" });
    }
};
