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

Auth::routes(['verify' => true]);

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

    /* Subscription Route */
    Route::get('/subscription', 'SubscriptionController@index');
    Route::get('/fetchSubscription', 'SubscriptionController@fetchSubscription');
    Route::get('/addSubscription', 'SubscriptionController@saveSubscription');
    Route::post('/addSubscription', 'SubscriptionController@saveSubscription');
    Route::get('/addSubscription/{id?}', 'SubscriptionController@saveSubscription');
    Route::get('/deleteSubscription/{id?}', 'SubscriptionController@deleteSubscription');


    /* Subscriber Route */
    Route::get('/subscriber', 'SubscriberController@index');
    Route::get('/fetchSubscriber', 'SubscriberController@fetchSubscriber');
    Route::get('/addSubscriber', 'SubscriberController@saveSubscriber');
    Route::post('/addSubscriber', 'SubscriberController@saveSubscriber');
    Route::get('/addSubscriber/{id?}', 'SubscriberController@saveSubscriber');
    Route::get('/deleteSubscriber/{id?}', 'SubscriberController@deleteSubscriber');

    Route::get('/edit/{id?}', 'UserController@edit');
    Route::post('/uploadstudents', 'UserController@uploadStudentByCsv');
    Route::get('/dashboard', 'HomeController@index')->name('home')->middleware('guard.verified:admin,admin.verification.notice');


    //Put all of your admin routes here...
});
/* ----------------------- Admin Routes END -------------------------------- */

/* ----------------------- Site Routes START -------------------------------- */

/** Site Tutors/User Route(s) */
Route::get('/becometutor', 'UsersController@becomeTutor');
Route::post('/becomea_tutor', 'UsersController@becomeaTutor');
Route::get('/editprofile/{id?}', 'UsersController@editprofile');
Route::get('/userprofile', 'UsersController@viewProfile');
Route::post('/changecoverbanner', 'UsersController@changeCoverBanner');

Route::post('/sendotp', 'UsersController@sendOtp');
Route::post('/validateotp', 'UsersController@validateOtp');

Route::post('/updateprofile', 'UsersController@updateProfile');
Route::post('/getSubjectSyllabusListById', 'UsersController@getSubjectSyllabusListById');
Route::get('becomeaeducation_partner/{type?}', 'UsersController@becomeaEducationPartner')->middleware('verified');
Route::post('/learningcenter', 'UsersController@createLearningCenter');
// Route::get('/lc/dashboard', 'LearningCenterController@dashboard')->middleware('verified');
Route::get('/lc/dashboard', 'student\DashboardController@index')->middleware('verified');


/* ----------------------- Online Practice -------------------------------- */
Route::get("check-mw", ["uses" => "HomeController@checkMD", "middleware" => "checkType:2"]);
Route::get('/email-verify/{id}/{LcId}', 'UsersController@emailverify');
Route::get('/onlinePractice', 'StudentsController@onlinePractice');
Route::get('/onlinePractice/{id}', 'StudentsController@onlinePractice');
Route::post('/onlinePractice', 'StudentsController@onlinePractice');

/* ----------------------- Online Exam -------------------------------- */

Route::get('/onlineExam/step-1','OnlineExamController@Step1');
Route::post('/onlineExam/start','OnlineExamController@index');
Route::get('/onlineExam/start','OnlineExamController@index');
//Route::get('/onlineExam/{id}','OnlineExamController@index');
//Route::post('/onlineExam','OnlineExamController@index');

/* -----------------------Frontend Ajax Routes ----------------------------------------- */
Route::get('/checkmail', 'StudentsController@checkMail');
Route::post('/checkexistemail', 'AjaxController@checkExistEmail');
Route::post('/saveRecord', 'AjaxController@saveRecord');
Route::post('/saveAnswered', 'AjaxController@saveAnswered');
Route::post('/questionAttempt', 'AjaxController@questionAttempt');
Route::post('/progressStatus', 'AjaxController@progressStatus');
Route::post('/removeProgress', 'AjaxController@removeProgress');
Route::post('/saveTransaction', 'AjaxController@saveTransaction');


/* MOBILE VERIFICATION OTP SEND */
Route::get('/sendopt', function() {
    
});

