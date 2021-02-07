<?php

Route::get('/', 'Auth\LoginController@showLoginForm');

//admin panel
Route::get('admin', 'AdminAuth\LoginController@showLoginForm');
Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'AdminAuth\LoginController@login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/home', 'AdminController@dashboard')->name('admin.home');
    Route::get('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    //profile
    Route::get('/change/password', 'AdminController@changePassword')->name('admin.changePass');
    Route::post('/change/password', 'AdminController@updatePassword')->name('admin.changePass');
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    Route::post('/profile', 'AdminController@updateProfile')->name('admin.profile');


    Route::get('/active/users', 'AdminController@activeUserIndex')->name('active.user');
    Route::get('/email/verified/users', 'AdminController@emailVerified')->name('total.email.verified');
    Route::get('/sms/verified/users', 'AdminController@smsVerified')->name('total.sms.verified');
    Route::get('/all/users', 'AdminController@allUsers')->name('all.user');
    Route::get('/deactive/users', 'AdminController@deactiveUserIndex')->name('deactive.user');
    Route::get('/user/{id}', 'AdminController@singleUser')->name('user.view');
    Route::put('/user/update/{id}', 'AdminController@updateUser')->name('user.detail.update');
    Route::post('/add/sub/{id}', 'AdminController@addSubUser')->name('add.sub.user');
    Route::post('/mail/send/{id}', 'AdminController@sendMailUser')->name('send.mail.user');


    Route::get('user/search/email', 'AdminController@userSearchEmail')->name('user.search.email');
    Route::get('user/search/username', 'AdminController@userSearchUsername')->name('user.search.username');

});

//admin password reset
Route::get('admin-password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('user.password.reset');
Route::post('/reset', 'AdminAuth\ResetPasswordController@reset')->name('reset.passw');

//user panel
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register/{username}', 'Auth\RegisterController@showRegistrationFormRef');
//Authorization
Route::group(['prefix' => '/', 'middleware' => 'auth:web'], function () {

    Route::get('/home', 'UserController@dashboard')->name('user.home');
    Route::get('/logout', 'Auth\LoginController@logout')->name('user.logout');
    //profile
    Route::get('/change/password', 'UserController@changePassword')->name('user.changePass');
    Route::post('/change/password', 'UserController@updatePassword')->name('user.changePass');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@updateProfile')->name('user.profile');
    Route::post('/sendemailver', 'FrontendController@sendemailver')->name('sendemailver');
    Route::post('/emailverify', 'FrontendController@emailverify')->name('emailverify');
    Route::post('/sendsmsver', 'FrontendController@sendsmsver')->name('sendsmsver');
    Route::post('/smsverify', 'FrontendController@smsverify')->name('smsverify');
    Route::get('/authorization', 'FrontendController@authorization')->name('authorization');
    Route::post('/g2fa-verify', 'FrontendController@verify2fa')->name('go2fa.verify');
    //2fa
    Route::get('/security/two/step', 'HomeController@twoFactorIndex')->name('two.factor.index');
    Route::post('/g2fa-create', 'HomeController@create2fa')->name('go2fa.create');
    Route::post('/g2fa-disable', 'HomeController@disable2fa')->name('disable.2fa');
    Route::post('/g2fa-check', 'HomeController@checkTwoFactor')->name('check_two_facetor');

});
Route::group(['prefix' => '/vmware', 'middleware' => 'auth:web'], function () {

    Route::get('/require_classify', 'VmwareController@require_classify')->name('vmware.require_classify');

});

//social login
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
//user forgot password
Route::post('/forgot/password', 'FrontendController@forgotPass')->name('forget.password.user');
Route::get('/reset/{token}', 'FrontendController@resetLink')->name('reset.passlink');
Route::post('/reset/password', 'FrontendController@passwordReset')->name('reset.passw');




