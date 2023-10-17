const express = require('express');
const router = express.Router();
const theloaiControler =require('../../controller/theloaiControler');
router.get('/', theloaiControler.getListHome);
module.exports = router;