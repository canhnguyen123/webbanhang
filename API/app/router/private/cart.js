const express = require('express');
const router = express.Router();
const cartController =require('../../controller/cartController');
const {checkUser_id}=require("../../middleware/checkUser");
router.post('/add/:user_id', checkUser_id,cartController.addCart);
router.get('/get-list/:user_id',checkUser_id, cartController.getList);
router.get('/get-list-cart/:user_id', checkUser_id,cartController.getListHome);
router.post('/delete/:user_id', checkUser_id,cartController.deleteCart);
router.put('/update/:cart_id', cartController.updateCart);
router.post('/get-product-deatil/:user_id', checkUser_id,cartController.getDeatil);

module.exports = router;