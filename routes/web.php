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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/admin-dashboard', 'HomeController@adminDashboard')->name('adminDashboard')->middleware('verified');
Route::get('/settings', 'HomeController@settings')->middleware('checkRole');
Route::post('/admin-edit', 'HomeController@adminEditProfile')->name('admin-edit'); //EDIT CLIENT
Route::post('/admin-create', 'HomeController@adminCreate')->name('admin-create');

/* Client */
Route::get('/create-client', 'HomeController@addClientView')->middleware('checkRole');
Route::post('/client-add', 'HomeController@addClient')->name('client-add'); //ADD CLIENT
Route::get('/client/{id}', 'HomeController@viewClient'); //VIEW CLIENT
Route::post('/client-edit', 'HomeController@editClient')->name('client-edit'); //EDIT CLIENT
Route::get('/create-trade/client/{id}', 'HomeController@adminCreateTrade');
Route::get('/create-trade-non-nasdaq/client/{id}', 'HomeController@adminCreateTradeNonNasdaq');
Route::post('/edit-balance', 'HomeController@editBalance')->name('edit-balance');
Route::post('/client-edit-email', 'HomeController@ClientEditEmail')->name('client-edit-email');
Route::post('/client-edit-secondary', 'HomeController@ClientEditSecondary')->name('client-edit-secondary');
Route::post('/client-delete', 'HomeController@clientDelete');
/* End Client */


/* Trades */
Route::post('/trade-create', 'HomeController@createTrade')->name('trade-create')->middleware('verified');
Route::post('/trade-create-non-nasdaq', 'HomeController@createTradeNonNasdaq')->name('trade-create-non-nasdaq')->middleware('verified');
Route::get('/trade/{id}', 'HomeController@viewTrade')->middleware('verified');
Route::get('/stocks', 'HomeController@tradeManager')->middleware('verified');
Route::post('/trade-delete', 'HomeController@tradeDelete');
Route::post('/trade-edit', 'HomeController@tradeEdit');
Route::post('/trade-sell', 'HomeController@tradeSell');
/* Trades */


/* USER PROFILE */
Route::get('/profile', 'HomeController@userProfile')->name('user-profile')->middleware('verified');
Route::get('/create-trade', 'HomeController@userCreateTrade')->name('create-trade')->middleware('verified');
Route::post('change-password','HomeController@changePassword')->name('change-password')->middleware('verified');


/* NEWS */
Route::get('/latest-news', 'HomeController@latestNews')->middleware('verified');
Route::get('/email-support', 'HomeController@emailSupport')->middleware('verified');
Route::post('/email-support', 'HomeController@emailSupportSend');


/*ADMIN*/
Route::post('/admin-delete', 'HomeController@adminDelete');
Route::post('/add-th', 'HomeController@addTradeHistory');
Route::post('/edit-th', 'HomeController@editTradeHistory');
Route::post('/delete-th', 'HomeController@deleteTradeHistory');
/*API*/
Route::get('/user-stocks', 'HomeController@userStocks');
