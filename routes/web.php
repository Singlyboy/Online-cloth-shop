<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Frontend\CustomerController as FrontendCustomerController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\SslCommerzPaymentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;

//website's routes

Route::get('/',[FrontendHomeController::class,'home'])->name('homepage');

Route::get('/registration',[FrontendCustomerController::class,'registration'])->name('registration');
Route::post('/registration-submit',[FrontendCustomerController::class,'registrationSubmit'])->name('registration.submit');
Route::post('/customer-login',[FrontendCustomerController::class,'customerLogin'])->name('customer.login');
Route::get('/customer-logout',[FrontendCustomerController::class,'customerLogout'])->name('customer.logout');


Route::get('/products',[FrontendProductController::class,'products'])->name('products.list');
Route::get('/product/view/{id}',[FrontendProductController::class,'productView'])->name('product.view');
Route::get('/product-under-category/{category_id}',[FrontendHomeController::class,'productUnderCategory'])->name('product.under.category');
Route::get('/search', [FrontendHomeController::class, 'search'])->name('search');
Route::get('/add-to-cart/{p_id}',[FrontendOrderController::class,'addToCart'])->name('add.to.cart');

Route::get('/cart-view',[FrontendOrderController::class,'viewCart'])->name('cart.view');
Route::put('/update-cart/{partsid}',[FrontendOrderController::class,'updateCart'])->name('update.cart');
Route::get('/cart/item/delete/{id}',[FrontendOrderController::class,'cartItemDelete'])->name('cart.item.delete');

Route::group(['middleware'=>'customer_auth'],function(){

Route::get('/checkout',[FrontendOrderController::class,'checkout'])->name('checkout');
Route::post('/place-order',[FrontendOrderController::class,'placeOrder'])->name('order.place');
Route::get('/view-profile',[FrontendCustomerController::class,'viewProfile'])->name('view.profile');
Route::get('/view-invoice/{id}',[FrontendOrderController::class,'viewInvoice'])->name('view.invoice');
Route::get('/order-cancel/{order_id}',[FrontendCustomerController::class,'cancelOrder'])->name('cancel.order');
Route::post('/success', [SslCommerzPaymentController::class, 'success']);

});



//ssl commerz
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END









//admin routes
Route::group(['prefix'=>'admin'],function(){

        Route::get('/login',[LoginController::class,'Login'])->name('login');
        Route::post('/login-submit',[LoginController::class,'LoginSubmit'])->name('login.submit');

Route::group(['middleware'=>'auth'],function(){
       
        Route::get('/logout',[LoginController::class,'Logout'])->name('logout');

        Route::get('/',[HomeController::class,'Home'])->name('dashboard');


        Route::get('/categories',[CategoryController::class,'Categories'])->name('categories');
        Route::get('/category-create',[CategoryController::class,'CategoryCreate'])->name('category.create');
        Route::post('/category-store',[CategoryController::class,'CategoryStore'])->name('category.store');
        Route::get('/category-delete/{c_id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');


        Route::get('/sub-categories',[SubCategoryController::class,'SubCategories'])->name('sub.categories');
        Route::get('/sub-category-create',[SubCategoryController::class,'SubCategoryCreate'])->name('sub.category.create');
        Route::post('/sub-category-store',[SubCategoryController::class,'SubCategoryStore'])->name('sub.category.store');


        Route::get('/products',[ProductController::class,'Products'])->name('products');
        Route::get('/product-create-form',[ProductController::class,'ProductCreate'])->name('product.create');
        Route::post('/product-store',[ProductController::class,'ProductStore'])->name('product.store');

        Route::get('/product/delete/{id}',[ProductController::class,'ProductDelete'])->name('product.delete');
        Route::get('/product/update/{id}',[ProductController::class,'ProductUpdate'])->name('product.update');
        


        Route::get('/brands',[BrandController::class,'Brands'])->name('brands');
        Route::get('/brand-create',[BrandController::class,'BrandCreate'])->name('brand.create');
        Route::post('/brand-store',[BrandController::class,'BrandStore'])->name('brand.store');
        Route::get('/brand-del/{b_id}',[BrandController::class,'Brand_del'])->name('brand.delete');


        Route::get('/orders',[OrderController::class,'Orders'])->name('order.list');
        Route::get('/order-view/{o_id}',[OrderController::class,'orderView'])->name('order.View');
        Route::post('/order-status/{o_id}',[OrderController::class,'orderStatus'])->name('order.status');


        Route::get('/customers',[CustomerController::class,'customers'])->name('customers');
        //report
       
        Route::get('/report',[ReportController::class,'report'])->name('report.list');

    });

});


           
        
    





















