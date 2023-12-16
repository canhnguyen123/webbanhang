const express = require('express');
const router = express.Router();
const productController =require('../../controller/productController');
router.get('/', productController.getListHome);
router.get('/deatil/:product_id', productController.getDeatil);
router.get('/case/:theloai_id', productController.getCaseProduct);
router.get('/list-product/:theloai_id/:limit?', productController.getListsProduct);
router.post('/search', productController.search);
module.exports = router;