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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/1#_=_', 'HomeController@index');
Route::get('/#_=_', 'HomeController@index');


// Offer list
Route::get('/offers', 'OfferListController@index');
Route::get('/offers/{categ}', 'OfferListController@showListByCategory');
Route::get('/offers/details/{ref}', 'OfferListController@showOfferDetails');
Route::post('/offers/details/{ref}', 'MakeOfferController@saveOfferWanted');
Route::get('/filter', 'SearchResultsController@showSearchResults');



/* about barterbread.com */
Route::get('/about-us', function () {
    return view('bb_info_center/about_us')
    	->with("pageTitle", "About Us - " . config('app.name', 'BarterBread'));
});

Route::get('/privacy-policy', function () {
    return view('bb_info_center/privacy_policy')
    	->with("pageTitle", "Privacy Policy - " . config('app.name', 'BarterBread'));
});


Route::get('/terms-of-use', function () {
    return view('bb_info_center/terms_of_use')
    	->with("pageTitle", "Terms of Use - " . config('app.name', 'BarterBread'));
});

Route::get('/how-to', function () {
    return view('bb_info_center/howto')
    	->with("pageTitle", "How To - " . config('app.name', 'BarterBread'));
});

Route::get('/faqs', function () {
    return view('bb_info_center/faqs')
    	->with("pageTitle", "Frequently Asked Questions - " . config('app.name', 'BarterBread'));
});

Route::get('/careers', function () {
    return view('bb_info_center/careers')
        ->with("pageTitle", "Careers - " . config('app.name', 'BarterBread'));
});

Route::get('/user-guidelines', function () {
    return view('bb_info_center/user_guidelines')
        ->with("pageTitle", "User Guidelines - " . config('app.name', 'BarterBread'));
});


/* support */
Route::get('/contact-us', 'FeedbackController@index');
Route::post('/contact-us', 'FeedbackController@saveFeedback');
Route::get('/support-center', 'FeedbackController@index');
Route::post('/support-center', 'FeedbackController@saveFeedback');


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
Route::get('/listoffer', 'ListOfferController@showListOfferForm');
Route::post('/listoffer', 'ListOfferController@listOffer');



// Authentication routes...
Route::get('/trader/login', 'LoginController@showLoginForm');
Route::post('/trader/login', 'LoginController@login');

Route::get('/trader/logout', 'LoginController@logout');


Route::get('/trader/register', 'RegisterController@showRegistrationForm');
Route::post('/trader/register', 'RegisterController@register');


// social media login/registration
Route::get('/trader/login/{socSite}', 'LoginController@redirectToProvider');
Route::get('/trader/login/{socSite}/callback', 'LoginController@handleProviderCallback');



/*
// Registration routes...
Route::get('/trader/register', 'Auth\LoginController@showLoginForm');
Route::post('/trader/register', 'Auth\LoginController@login');
*/





