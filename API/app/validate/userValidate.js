const validator = {};

validator.isPhoneNumber = (username) => {
    const phonePattern = /^[0-9]{10}$/; // Định nghĩa mẫu số điện thoại: 10 chữ số
    return phonePattern.test(username);
};

module.exports = validator;
