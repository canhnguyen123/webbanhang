const connection = require('../config/connection');

exports.createUser = (user, callback) => {
    connection.query('INSERT INTO tbl_user SET ?', user, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.createUserAccount = (user, callback) => {
    // Thêm dữ liệu vào cơ sở dữ liệu
    connection.query('INSERT INTO tbl_user SET ?', user, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }
        const insertedUserId = results.insertId;

        return callback(null, insertedUserId);
    });
};

exports.checkPhone = (userName, callback) => {
    connection.query('SELECT * FROM tbl_user WHERE user_username = ?', userName, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.checkAccount = (check_userId, categoryAccount, callback) => {
    connection.query('SELECT * FROM tbl_user WHERE check_userId = ? AND user_categoryAccount = ?', [check_userId, categoryAccount], (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};

exports.deatil = (user_id, callback) => {
    connection.query('SELECT * FROM tbl_user WHERE user_id = ?', user_id, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
// exports.checkPass = (userName, password, callback) => {
//     connection.query('SELECT * FROM tbl_user WHERE user_username = ? AND user_password = ?', [userName, password], (error, results) => {
//         if (error) {
//             console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
//             return callback(error, null);
//         }

//         return callback(null, results);
//     });
// };
