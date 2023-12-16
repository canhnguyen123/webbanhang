const connection = require('../config/connection');

exports.getmethod = (callback) => {
    connection.query('SELECT methodPayment_id,methodPayment_name,methodPayment_category,methodPayment_code FROM tbl_methodpayment WHERE methodPayment_status =1 ORDER BY methodPayment_id  DESC ', (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.getStatus= (callback) => {
    connection.query('SELECT statusPayment_id,statusPayment_name FROM tbl_statuspayment WHERE statusPayment_status =1 ORDER BY statusPayment_id  ASC ', (error, results) => {
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
exports.getMyBill = (callback,user_id,status) => {
    connection.query(
        `SELECT
         payment_id,payment_allPrice,payment_code,isPayment,created_at
          FROM 
          tbl_payment WHERE user_id=? AND statusPayment_id =? ORDER BY payment_id   DESC `,
         [user_id,status], (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.getDeatilBill = (callback,payment_id) => {
    connection.query(
        `SELECT
        tbl_payment.payment_localtion,
        tbl_payment.payment_code,
        tbl_payment.payment_addressUser,
        tbl_payment.statusPayment_id,
        tbl_payment.isPayment,
        tbl_payment.payment_phoneUser,
        tbl_payment.payment_nameUser,
        tbl_payment.payment_note,
        tbl_payment.payment_allPrice,
        tbl_payment.created_at,
        tbl_payment.updated_at,
        tbl_methodpayment.methodPayment_name,
        tbl_statuspayment.statusPayment_name,
        tbl_ship.ship_name,
        tbl_ship.ship_price
    FROM
        tbl_payment
    JOIN
        tbl_statuspayment ON tbl_payment.statusPayment_id = tbl_statuspayment.statusPayment_id
    JOIN
        tbl_methodpayment ON tbl_payment.methodPayment_id = tbl_methodpayment.methodPayment_id
    JOIN
        tbl_ship ON tbl_payment.ship_id = tbl_ship.ship_id
    WHERE
        tbl_payment.payment_id = ?;
     `,
         [payment_id], (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.getDeatilBillProduct = (callback,payment_id) => {
    connection.query(
        `SELECT
        tbl_payment_deatil.product_price,
        tbl_payment_deatil.product_size,
        tbl_payment_deatil.product_color,
        tbl_payment_deatil.product_quantity,
        tbl_payment_deatil.product_id,
        tbl_product.product_name,
        tbl_theloai.theloai_name,
        tbl_category.category_name,
        tbl_phanloai.phanloai_name
    FROM
        tbl_payment_deatil
    JOIN
        tbl_product ON tbl_payment_deatil.product_id = tbl_product.product_id
    JOIN
        tbl_theloai ON tbl_product.theloai_id = tbl_theloai.theloai_id
    JOIN
        tbl_category ON tbl_theloai.category_id = tbl_category.category_id
    JOIN
        tbl_phanloai ON tbl_theloai.phanloai_id = tbl_phanloai.phanloai_id
    WHERE
        tbl_payment_deatil.payment_id = ?;
     `,
         [payment_id], (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.cancelOrder = (callback,data) => {
    connection.query(
        `INSERT INTO tbl_request_cancellation SET ?`,
         [data], (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};