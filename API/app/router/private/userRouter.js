const express = require('express');
const router = express.Router();
const userController =require('../../controller/userController');

router.post('/dangki', userController.createUser);
router.post('/login', userController.login);
router.get('/deaitl/:user_id', userController.deatil);
module.exports = router;