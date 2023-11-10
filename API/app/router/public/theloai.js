const express = require('express');
const router = express.Router();
const theloaiControler =require('../../controller/theloaiControler');
router.get('/', theloaiControler.getListHome);
router.get('/get-check-list-home', theloaiControler.getCheckedHome);
router.get('/get-category', theloaiControler.getCategory);
router.get('/get-phanloai', theloaiControler.getPhanloai);
router.post('/fitter-theloai', theloaiControler.getTheLoai);
module.exports = router;