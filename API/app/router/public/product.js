const express = require('express');
const router = express.Router();
const productController =require('../../controller/productController');
router.get('/', productController.getListHome);
router.get('/deatil/:product_id', productController.getDeatil);
module.exports = router;