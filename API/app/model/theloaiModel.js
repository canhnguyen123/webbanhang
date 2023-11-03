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
exports.getDataTbl = (callback, tbl_name, status, id) => {
    const query = `SELECT * FROM ${tbl_name} WHERE ${status} = 1 ORDER BY ${id} ASC`;
    
    connection.query(query, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.fillteTheLoai = (callback,category_id,phanloai_id) => {
    const query = `
    SELECT theloai_id,theloai_name,theloai_img FROM tbl_theloai WHERE theloai_status = 1 AND category_id =${category_id}
     AND phanloai_id =${phanloai_id} ORDER BY theloai_id DESC`;
    
    connection.query(query, (error, results) => {
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
exports.getName = (callback,theloai_id) => {
    connection.query(
        `SELECT 
            theloai_name
        FROM tbl_theloai
        WHERE theloai_id = ${theloai_id} AND theloai_status= 1`
        , (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
