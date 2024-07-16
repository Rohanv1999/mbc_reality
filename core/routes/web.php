<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function(){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

// User Support Ticket
Route::prefix('ticket')->group(function () {
    Route::post('/create', 'TicketController@storeSupportTicket')->name('ticket.store');
    Route::get('/view/{ticket}', 'TicketController@viewTicket')->name('ticket.view');
    Route::post('/reply/{ticket}', 'TicketController@replyTicket')->name('ticket.reply');
    Route::get('/download/{ticket}', 'TicketController@ticketDownload')->name('ticket.download');
});


/*
|--------------------------------------------------------------------------
| Start Admin Area
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetCodeEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify.code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.form');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware('admin')->group(function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::post('profile', 'AdminController@profileUpdate')->name('profile.update');
        Route::get('password', 'AdminController@password')->name('password');
        Route::post('password', 'AdminController@passwordUpdate')->name('password.update');

        //Report Bugs
        Route::get('request-report','AdminController@requestReport')->name('request.report');
        Route::post('request-report','AdminController@reportSubmit');
        Route::get('system-info','AdminController@systemInfo')->name('system.info');

        //City
        Route::get('city/list', 'CityController@index')->name('city.index');
        Route::post('city/store', 'CityController@store')->name('city.store');
        Route::post('city/update', 'CityController@update')->name('city.update');

        //Property
        Route::get('property/list', 'PropertyController@index')->name('property.index');
        Route::get('property/approved/list', 'PropertyController@approved')->name('property.approved');
        Route::get('property/pending/list', 'PropertyController@pending')->name('property.pending');
        Route::get('property/cancel/list', 'PropertyController@cancel')->name('property.cancel');

        //Status Change
        Route::post('top/property/select', 'PropertyController@topPropertySelect')->name('property.top.select');
        Route::post('property/status/approved', 'PropertyController@approvedStatus')->name('property.status.approved');
        Route::post('property/status/banned', 'PropertyController@bannedStatus')->name('property.status.banned');
        Route::post('property/featured/list/Include', 'PropertyController@featuredInclude')->name('property.featured.include');
        Route::post('property/featured/list/remove', 'PropertyController@featuredNotInclude')->name('property.featured.remove');


        Route::get('property/search', 'PropertyController@search')->name('property.search');
        Route::get('property/create', 'PropertyController@create')->name('property.create');
        Route::post('property/store', 'PropertyController@store')->name('property.store');
        Route::get('property/edit/{id}', 'PropertyController@edit')->name('property.edit');
        Route::post('property/update/{id}', 'PropertyController@update')->name('property.update');
        Route::get('property/info/{id}', 'PropertyController@propertyInfo')->name('property.info');
        Route::post('property/info/update/{id}', 'PropertyController@propertyInfoUpdate')->name('property.info.update');
        Route::post('property/optional/image/delete', 'PropertyController@optionalImageRemove')->name('property.image.delete');

        //Advertisement
        Route::get('advertisement/list', 'AdvertisementController@index')->name('ads.index');
        Route::get('advertisement/edit/{id}', 'AdvertisementController@edit')->name('ads.edit');
        Route::post('advertisement/store', 'AdvertisementController@store')->name('ads.store');
        Route::post('advertisement/update/{id}', 'AdvertisementController@update')->name('ads.update');
        Route::post('advertisement/delete', 'AdvertisementController@delete')->name('ads.delete');

        //Location
        Route::get('location/list', 'LocationController@index')->name('location.index');
        Route::post('location/store', 'LocationController@store')->name('location.store');
        Route::post('location/update', 'LocationController@update')->name('location.update');

         //Property Type
        Route::get('property/type/list', 'ProperTypeController@index')->name('typeproperty.index');
        Route::post('property/type/store', 'ProperTypeController@store')->name('property.type.store');
        Route::post('property/type/update', 'ProperTypeController@update')->name('property.type.update');

        // Subscriber
        Route::get('subscriber', 'SubscriberController@index')->name('subscriber.index');
        Route::get('subscriber/send-email', 'SubscriberController@sendEmailForm')->name('subscriber.sendEmail');
        Route::post('subscriber/remove', 'SubscriberController@remove')->name('subscriber.remove');
        Route::post('subscriber/send-email', 'SubscriberController@sendEmail')->name('subscriber.sendEmail');

        // Admin Support
        Route::get('tickets', 'SupportTicketController@tickets')->name('ticket');
        Route::get('tickets/pending', 'SupportTicketController@pendingTicket')->name('ticket.pending');
        Route::get('tickets/closed', 'SupportTicketController@closedTicket')->name('ticket.closed');
        Route::get('tickets/answered', 'SupportTicketController@answeredTicket')->name('ticket.answered');
        Route::get('tickets/view/{id}', 'SupportTicketController@ticketReply')->name('ticket.view');
        Route::post('ticket/reply/{id}', 'SupportTicketController@ticketReplySend')->name('ticket.reply');
        Route::get('ticket/download/{ticket}', 'SupportTicketController@ticketDownload')->name('ticket.download');
        Route::post('ticket/delete', 'SupportTicketController@ticketDelete')->name('ticket.delete');


        // Language Manager
        Route::get('/language', 'LanguageController@langManage')->name('language.manage');
        Route::post('/language', 'LanguageController@langStore')->name('language.manage.store');
        Route::post('/language/delete/{id}', 'LanguageController@langDel')->name('language.manage.del');
        Route::post('/language/update/{id}', 'LanguageController@langUpdate')->name('language.manage.update');
        Route::get('/language/edit/{id}', 'LanguageController@langEdit')->name('language.key');
        Route::post('/language/import', 'LanguageController@langImport')->name('language.importLang');

        Route::post('language/store/key/{id}', 'LanguageController@storeLanguageJson')->name('language.store.key');
        Route::post('language/delete/key/{id}', 'LanguageController@deleteLanguageJson')->name('language.delete.key');
        Route::post('language/update/key/{id}', 'LanguageController@updateLanguageJson')->name('language.update.key');

        // General Setting
        Route::get('general-setting', 'GeneralSettingController@index')->name('setting.index');
        Route::post('general-setting', 'GeneralSettingController@update')->name('setting.update');
        Route::get('optimize', 'GeneralSettingController@optimize')->name('setting.optimize');

        // Logo-Icon
        Route::get('setting/logo-icon', 'GeneralSettingController@logoIcon')->name('setting.logo.icon');
        Route::post('setting/logo-icon', 'GeneralSettingController@logoIconUpdate')->name('setting.logo.icon');

        //Custom CSS
        Route::get('custom-css','GeneralSettingController@customCss')->name('setting.custom.css');
        Route::post('custom-css','GeneralSettingController@customCssSubmit');

        //Cookie
        Route::get('cookie','GeneralSettingController@cookie')->name('setting.cookie');
        Route::post('cookie','GeneralSettingController@cookieSubmit');

        // Plugin
        Route::get('extensions', 'ExtensionController@index')->name('extensions.index');
        Route::post('extensions/update/{id}', 'ExtensionController@update')->name('extensions.update');
        Route::post('extensions/activate', 'ExtensionController@activate')->name('extensions.activate');
        Route::post('extensions/deactivate', 'ExtensionController@deactivate')->name('extensions.deactivate');


        // Email Setting
        Route::get('email-template/global', 'EmailTemplateController@emailTemplate')->name('email.template.global');
        Route::post('email-template/global', 'EmailTemplateController@emailTemplateUpdate')->name('email.template.global');
        Route::get('email-template/setting', 'EmailTemplateController@emailSetting')->name('email.template.setting');
        Route::post('email-template/setting', 'EmailTemplateController@emailSettingUpdate')->name('email.template.setting');
        Route::get('email-template/index', 'EmailTemplateController@index')->name('email.template.index');
        Route::get('email-template/{id}/edit', 'EmailTemplateController@edit')->name('email.template.edit');
        Route::post('email-template/{id}/update', 'EmailTemplateController@update')->name('email.template.update');
        Route::post('email-template/send-test-mail', 'EmailTemplateController@sendTestMail')->name('email.template.test.mail');


        // SMS Setting
        Route::get('sms-template/global', 'SmsTemplateController@smsTemplate')->name('sms.template.global');
        Route::post('sms-template/global', 'SmsTemplateController@smsTemplateUpdate')->name('sms.template.global');
        Route::get('sms-template/setting','SmsTemplateController@smsSetting')->name('sms.templates.setting');
        Route::post('sms-template/setting', 'SmsTemplateController@smsSettingUpdate')->name('sms.template.setting');
        Route::get('sms-template/index', 'SmsTemplateController@index')->name('sms.template.index');
        Route::get('sms-template/edit/{id}', 'SmsTemplateController@edit')->name('sms.template.edit');
        Route::post('sms-template/update/{id}', 'SmsTemplateController@update')->name('sms.template.update');
        Route::post('email-template/send-test-sms', 'SmsTemplateController@sendTestSMS')->name('sms.template.test.sms');
        // SEO
        Route::get('seo', 'FrontendController@seoEdit')->name('seo');
        // Frontend
        Route::name('frontend.')->prefix('frontend')->group(function () {
            Route::get('templates', 'FrontendController@templates')->name('templates');
            Route::post('templates', 'FrontendController@templatesActive')->name('templates.active');
            
            Route::get('frontend-sections/{key}', 'FrontendController@frontendSections')->name('sections');
            Route::post('frontend-content/{key}', 'FrontendController@frontendContent')->name('sections.content');
            Route::get('frontend-element/{key}/{id?}', 'FrontendController@frontendElement')->name('sections.element');
            Route::post('remove', 'FrontendController@remove')->name('remove');

            // Page Builder
            Route::get('manage-pages', 'PageBuilderController@managePages')->name('manage.pages');
            Route::post('manage-pages', 'PageBuilderController@managePagesSave')->name('manage.pages.save');
            Route::post('manage-pages/update', 'PageBuilderController@managePagesUpdate')->name('manage.pages.update');
            Route::post('manage-pages/delete', 'PageBuilderController@managePagesDelete')->name('manage.pages.delete');
            Route::get('manage-section/{id}', 'PageBuilderController@manageSection')->name('manage.section');
            Route::post('manage-section/{id}', 'PageBuilderController@manageSectionUpdate')->name('manage.section.update');
        });
    });
});

Route::get('/property/city/{id}', 'SiteController@cityProperty')->name('property.city');
Route::get('/property/search', 'SiteController@propertySearch')->name('property.search');
Route::get('/add/property', 'SiteController@addProperty')->name('property.add');
Route::post('/add/property/store', 'SiteController@addPropertyStore')->name('property.add.store');
Route::get('/property', 'SiteController@property')->name('property');
Route::get('/property/details/{slug}/{id}', 'SiteController@propertyDetails')->name('property.details');
Route::get('/contact', 'SiteController@contact')->name('contact');
Route::post('/contact', 'SiteController@contactSubmit');
Route::get('/change/{lang?}', 'SiteController@changeLanguage')->name('lang');
Route::get('/cookie/accept', 'SiteController@cookieAccept')->name('cookie.accept');
Route::get('/blog', 'SiteController@blog')->name('blog');
Route::get('blog/{id}/{slug}', 'SiteController@blogDetails')->name('blog.details');
Route::get('placeholder-image/{size}', 'SiteController@placeholderImage')->name('placeholder.image');
Route::get('/{slug}', 'SiteController@pages')->name('pages');
Route::get('/', 'SiteController@index')->name('home');
Route::get('/menu/{slug}/{id}', 'SiteController@footerMenu')->name('footer.menu');
Route::post('/subscribe', 'SiteController@subscribe')->name('subscribe');
Route::get('/add/{id}', 'SiteController@adclicked')->name('add.clicked');
Route::post('/contact/property/owner', 'SiteController@contactWithPropertyOwner')->name('contact.property.owner');