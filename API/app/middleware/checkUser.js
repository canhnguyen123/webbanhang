const userModel = require('../model/userModel')
exports.checkUser_id=(req,res,next)=>{
    const user_id=Number(req.params.user_id);
    if(Number.isInteger(user_id)&&user_id>0){
        userModel.checkUserId((error, userExists) => {
            if (error) {
              return res.status(500).json({ error: 'Internal Server Error' });
            }
        
            if (!userExists) {
              return res.json({status:"fail",mess:"Người dùng không tồn tại" });
            }
        next();
          }, user_id);
    }else{
        return res.json({status:"fail",mess:"Sai kiểu dữ liệu" });
    }
}