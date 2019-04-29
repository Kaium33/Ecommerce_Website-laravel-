<?php

Route::get('/', function () {
	return redirect()->route('login.index');
});

Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@verify');


Route::get('/seller', 'SellerController@index')->name('seller.index');
Route::get('/seller/profile', 'SellerController@profile')->name('seller.profile');
Route::get('/seller/productlist', 'SellerController@productlist')->name('seller.productlist');



Route::get('/seller/edit_profile/{u_id}', 'SellerController@showEditProfile')->name('seller.edit_profile');
Route::post('/seller/edit_profile/{u_id}', 'SellerController@editProfile');





Route::get('/seller/edit/{product_id}', 'SellerController@editPage')->name('seller.edit');
Route::post('/seller/edit/{product_id}', 'SellerController@updateProduct');

Route::get('/seller/delete/{product_id}', 'SellerController@deletePage')->name('seller.delete');
Route::post('/seller/delete/{product_id}', 'SellerController@deleteProduct');



Route::get('/seller/addproduct', 'SellerController@addproduct')->name('seller.addproduct');
Route::post('/seller/addproduct', 'SellerController@addproductToDatabase');

Route::get('/seller/orderd_products', 'SellerController@showOrderdProducts')->name('seller.orderd_products');



Route::get('/seller/confirm_orderd_product/{order_id}', 'SellerController@orderConfirmation')->name('seller.confirm_orderd_products');
Route::post('/seller/confirm_orderd_product/{order_id}', 'SellerController@deleteConfirmedOrder');


Route::get('/seller/return_request', 'SellerController@showReturnRequest')->name('seller.return_request');

Route::get('/seller/confirm_return_request/{return_id}', 'SellerController@editReturnRequest')->name('seller.confirm_return_request');;
Route::post('/seller/confirm_return_request/{return_id}', 'SellerController@confirmReturnRequest');






Route::get('/logout', 'LogoutController@index')->name('logout.index');