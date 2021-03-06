<?php

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return redirect('/');
});


/* --------------------- Common/User Routes START -------------------------------- */
Route::get('/privacy-policy', 'WelcomeController@privacyPolicy');
Route::get('/terms-of-service', 'WelcomeController@termsOfService');

// Auth::routes();
// Google login
Route::get('/google-login', 'SocialAuthGoogleController@redirect');
Route::get('/google-callback', 'SocialAuthGoogleController@callback');

// Facebook login
Route::post('/registration', 'Auth\RegisterController@register');
Route::post('/signin', 'Auth\LoginController@signIn');

Route::get('/seomoUserLogin', 'Auth\LoginController@seomoUserLogin');
Route::get('/seomoUserRegister', 'Auth\RegisterController@seomoUserRegister');

Route::post('/sign-in', 'Auth\RegisterController@signIn');
Route::get('/facebook-login', 'SocialAuthFacebookController@redirect');
Route::get('/facebook-callback', 'SocialAuthFacebookController@callback');
Route::get('/', 'WelcomeController@landing_index');

Route::get('/bet/{id?}', 'WelcomeController@bet');
Route::get('/bet_list/{id?}', 'WelcomeController@betList');
Route::post('/adduserBet', 'AjaxController@addUserBet');
Route::post('/getBetDetails', 'AjaxController@getBetDetails');
Route::get('/my-account', 'WelcomeController@myAccount');
Route::get('/bet-record', 'WelcomeController@betRecord');

Auth::routes(['verify' => true]);
Route::get('/contactus', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get("/homes", ["uses" => "HomeController@checkMD", "middleware" => "checkType:2"]);

// Route::get('admin', 'HomeController@index')->name('admin');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/change_password', 'UsersController@change_pwd');
Route::post('/change_password', 'UsersController@update_changed_pwd');

// Route::get('/admin', 'Auth\LoginController@showLoginForm');
/* --------------------- Common/User Routes END -------------------------------- */


/* ----------------------- Admin Routes START -------------------------------- */

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function() {
    /**
     * Admin Auth Route(s)
     */
    Route::namespace('Auth')->group(function() {

        //Login Routes
        Route::get('/login', 'LoginController@showLoginForm')->name('login');

        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')->name('logout');

        //Register Routes
        // Route::get('/register','RegisterController@showRegistrationForm')->name('register');
        // Route::post('/register','RegisterController@register');
        //Forgot Password Routes
        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');

        // Email Verification Route(s)
        Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
        Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
    });

    Route::any('/user', 'UserController@index');
    Route::any('/user/create', 'UserController@create');
    Route::get('/user/edit/{id?}', 'UserController@edit');
    Route::get('/user/destroy/{id}', 'UserController@destroy');
    Route::get('/fetchUsers', 'UserController@fetchUsers');
    Route::get('/fetchUserbet', 'UserController@fetchUserbet');


    /* Betting Route */
    Route::get('/betting', 'BettingController@index');
    Route::get('/fetchBetting', 'BettingController@fetchBetting');
    Route::any('/addBetting/{id?}', 'BettingController@saveBetting');
    Route::any('/deleteBetting/{id?}', 'BettingController@deleteBetting');

    /* Menu Route */
    Route::any('/addMenu/{id?}', 'MenuController@addMenu');
    Route::any('/menulist', 'MenuController@index');
    Route::get('/fetchMenu', 'MenuController@fetchMenu');
    Route::any('/deleteMenu/{id?}', 'MenuController@deleteMenu');

    Route::any('/announceWinningNumber/{id?}', 'BettingController@announceWinningNumber');

    /* Betting Result Management Route */
    Route::get('/betting-result', 'BettingResultController@index');
    Route::get('/fetchBettingResult', 'BettingResultController@fetchBetting');
    Route::any('/announceWinningNumber/{id?}', 'BettingResultController@announceWinningNumber');
    Route::any('/addWinningNumber/{id?}', 'BettingResultController@addWinningNumber');

    Route::get('/quick-betting', 'QuickBettingController@index');
    Route::get('/fetchQuickBetting', 'QuickBettingController@fetchQuickBetting');

    Route::get('/edit/{id?}', 'UserController@edit');
    Route::post('/uploadstudents', 'UserController@uploadStudentByCsv');
    Route::get('/dashboard', 'HomeController@index')->name('home')->middleware('guard.verified:admin,admin.verification.notice');


    //Put all of your admin routes here...
});
/* ----------------------- Admin Routes END -------------------------------- */

/* ----------------------- Site Routes START -------------------------------- */

/** Site Tutors/User Route(s) */
Route::get('/editprofile/{id?}', 'UsersController@editprofile');
Route::get('/userprofile', 'UsersController@viewProfile');
Route::post('/changecoverbanner', 'UsersController@changeCoverBanner');

Route::post('/sendotp', 'UsersController@sendOtp');
Route::post('/validateotp', 'UsersController@validateOtp');

Route::post('/updateprofile', 'UsersController@updateProfile');

/* -----------------------Frontend Ajax Routes ----------------------------------------- */
Route::get('/checkmail', 'StudentsController@checkMail');
Route::post('/checkexistemail', 'AjaxController@checkExistEmail');
Route::post('/saveRecord', 'AjaxController@saveRecord');
Route::get('/payment/{id}', 'PaymentController@Payment');
Route::get('/addfund', 'AddFundController@addFund');
Route::get('/subscribePlan/{id}', 'SubscribeController@subscribePlan');
Route::post('/saveTransaction', 'AjaxController@saveTransaction');
Route::post('/create/{id?}', 'PaymentAddController@insert');

/* MOBILE VERIFICATION OTP SEND */
Route::get('/sendopt', function() {
    
});

