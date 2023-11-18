const unidecode = require('unidecode');
const connection = require('../config/connection');
const { use } = require('../router/private/userRouter');
const userModel = require('../model/userModel')
const userValidate = require('../validate/userValidate')
const jwt = require('jsonwebtoken');
const crypto = require('crypto');
// const { v4: uuidv4 } = require('uuid');
const { response } = require('express');

const secretKey = 'yourSecretKey';
const bcrypt = require('bcrypt');
const tokenExpiration = '1h';

exports.createUser = (req, res) => {
    const userName = req.body.username;
    const fullName = req.body.fullName;
    const password = req.body.password;

    userModel.checkPhone(userName, (error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }

        if (results.length > 0) {
            return res.json({ status: 'fail', mess: 'Số điện thoại/email này đã có mời nhập lại' });
        }

        // Hash the password using bcrypt
        bcrypt.hash(password, 10, (error, hashedPassword) => {
            if (error) {
                return res.status(500).json({ error: 'Error hashing password' });
            }

            const user = {
                user_username: userName,
                user_fullname: fullName,
                user_pasword: hashedPassword,  // Save the hashed password to the database
                user_code: '',
                user_passwordOld: hashedPassword,  // Save the hashed password to the database
                user_email: '',
                user_phone: userName,
                user_linkImg: '',
                user_address: '',
                user_categoryAccount: 1,
                user_money: 0,
                user_status: 1,
                created_at: new Date()
            };

            userModel.createUser(user, (error, results) => {
                if (error) {
                    return res.status(500).json({ error: 'Database query error' });
                }

                return res.json({ status: 'success', mess: 'Tạo tài khoản thành công' });
            });
        });
    });
};

exports.creatUserGGFA = (req, res) => {
    const fullname = req.body.fullname;
    const img = req.body.img;
    const username = req.body.username;
    const phone = req.body.phone || " ";
    const categoryAccount = req.body.categoryAccount;
    const check_userId = req.body.accountId;



    userModel.checkAccount(check_userId, categoryAccount, (error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }

        if (results.length > 0) {
            const user_id = results[0].user_id; // Lấy user_id từ mảng kết quả, ví dụ lấy phần tử đầu tiên (index 0)
            const token = jwt.sign({ user_id }, secretKey, { expiresIn: tokenExpiration });
        
            return res.json({ status: 'success', mess: 'Đăng nhập thành công', user_id: user_id, token: token });
        }else {
            bcrypt.hash(fullname, 10, (error, hashedPassword) => {
            if (error) {
                return res.status(500).json({ error: 'Error hashing password' });
            }

            const user = {
                user_username: username,
                user_fullname: fullname,
                user_pasword: hashedPassword,
                user_code: '',
                user_passwordOld: hashedPassword,
                user_email: fullname,
                user_phone: phone,
                user_linkImg: img,
                user_address: '',
                user_categoryAccount: categoryAccount,
                check_userId: check_userId,
                user_money: 0,
                user_status: 1,
                created_at: new Date()
            };

            userModel.createUserAccount(user, (error, results) => {
                if (error) {
                    return res.status(500).json({ error: 'Database query error' });
                }
                const token = jwt.sign({ results }, secretKey, { expiresIn: tokenExpiration });
                return res.json({ status: 'success', mess: 'Tạo tài khoản thành công', user_id: results, token: token });
            });
        });
        }
      
    })

};
exports.login = (req, res) => {
    const username = req.body.username;
    const password = req.body.password;

    userModel.checkPhone(username, (error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }

        if (results.length === 0) {
            return res.json({ status: 'fail', mess: 'Sai số điện thoại' });
        }
        if (results[0].user_status === 0) {
            return res.json({ status: 'fail', mess: 'Tài khoản của bạn đang bị khóa vui lòng liên hệ quản trị viên để được mở' });
        }
        else {
            const user_id = results[0].user_id;  // Sử dụng results[0].user_id
            const storedHashedPassword = results[0].user_pasword;
            const token = jwt.sign({ user_id }, secretKey, { expiresIn: tokenExpiration });

            // Compare hashed password
            bcrypt.compare(password, storedHashedPassword, (err, result) => {
                if (err) {
                    return res.status(500).json({ error: 'Lỗi so sánh mật khẩu' });
                }

                if (result) {
                    return res.json({ status: 'success', mess: 'Đăng nhập thành công', user_id: user_id, token: token });
                } else {
                    return res.json({ status: 'fail', mess: 'Sai mật khẩu' });
                }
            });
        }

    });
};
exports.deatil = (req, res) => {
    const user_id = req.params.user_id;
    userModel.deatil(user_id, (error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }
        if (results.length === 0) {
            return res.json({ status: 'fail', message: 'Không tìm thấy người dùng' });
        }

        const arr = {
            user_id: user_id,
            fullname: results[0].user_fullname,
            phone: results[0].user_phone,
            img: results[0].user_linkImg,
            address: results[0].user_address
        }

        return res.json({ status: 'success', results: arr });

    });
}

