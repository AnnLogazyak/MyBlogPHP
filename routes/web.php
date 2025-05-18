<?php

use Illuminate\Support\Facades\Route;

Route::group(["namespace"=> 'App\Http\Controllers\Main'], function () {
    Route::get("/","IndexController");
});

Route::group(["namespace" => 'App\Http\Controllers\Admin', 'prefix'=> 'admin'], function () {
    Route::group(["namespace" => 'Main'], function () {
        Route::get("/", "IndexController");
    });

    Route::group(["namespace" => 'Category', 'prefix' => 'categories'], function () {
        Route::get("/", "IndexController");
    });
});

Auth::routes();
