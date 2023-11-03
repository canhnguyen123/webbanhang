const express = require('express');
const router = express.Router();
const paymentController =require('../../controller/paymentController');

router.get('/get-status-method', paymentController.getmethod);
router.get('/get-ship', paymentController.getship);
router.post('/add-payment/:user_id', paymentController.addPayment);
module.exports = router;