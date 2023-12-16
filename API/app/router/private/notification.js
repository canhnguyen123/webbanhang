const express = require('express');
const router = express.Router();
const notificationController =require('../../controller/notificationController');
const {checkUser_id}=require("../../middleware/checkUser");
router.get('/list-notification/:user_id',checkUser_id, notificationController.getList);
router.post('/update-state/:user_id', checkUser_id,notificationController.update);
module.exports = router;