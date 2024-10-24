<?php

use App\Http\Controllers\Api\WeatherController;
use Illuminate\Support\Facades\Route;

Route::controller(WeatherController::class)->group(function () {
    Route::get('/',  'showForm')->name('weather');
    Route::post('/weather',  'getWeatherResult')->name('weather.result');
});


