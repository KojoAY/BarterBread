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

Auth::routes();


Route::get('/', function () {
    return view('welcome');
});


Route::get('/electronics', function () {
    return view('offer_list/list');
});

Route::get('/electronics/details', function () {
    return view('offer_list/details');
});



/* about batabred.com */
Route::get('/about-us', function () {
    return view('bb_info_center/about_us');
});

Route::get('/privacy-policy', function () {
    return view('bb_info_center/privacy_policy');
});


Route::get('/terms-of-use', function () {
    return view('bb_info_center/terms');
});


/* support */
Route::get('/contact-us', function () {
    return view('support/contact_us');
});

Route::get('/support-center', function () {
    return view('support/support_center');
});

Route::get('/help', function () {
    return view('support/help');
});



// Profile manager...
Route::get('/trader/profile', function () {
	return view('account_manager/my_info/show_user_info');
});

Route::get('/trader/profile/edit', function () {
    return view('account_manager/my_info/edit_user_info');
});



// Manage offer...
Route::get('/trader/offers', function () {
    return view('account_manager/my_offers/show_offer_list');
});

Route::get('/trader/offers/id', function () {
    return view('account_manager/my_offers/show_offer_details');
});

Route::get('/trader/offers/id/edit', function () {
    return view('account_manager/my_offers/edit_offer_details');
});



// Manage suggestions...
Route::get('/trader/suggestions', function () {
    return view('account_manager/my_suggestions/show_suggestion_list');
});

Route::get('/trader/suggestions/[id]', function () {
    return view('account_manager/my_suggestions/show_suggestion_details');
});

Route::get('/trader/suggestions/[id]/edit', function () {
    return view('account_manager/my_suggestions/edit_suggestion_details');
});



// Manage watchlist...
Route::get('/trader/watchlist', function () {
    return view('account_manager/my_watchlist/show_watchlist_list');
});

Route::get('/trader/watchlist/[id]', function () {
    return view('account_manager/my_watchlist/show_watchlist_details');
});



// List offer routes...
Route::get('/list-offer', 'OfferDetailsController@showListOfferForm');
Route::post('/list-offer', 'OfferDetailsController@listOffer');



// Authentication routes...
Route::get('/trader/login', 'Auth\LoginController@showLoginForm');
Route::post('/trader/login', 'Auth\LoginController@login');
Route::get('/trader/logout', 'Auth\LoginController@logout');



// Registration routes...
Route::get('/trader/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/trader/register', 'Auth\RegisterController@register');


