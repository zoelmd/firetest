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
Route::get('/', 'HomeController@index')->name('index');
Route::get('/old', 'HomeController@indexOld')->name('index.old');
Route::get('/contact', 'HomeController@contactUs')->name('contact.us');
Route::get('/page/{menu_id}', 'HomeController@page')->name('page');
Route::post('/recharge-request', 'HomeController@requestRecharge')->name('recharge.request');
Route::post('/recharge-payment', 'HomeController@paymentRecharge')->name('recharge.payment');
Route::get('/subscriber-create', 'HomeController@postSubscriber')->name('subscriber.create');
Route::get('/btc-rate', 'HomeController@getUSDPrice')->name('btc.rate');
Route::post('/confrim-payment', 'HomeController@confirmPayment')->name('confirm.payment');
Route::post('/payment-compleation', 'HomeController@paymentProcude')->name('payment.compleation');
Route::post('/payment-now', 'PaymentController@payNow')->name('payment.now');
Route::get('/operator-by-contry', 'HomeController@operatorByCountry')->name('operator.by.country');
Route::get('/recharge-order-checking', 'HomeController@orderChecking')->name('recharge.order.checking');
Route::get('/recharge-order-checking-ajax', 'HomeController@orderCheckingAjax')->name('order.checking.ajax');
Route::get('/ipnbtc', 'PaymentController@ipnbtc')->name('ipn.btc');

Route::get('btc-coin-ipn',['as'=>'ipn.coinPay','uses'=>'PaymentController@btcCoinIPN']);

Route::get('/404', 'HomeController@error')->name('404');



Route::prefix('admin')->group(function () {
    Auth::routes();
        Route::get('/home', 'HomeController@getIndex')->name('home.show');
        Route::get('/',"AdminController@index" )->name('admin.dashboard');
        Route::get('/dashboard',"AdminController@index" )->name('admin.dashboard');
        Route::get('/change-password',"AdminController@resetPassword" )->name('admin.change-password');
        Route::post('/change-password-update',"AdminController@saveResetPassword" )->name('admin.change-password.update');

         /*=================== General Setting route ==================*/
        Route::get('/edit-general-setting', 'AdminController@editGeneralSetting')->name('admin.edit.general.setting');
        Route::put('/update-general-setting/{general_settings}', 'AdminController@updateGeneralSetting')->name('admin.update.general.setting');
        Route::get('/change-recharge-hour', 'AdminController@chnageRechargeHour')->name('admin.change.recharg.hour');

        /*=================== Gateway Setting route ==================*/
        Route::get('/edit-gateway', 'AdminController@editGateway')->name('admin.edit.gateway');
        Route::put('/update-gateway/{gateway_id}', 'AdminController@updateGateway')->name('admin.update.gateway');

        /*=================== Icon & Logo route ==================*/
        Route::get('/change-logo-icon', 'AdminController@changeLogoIcon')->name('admin.change.logo.icon');
        Route::put('/update-logo-icon/{general_settings}', 'AdminController@updateLogoIcon')->name('admin.update.logo.icon');

         /*=================== Menue route ==================*/
         Route::get('/menu', 'MenuController@index')->name('menu.index');
         Route::get('/menu/create', 'MenuController@create')->name('menu.create');
         Route::post('/menu', 'MenuController@store')->name('menu.store');
         Route::get('/menu/{menu}/edit', 'MenuController@edit')->name('menu.edit');
         Route::put('/menu/{menu}', 'MenuController@update')->name('menu.update');
         Route::get('/menu/{menu}/delete', 'MenuController@destroy')->name('menu.destroy');

          /*===================Slider route ==================*/
        Route::get('/slider', 'SliderController@index')->name('slider');
        Route::get('/slider/create', 'SliderController@create')->name('slider.create');
        Route::post('/slider', 'SliderController@store')->name('slider.store');
        Route::get('/slider/{slider}/edit', 'SliderController@edit')->name('slider.edit');
        Route::put('/slider/{slider}', 'SliderController@update')->name('slider.update');
        Route::get('/slider/{slider}/delete', 'SliderController@destroy')->name('slider.destroy');
        Route::get('/slider/text-update', 'SliderController@updateSliderText')->name('slider.text.update');

         /*=================== BG Image route ==================*/
        Route::get('/change-bg-image', 'AdminController@changeBGImage')->name('admin.change.BG.image');
        Route::post('/change-bg-updaet', 'AdminController@bgImageUpdate')->name('admin.update.BG.image');

        /*=================== Recharge Step route ==================*/
        Route::get('/recharege-step-manage','RechargeStepController@getRechargeStep')->name('admin.recharegeStep.index');
        Route::get('/recharege-step-create','RechargeStepController@createRechareStep')->name('admin.recharegeStep.create');
        Route::post('/recharege-step-save','RechargeStepController@saveRechareStep')->name('admin.recharegeStep.save');
        Route::get('/recharege-step-status','RechargeStepController@statusRechareStep')->name('admin.recharegeStep.status');
        Route::get('/recharege-step-edit/{step_id}','RechargeStepController@editRechareStep')->name('admin.recharegeStep.edit');
        Route::put('/recharege-step-update/{step_id}','RechargeStepController@updateRechareStep')->name('admin.recharegeStep.update');
        ;
        Route::get('/recharege-step-delete/{step_id}','RechargeStepController@deleteRechareStep')->name('admin.recharegeStep.delete');

        /*===================FAQ route ==================*/
        Route::resource('faqs', 'FaqController', ['as' => 'admin']);
        Route::get('/update-faq-vedio-link/','FaqController@updateVedioLink')->name('admin.faq.vedio.link.update');

        /*===================Social route ==================*/
        Route::resource('socials', 'SocialController', ['as' => 'admin']);

        /*===================Social route ==================*/
        Route::resource('contact', 'ContactController', ['as' => 'admin']);

        //Operator route
        Route::get('/all-operator', 'OperatorController@getOperators')->name('get.operators');
        Route::post('/operator/unique/check', 'OperatorController@operatorUniqueCheck')->name('operator.unique.check');
        Route::post('/operator/create', 'OperatorController@operatorCreate')->name('operator.create');
        Route::post('/operator/edit', 'OperatorController@editOperator')->name('operator.edit');
        Route::post('/operator/update', 'OperatorController@updateOperator')->name('operator.update');
        Route::post('/operator/delete', 'OperatorController@deleteOperator')->name('operator.delete');

        //Country route
        Route::get('/country', 'CountryController@getCountries')->name('get.countries');
        Route::post('/country/create', 'CountryController@createCountry')->name('country.create');
        Route::post('/country/edit', 'CountryController@editCountry')->name('country.edit');
        Route::post('/country/update', 'CountryController@updateCountry')->name('country.update');

        //Order route
        Route::get('/all-orders', 'OrderController@getOrders')->name('admin.orders');
        Route::get('/update-order/', 'OrderController@updateOrder')->name('admin.update.order');
        Route::get('/all-transtions', 'OrderController@getTranstions')->name('admin.transtions');
        Route::post('/order-delete', 'OrderController@deleteOrder')->name('order.delete');
        
        //Contact Route 
        Route::get('/feedbakc-contact-message', 'AdminController@feedbackContactList')->name('contact.messgae.list');
        Route::get('/subscriber-delete', 'AdminController@deleteContactMessage')->name('subscriber.delete');

});




