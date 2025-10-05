<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('hooks')->group(function () {
    Route::post(hash('sha512','fingerprint'), function(Request $request) {
        logger()->info($request->all());
    })
        ->name('hooks.fingerprint.store');
});