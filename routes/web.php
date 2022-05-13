<?php

use Illuminate\Support\Facades\Route;

    // Anasayfa
    Route::get('/', 'App\Http\Controllers\LeadFormController@web')->name('web');   
    // Form Bilgilerini save metoduna post edilme rutudur.
    Route::post('/save', 'App\Http\Controllers\LeadFormController@save')->name('web.save');



