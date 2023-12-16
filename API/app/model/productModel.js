const connection = require('../config/connection');

exports.getList = (callback, theloai_id, limit) => {
    let sql = `
        SELECT
        tbl_product.product_id,
        tbl_product.product_name,
        tbl_product_img.productImg_name AS img,
        tbl_product_quantity.productQuantity_priceOut AS price
    FROM
        tbl_product
    LEFT JOIN (
        SELECT
            tbl_product_img.product_id,
            productImg_name
        FROM
            (
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
    LEFT JOIN (
        SELECT
            tbl_product_quantity.product_id,
            productQuantity_priceOut
        FROM
            (
                SELECT
                    product_id,
                    productQuantity_priceOut,
                    ROW_NUMBER() OVER (PARTITION BY product_id ORDER BY productQuantity_id ASC) AS rn
                FROM
                    tbl_product_quantity
            ) AS tbl_product_quantity
        WHERE
            tbl_product_quantity.rn = 1
    ) AS tbl_product_quantity ON tbl_product.product_id = tbl_product_quantity.product_id
    WHERE
        tbl_product.product_status = 1
        AND tbl_product.theloai_id = ?`;

    const params = [theloai_id];

    if (limit) {
        sql += ' ORDER BY tbl_product.product_id DESC LIMIT ?';
        params.push(limit);
    }

    connection.query(sql, params, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};

exports.deatil = (callback, product_id) => {
    connection.query(
        `
        SELECT
        tbl_product.*,
        tbl_brand.brand_name, tbl_brand.brand_code,
        tbl_theloai.theloai_name, tbl_theloai.theloai_code,
        tbl_category.category_name, tbl_phanloai.phanloai_name
        FROM
            tbl_product
        INNER JOIN tbl_theloai ON tbl_product.theloai_id = tbl_theloai.theloai_id
        INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
        INNER JOIN tbl_category ON tbl_theloai.category_id = tbl_category.category_id
        INNER JOIN tbl_phanloai ON tbl_theloai.phanloai_id = tbl_phanloai.phanloai_id
        WHERE product_id = ? AND product_status = 1
    
        `,

        [product_id],
        (error, results) => {
            if (error) {
                console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
                return callback(error, null);
            }

            return callback(null, results);
        }
    );
};
exports.getDeatilImg = (callback, product_id) => {
    connection.query(
        `
        SELECT
        productImg_name
        FROM
        tbl_product_img
        WHERE product_id = ? AND productImg_status = 1
    
        `,

        [product_id],
        (error, results) => {
            if (error) {
                console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
                return callback(error, null);
            }

            return callback(null, results);
        }
    );
};
exports.getDeatilQuantity = (callback, product_id) => {
    connection.query(
        `
        SELECT
        productQuantity_size,productQuantity_color,productQuantity,productQuantity_priceOut
        FROM
        tbl_product_quantity
        WHERE product_id = ? AND productQuantity_status = 1
    
        `,

        [product_id],
        (error, results) => {
            if (error) {
                console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
                return callback(error, null);
            }

            return callback(null, results);
        }
    );
};
exports.searchProduct = (callback, value) => {
    connection.query(`
    SELECT
    tbl_product.product_id,
    tbl_product.product_name,
    tbl_product_img.productImg_name AS img,
    tbl_product_quantity.productQuantity_priceOut AS price
FROM
    tbl_product
LEFT JOIN (
    SELECT
        tbl_product_img.product_id,
        productImg_name
    FROM
        (
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
LEFT JOIN (
    SELECT
        tbl_product_quantity.product_id,
        productQuantity_priceOut
    FROM
        (
            SELECT
                product_id,
                productQuantity_priceOut,
                ROW_NUMBER() OVER (PARTITION BY product_id ORDER BY productQuantity_id ASC) AS rn
            FROM
                tbl_product_quantity
        ) AS tbl_product_quantity
    WHERE
        tbl_product_quantity.rn = 1
        ) AS tbl_product_quantity ON tbl_product.product_id = tbl_product_quantity.product_id
        WHERE tbl_product.product_status = 1
     AND tbl_product.product_name Like ? `,
        [`%${value}%`],
        (error, results) => {
            if (error) {
                console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
                return callback(error, null);
            }

            return callback(null, results);
        }
    );
};
