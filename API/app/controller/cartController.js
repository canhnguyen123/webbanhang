const unidecode = require('unidecode');
const cartModel = require('../model/cartModel')
const { response } = require('express');
exports.addCart = (req, res) => {
    const user_id = req.params.user_id;
    const product_id = req.body.product_id;
    const card_size = req.body.card_size;
    const card_color = req.body.card_color;
    const card_quatity = req.body.card_quantity;
    if(user_id!==0&&product_id!==0&&card_color!==""&&card_size!==""&&card_quatity!==0){
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
                        return res.json({ status: 'success', mess: "Cập nhật số lượng thành công",results:arrList });
    
                    },user_id,3)
                }, arrCart);
            }
        },card_quatity,user_id,product_id,card_size,card_color);

    }
    else{
        return res.json({ status: 'fail', mess: "Kiểm tra lại kiểu dữ liệu" });

    }
};


