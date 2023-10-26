const express = require('express');
const router = express.Router();
const cartController =require('../../controller/cartController');

router.post('/add/:user_id', cartController.addCart);
module.exports = router;