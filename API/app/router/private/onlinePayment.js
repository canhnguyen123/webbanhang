const express = require('express');
const router = express.Router();
const onlinePaymentController =require('../../controller/onlinePaymentController');

router.post('/vnpay', onlinePaymentController.postVnPay);

module.exports = router;