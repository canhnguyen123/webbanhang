const connection = require('../config/connection');

exports.getBanner = (callback) => {
    connection.query('SELECT banner_link FROM tbl_banner WHERE banner_status =1 ORDER BY banner_id DESC LIMIT 5', (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
