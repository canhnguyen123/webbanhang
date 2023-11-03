const unidecode = require('unidecode');
const paymentModel=require('../model/paymentModel')
const { response } = require('express');
const moment = require("moment");
exports.getmethod=(req,res)=>{
    const arr = [];

    paymentModel.getmethod((error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }
    
        results.forEach(element => {
            arr.push({
                id: element.methodPayment_id,
                name: element.methodPayment_name,
                is_limit: element.methodPayment_category
            });
        });
    
        return res.json({ status: 'success', results: arr });
    });
}
exports.getship=(req,res)=>{
    const arr = [];

    paymentModel.getship((error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }
    
        results.forEach(element => {
            arr.push({
                id: element.ship_id,
                name: element.ship_name,
                price: element.ship_price
            });
        });
    
        return res.json({ status: 'success', results: arr });
    });
}
exports.addPayment=(req,res)=>{
    const arr = [];
    const user_id = req.params.user_id;
    const price = req.body.priceBill;
    const address=req.body.address;
    const method=req.body.method;
    const isPayment=req.body.isPayment;
    const phone=req.body.phoner;
    const fullname=req.body.fullname;
    const shipID=req.body.shipID;
    const note=req.body.note;
    const paymentDeail=JSON.parse(req.body.paymentDeail);
    let  countPaymentDeail=paymentDeail.length;
    const createdAt = moment();
    const data = {}; 
    data.created_at = createdAt;
    const dataPayment={
        user_id :user_id ,
        payment_code:"",    
        payment_addressUser:address,
        methodPayment_id :method,
        statusPayment_id :1,
        isPayment:isPayment,
        payment_phoneUser:phone,
        payment_nameUser:fullname,
        ship_id:shipID,
        payment_allPrice:price,
        created_at:new Date()
    }
    paymentModel.addPayment((error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }
        if(results){
            const payment_id = results.insertId;
            paymentDeail.forEach(item=>{
                const dataPaymentDeatil={
                    payment_id:payment_id,
                    product_id:item.product_id,
                    product_color:item.color,
                    product_size:item.size,
                    product_quantity:item.quantity,
                    product_price:item.price,
                }
                paymentModel.addPaymentDeatil((error, results) => {
                    if (error) {
                        return res.status(500).json({ error: 'Database query error' });
                    }

                    if(results.affectedRows > 0){
                        countPaymentDeail--;
                    }
                    if(countPaymentDeail===0){
                    return res.json({ status: 'success', mess: "Đã tạo đơn hàng cho bạn" });
               
                       }
                },dataPaymentDeatil);
            })
       
        }
    
    },dataPayment);
}

