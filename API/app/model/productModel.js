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
exports.getListAllPaginated = (itemsPerPage, offset, callback) => {
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
        LIMIT ? OFFSET ?`;

    connection.query(sql, [itemsPerPage, offset], (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.countGetAll = (callback) => {
    let sql = ` SELECT COUNT(*) AS totalCount FROM tbl_product where product_status=1; `;
    connection.query(sql, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }
        const totalCount = results[0].totalCount;
        return callback(null, totalCount);
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
exports.getListCommet = (callback, product_id) => {
    connection.query(`
    SELECT
    main_comment.comment_context,
    main_comment.comment_id,
    main_comment.created_at,
    main_comment.user_id,
    IFNULL(tbl_user.user_fullname, 'null') AS user_fullname,
    IFNULL(tbl_user.user_linkImg, 'null') AS user_linkImg,
    COUNT(sub_comment.comment_id) AS sub_comment_count,
    SUM(CASE WHEN sub_comment.comment_resMessId = main_comment.comment_id THEN 1 ELSE 0 END) AS feedback_count
FROM
    tbl_comment AS main_comment
LEFT JOIN
    tbl_user ON main_comment.user_id = tbl_user.user_id
LEFT JOIN
    tbl_comment AS sub_comment ON main_comment.comment_id = sub_comment.comment_resMessId
WHERE
    main_comment.product_id = ?
    AND main_comment.comment_resMessId IS NULL
GROUP BY
    main_comment.comment_context,
    main_comment.comment_id,
    main_comment.created_at,
    main_comment.user_id,
    user_fullname,
    user_linkImg;
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
}
exports.postCommet = (callback, data) => {
    connection.query(
        `
            INSERT INTO tbl_comment SET ?
        `,
        [data],
        (error, results) => {
            if (error) {
                console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
                return callback(error, null);
            }

            const insertedId = results.insertId; // Lấy ID vừa mới thêm vào
            return callback(null, insertedId);
        }
    );
};
exports.getDeatilCommet = (callback, comment_id) => {
    connection.query(`
        SELECT
        main_comment.comment_context,
        main_comment.comment_id,
        main_comment.created_at,
        main_comment.user_id,
        IFNULL(tbl_user.user_fullname, 'null') AS user_fullname,
        IFNULL(tbl_user.user_linkImg, 'null') AS user_linkImg,
        COUNT(sub_comment.comment_id) AS sub_comment_count,
        SUM(CASE WHEN sub_comment.comment_resMessId = main_comment.comment_id THEN 1 ELSE 0 END) AS feedback_count
    FROM
        tbl_comment AS main_comment
    LEFT JOIN
        tbl_user ON main_comment.user_id = tbl_user.user_id
    LEFT JOIN
        tbl_comment AS sub_comment ON main_comment.comment_id = sub_comment.comment_resMessId
    WHERE
        main_comment.comment_id = ?
    GROUP BY
        main_comment.comment_context,
        main_comment.comment_id,
        main_comment.created_at,
        main_comment.user_id,
        user_fullname,
        user_linkImg;
    `,
        [comment_id],
        (error, results) => {
            if (error) {
                console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
                return callback(error, null);
            }

            return callback(null, results);
        }
    );
}
exports.getListHeart = (callback, user_id, limit) => {
    let sql = `
            SELECT
            tbl_product.product_id,
            tbl_product.product_name,
            tbl_product_img.productImg_name AS img,
            tbl_product_quantity.productQuantity_priceOut AS price
        FROM
            tbl_heart
        JOIN tbl_product ON tbl_heart.product_id=tbl_product.product_id
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
            tbl_heart.user_id = ?`;

    const params = [user_id];

    if (limit) {
        sql += ' ORDER BY tbl_heart.heart_id DESC LIMIT ?';
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
exports.checkProductById = (callback, product_id) => {
    let sql = ` SELECT product_id FROM tbl_product WHERE product_id = ?`;
    const params = [product_id];
    connection.query(sql, params, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }
        const productExists = results.length > 0;
        return callback(null, productExists);
    });
};
exports.checkProductInMyHeart = (callback, user_id, product_id) => {
    let sql = ` SELECT * FROM tbl_heart WHERE user_id = ? AND product_id=? `;
    const params = [user_id, product_id];
    connection.query(sql, params, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }
        const productExists = results.length > 0;
        return callback(null, productExists);
    });
};
exports.addHeart = (callback, data) => {
    connection.query('INSERT INTO tbl_heart SET ?', data, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.deleteMyHeart = (callback, heart_id) => {
    let sql = ` DELETE FROM  tbl_heart WHERE heart_id = ?`;
    const params = [heart_id];
    connection.query(sql, params, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }
        const productExists = results.length > 0;
        return callback(null, productExists);
    });
};
