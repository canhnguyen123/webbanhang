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
exports.getCategory=(req,res)=>{
    const arr = [];

    theloaiModel.getDataTbl((error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }
    
        results.forEach(element => {
            arr.push({
                id: element.category_id,
                name: element.category_name,
            });
        });
    
        return res.json({ status: 'success', results: arr });
    },'tbl_category','category_status','category_id');
}
exports.getPhanloai=(req,res)=>{
    const arr = [];

    theloaiModel.getDataTbl((error, results) => {
        if (error) {
            return res.status(500).json({ error: 'Database query error' });
        }
    
        results.forEach(element => {
            arr.push({
                id: element.phanloai_id,
                name: element.phanloai_name,
            });
        });
    
        return res.json({ status: 'success', results: arr });
    },'tbl_phanloai','phanloai_status','phanloai_id');
}

exports.getTheLoai=(req,res)=>{
    const arr = [];
    const category_id=req.body.category_id;
    const phanloai_id=req.body.phanloai_id;
    if(category_id!==0&&phanloai_id!==0){
        theloaiModel.fillteTheLoai((error, results) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
        
            results.forEach(element => {
                arr.push({
                    id: element.theloai_id,
                    name: element.theloai_name,
                    link: element.theloai_img,
                });
            });
        
            return res.json({ status: 'success', results: arr });
        },category_id,phanloai_id);
    }else{
        return res.json({ status: 'fail', mess: "Có lỗi xảy ra vui lòng thử lại" });
    }
 
}
