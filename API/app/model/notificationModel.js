const connection = require('../config/connection');

exports.getListNotification = (callback, user_id, status) => {
    connection.query(`SELECT 
    notification_id,notification_mess, notification_category,created_at
    FROM tbl_notification 
    WHERE user_id = ${user_id} AND notification_status = ${status}
    ORDER BY notification_id DESC;
 `, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.updateNotification = (callback, id) => {
    connection.query('UPDATE tbl_notification  SET notification_status = 0 WHERE notification_id= ? ;',
    [id]
    ,(error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};
exports.checkUser = (callback, user_id) => {
    connection.query(
        'SELECT user_id FROM tbl_notification WHERE user_id = ?',
        [user_id],
        (error, results) => {
            if (error) {
                console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
                return callback(error, null);
            }

            return callback(null, results);
        }
    );
};

