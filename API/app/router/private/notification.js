const express = require('express');
const router = express.Router();
const notificationController =require('../../controller/notificationController');

router.get('/list-notification/:user_id', notificationController.getList);
router.post('/update-state/:user_id', notificationController.update);
module.exports = router;