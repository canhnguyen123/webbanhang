const connection = require('../config/connection');

exports.getmethod = (callback) => {
    connection.query('SELECT methodPayment_id,methodPayment_name,methodPayment_category FROM tbl_methodpayment WHERE methodPayment_status =1 ORDER BY methodPayment_id  DESC ', (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.getship = (callback) => {
    connection.query('SELECT ship_id,ship_name,ship_price FROM tbl_ship WHERE ship_status =1 ORDER BY ship_id  DESC ', (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.addPayment = (callback,dataPayment) => {
    connection.query(
        `INSERT INTO tbl_payment SET ?`,
        [dataPayment] ,
         (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.addPaymentDeatil = (callback,dataPaymentDeail) => {
    connection.query(
        `INSERT INTO tbl_payment_deatil SET ?`,
        [dataPaymentDeail] ,
         (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};