const unidecode = require('unidecode');
const notificationtModel=require('../model/notificationModel');
const allModel=require('../model/model');
const { response } = require('express');
const moment = require("moment");
const tableName = 'tbl_notification';
const columnName = 'user_id';
exports.getList = (req, res) => {
    const user_id = req.params.user_id;
    allModel.checkUser((error, checkUserResults) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }
        if (checkUserResults && checkUserResults.length > 0) {
            notificationtModel.getListNotification((error, results1) => {
                if (error) {
                    return res.status(500).json({ error: 'Database query error' });
                }

                const arr1 = results1.map((item) => {
                    return {
                        id: item.notification_id,
                        mess: item.notification_mess,
                        category: item.notification_category,
                        created_at: item.created_at,
                        status: 1,
                    };
                });

                notificationtModel.getListNotification((error, results2) => {
                    if (error) {
                        return res.status(500).json({ error: 'Database query error' });
                    }

                    const arr2 = results2.map((item) => {
                        return {
                            id: item.notification_id,
                            mess: item.notification_mess,
                            category: item.notification_category,
                            created_at: item.created_at,
                            status: 0,
                        };
                    });

                    const combinedResults = arr1.concat(arr2);
                    return res.json({ status: 'success', results: combinedResults });
                }, user_id, 0);
            }, user_id, 1);
        } else {
            return res.json({ status: 'fall', mess: "Không thấy người dùng này" });
        }
    }, tableName, columnName, user_id);
};

exports.update = async (req, res) => {
    try {
        const user_id = req.params.user_id;
        const notification_ids = req.body.notification_ids;

        const checkUserResults = await new Promise((resolve, reject) => {
            allModel.checkUser((error, results) => {
                if (error) {
                    reject({ status: 'fall', mess: 'Database query error' });
                } else {
                    resolve(results);
                }
            }, tableName, columnName, user_id);
        });

        if (checkUserResults && checkUserResults.length > 0) {
            const updatePromises = notification_ids.map(async item => {
                return new Promise((resolve, reject) => {
                    notificationtModel.updateNotification((updateError, results) => {
                        if (updateError) {
                            reject({ status: 'fall', mess: 'Database query error' });
                        } else {
                            resolve({ status: 'success', mess: 'Cập nhật thành công' });
                        }
                    }, item);
                });
            });

            const updateResults = await Promise.all(updatePromises);
            return res.json({ status: 'success', results: updateResults });
        } else {
            return res.json({ status: 'fall', mess: 'Không thấy người dùng này' });
        }
    } catch (error) {
        return res.status(500).json({ error: 'Internal server error' });
    }
};


