<?php
//home
Route::get('/', 'HomeController@loadHome');
Route::get('/cat/{category}', 'HomeController@loadCategory');
Route::post('/cari', 'HomeController@search');
Route::get('/cari/{search}', 'HomeController@searchProduct');

//product
Route::get('/p/{id}', 'ProductController@loadItem');

//troli
Route::get('/troli', 'TroliController@loadTroli');
Route::post('/troliForm', 'TroliController@storeProduct');
Route::delete('/troliForm', 'TroliController@deleteProduct');

//payment
Route::get('/payment', 'paymentController@loadPayment');
Route::get('/payment/balance', 'paymentController@loadPaymentBalance');
Route::post('/payment/balance', 'paymentController@payWithBalance');

//balance
Route::get('/balance','BalanceController@loadBalance');

//transaction
Route::get('/order/{id}', 'OrderController@loadOrder');
Route::get('/finishorder/{id}', 'OrderController@finishOrder');

//auth
Route::get('/login', 'UserController@login');
Route::post('/loginForm', 'UserController@loginForm');
Route::get('/register', 'UserController@register');
Route::post('/registerForm', 'UserController@registerForm');
Route::get('/logout', 'UserController@logout');

//admin
Route::get('/admin', 'UserController@index');
Route::get('/admin/home', 'AdminController@loadHome');

Route::get('/admin/product', 'AdminController@loadProduct');
Route::post('/admin/product','AdminController@addProduct');
Route::get('/admin/product/edit/{id}','AdminController@loadItem');
Route::post('/admin/product/edit','AdminController@editProduct');

Route::get('/admin/transaction', 'AdminController@loadTransaction');
Route::get('/admin/order', 'AdminController@loadOrder');

Route::put('/confirmationorder','orderController@sellerConfirmation');
Route::put('/sendResi','resiController@sendResi');
