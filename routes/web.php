<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//user.......view................//
Route::get('/product.html/{id}', "frontController@product");
//product-as-category
Route::get('/productAsCategory.html/{id}', "frontController@productAsCategory");
//checkout
Route::get('/checkout', "frontController@checkout")->middleware('auth');
//ajax-cart-add
Route::get('/add/cart/{proid}', "frontController@addCart");
//ajax-cart-plus
Route::get('/plus/cart/{proid}', "frontController@cartPlus");
//ajax-cart-minus
Route::get('/min/cart/{proid}', "frontController@cartMin");
//cart-remove
Route::get('/remove/cart/{proid}', "frontController@cartRemove");
//order-create
Route::POST('/order/add', "orderController@orderCreate");
//user-order
Route::get('/order', "orderController@showClient")->middleware('auth');
//user-order-details
Route::get('/order/details/{invoice}', "orderController@showDetails")->middleware('auth');
//contact-page
Route::get('/mail.html', function () {
    return view('contact');
});

Route::get('/brands.html', function () {
    return view('brands');
});

// Route::get('/', "frontController@index");

Route::get('/products', function () {
    return view('product');
});

Route::get('/cart', "frontController@cart");



//admin....................admin//....admin...
Route::get('/admin', "adminController@admin")->middleware('admin');
//category
Route::get('/category.html', "categoryController@category")->middleware('admin');
//category-add
Route::POST('/category/add', "categoryController@categoryAdd")->middleware('admin');
//category-edit
Route::get('/categoryedit.html/{id}', "categoryController@categoryEdit")->middleware('admin');
//category-update
Route::POST('/category/update', "categoryController@categoryUpdate")->middleware('admin');
//category-delete
Route::get('/categorydelete.html/{id}', "categoryController@categoryDelete")->middleware('admin');

//product-page
Route::get('/product.html', "productController@product")->middleware('admin');
//product-add
Route::POST('/product/add', "productController@productAdd")->middleware('admin');
//product-edit-page
Route::get('/prodcutEdit.html/{id}', "productController@productEdit")->middleware('admin');
//product-update
Route::POST('/prodcutUpdate.html', "productController@productUpdate")->middleware('admin');
//product-delete
Route::get('/prodcutDelete/{id}', "productController@prodcutDelete")->middleware('admin');
//backend-order-show
Route::get('/order.html', "orderController@showAdmin")->middleware('admin');
//order-detail
Route::get('/order.html/details/{invoie}', "orderController@showOrderDetails")->middleware('admin');
//order-status-update
Route::POST('/update/status', "orderController@updateStatus")->middleware('admin');
//admin-order
Route::get('/order/admin', "orderController@showAdmin")->middleware('admin');
//admin-login
Route::get('/grocery/admin/login', "adminController@loginpage");
//login-check
Route::POST('/admin/logincheck', "adminController@logincheck");
//admin-logout
Route::get('/grocery/admin/logout', "adminController@logoutAdmin")->middleware('admin');


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
