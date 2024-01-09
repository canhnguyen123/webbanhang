const unidecode = require('unidecode');
const productModel = require('../model/productModel')
const theloaiModel = require('../model/theloaiModel')
const { response } = require('express');
const connection = require('../config/connection');
exports.getListHome = (req, res) => {
    try {
        const arr = [];
        theloaiModel.getCheckedtheLoai((error, theloaiList) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
            theloaiList.forEach(element => {
                const theloai_id = element.theloai_id;
                productModel.getList((error, productList) => {
                    if (error) {
                        return res.status(500).json({ error: 'Database query error' });
                    }
                    const productsWithNames = productList.map(product => {
                        return {
                            product_id: product.product_id,
                            product_name: product.product_name,
                            product_img: product.img,
                            product_price: product.price
                        };
                    });
                    arr.push({
                        theloai_id: theloai_id,
                        name: element.theloai_name,
                        products: productsWithNames
                    });
                    if (arr.length === theloaiList.length) {
                        return res.json({ status: 'success', results: arr });
                    }
                }, theloai_id);
            });
        });
    } catch (error) {
        return res.json({ status: "fail", mess: "có lỗi xảy ra" });
    }
}
exports.getDeatil = (req, res) => {
    try {
        const product_id = req.params.product_id;
        productModel.deatil((error, results) => {
            if (error) {
                return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
            }
            if (results.length > 0) {
                const item = results[0];
                const productItem = {
                    id: item.product_id,
                    name: item.product_name,
                    code: item.product_code,
                    theloai_id: item.theloai_id,
                    theloai_name: item.theloai_name,
                    category_name: item.category_name,
                    phanloai_name: item.phanloai_name,
                    brand_name: item.brand_name,
                    brand_code: item.brand_code,
                    mota: item.product_mota,
                    dacdiem: item.product_dacdiem,
                    baoquan: item.product_baoquan,
                    images: [],
                    quantity: [],
                    colorList: [],
                    sizeList: [],
                };
                productModel.getDeatilImg((error, resultsImg) => {
                    if (error) {
                        return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
                    }
                    const images = resultsImg.map(img => img.productImg_name);
                    productItem.images = images;
                    productModel.getDeatilQuantity((error, resultsQuantity) => {
                        if (error) {
                            return res.status(500).json({ error: 'Lỗi truy vấn cơ sở dữ liệu' });
                        }
                        const arrQuantity = resultsQuantity.map(quantity => ({
                            size: quantity.productQuantity_size,
                            color: quantity.productQuantity_color,
                            quantity_: quantity.productQuantity,
                            price: quantity.productQuantity_priceOut
                        }));
                        const uniqueColors = Array.from(new Set(resultsQuantity.map(q => q.productQuantity_color)));
                        const uniqueSizes = Array.from(new Set(resultsQuantity.map(q => q.productQuantity_size)));
                        const arrColor = uniqueColors.map(color => (color));
                        const arrSize = uniqueSizes.map(size => (size));
                        productItem.quantity = arrQuantity;
                        productItem.colorList = arrColor;
                        productItem.sizeList = arrSize;
                        res.json({ status: 'success', results: productItem });
                    }, item.product_id);
                }, item.product_id);
            } else {
                res.status(404).json({ error: 'Không tìm thấy sản phẩm' });
            }
        }, product_id);
    } catch (error) {
        return res.json({ status: "fail", mess: "có lỗi xảy ra" });
    }
};

