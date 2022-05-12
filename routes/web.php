<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return '<h2 style="text-align:center;margin-top:50px;">REO.so Matcher Microservice Case Study Solution</h2><p style="text-align:center;position:fixed;bottom:30px;width:100%;">By <b>António Yosica</b></p>';
});
