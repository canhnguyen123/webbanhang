<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\phanloaiController;
use App\Http\Controllers\theloaiController;
use App\Http\Controllers\colorController;
use App\Http\Controllers\sizeController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\productController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\bannerController;
use App\Http\Controllers\positionController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\methodPaymentController;
use App\Http\Controllers\statusPaymentController;
use App\Http\Controllers\accountController;
use App\Http\Controllers\userController;
Route::get('/login', [Controller::class, 'login'])->name('login');
Route::post('/login-post', [accountController::class, 'postLogin'])->name('login_post');
Route::middleware(['auth'])->group(function () {
    Route::get('/', [Controller::class, 'home'])->name('home');
    Route::prefix('/account')->group(function(){
        Route::get('/logout', [accountController::class, 'logout'])->name('logout');
        Route::get('/infro/{user_id}', [accountController::class, 'infro'])->name('infroDeatil');

    });
    Route::prefix('/page')->group(function(){
    
        Route::prefix('/product')->group(function(){
            Route::prefix('/category')->group(function(){
                Route::get('/list', [categoryController::class, 'list'])->name('category_list');
                Route::get('/add', [categoryController::class, 'add'])->name('category_add');
                Route::post('/post-add', [categoryController::class, 'post_add'])->name('category_post_add');
                Route::get('/update/{category_id}', [categoryController::class, 'update'])->name('category_update');
                Route::put('/post-update/{category_id}', [categoryController::class, 'post_update'])->name('category_post_update');
                Route::get('/toggle-status/{category_id}/{category_status}', [categoryController::class, 'toogle_status'])->name('category_toogle_status');
            });
            Route::prefix('/phanloai')->group(function(){
                Route::get('/list', [phanloaiController::class, 'list'])->name('phanloai_list');
                Route::get('/add', [phanloaiController::class, 'add'])->name('phanloai_add');
                Route::post('/post-add', [phanloaiController::class, 'post_add'])->name('phanloai_post_add');
                Route::get('/update/{phanloai_id}', [phanloaiController::class, 'update'])->name('phanloai_update');
                Route::put('/post-update/{phanloai_id}', [phanloaiController::class, 'post_update'])->name('phanloai_post_update');
                Route::get('/toggle-status/{phanloai_id}/{phanloai_status}', [phanloaiController::class, 'toogle_status'])->name('phanloai_toogle_status');
            });
            Route::prefix('/theloai')->group(function(){
                Route::get('/list', [theloaiController::class, 'list'])->name('theloai_list');
                Route::get('/add', [theloaiController::class, 'add'])->name('theloai_add');
                Route::post('/post-add', [theloaiController::class, 'post_add'])->name('theloai_post_add');
                Route::get('/update/{theloai_id}', [theloaiController::class, 'update'])->name('theloai_update');
                Route::put('/post-update/{theloai_id}', [theloaiController::class, 'post_update'])->name('theloai_post_update');
                Route::get('/toggle-status/{theloai_id}/{theloai_status}', [theloaiController::class, 'toogle_status'])->name('theloai_toogle_status');
                Route::get('/show-home', [theloaiController::class, 'showHome'])->name('theloai_showHome');
                Route::post('/post-show-home', [theloaiController::class, 'postShowHome'])->name('theloai_post_showHome');
                Route::get('/checked-home', [theloaiController::class, 'checkedHome'])->name('theloai_checked');
                Route::post('/post-checked-home', [theloaiController::class, 'checkedShowHome'])->name('theloai_post_checked');
            });
            Route::prefix('/color')->group(function(){
                Route::get('/list', [colorController::class, 'list'])->name('color_list');
                Route::get('/add', [colorController::class, 'add'])->name('color_add');
                Route::post('/post-add', [colorController::class, 'post_add'])->name('color_post_add');
                Route::get('/update/{color_id}', [colorController::class, 'update'])->name('color_update');
                Route::put('/post-update/{color_id}', [colorController::class, 'post_update'])->name('color_post_update');
                Route::get('/toggle-status/{color_id}/{color_status}', [colorController::class, 'toogle_status'])->name('color_toogle_status');
            });
            Route::prefix('/brand')->group(function(){
                Route::get('/list', [brandController::class, 'list'])->name('brand_list');
                Route::get('/add', [brandController::class, 'add'])->name('brand_add');
                Route::post('/post-add', [brandController::class, 'post_add'])->name('brand_post_add');
                Route::get('/update/{brand_id}', [brandController::class, 'update'])->name('brand_update');
                Route::put('/post-update/{brand_id}', [brandController::class, 'post_update'])->name('brand_post_update');
                Route::get('/toggle-status/{brand_id}/{brand_status}', [brandController::class, 'toogle_status'])->name('brand_toogle_status');
            });
            Route::prefix('/size')->group(function(){
                Route::get('/list', [sizeController::class, 'list'])->name('size_list');
                Route::get('/add', [sizeController::class, 'add'])->name('size_add');
                Route::post('/post-add', [sizeController::class, 'post_add'])->name('size_post_add');
                Route::get('/update/{size_id}', [sizeController::class, 'update'])->name('size_update');
                Route::put('/post-update/{size_id}', [sizeController::class, 'post_update'])->name('size_post_update');
                Route::get('/toggle-status/{size_id}/{size_status}', [sizeController::class, 'toogle_status'])->name('size_toogle_status');
            });
            Route::prefix('/product')->group(function(){
                Route::get('/list', [productController::class, 'list'])->name('product_list');
                Route::get('/add', [productController::class, 'add'])->name('product_add');
                Route::post('/post-add', [productController::class, 'post_add'])->name('product_post_add');
                Route::get('/update/{product_id}', [productController::class, 'update'])->name('product_update');
                Route::put('/post-update/{product_id}', [productController::class, 'post_update'])->name('product_post_update');
                Route::get('/deatil/{product_id}', [productController::class, 'deatil'])->name('product_deatil');
                Route::get('/toggle-status/{product_id}/{product_status}', [productController::class, 'toogle_status'])->name('product_toogle_status');
                Route::get('/deatil-Quantity/{product_id}', [productController::class, 'deatil_Quantity'])->name('product_deatil_Quantity');
                Route::post('/post-add-quantity/{product_id}', [productController::class, 'post_add_quantity'])->name('product_post_add_quantity');
                Route::put('/post-update-quantity/{product_id}/{productQuantity_id}', [productController::class, 'post_update_quantity'])->name('product_post_update_quantity');
                Route::get('/toggle-Quantity/{product_id}/{productQuantity_id}/{productQuantity_status}', [productController::class, 'toogle_statusQuantity'])->name('toogle_statusQuantity');
                Route::get('/deatil-Img/{product_id}', [productController::class, 'deatil_img'])->name('product_deatil_img');
                Route::post('/post-add-img/{product_id}', [productController::class, 'post_add_img'])->name('product_post_add_Img');
                Route::get('/post-update-img/{product_id}/{productImg_id}/{productQuantity_status}', [productController::class, 'post_toggle_img'])->name('toggle_img');
                Route::get('/delete-img/{product_id}/{productImg_id}', [productController::class, 'delete_img'])->name('delete_img');
                Route::get('/show-home', [productController::class, 'showHo me'])->name('product_showHome');
                Route::post('/post-show-home', [productController::class, 'postShowHome'])->name('product_post_showHome');
            });
        });
        Route::prefix('/banner')->group(function(){
            Route::get('/list', [bannerController::class, 'list'])->name('banner_list');
            Route::get('/add', [bannerController::class, 'add'])->name('banner_add');
            Route::post('/post-add', [bannerController::class, 'post_add'])->name('banner_post_add');
            Route::get('/update/{banner_id}', [bannerController::class, 'update'])->name('banner_update');
            Route::put('/post-update/{banner_id}', [bannerController::class, 'post_update'])->name('banner_post_update');
            Route::get('/toggle-status/{banner_id}/{banner_status}', [bannerController::class, 'toogle_status'])->name('banner_toogle_status');
            Route::get('/delete/{banner_id}', [bannerController::class, 'delete'])->name('banner_delete');
        });
        Route::prefix('/user')->group(function(){
            Route::get('/list', [userController::class, 'list'])->name('user_list');
            Route::get('/deatil/{user_id}', [userController::class, 'deatil'])->name('user_deatil');
            Route::get('/toggle-status/{user_id}/{user_status}', [userController::class, 'toogle_status'])->name('user_toogle_status');
        });
        Route::prefix('/system')->group(function(){
            Route::prefix('/position')->group(function(){
                Route::get('/list', [positionController::class, 'list'])->name('position_list');
                Route::get('/add', [positionController::class, 'add'])->name('position_add');
                Route::post('/post-add', [positionController::class, 'post_add'])->name('position_post_add');
                Route::get('/update/{position_id}', [positionController::class, 'update'])->name('position_update');
                Route::put('/post-update/{position_id}', [positionController::class, 'post_update'])->name('position_post_update');
                Route::get('/toggle-status/{position_id}/{position_status}', [positionController::class, 'toogle_status'])->name('position_toogle_status');
            });
            Route::prefix('/staff')->group(function(){
                Route::get('/list', [staffController::class, 'list'])->name('staff_list');
                Route::get('/add', [staffController::class, 'add'])->name('staff_add');
                Route::post('/post-add', [staffController::class, 'post_add'])->name('staff_post_add');
                Route::get('/update/{staff_id}', [staffController::class, 'update'])->name('staff_update');
                Route::put('/post-update/{staff_id}', [staffController::class, 'post_update'])->name('staff_post_update');
                Route::get('/toggle-status/{staff_id}/{staff_status}', [staffController::class, 'toogle_status'])->name('staff_toogle_status');
                Route::get('/deatil/{staff_id}', [staffController::class, 'deatil'])->name('deatil_staff');
            });
        });
        Route::prefix('/payment')->group(function(){
            Route::prefix('/methodPayment')->group(function(){
                Route::get('/list', [methodPaymentController::class, 'list'])->name('methodPayment_list');
                Route::get('/add', [methodPaymentController::class, 'add'])->name('methodPayment_add');
                Route::post('/post-add', [methodPaymentController::class, 'post_add'])->name('methodPayment_post_add');
                Route::get('/update/{methodPayment_id}', [methodPaymentController::class, 'update'])->name('methodPayment_update');
                Route::put('/post-update/{methodPayment_id}', [methodPaymentController::class, 'post_update'])->name('methodPayment_post_update');
                Route::get('/toggle-status/{methodPayment_id}/{methodPayment_status}', [methodPaymentController::class, 'toogle_status'])->name('methodPayment_toogle_status');
            });
            Route::prefix('/statusPayment')->group(function(){
                Route::get('/list', [statusPaymentController::class, 'list'])->name('statusPayment_list');
                Route::get('/add', [statusPaymentController::class, 'add'])->name('statusPayment_add');
                Route::post('/post-add', [statusPaymentController::class, 'post_add'])->name('statusPayment_post_add');
                Route::get('/update/{statusPayment_id}', [statusPaymentController::class, 'update'])->name('statusPayment_update');
                Route::put('/post-update/{statusPayment_id}', [statusPaymentController::class, 'post_update'])->name('statusPayment_post_update');
                Route::get('/toggle-status/{statusPayment_id}/{statusPayment_status}', [statusPaymentController::class, 'toogle_status'])->name('statusPayment_toogle_status');
            });
        });
    });
    
    Route::prefix('/ajax')->group(function(){
        Route::prefix('/search')->group(function(){
            Route::get('/category', [AjaxController::class, 'category_seach'])->name('category_seach_Ajax');
            Route::get('/phanloai', [AjaxController::class, 'phanloai_seach'])->name('phanloai_seach_Ajax');
            Route::get('/color', [AjaxController::class, 'color_seach'])->name('color_seach_Ajax');
            Route::get('/theloai', [AjaxController::class, 'theloai_seach'])->name('theloai_seach_Ajax');
            Route::get('/size', [AjaxController::class, 'size_seach'])->name('size_seach_Ajax');
            Route::get('/brand', [AjaxController::class, 'brand_seach'])->name('brand_seach_Ajax');
            Route::get('/product', [AjaxController::class, 'product_seach'])->name('product_seach_Ajax');
            Route::get('/position', [AjaxController::class, 'position_seach'])->name('position_seach_Ajax');
            Route::get('/staff', [AjaxController::class, 'staff_seach'])->name('staff_seach_Ajax');
            Route::get('/methodPayment', [AjaxController::class, 'methodPayment_seach'])->name('methodPayment_seach_Ajax');
            Route::get('/statusPayment', [AjaxController::class, 'statusPayment_seach'])->name('statusPayment_seach_Ajax');
            Route::get('/user', [AjaxController::class, 'user_seach'])->name('user_seach_Ajax');

        });
       
        Route::prefix('/loadmore')->group(function(){
            Route::post('/category', [AjaxController::class, 'category_loadmore'])->name('category_loadmore_Ajax');
            Route::post('/phanloai', [AjaxController::class, 'phanloai_loadmore'])->name('phanloai_loadmore_Ajax');
            Route::post('/color', [AjaxController::class, 'color_loadmore'])->name('color_loadmore_Ajax'); 
            Route::post('/size', [AjaxController::class, 'size_loadmore'])->name('size_loadmore_Ajax'); 
            Route::post('/brand', [AjaxController::class, 'brand_loadmore'])->name('brand_loadmore_Ajax');
            Route::post('/position', [AjaxController::class, 'position_loadmore'])->name('position_loadmore_Ajax');
            Route::post('/methodPayment', [AjaxController::class, 'methodPayment_loadmore'])->name('methodPayment_loadmore_Ajax');
            Route::post('/statusPayment', [AjaxController::class, 'statusPayment_loadmore'])->name('statusPayment_loadmore_Ajax');
    
        });
        Route::prefix('/return')->group(function(){
            Route::get('/category', [AjaxController::class, 'category_return'])->name('category_return_Ajax');
            Route::get('/phanloai', [AjaxController::class, 'phanloai_return'])->name('phanloai_return_Ajax');
            Route::get('/color', [AjaxController::class, 'color_return'])->name('color_return_Ajax');
            Route::get('/theloai', [AjaxController::class, 'theloai_return'])->name('theloai_return_Ajax');
            Route::get('/size', [AjaxController::class, 'size_return'])->name('size_return_Ajax');
            Route::get('/brand', [AjaxController::class, 'brand_return'])->name('brand_return_Ajax');
            Route::get('/product', [AjaxController::class, 'product_return'])->name('product_return_Ajax');
            Route::get('/position', [AjaxController::class, 'position_return'])->name('position_return_Ajax');
            Route::get('/staff', [AjaxController::class, 'staff_return'])->name('staff_return_Ajax');
            Route::get('/methodPayment', [AjaxController::class, 'methodPayment_return'])->name('methodPayment_return_Ajax');
            Route::get('/statusPayment', [AjaxController::class, 'statusPayment_return'])->name('statusPayment_return_Ajax');
            Route::get('/user', [AjaxController::class, 'user_return'])->name('user_return_Ajax');

        });
        Route::prefix('/select')->group(function(){ 
            Route::post('/list-theloai', [AjaxController::class, 'select_data_theloai'])->name('select_data_theloai');
            Route::post('/list-theloai-product', [AjaxController::class, 'select_data_theloai_product'])->name('select_data_theloaiproduct');
            Route::post('/list-product', [AjaxController::class, 'filter_product'])->name('filter_product');
            Route::post('/list-product-plus', [AjaxController::class, 'filter_productPlus'])->name('filter_productPlus');
        });
    });
});

