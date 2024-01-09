// errorHandler.js
function errorHandler(err, req, res, next) {
    console.error('Lỗi chung:', err.stack);
    res.status(500).json({ success: false, mess: 'Có lỗi xảy ra' });
}

module.exports = errorHandler;
