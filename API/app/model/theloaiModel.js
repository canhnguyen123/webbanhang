const connection = require('../config/connection');

exports.getListtheLoai = (callback) => {
    connection.query(
        'SELECT tbl_theloai.theloai_name,tbl_theloai.theloai_img,tbl_theloai.theloai_id FROM tbl_theloaishowhome INNER JOIN tbl_theloai ON tbl_theloaishowhome.theloai_id = tbl_theloai.theloai_id  WHERE tbl_theloaishowhome.theloaiShowHome_status = 1 AND tbl_theloai.theloai_status= 1 ORDER BY tbl_theloai.theloai_id DESC LIMIT 10;'
        , (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.getCheckedtheLoai = (callback) => {
    connection.query(
        `SELECT 
        tbl_theloai.theloai_name,tbl_theloai.theloai_img,tbl_theloai.theloai_id 
        FROM tbl_theloaichecked 
        INNER JOIN tbl_theloai ON tbl_theloaichecked.theloai_id = tbl_theloai.theloai_id  WHERE tbl_theloaichecked.theloaichecked_status = 1 AND tbl_theloai.theloai_status= 1 ORDER BY tbl_theloai.theloai_id DESC LIMIT 10;`
        , (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
