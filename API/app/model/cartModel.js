const connection = require('../config/connection');

exports.addCart = (callback, arrCart) => {
    connection.query(
        'INSERT INTO tbl_cart SET ?',
        [arrCart],
        (error, results) => {
            if (error) {
                console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
                return callback(error, null);
            }
            return callback(null, results);
        }
    );
};
exports.updateCartQuantity = (callback, card_quatity,user_id,product_id,card_size,card_color) => {
    connection.query(
        `
        UPDATE tbl_cart SET card_quatity = card_quatity+ ? 
        WHERE user_id = ? AND 
        product_id = ? AND 
        card_size = ? AND 
        card_color = ?
        `,
        [card_quatity,user_id,product_id,card_size,card_color],
        (error, results) => {
            if (error) {
                console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
                return callback(error, null);
            }
            return callback(null, results);
        }
    );
};

exports.getListCart = (callback, user_id, limit, offset = null) => {
    let sql = `
        SELECT
            tbl_cart.*,
            tbl_product.product_id,
            tbl_product.product_name,
            tbl_product_img.productImg_name AS product_image
        FROM
            tbl_cart
        INNER JOIN tbl_product ON tbl_cart.product_id = tbl_product.product_id
        LEFT JOIN (
            SELECT
                product_id,
                productImg_name
            FROM (
                SELECT
                    product_id,
                    productImg_name,
                    ROW_NUMBER() OVER (PARTITION BY product_id ORDER BY productImg_id ASC) AS rn
                FROM
                    tbl_product_img
            ) AS tbl_product_img
            WHERE
                tbl_product_img.rn = 1
        ) AS tbl_product_img ON tbl_product.product_id = tbl_product_img.product_id
        WHERE
            tbl_cart.user_id = ?
        ORDER BY tbl_cart.cart_id DESC`;

    if (offset !== null) {
        sql += ' LIMIT ? OFFSET ?';
    } else {
        sql += ' LIMIT ?';
    }

    const params = offset !== null ? [user_id, limit, offset] : [user_id, limit];

    connection.query(sql, params, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};


exports.getPrice = (callback, product_id, color, size) => {
    connection.query(
        `SELECT productQuantity_priceOut FROM tbl_product_quantity
         WHERE
         productQuantity_size = '${size}'
         AND productQuantity_color = '${color}'
         AND product_id = ${product_id}`,
        (error, results) => {
            if (error) {
                console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
                return callback(error, null);
            }
            return callback(null, results);
        }
    );
};
exports.countproduct = (callback, user_id) => {
    connection.query(
        `SELECT productQuantity_priceOut FROM tbl_product_quantity
         WHERE
         productQuantity_size = '${size}'
         AND productQuantity_color = '${color}'
         AND product_id = ${product_id}`,
        (error, results) => {
            if (error) {
                console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
                return callback(error, null);
            }
            return callback(null, results);
        }
    );
};

exports.deleteCart = (callback, cart_id) => {
    connection.query(
        `DELETE  FROM tbl_cart
         WHERE
         cart_id  =${cart_id }`,
        (error, results) => {
            if (error) {
                console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
                return callback(error, null);
            }
            return callback(null, results);
        }
    );
};

exports.getDetailProduct = (callback, cart_id) => {
    let sql = `
        SELECT
            tbl_cart.*,
            tbl_product.product_id,
            tbl_product.product_name,
            tbl_product_img.productImg_name AS product_image
        FROM
            tbl_cart
        INNER JOIN tbl_product ON tbl_cart.product_id = tbl_product.product_id
        LEFT JOIN (
            SELECT
                product_id,
                productImg_name
            FROM (
                SELECT
                    product_id,
                    productImg_name,
                    ROW_NUMBER() OVER (PARTITION BY product_id ORDER BY productImg_id ASC) AS rn
                FROM
                    tbl_product_img
            ) AS tbl_product_img
            WHERE
                tbl_product_img.rn = 1
        ) AS tbl_product_img ON tbl_product.product_id = tbl_product_img.product_id
        WHERE
            tbl_cart.cart_id = ${cart_id} `;

    connection.query(sql, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};

