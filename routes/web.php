<?php

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
// home
Route::get('/', 'Home@index');
Route::get('/product/detail/{slug}', 'Home@detail');
Route::post('/product/search', 'Home@search');
Route::get('/category/getCategory/{slug}', 'Home@SelectByCategory');
// shopping cart
Route::get('/shoppingCart', 'shoppingCart@index');
Route::post('/shoppingCart/add', 'shoppingCart@add');
Route::get('/shoppingCart/remove/{rowid}', 'shoppingCart@delete');
Route::post('/shoppingCart/update', 'shoppingCart@update');
Route::get('/shoppingCart/detail/{rowId}', 'shoppingCart@detail');
// member area
Route::get('/memberArea', 'Member_area@index');
Route::post('/memberArea/login', 'Member_area@login');
Route::get('/memberArea/logout', 'Member_area@logout');
Route::get('/memberArea/DaftarMember', 'member_area@daftar');
Route::post('/memberArea/insertMember', 'member_area@insert_member');
Route::get('/memberArea/showInvoice', 'member_area@showInvoice');
Route::get('/memberArea/profile', 'member_area@profile');
Route::get('/memberArea/HistoryOrder', 'member_area@history_order');
Route::get('/memberArea/historyOrderDetail/{code}', 'member_area@history_order_detail');
Route::get('/memberArea/Payment', 'member_area@payment');
Route::get('/memberArea/ConfirmPayment/{code}', 'member_area@payment_confirm');
Route::post('/memberArea/InsertPayment', 'member_area@insert_payment');
Route::get('/memberArea/Invoice/{code}', 'member_area@Invoice');
// checkout
Route::get('/checkout', 'Checkout@index');
Route::get('/checkout/get_city_by_province/{province_id}', 'Checkout@get_city_by_province');
Route::post('/checkout/cek_shipping_cost', 'Checkout@check_shipping_cost');
Route::post('/checkout/Step2', 'Checkout@nextStep');

//adminHome
Route::get('/Admin/Home', 'Admin\Home@index');
Route::get('/Admin/listAdmin', 'Admin\Home@listAdmin');
Route::get('/Admin/listAdmin/Add', 'Admin\Home@addAdmin');
Route::get('/Admin/listAdmin/Delete/{nama}', 'Admin\Home@deleteAdmin');
Route::get('/Admin/listAdmin/Update/{nama}', 'Admin\Home@updateAdmin');
Route::post('/Admin/listAdmin/insert', 'Admin\Home@insertAdmin');
Route::post('/Admin/listAdmin/doUpdate', 'Admin\Home@doUpdateAdmin');
Route::get('/Admin/profileAdmin', 'Admin\Home@AdminProfile');

//paymentAdmin
Route::get('/Admin/Payment', 'Admin\Home@paymentApprove');
Route::get('/Admin/Payment/doApprove/OrderCode/{code}', 'Admin\Home@doApprove');

// memberAreaAdmin
Route::get('/Admin/memberArea', 'Admin\AdminMemberArea@index');
Route::get('/Admin/memberArea/Delete/{name}', 'Admin\AdminMemberArea@deleteMember');
Route::get('/Admin/memberArea/Update/{name}', 'Admin\AdminMemberArea@updateMember');
Route::get('/Admin/memberArea/AddMember', 'Admin\AdminMemberArea@addMember');
Route::post('/Admin/memberArea/insertMember', 'Admin\AdminMemberArea@insertMember');
Route::post('/Admin/memberArea/updateMember', 'Admin\AdminMemberArea@doUpdateMember');

// history order admin
Route::get('/Admin/historyOrder', 'Admin\History@HistoryOrder');
Route::get('/Admin/historyOrder/Detail/{code}', 'Admin\History@HistoryOrderDetail');
Route::get('/Admin/historyOrder/updateStatus/{stauts}/{code}', 'Admin\History@UpdateStatusHistory');

//category
Route::get('/Admin/Product/Category', 'Admin\AdminCategory@index');
Route::get('/Admin/Product/Category/Add', 'Admin\AdminCategory@add');
Route::get('/Admin/Product/Category/Delete/{slug}', 'Admin\AdminCategory@delete');
Route::get('/Admin/Product/Category/Update/{slug}', 'Admin\AdminCategory@update');
Route::post('/Admin/Product/Category/doUpdate', 'Admin\AdminCategory@doUpdate');
Route::post('/Admin/Product/Category/doInsert', 'Admin\AdminCategory@doInsert');

//color
Route::get('/Admin/Product/Color', 'Admin\AdminColor@index');
Route::get('/Admin/Product/Color/Add', 'Admin\AdminColor@add');
Route::get('/Admin/Product/Color/Delete/{color_name}', 'Admin\AdminColor@delete');
Route::get('/Admin/Product/Color/Update/{color_name}', 'Admin\AdminColor@update');
Route::post('/Admin/Product/Color/doUpdate', 'Admin\AdminColor@doUpdate');
Route::post('/Admin/Product/Color/doInsert', 'Admin\AdminColor@doInsert');

//Product
Route::get('/Admin/Product', 'Admin\AdminProduct@index');
Route::get('/Admin/Product/Add', 'Admin\AdminProduct@add');
Route::get('/Admin/Product/Delete/{slug}', 'Admin\AdminProduct@delete');
Route::get('/Admin/Product/Update/{slug}', 'Admin\AdminProduct@update');
Route::post('/Admin/Product/doAdd', 'Admin\AdminProduct@doAdd');
Route::post('/Admin/Product/doUpdate', 'Admin\AdminProduct@doUpdate');

//login to admin
Route::get('/Admin/Login', 'Admin\Login@index');
Route::get('/Admin/Logout', 'Admin\Login@logout');
Route::post('/Admin/doLogin', 'Admin\Login@doLogin');
