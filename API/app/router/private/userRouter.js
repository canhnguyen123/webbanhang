const {checkUser_id}=require('../../middleware/checkUser')
const express = require('express');
const router = express.Router();
const userController =require('../../controller/userController');
router.post('/dangki', userController.createUser);
router.post('/dangki-acction', userController.creatUserGGFA);
router.post('/login', userController.login);
router.get('/deaitl/:user_id', checkUser_id,userController.deatil);
router.put('/update/:user_id', checkUser_id,userController.update);
module.exports = router;