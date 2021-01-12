<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    //Admin - Index
    Route::get('/', ['App\Http\Controllers\Admin\IndexController', 'index'])->name('admin.index');
    //Client
    Route::get('/client', ['App\Http\Controllers\Admin\ClientController', 'index'])->name('client.index');
    Route::get('/client/create', ['App\Http\Controllers\Admin\ClientController', 'create'])->name('client.create');
    Route::get('/client/edit/{id}', ['App\Http\Controllers\Admin\ClientController', 'edit'])->name('client.edit');
    Route::post('/client/update', ['App\Http\Controllers\Admin\ClientController', 'update'])->name('client.update');
});
