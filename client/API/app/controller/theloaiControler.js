const unidecode = require('unidecode');
const theloaiModel=require('../model/theloaiModel')
const { response } = require('express');
exports.getListHome=(req,res)=>{
    const arr = [];

    theloaiModel.getListtheLoai((error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }
    
        results.forEach(element => {
            arr.push({
                id: element.theloai_id,
                linkImg: element.theloai_img,
                name: element.theloai_name,
            });
        });
    
        return res.json({ status: 'success', results: arr });
    });
}

