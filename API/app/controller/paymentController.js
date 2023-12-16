const unidecode = require('unidecode');
const paymentModel = require('../model/paymentModel')
const { response } = require('express');
const moment = require("moment");
exports.getmethod = (req, res) => {
    const arr = [];
    paymentModel.getmethod((error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }
        results.forEach(element => {
            arr.push({
                id: element.methodPayment_id,
                name: element.methodPayment_name,
                isPayment: element.methodPayment_category,
                code: element.methodPayment_code
            });
        });

        return res.json({ status: 'success', results: arr });
    });
}
exports.getStatus = (req, res) => {
    const arr = [];
    paymentModel.getStatus((error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }
        results.forEach(element => {
            arr.push({
                id: element.statusPayment_id,
                name: element.statusPayment_name
            });
        });

        return res.json({ status: 'success', results: arr });
    });
}
exports.getship = (req, res) => {
    const arr = [];

    paymentModel.getship((error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }

        results.forEach(element => {
            arr.push({
                id: element.ship_id,
                name: element.ship_name,
                price: element.ship_price,
            });
        });

        return res.json({ status: 'success', results: arr });
    });
}
exports.addPayment = (req, res) => {
    const arr = [];
    const user_id = req.params.user_id;
    const price = req.body.priceBill;
    const address = req.body.address;
    const method = req.body.method;
    const isPayment = req.body.isPayment || 0;
    const phone = req.body.phoner;
    const fullname = req.body.fullname;
    const shipID = req.body.shipID;
    const note = req.body.note || "";
    const paymentDeail = JSON.parse(req.body.paymentDeail);
    let countPaymentDeail = paymentDeail.length;
    const createdAt = moment();
    const data = {};
    data.created_at = createdAt;
    const dataPayment = {
        user_id: user_id,
        payment_code: "",
        payment_addressUser: address,
        methodPayment_id: method,
        statusPayment_id: 1,
        isPayment: isPayment,
        payment_phoneUser: phone,
        payment_nameUser: fullname,
        ship_id: shipID,
        payment_allPrice: price,
        created_at: new Date()
    }
    paymentModel.addPayment((error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }
        if (results) {
            const payment_id = results.insertId;
            paymentDeail.forEach(item => {
                const dataPaymentDeatil = {
                    payment_id: payment_id,
                    product_id: item.product_id,
                    product_color: item.color,
                    product_size: item.size,
                    product_quantity: item.quantity,
                    product_price: item.price,
                }
                paymentModel.addPaymentDeatil((error, results) => {
                    if (error) {
                        return res.status(500).json({ error: 'Database query error' });
                    }

                    if (results.affectedRows > 0) {
                        countPaymentDeail--;
                    }
                    if (countPaymentDeail === 0) {
                        return res.json({ status: 'success', mess: "Đã tạo đơn hàng cho bạn" });

                    }
                }, dataPaymentDeatil);
            })

        }

    }, dataPayment);
}


exports.getMyBill = (req, res) => {
    const user_id = Number(req.params.user_id);
    const status = Number(req.params.status);
    const arr = [];
    let isPayment = "";
    let code = "";
    if (Number(user_id) && user_id > 0 && Number(status) && status > 0) {

        paymentModel.getMyBill((error, results) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
            results.forEach(element => {
                if (element.isPayment === 0) {
                    isPayment = "Chưa thanh toán";
                }
                else {
                    isPayment = "Đã thanh toán";
                }
                const setCode = element.payment_code;
                if (setCode.trim().length === 0) {
                    code = "Chưa tạo mã đơn";
                } else {
                    code = setCode;
                }

                arr.push({
                    id: element.payment_id,
                    allPrice: element.payment_allPrice,
                    code: code,
                    isPayment: isPayment,
                    created_at: element.created_at
                });
            });

            return res.json({ status: 'success', results: arr });
        }, user_id, status);
    } else {
        return res.json({ status: "fail", mess: "Dữ liệu không đúng" })
    }
}

exports.getDeatilBill = (req, res) => {
    const payment_id = Number(req.params.payment_id);
    const arr = [];
    let isPayment = "";
    let code = "";
    let note = "";
    if (Number(payment_id) && payment_id > 0) {

        paymentModel.getDeatilBill((error, results) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
            results[0].isPayment === 0 ? isPayment = "Chưa thanh toán" : isPayment = "Đã thanh toán"
            results[0].payment_note === null ? note = "Không có ghi chú" : note = results[0].payment_note;
            results[0].payment_code.trim().length === 0 ? code = "Chưa tạo mã đơn" : code = results[0].payment_code;
            const arr = {
                location: results[0].payment_localtion,
                code: code,
                address: results[0].payment_addressUser,
                isPayment: isPayment,
                status_Id:results[0].statusPayment_id,
                status_Name:results[0].statusPayment_name,
                phoneUser:"0"+ results[0].payment_phoneUser,
                nameUser: results[0].payment_nameUser,
                note: note,
                money: results[0].payment_allPrice,
                created_at: results[0].created_at,
                timeUpdate: results[0].updated_at,
                methodPayment_name: results[0].methodPayment_name,
                methodPayment_name: results[0].methodPayment_name,
                ship_name: results[0].ship_name,
                ship_price: results[0].ship_price,
                arrPaymentDeatil:[],
            }
            paymentModel.getDeatilBillProduct((error, productResults) => {
                if (error) {
                    return res.status(500).json({ error: 'Database query error' });
                }
                const arrDeatil=productResults.map((item)=>{
                   return{
                    price:item.product_price,
                    size:item.product_size,
                    quantity:item.product_quantity,
                    product_id:item.product_id,
                    product_name:item.product_name,
                    theloai_name:item.theloai_name,
                    category_name:item.category_name,
                    phanloai_name:item.phanloai_name,
                    color:item.product_color
                   }
                })
                arr.arrPaymentDeatil = arrDeatil;
                return res.json({ status: 'success', results: arr });
            }, payment_id);
        }, payment_id);
    } else {
        return res.json({ status: "fail", mess: "Dữ liệu không đúng" })
    }
}
exports.createResquestCanneBill = (req, res) => {
    const createdAt = moment();
    const data = {};
    data.created_at = createdAt;
    const payment_id = Number(req.params.payment_id);
    const user_id = Number(req.params.user_id);
    const mess = req.body.mess;
    const arr = {
        user_id:user_id,
        payment_id:payment_id,
        request_cancellation_mess:mess,
        request_cancellation_status:1,
        create_at: new Date()
    }
    if (Number(payment_id) && payment_id > 0&&Number(user_id) && user_id > 0) {

        paymentModel.cancelOrder((error, results) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
          
                return res.json({ status: 'success',mess: "Gửi yêu cầu thành công" });
            
        }, arr);
    } else {
        return res.json({ status: "fail", mess: "Dữ liệu không đúng" })
    }
}