exports.getCaseProduct = (req, res) => {
    try {
        const theloai_id = req.params.theloai_id;
        if (theloai_id > 0 && !isNaN(theloai_id)) {
            theloaiModel.getName((error, theloai) => {
                if (error) {
                    return res.status(500).json({ error: 'Database query error' });
                }
                if (theloai) {
                    productModel.getList((error, productList) => {
                        if (error) {
                            return res.status(500).json({ error: 'Database query error' });
                        }
                        const listArr = productList.map(product => {
                            return {
                                id: product.product_id,
                                name: product.product_name,
                                img: product.img,
                                price: product.price
                            };
                        });
                        return res.json({ status: 'success', theloai_name: theloai[0].theloai_name, results: listArr });

                    }, theloai_id);
                }
                else {
                    return res.json({ status: 'fail', mess: 'Không tìm thấy danh sách sản phẩm theo thể loại này' });
                }
            }, theloai_id);
        }
        else {
            return res.json({ status: 'fail', mess: 'Có lỗi xảy ra' });
        }
    } catch (error) {
        return res.json({ status: "fail", mess: "có lỗi xảy ra" });
    }
};
exports.getListsProduct = (req, res) => {
    try {
        const theloai_id = req.params.theloai_id;
        let limit = null;
        if (req.params.limit) {
            limit = parseInt(req.params.limit, 10);

            if (isNaN(limit) || limit <= 0) {
                limit = null;
            }
        }
        if (theloai_id > 0 && !isNaN(theloai_id)) {
            productModel.getList((error, productList) => {
                if (error) {
                    return res.status(500).json({ error: 'Database query error' });
                }
                const listArr = productList.map(product => {
                    return {
                        id: product.product_id,
                        name: product.product_name,
                        img: product.img,
                        price: product.price
                    };
                });
                return res.json({ status: 'success', results: listArr });

            }, theloai_id, limit);
        }
        else {
            return res.json({ status: 'fail', mess: 'Có lỗi xảy ra' });
        }
    } catch (error) {
        return res.json({ status: "fail", mess: "có lỗi xảy ra" });
    }

};
exports.search = (req, res) => {
    try {
        const value = req.body.value;
        if (value && value.trim().length === 0) {
            return res.json({ status: 'fall', mess: "Vui lòng không bỏ trống ô nhập" });
        } else {
            productModel.searchProduct((error, productList) => {
                if (error) {
                    return res.status(500).json({ error: 'Database query error' });
                }
                const listArr = productList.map(product => {
                    return {
                        id: product.product_id,
                        name: product.product_name,
                        img: product.img,
                        price: product.price
                    };
                });
                return res.json({ status: 'success', mess: "Tìm kiếm thành công", results: listArr });

            }, value);
        }
    } catch (error) {
        return res.json({ status: "fail", mess: "có lỗi xảy ra" });
    }
};
exports.postCmt = (req, res) => {
    try {
        const product_id = req.params.product_id;
        const user_id = req.body.user_id;
        const comment_context = req.body.context;
        const comment_resMessId = req.body.resMessId ?? null;
        const data = {
            user_id: user_id,
            comment_resMessId: comment_resMessId,
            product_id: product_id,
            comment_context: comment_context
        };
        productModel.postCommet((error, insertedId) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }

            productModel.getDeatilCommet((error, cmt) => {
                if (error) {
                    return res.status(500).json({ error: 'Database query error' });
                }
                const listArr = {
                    id: cmt[0].comment_id,
                    user_id: cmt[0].user_id,
                    user_fullname: cmt[0].user_fullname,
                    countCmtChild: cmt[0].sub_comment_count,
                    img: cmt[0].user_linkImg,
                    comment_context: cmt[0].comment_context,
                    created_at: cmt[0].created_at,
                    comment_resMessId: comment_resMessId,
                };
                return res.json({ status: 'success', results: listArr, 'isRepLy': comment_resMessId !== null ? comment_resMessId : null });
            }, insertedId);
        }, data);
    } catch (error) {
        return res.json({ status: "fail", mess: "có lỗi xảy ra" });
    }
};
exports.getListCommet = (req, res) => {
    try {
        const product_id = req.params.product_id;
        // if (value && value.trim().length === 0) {
        //      return res.json({ status: 'fall',mess:"Vui lòng không bỏ trống ô nhập" });
        //  }else{
        productModel.getListCommet((error, commentList) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
            const listArr = commentList.map(cmt => {
                return {
                    id: cmt.comment_id,
                    user_id: cmt.user_id,
                    user_fullname: cmt.user_fullname,
                    countCmtChild: cmt.sub_comment_count,
                    img: cmt.user_linkImg,
                    comment_context: cmt.comment_context,
                    created_at: cmt.created_at
                };
            });
            return res.json({ status: 'success', results: listArr });

        }, product_id);
        // }
    } catch (error) {
        return res.json({ status: "fail", mess: "có lỗi xảy ra" });
    }
};
exports.getListHeart = (req, res) => {
    try {
        const user_id = req.params.user_id;
        productModel.getListHeart((error, results) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
            const listArr = results.map(item => {
                return {
                    id: item.product_id,
                    name: item.product_name,
                    img: item.img,
                    price: item.price,

                };
            });
            return res.json({ status: "success", results: listArr })
        }, user_id);
    } catch (error) {
        return res.json({ status: "fail", mess: "có lỗi xảy ra" })
    }

}
exports.addMyHeart = (req, res) => {
    try {
        const user_id = req.params.user_id;
        const productId_list = req.body.productId_list;

        let successCount = 0;
        let errorOccurred = false;

        connection.beginTransaction(function (err) {
            if (err) {
                return res.status(500).json({ error: 'Có lỗi từ server' });
            }

            const processNextProduct = (index) => {
                if (index === productId_list.length) {
                    if (!errorOccurred) {
                        connection.commit(function (commitError) {
                            if (commitError) {
                                console.error('Lỗi commit giao dịch: ' + commitError.stack);
                                res.status(500).json({ error: 'Database transaction error' });
                            } else {
                                res.json({ status: 'success', mess: 'Thêm thành công' });
                            }
                        });
                    } else {
                        connection.rollback(function () {
                            res.status(500).json({ error: 'Database query error' });
                        });
                    }
                } else {
                    const item = productId_list[index];

                    productModel.checkProductInMyHeart((checkError, checkResults) => {
                        if (checkError) {
                            errorOccurred = true;
                            return connection.rollback(function () {
                                res.status(500).json({ error: 'Database query error' });
                            });
                        }

                        if (!checkResults) {
                            const data = {
                                product_id: item,
                                user_id: user_id
                            };

                            productModel.addHeart((addError, addResults) => {
                                if (addError) {
                                    errorOccurred = true;
                                    return connection.rollback(function () {
                                        res.status(500).json({ error: 'Database query error' });
                                    });
                                }

                                successCount++;

                                processNextProduct(index + 1);
                            }, data);
                        } else {
                            processNextProduct(index + 1);
                        }
                    }, user_id, item);
                }
            };

            processNextProduct(0);
        });
    } catch (error) {
        console.error('Lỗi xảy ra: ' + error.stack);
        return res.json({ status: "fail", mess: "Có lỗi xảy ra" });
    }
};

