const express = require('express');
const router = express.Router();
const cartController =require('../../controller/cartController');

router.post('/add/:user_id', cartController.addCart);
router.get('/get-list/:user_id', cartController.getList);
router.get('/get-list-cart/:user_id', cartController.getListHome);
router.post('/delete/:user_id', cartController.deleteCart);
router.post('/get-product-deatil/:user_id', cartController.getDeatil);
module.exports = router;