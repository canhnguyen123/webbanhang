const unidecode = require('unidecode');
const bannerModel=require('../model/bannerModel')
const { response } = require('express');
exports.getBanner=(req,res)=>{
    const arr = [];

    bannerModel.getBanner((error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }
    
        results.forEach(element => {
            arr.push({
                linkImg: element.banner_link
            });
        });
    
        return res.json({ status: 'success', results: arr });
    });
}

