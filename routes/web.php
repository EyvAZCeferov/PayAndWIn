<?php

use App\Http\Controllers\BaseController;


Route::group(['prefix' => '/'], function () {
    Route::livewire('/', 'index')->name('index');
    Route::group(['prefix' => 'useraction'], function () {
        Route::livewire('login', 'login')->name('login')->middleware('guest');
        Route::livewire('forgetpassword', 'forgetpass')->name('forgetpass')->middleware('guest');
        Route::livewire('change_new_pass', 'change-new-pass')->name('change_new_pass')->middleware('guest');
    });
    Route::livewire('contactus', 'contactus')->name('contactus');
    Route::livewire('aboutus', 'aboutus')->name('aboutus');
    Route::livewire('faq', 'faq')->name('faq');
    Route::livewire('termofuse', 'termofuse')->name('termofuse');
    Route::group(['prefix' => 'locale'], function () {
        Route::get('/{locale}', 'BaseController@changeLocale')->name('locale')->middleware('App\Http\Middleware\Localization');
    });
    Route::group(['prefix' => 'customers'], function () {
        Route::livewire('/{id}', 'customer')->name('customer');
        Route::livewire('/{id}/campaigns','campaigns-customer')->name('customerCampaigns');
        Route::livewire('/{id}/locations','locations-browse')->name('customerLocationsBrowse');
        Route::livewire('/{id}/campaigns/{slug}','campaigns-browse')->name('customerCampaignsBrowse');
        Route::livewire('/{id}/products','products')->name('products');
        Route::livewire('/', 'customers')->name('customers');
    });
    Route::group(['prefix' => 'shopping'], function () {
        Route::livewire('wishlist', 'wishlists')->name('wishlist');
        Route::livewire('cartlist','cartlist')->name('cartlist');
        Route::livewire('checkout','checkout')->name('checkout');
        Route::livewire('ordersuccess','ordersuccess')->name('ordersuccess');
        Route::livewire('track','track')->name('track');
    });
    Route::group(['prefix' => 'profile','middleware'=>'auth'], function () {
        Route::livewire('/','profile')->name('profile');
        Route::livewire('/cards','profile-cards')->name('profile-cards');
        Route::livewire('/payed','profile-payed')->name('profile-payed');
        Route::livewire('/settings','profile-settings')->name('profile-settings');
        Route::livewire('/pininfo','pininfo')->name('pininfo');
        Route::livewire('/payinfo/{id}','payed-product-info')->name('payed-product-info');
        Route::get('/logout','FunctionController@logout')->name('logout');
    });
    Route::post('emailsender', 'BaseController@sendEmail')->name('emailsender');
    Route::post('search', 'BaseController@search')->name('search');
    Route::get('share/{platform}/{table}/{content_id}', 'BaseController@share')->name('share');
});

Route::group(['prefix' => 'functions'], function () {
    Route::post('cartadd','FunctionController@cartadd')->name('cartadd');
});

Route::fallback([BaseController::class, 'notFound']);

