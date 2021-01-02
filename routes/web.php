<?php

use App\Http\Controllers\BaseController;


Route::group(['prefix' => '/'], function () {
    Route::livewire('login', 'login')->name('login')->middleware('guest');
    Route::livewire('index', 'index')->name('index');
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
        Route::livewire('/', 'customers')->name('customers');
    });
    Route::post('emailsender', 'BaseController@sendEmail')->name('emailsender');
    Route::post('search', 'BaseController@search')->name('search');
    Route::get('share/{platform}/{table}/{content_id}', 'BaseController@share')->name('share');
});

Route::fallback([BaseController::class, 'notFound']);
