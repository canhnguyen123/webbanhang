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
use App\Http\Controllers\voucherController;
use App\Http\Controllers\billController;
use App\Http\Controllers\permissionGroupController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\shipController;
use App\Http\Controllers\materialController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\paginationController;
use App\Http\Controllers\statisticalController;
use App\Http\Controllers\todolistController;
use App\Http\Controllers\blogController;

use function Ramsey\Uuid\v1;
Route::get('/login', [Controller::class, 'login'])->name('login');
Route::post('/login-post', [accountController::class, 'postLogin'])->name('login_post');
Route::middleware(['auth'])->group(function () {
    Route::get('/', [Controller::class, 'home'])->name('home');
    Route::middleware(['auth'])->group(function () {
        Route::prefix('/account')->group(function(){
            Route::get('/logout', [accountController::class, 'logout'])->name('logout');
            Route::get('/infro', [accountController::class, 'infro'])->name('infroDeatil');
            Route::get('/update-password', [accountController::class, 'updatePass'])->name('update.password');
            Route::put('/update-password', [accountController::class, 'updatePassPut'])->name('update.password.put');
            Route::get('/restore-password', [accountController::class, 'restorePassword'])->name('restore.password');
            Route::put('/restore-password', [accountController::class, 'restorePasswordPut'])->name('restore.password.put');
        });
        Route::prefix('/todolist')->group(function(){
            Route::get('/list', [todolistController::class, 'list'])->name('todolist.list')->middleware('check_permission:check');
            Route::get('/my-list', [controller::class, 'myTodolist'])->name('my.todolist.list');
            Route::get('/add', [todolistController::class, 'add'])->name('todolist.add')->middleware('check_permission:check');
            Route::post('/post-add', [todolistController::class, 'post_add'])->name('todo.list.add.post');
            Route::get('/update/{todolist_id}', [todolistController::class, 'update'])->name('todolist.update')->middleware('check_permission:check');
            Route::get('/deatil/{todolist_id}', [todolistController::class, 'deatil'])->name('todolist.deatil')->middleware('check_permission:check');
            Route::put('/post-update/{todolist_id}', [todolistController::class, 'post_update'])->name('todolist.put.update');
            Route::get('/toggle-status/{todolist_id}', [todolistController::class, 'toogle_status'])->name('todolist.toogle');
        });
        Route::prefix('/page')->group(function(){
            
            Route::prefix('/statistical')->group(function(){
                Route::get('/', [statisticalController::class, 'statistical'])->name('statistical');
                Route::get('/revenue-action-ajax', [statisticalController::class, 'statisticalAction'])->name('statistical.acction.ajax');
                Route::prefix('/user')->group(function(){
                    Route::get('/', [statisticalController::class, 'statisticaluser'])->name('statistical.user.list');
                    Route::get('/{user_id}', [statisticalController::class, 'statisticalDeatiluser'])->name('statistical.user.deatil');
                });
                Route::prefix('/product')->group(function(){
                    Route::get('/', [statisticalController::class, 'statisticalProduct'])->name('statistical.product.list');
                    Route::get('/deatil/{product_id}', [statisticalController::class, 'productDeatil'])->name('statistical.product.deatil');
                    Route::get('/deatil-action/{product_id}', [statisticalController::class, 'productDeatilAcction'])->name('statistical.product.deatil.acction');
                    Route::get('/all-action', [statisticalController::class, 'productAllAcction'])->name('statistical.product.all.acction');
                });
                Route::prefix('/payment')->group(function(){
                    Route::get('/action', [statisticalController::class, 'paymentAcction'])->name('statistical.payment.acction');               
                  
                });
                Route::prefix('/acction')->group(function(){
                    Route::get('/user', [statisticalController::class, 'statisticalchatUser'])->name('statistical.user.acction');                               
                  
                });
            });

            Route::prefix('/setting')->group(function(){
                Route::get('/', [settingController::class, 'setting'])->name('setting');
                Route::prefix('/pagination')->group(function(){
                    Route::get('/list', [paginationController::class, 'list'])->name('pagination.list')->middleware('check_permission:check');
                    Route::get('/add', [paginationController::class, 'add'])->name('pagination.add')->middleware('check_permission:check');
                    Route::post('/post-add', [paginationController::class, 'post_add'])->name('pagination.post.add');
                    Route::get('/update/{pagination_id}', [paginationController::class, 'update'])->name('pagination.update')->middleware('check_permission:check');
                    Route::put('/post-update/{pagination_id}', [paginationController::class, 'post_update'])->name('pagination.post.update');
                    Route::get('/toggle-status/{pagination_id}/{pagination_status}', [paginationController::class, 'toogle_status'])->name('pagination.toogle');
                });
            });
            Route::prefix('/blog')->group(function(){
                Route::get('/list', [blogController::class, 'list'])->name('blog.list')->middleware('check_permission:check');
                Route::get('/add', [blogController::class, 'add'])->name('blog.add')->middleware('check_permission:check');
                Route::post('/post-add', [blogController::class, 'post_add'])->name('blog.post.add');
                Route::get('/update/{blog_id}', [blogController::class, 'update'])->name('blog.update')->middleware('check_permission:check');
                Route::get('/deatil/{blog_id}', [blogController::class, 'deatil'])->name('blog.deatil')->middleware('check_permission:check');
                Route::put('/post-update/{blog_id}', [blogController::class, 'post_update'])->name('blog.put.update');
                Route::get('/toggle-status/{blog_id}', [blogController::class, 'toogle_status'])->name('blog.toogle.status');
            });
            Route::prefix('/product')->group(function(){
                Route::prefix('/category')->group(function(){
                    Route::get('/list', [categoryController::class, 'list'])->name('category_list')->middleware('check_permission:check');
                    Route::get('/add', [categoryController::class, 'add'])->name('category_add')->middleware('check_permission:check');
                    Route::post('/post-add', [categoryController::class, 'post_add'])->name('category_post_add');
                    Route::get('/update/{category_id}', [categoryController::class, 'update'])->name('category_update')->middleware('check_permission:check');
                    Route::put('/post-update/{category_id}', [categoryController::class, 'post_update'])->name('category_post_update');
                    Route::get('/toggle-status/{category_id}', [categoryController::class, 'toogle_status'])->name('category_toogle_status');
                });
                Route::prefix('/phanloai')->group(function(){
                    Route::get('/list', [phanloaiController::class, 'list'])->name('phanloai_list')->middleware('check_permission:check');
                    Route::get('/add', [phanloaiController::class, 'add'])->name('phanloai_add')->middleware('check_permission:check');
                    Route::post('/post-add', [phanloaiController::class, 'post_add'])->name('phanloai_post_add');
                    Route::get('/update/{phanloai_id}', [phanloaiController::class, 'update'])->name('phanloai_update')->middleware('check_permission:check');
                    Route::put('/post-update/{phanloai_id}', [phanloaiController::class, 'post_update'])->name('phanloai_post_update');
                    Route::get('/toggle-status/{phanloai_id}', [phanloaiController::class, 'toogle_status'])->name('phanloai_toogle_status');
                });
                Route::prefix('/theloai')->group(function(){
                    Route::get('/list', [theloaiController::class, 'list'])->name('theloai_list')->middleware('check_permission:check');
                    Route::get('/add', [theloaiController::class, 'add'])->name('theloai_add')->middleware('check_permission:check');
                    Route::post('/post-add', [theloaiController::class, 'post_add'])->name('theloai_post_add');
                    Route::get('/update/{theloai_id}', [theloaiController::class, 'update'])->name('theloai_update')->middleware('check_permission:check');
                    Route::put('/post-update/{theloai_id}', [theloaiController::class, 'post_update'])->name('theloai_post_update');
                    Route::get('/toggle-status/{theloai_id}', [theloaiController::class, 'toogle_status'])->name('theloai_toogle_status');
                    Route::get('/show-home', [theloaiController::class, 'showHome'])->name('theloai_showHome');
                    Route::post('/post-show-home', [theloaiController::class, 'postShowHome'])->name('theloai_post_showHome');
                    Route::get('/checked-home', [theloaiController::class, 'checkedHome'])->name('theloai_checked');
                    Route::post('/post-checked-home', [theloaiController::class, 'checkedShowHome'])->name('theloai_post_checked');
                });
                Route::prefix('/color')->group(function(){
                    Route::get('/list', [colorController::class, 'list'])->name('color_list')->middleware('check_permission:check');
                    Route::get('/add', [colorController::class, 'add'])->name('color_add')->middleware('check_permission:check');
                    Route::post('/post-add', [colorController::class, 'post_add'])->name('color_post_add');
                    Route::get('/update/{color_id}', [colorController::class, 'update'])->name('color_update')->middleware('check_permission:check');
                    Route::put('/post-update/{color_id}', [colorController::class, 'post_update'])->name('color_post_update');
                    Route::get('/toggle-status/{color_id}', [colorController::class, 'toogle_status'])->name('color_toogle_status');
                });
                Route::prefix('/brand')->group(function(){
                    Route::get('/list', [brandController::class, 'list'])->name('brand_list')->middleware('check_permission:check');
                    Route::get('/add', [brandController::class, 'add'])->name('brand_add')->middleware('check_permission:check');
                    Route::post('/post-add', [brandController::class, 'post_add'])->name('brand_post_add');
                    Route::get('/update/{brand_id}', [brandController::class, 'update'])->name('brand_update')->middleware('check_permission:check');
                    Route::put('/post-update/{brand_id}', [brandController::class, 'post_update'])->name('brand_post_update');
                    Route::get('/toggle-status/{brand_id}', [brandController::class, 'toogle_status'])->name('brand_toogle_status');
                });
                Route::prefix('/size')->group(function(){
                    Route::get('/list', [sizeController::class, 'list'])->name('size_list')->middleware('check_permission:check');
                    Route::get('/add', [sizeController::class, 'add'])->name('size_add')->middleware('check_permission:check');
                    Route::post('/post-add', [sizeController::class, 'post_add'])->name('size_post_add');
                    Route::get('/update/{size_id}', [sizeController::class, 'update'])->name('size_update')->middleware('check_permission:check');
                    Route::put('/post-update/{size_id}', [sizeController::class, 'post_update'])->name('size_post_update');
                    Route::get('/toggle-status/{size_id}', [sizeController::class, 'toogle_status'])->name('size_toogle_status');
                });
                Route::prefix('/material')->group(function(){
                    Route::get('/list', [materialController::class, 'list'])->name('material.list')->middleware('check_permission:check');
                    Route::get('/add', [materialController::class, 'add'])->name('material.add')->middleware('check_permission:check');
                    Route::post('/post-add', [materialController::class, 'post_add'])->name('material.add.post');
                    Route::get('/update/{material_id}', [materialController::class, 'update'])->name('material.update')->middleware('check_permission:check');
                    Route::put('/post-update/{material_id}', [materialController::class, 'post_update'])->name('material.update.post');
                    Route::get('/toggle-status/{material_id}', [materialController::class, 'toogle_status'])->name('material.toggle');
                });
                Route::prefix('/product')->group(function(){
                    Route::get('/list', [productController::class, 'list'])->name('product_list')->middleware('check_permission:check');
                    Route::get('/add', [productController::class, 'add'])->name('product_add')->middleware('check_permission:check');
                    Route::post('/post-add', [productController::class, 'post_add'])->name('product_post_add');
                    Route::get('/update/{product_id}', [productController::class, 'update'])->name('product_update')->middleware('check_permission:check');
                    Route::put('/post-update/{product_id}', [productController::class, 'post_update'])->name('product_post_update');
                    Route::get('/deatil/{product_id}', [productController::class, 'deatil'])->name('product_deatil')->middleware('check_permission:check');
                    Route::get('/toggle-status/{product_id}/{product_status}', [productController::class, 'toogle_status'])->name('product_toogle_status');
                    Route::get('/deatil-Quantity/{product_id}', [productController::class, 'deatil_Quantity'])->name('product_deatil_Quantity');
                    Route::post('/post-add-quantity/{product_id}', [productController::class, 'post_add_quantity'])->name('product_post_add_quantity');
                    Route::put('/post-update-quantity/{product_id}/{productQuantity_id}', [productController::class, 'post_update_quantity'])->name('product_post_update_quantity');
                    Route::get('/toggle-Quantity/{product_id}/{productQuantity_id}/{productQuantity_status}', [productController::class, 'toogle_statusQuantity'])->name('toogle_statusQuantity');
                    Route::get('/deatil-Img/{product_id}', [productController::class, 'deatil_img'])->name('product_deatil_img');
                    Route::post('/post-add-img/{product_id}', [productController::class, 'post_add_img'])->name('product_post_add_Img');
                    Route::get('/post-update-img/{product_id}/{productImg_id}/{productQuantity_status}', [productController::class, 'post_toggle_img'])->name('toggle_img');
                    Route::get('/delete-img/{product_id}/{productImg_id}', [productController::class, 'delete_img'])->name('delete_img');
                    Route::get('/show-home', [productController::class, 'showHome'])->name('product_showHome');
                    Route::post('/post-show-home', [productController::class, 'postShowHome'])->name('product_post_showHome');
                });
            });
            Route::prefix('/voucher')->group(function(){
                    Route::get('/list', [voucherController::class, 'list'])->name('voucher_list')->middleware('check_permission:check');
                    Route::get('/add', [voucherController::class, 'add'])->name('voucher_add')->middleware('check_permission:check');
                    Route::post('/post-add', [voucherController::class, 'post_add'])->name('voucher_post_add');
                    Route::get('/update/{voucher_id}', [voucherController::class, 'update'])->name('voucher_update')->middleware('check_permission:check');
                    Route::put('/post-update/{voucher_id}', [voucherController::class, 'post_update'])->name('voucher_post_update');
                    Route::get('/toggle-status/{voucher_id}/{voucher_status}', [voucherController::class, 'toogle_status'])->name('voucher_toogle_status');
                    Route::get('/deatil/{voucher_id}', [voucherController::class, 'deatil'])->name('voucher_deatil');
    
            });
            Route::prefix('/banner')->group(function(){
                Route::get('/list', [bannerController::class, 'list'])->name('banner_list')->middleware('check_permission:check');
                Route::get('/add', [bannerController::class, 'add'])->name('banner_add')->middleware('check_permission:check');
                Route::post('/post-add', [bannerController::class, 'post_add'])->name('banner_post_add');
                Route::get('/update/{banner_id}', [bannerController::class, 'update'])->name('banner_update')->middleware('check_permission:check');
                Route::put('/post-update/{banner_id}', [bannerController::class, 'post_update'])->name('banner_post_update');
                Route::get('/toggle-status/{banner_id}/{banner_status}', [bannerController::class, 'toogle_status'])->name('banner_toogle_status');
                Route::get('/delete/{banner_id}', [bannerController::class, 'delete'])->name('banner_delete');
            });
            Route::prefix('/user')->group(function(){
                Route::get('/list', [userController::class, 'list'])->name('user_list')->middleware('check_permission:check');
                Route::get('/deatil/{user_id}', [userController::class, 'deatil'])->name('user_deatil')->middleware('check_permission:check');
                Route::get('/toggle-status/{user_id}/{user_status}', [userController::class, 'toogle_status'])->name('user_toogle_status');
            });
            Route::prefix('/system')->group(function(){
                Route::prefix('/position')->group(function(){
                    Route::get('/list', [positionController::class, 'list'])->name('position_list')->middleware('check_permission:check');
                    Route::get('/add', [positionController::class, 'add'])->name('position_add')->middleware('check_permission:check');
                    Route::post('/post-add', [positionController::class, 'post_add'])->name('position_post_add');
                    Route::get('/update/{position_id}', [positionController::class, 'update'])->name('position_update')->middleware('check_permission:check');
                    Route::put('/post-update/{position_id}', [positionController::class, 'post_update'])->name('position_post_update');
                    Route::get('/toggle-status/{position_id}/{position_status}', [positionController::class, 'toogle_status'])->name('position_toogle_status');
                });
                Route::prefix('/staff')->group(function(){
                    Route::get('/list', [staffController::class, 'list'])->name('staff_list')->middleware('check_permission:check');
                    Route::get('/add', [staffController::class, 'add'])->name('staff_add')->middleware('check_permission:check');
                    Route::post('/post-add', [staffController::class, 'post_add'])->name('staff_post_add');
                    Route::get('/update/{staff_id}', [staffController::class, 'update'])->name('staff_update')->middleware('check_permission:check');
                    Route::put('/post-update/{staff_id}', [staffController::class, 'post_update'])->name('staff_post_update');
                    Route::get('/toggle-status/{staff_id}/{staff_status}', [staffController::class, 'toogle_status'])->name('staff_toogle_status');
                    Route::get('/deatil/{staff_id}', [staffController::class, 'deatil'])->name('deatil_staff')->middleware('check_permission:check');
                });
                Route::prefix('/permission-Group')->group(function(){
                    Route::get('/list', [permissionGroupController::class, 'list'])->name('permission.Group.list')->middleware('check_permission:check');
                    Route::get('/add', [permissionGroupController::class, 'add'])->name('permission.Group.add')->middleware('check_permission:check');
                    Route::post('/post-add', [permissionGroupController::class, 'post_add'])->name('permission.Group.add.post');
                    Route::get('/update/{permissionGroup_id}', [permissionGroupController::class, 'update'])->name('permission.Group.update')->middleware('check_permission:check');
                    Route::put('/post-update/{permissionGroup_id}', [permissionGroupController::class, 'post_update'])->name('permission.Group.update.post');
                    Route::get('/toggle-status/{permissionGroup_id}/{permissionGroup_status}', [permissionGroupController::class, 'toogle_status'])->name('permission.Group.toggle');
                });
                Route::prefix('/permission')->group(function(){
                    Route::get('/list', [permissionController::class, 'list'])->name('permission.list')->middleware('check_permission:check');
                    Route::get('/add', [permissionController::class, 'add'])->name('permission.add')->middleware('check_permission:check');
                    Route::post('/post-add', [permissionController::class, 'post_add'])->name('permission.add.post');
                    Route::get('/update/{permission_id}', [permissionController::class, 'update'])->name('permission.update')->middleware('check_permission:check');
                    Route::get('/deatil/{permission_id}', [permissionController::class, 'deatil'])->name('permission.deatil')->middleware('check_permission:check');
                    Route::put('/post-update/{permission_id}', [permissionController::class, 'post_update'])->name('permission.update.post');
                    Route::get('/toggle-status/{permission_id}/{permission_status}', [permissionController::class, 'toogle_status'])->name('permission.toggle');
                });
            });
            Route::prefix('/payment')->group(function(){
                Route::prefix('/methodPayment')->group(function(){
                    Route::get('/list', [methodPaymentController::class, 'list'])->name('methodPayment_list')->middleware('check_permission:check');
                    Route::get('/add', [methodPaymentController::class, 'add'])->name('methodPayment_add')->middleware('check_permission:check');
                    Route::post('/post-add', [methodPaymentController::class, 'post_add'])->name('methodPayment_post_add');
                    Route::get('/update/{methodPayment_id}', [methodPaymentController::class, 'update'])->name('methodPayment_update')->middleware('check_permission:check');
                    Route::put('/post-update/{methodPayment_id}', [methodPaymentController::class, 'post_update'])->name('methodPayment_post_update');
                    Route::get('/toggle-status/{methodPayment_id}/{methodPayment_status}', [methodPaymentController::class, 'toogle_status'])->name('methodPayment_toogle_status');
                });
                Route::prefix('/statusPayment')->group(function(){
                    Route::get('/list', [statusPaymentController::class, 'list'])->name('statusPayment_list')->middleware('check_permission:check');
                    Route::get('/add', [statusPaymentController::class, 'add'])->name('statusPayment_add')->middleware('check_permission:check');
                    Route::post('/post-add', [statusPaymentController::class, 'post_add'])->name('statusPayment_post_add');
                    Route::get('/update/{statusPayment_id}', [statusPaymentController::class, 'update'])->name('statusPayment_update')->middleware('check_permission:check');
                    Route::put('/post-update/{statusPayment_id}', [statusPaymentController::class, 'post_update'])->name('statusPayment_post_update');
                    Route::get('/toggle-status/{statusPayment_id}/{statusPayment_status}', [statusPaymentController::class, 'toogle_status'])->name('statusPayment_toogle_status');
                });
                Route::prefix('/payment')->group(function(){
                    Route::get('/list', [billController::class, 'list'])->name('payment_list')->middleware('check_permission:check');
                    Route::get('/deatil/{payment_id}', [billController::class, 'deatil'])->name('payment_deatil')->middleware('check_permission:check');
                    Route::post('/action/{payment_id}', [billController::class, 'action'])->name('payment_action');
                    Route::get('/update/{payment_id}', [billController::class, 'update'])->name('payment_update');
                    Route::put('/post-update/{payment_id}', [billController::class, 'post_update'])->name('payment_update');
                    Route::get('/toggle-status/{payment_id}/{statusPayment_status}', [billController::class, 'toogle_status'])->name('payment_toogle_status');
                    Route::get('/list-Resquest-Canne-Bill', [billController::class, 'canneBill'])->name('payment.canne.bill')->middleware('check_permission:check');
                    Route::post('/Resquest-Canne-Bill-action/{request_cancellation_id}', [billController::class, 'canneBillAction'])->name('payment.canne.bill.action');
                });
                Route::prefix('/ship')->group(function(){
                    Route::get('/list', [shipController::class, 'list'])->name('ship.list')->middleware('check_permission:check');
                    Route::get('/add', [shipController::class, 'add'])->name('ship.add')->middleware('check_permission:check');
                    Route::post('/post-add', [shipController::class, 'post_add'])->name('ship.add.post');
                    Route::get('/update/{ship_id}', [shipController::class, 'update'])->name('ship.update')->middleware('check_permission:check');
                    Route::put('/post-update/{ship_id}', [shipController::class, 'post_update'])->name('ship.update.post');
                    Route::get('/toggle-status/{ship_id}/{ship_status}', [shipController::class, 'toogle_status'])->name('ship.toggle');
                });
            });
        });
        
        Route::prefix('/ajax')->group(function(){
            Route::prefix('/search')->group(function(){
                Route::get('/category', [AjaxController::class, 'category_search'])->name('category_seach_Ajax');
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
                Route::get('/voucher', [AjaxController::class, 'voucher_seach'])->name('voucher_seach_Ajax');
                Route::get('/ship', [AjaxController::class, 'ship_seach'])->name('ship.seach.Ajax');
                Route::get('/material', [AjaxController::class, 'material_seach'])->name('material.seach.Ajax');
                Route::get('/permission-group', [AjaxController::class, 'permissionGroup_seach'])->name('permission.group.seach.Ajax');
                Route::get('/permission', [AjaxController::class, 'permission_seach'])->name('permission.seach.Ajax');
                Route::get('/blog', [AjaxController::class, 'blog_search'])->name('blog.seach.Ajax');
            });
            Route::prefix('/filter')->group(function(){
                Route::get('/category', [AjaxController::class, 'category_filter'])->name('category.filter.Ajax');
                Route::get('/phanloai', [AjaxController::class, 'phanloai_filter'])->name('phanloai.filter.Ajax');
                Route::get('/color', [AjaxController::class, 'color_filter'])->name('color.filter.Ajax');
                Route::get('/brand', [AjaxController::class, 'brand_filter'])->name('brand.filter.Ajax');
                Route::get('/size', [AjaxController::class, 'size_filter'])->name('size.filter.Ajax');
                Route::get('/material', [AjaxController::class, 'material_filter'])->name('material.filter.Ajax');
                Route::get('/user', [AjaxController::class, 'user_filter'])->name('user.filter.Ajax');
                Route::get('/position', [AjaxController::class, 'position_filter'])->name('position.filter.Ajax');
                Route::get('/staff', [AjaxController::class, 'staff_filter'])->name('staff.filter.Ajax');
                Route::get('/permissions', [AjaxController::class, 'permission_filter'])->name('permission.filter.Ajax');
                Route::get('/permission-group', [AjaxController::class, 'permissionGroup_filter'])->name('permission.group.filter.Ajax');
                Route::get('/methodPayment', [AjaxController::class, 'methodPayment_filter'])->name('method.payment.filter.Ajax');
                Route::get('/statusPayment', [AjaxController::class, 'statusPayment_filter'])->name('status.payment.filter.Ajax');
                Route::get('/ship', [AjaxController::class, 'ship_filter'])->name('ship.filter.Ajax');
                Route::get('/blog', [AjaxController::class, 'blog_filter'])->name('blog.filter.Ajax');
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
                Route::post('/ship', [AjaxController::class, 'ship_loadmore'])->name('ship.loadmore.Ajax');
                Route::post('/material', [AjaxController::class, 'material_loadmore'])->name('material.loadmore.Ajax');
                Route::post('/blog', [AjaxController::class, 'blog_loadmore'])->name('blog.loadmore.Ajax');
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
                Route::get('/voucher', [AjaxController::class, 'voucher_return'])->name('voucher_return_Ajax');
                Route::get('/ship', [AjaxController::class, 'ship_return'])->name('ship.return.Ajax');
                Route::get('/material', [AjaxController::class, 'material_return'])->name('material.return.Ajax');
                Route::get('/permission', [AjaxController::class, 'permission_return'])->name('permission.return.Ajax');
                Route::get('/permission-group', [AjaxController::class, 'permissionGroup_return'])->name('permission.group.return.Ajax');
                Route::get('/blog', [AjaxController::class, 'blog_return'])->name('blog.return.Ajax');
            });
            Route::prefix('/select')->group(function(){ 
                Route::post('/list-theloai', [AjaxController::class, 'select_data_theloai'])->name('select_data_theloai');
                Route::post('/list-theloai-product', [AjaxController::class, 'select_data_theloai_product'])->name('select_data_theloaiproduct');
                Route::post('/list-product', [AjaxController::class, 'filter_product'])->name('filter_product');
                Route::post('/list-product-plus', [AjaxController::class, 'filter_productPlus'])->name('filter_productPlus');
                Route::get('/filter-categoryAccount-user', [AjaxController::class, 'user_Category_filter'])->name('userCategory.filter.Ajax');
                Route::get('/filter-user-bill', [statisticalController::class, 'fitterUserBill'])->name('user.Bill.Ajax');
                Route::get('/filter-user-time', [statisticalController::class, 'fitterUserTime'])->name('user.Time.Ajax');
                Route::get('/get-data-user', [statisticalController::class, 'statisticalchatUser'])->name('statistical.chart.user');
                Route::get('/get-data-normal', [statisticalController::class, 'statisticalchatUsernormal'])->name('statistical.chart.user.normal');
            });
            Route::prefix('/get-list')->group(function(){ 
                Route::post('/payment', [AjaxController::class, 'selete_bill'])->name('selete_billPayment');
    
            });
            Route::prefix('/post')->group(function(){ 
                Route::post('/post-cmt', [AjaxController::class, 'postCmt'])->name('post.cmt');
                Route::get('/get-listCmt/{cmt_id}', [AjaxController::class, 'getLoadmoreCmt'])->name('get.Loadmore.Cmt');
            });
            Route::prefix('/excel')->group(function(){ 
                Route::get('/category', [AjaxController::class, 'getdataCategoryExcel'])->name('get.category.excel');
                Route::get('/phanloai', [AjaxController::class, 'getdataPhanLoaiExcel'])->name('get.phanloai.excel');
                Route::get('/color', [AjaxController::class, 'getdatacolorExcel'])->name('get.color.excel');
                Route::get('/size', [AjaxController::class, 'getdatasizeExcel'])->name('get.size.excel');
                Route::get('/brand', [AjaxController::class, 'getdatabrandExcel'])->name('get.brand.excel');
                Route::get('/material', [AjaxController::class, 'getdatabmaterialeExcel'])->name('get.material.excel');
                Route::get('/position', [AjaxController::class, 'getdatabpositionExcel'])->name('get.position.excel');
                Route::get('/permission-group', [AjaxController::class, 'getdatabPermissionGroupExcel'])->name('get.permission.group.excel');
                Route::get('/method-payment', [AjaxController::class, 'getdatabMethodPaymentExcel'])->name('get.method.payment.excel');
                Route::get('/status-payment', [AjaxController::class, 'getdatastatusPaymentExcel'])->name('get.status.payment.excel');
                Route::get('/ship', [AjaxController::class, 'getdataShipExcel'])->name('get.ship.excel');
                Route::get('/blog', [AjaxController::class, 'getdataBlogExcel'])->name('get.blog.excel');
            });
        });
    });
   
});

