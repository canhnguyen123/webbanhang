const connection = require('../config/connection');
exports.checkUser = (callback, table_name, column, id) => {
    const query = `SELECT ?? FROM ?? WHERE ?? = ?`;
    const values = [column, table_name, column, id];

    connection.query(query, values, (error, results) => {
        if (error) {
            console.error('Lỗi truy vấn cơ sở dữ liệu: ' + error.stack);
            return callback(error, null);
        }

        return callback(null, results);
    });
};


