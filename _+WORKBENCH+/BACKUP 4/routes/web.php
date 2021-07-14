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

/*
- how to redirect to a previous page after login in
- how to display the record of a table in another table

Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'HomeController@index');


// Offer list
Route::get('/offers', 'OfferListController@index');
Route::get('/offers/{categ}', 'OfferListController@showListByCategory');
Route::get('/offers/details/{ref}', 'OfferListController@showOfferDetails');
Route::post('/offers/details/{ref}', 'MakeOfferController@saveOfferWanted');
Route::get('/filter', 'SearchResultsController@showSearchResults');



/* about barterbread.com */
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
Route::get('/trader/profile', 'UsersController@index');
Route::get('/trader/profile/edit', 'UsersController@getEditProfileForm');
Route::post('/trader/profile/edit', 'UsersController@saveUserInfoChanges');



// Manage offer...
Route::get('/trader/offers', 'ManageOffersController@index');

Route::get('/trader/offers/details/{oid}/{otitle}', 'ManageOffersController@showOfferDetails');
Route::get('/trader/offers/edit/{oid}/{otitle}', 'ManageOffersController@showEditOfferDetailsForm');
Route::post('/trader/offers/edit/{oid}/{otitle}', 'ManageOffersController@updateOfferDetails');
Route::get('/trader/offers/del/{oid}/{otitle}', 'ManageOffersController@deleteOffersDetails');
//Route::get('/trader/offers/stop/{oid}/{otitle}', 'ManageOffersController@endOffer');

Route::get('/trader/offers/offers-made/details/{oid}/{otitle}', 'ManageOffersMadeController@showOffersMadeList');
Route::get('/trader/offers/offers-received/details/{oid}/{otitle}', 'ManageOffersReceivedController@showOffersReceivedList');




// List offer routes...
Route::get('/list-offer', 'ListOfferController@showListOfferForm');
Route::post('/list-offer', 'ListOfferController@listOffer');



// Authentication routes...
Route::get('/trader/login', 'LoginController@showLoginForm');
Route::post('/trader/login', 'LoginController@login');
Route::get('/trader/logout', 'LoginController@logout');



// Registration routes...
Route::get('/trader/register', 'RegisterController@showRegistrationForm');
Route::post('/trader/register', 'RegisterController@register');