exports.deleteMyHeart = (req, res) => {
    try {
        const user_id = req.params.user_id;
        const heart_list = req.body.heart_list;

        let successCount = 0;
        let errorOccurred = false;
        connection.beginTransaction(function (err) {
            if (err) {
                return res.status(500).json({ error: 'Có lỗi từ server' });
            }
            const processNextProduct = (index) => {
                if (index === heart_list.length) {
                    if (!errorOccurred) {
                        connection.commit(function (commitError) {
                            if (commitError) {
                                console.error('Lỗi commit giao dịch: ' + commitError.stack);
                                connection.rollback(function () {
                                    res.status(500).json({ error: 'Database transaction error' });
                                });
                            } else {
                                res.json({ status: 'success', mess: 'Xóa thành công' });
                            }
                        });
                    } else {
                        connection.rollback(function () {
                            res.status(500).json({ error: 'Database query error' });
                        });
                    }
                } else {
                    const item = heart_list[index];
                    productModel.deleteMyHeart((deleteError) => {
                        if (deleteError) {
                            errorOccurred = true;
                            connection.rollback(function () {
                                res.status(500).json({ error: 'Database query error' });
                            });
                        } else {
                            successCount++;
                            processNextProduct(index + 1);
                        }
                    }, item);
                }
            };

            processNextProduct(0);
        });
    } catch (error) {
        console.error('Lỗi xảy ra: ' + error.stack);
        return res.json({ status: "fail", mess: "Có lỗi xảy ra" });
    }
};
exports.getListAllProduct = (req, res) => {
    try {
        const itemsPerPage = 12;
        const currentPage = Number(req.query.page) || 1;
        const offset = (currentPage - 1) * itemsPerPage;
        let countProduct=0;
        productModel.countGetAll((error, count) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
            countProduct=count;
            productModel.getListAllPaginated(itemsPerPage, offset, (error, results) => {
                if (error) {
                    return res.status(500).json({ error: 'Database query error' });
                }
    
                const arr = results.map(product => {
                    return {
                        id: product.product_id,
                        name: product.product_name,
                        img: product.img,
                        price: product.price
                    };
                });
    
                return res.json({
                    status: 'success',
                    pagination: {
                        currentPage: parseInt(currentPage),/// trang hiện tại
                        itemsPerPage: itemsPerPage,// số phần tử 1 trang
                        totalItems: countProduct
    
                    },
                    results: arr,
                   
                });
            });
        });
      
    } catch (error) {
        return res.json({ status: "fail", mess: "Có lỗi xảy ra" });
    }
};
exports.getSize = (req, res) => {
    try {
       
        theloaiModel.getDataTbl((error, results) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
            const arr = results.map(size => {
                return {
                    id: size.size_id,
                    name: size.size_name,
                };
            });

            return res.json({
                status: 'success',
                results: arr,
               
            });
        },'tbl_size','size_status','size_id');
      
    } catch (error) {
        return res.json({ status: "fail", mess: "Có lỗi xảy ra" });
    }
};
exports.getColor = (req, res) => {
    try {
       
        theloaiModel.getDataTbl((error, results) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
            const arr = results.map(size => {
                return {
                    id: size.color_id,
                    name: size.color_name,
                    code: size.color_code,
                };
            });

            return res.json({
                status: 'success',
                results: arr,
               
            });
        },'tbl_color','color_status','color_id');
      
    } catch (error) {
        return res.json({ status: "fail", mess: "Có lỗi xảy ra" });
    }
};
exports.getBrand = (req, res) => {
    try {
       
        theloaiModel.getDataTbl((error, results) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
            const arr = results.map(brand => {
                return {
                    id: brand.brand_id,
                    name: brand.brand_name,
                    code: brand.brand_code,
                };
            });

            return res.json({
                status: 'success',
                results: arr,
               
            });
        },'tbl_brand','brand_status','brand_id');
      
    } catch (error) {
        return res.json({ status: "fail", mess: "Có lỗi xảy ra" });
    }
};
exports.getMaterial = (req, res) => {
    try {
       
        theloaiModel.getDataTbl((error, results) => {
            if (error) {
                return res.status(500).json({ error: 'Database query error' });
            }
            const arr = results.map(material => {
                return {
                    id: material.material_id,
                    name: material.material_name,
                };
            });

            return res.json({
                status: 'success',
                results: arr,
               
            });
        },'tbl_material','material_status','material_id');
      
    } catch (error) {
        return res.json({ status: "fail", mess: "Có lỗi xảy ra" });
    }
};