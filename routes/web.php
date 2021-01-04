<?php

use App\Http\Controllers\BaseController;


Route::group(['prefix' => '/'], function () {
    Route::livewire('/', 'index')->name('index');
    Route::livewire('login', 'login')->name('login')->middleware('guest');
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
    Route::post('emailsender', 'BaseController@sendEmail')->name('emailsender');
    Route::post('search', 'BaseController@search')->name('search');
    Route::get('share/{platform}/{table}/{content_id}', 'BaseController@share')->name('share');
});

Route::fallback([BaseController::class, 'notFound']);

Route::get('/home', 'HomeController@index')->name('home');
