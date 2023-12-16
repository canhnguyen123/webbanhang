const express = require('express');
const router = express.Router();
const querystring = require('qs');
const crypto = require('crypto');
const moment = require('moment');
const BigNumber = require('bignumber.js');
function sortObject(obj) {
	let sorted = {};
	let str = [];
	let key;
	for (key in obj){
		if (obj.hasOwnProperty(key)) {
		str.push(encodeURIComponent(key));
		}
	}
	str.sort();
    for (key = 0; key < str.length; key++) {
        sorted[str[key]] = encodeURIComponent(obj[str[key]]).replace(/%20/g, "+");
    }
    return sorted;
}
exports.postVnPay = (req, res) => {
    process.env.TZ = 'Asia/Ho_Chi_Minh';
    let date = new Date();
    let createDate = moment(date).format('YYYYMMDDHHmmss');
    
    let ipAddr = req.headers['x-forwarded-for'] ||
        req.connection.remoteAddress ||
        req.socket.remoteAddress ||
        req.connection.socket.remoteAddress;

    let tmnCode ="IHI164VR";
    let secretKey = "HPXMQLLTMJZTHHUOODZUCGQCAANCHFFS";
    let vnpUrl = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    let returnUrl = "http://localhost:3000/result";
    let orderId = moment(date).format('DDHHmmss');

    const amount = /^\d+$/.test(req.body.amount) ? req.body.amount : 1000000;

    let currCode = 'VND';
    let vnp_Params = {
        vnp_Version:'2.1.0',
        vnp_Command:'pay',
        vnp_TmnCode:tmnCode,
        vnp_Locale:'vn',
        vnp_TxnRef:orderId,
        vnp_CurrCode:currCode,
        vnp_OrderInfo:'Thanh toan cho ma GD:' + orderId,
        vnp_OrderType:"billpayment",
        vnp_Amount:amount * 100,
        vnp_ReturnUrl:returnUrl,
        vnp_IpAddr:ipAddr,
        vnp_CreateDate:createDate
    };
    vnp_Params = sortObject(vnp_Params);
    let querystring = require('qs');
    let signData = querystring.stringify(vnp_Params, { encode: false });
    let crypto = require("crypto");     
    let hmac = crypto.createHmac("sha512", secretKey);
    let signed = hmac.update(new Buffer(signData, 'utf-8')).digest("hex"); 
    vnp_Params['vnp_SecureHash'] = signed;
    vnpUrl += '?' + querystring.stringify(vnp_Params, { encode: false });
    return res.json({ status: 'success', link: vnpUrl });
};

