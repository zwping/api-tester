<?php

use Encore\Admin\ApiTester\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('api-tester', Controllers\ApiTesterController::class.'@index')->name('api-tester-index');
Route::get('api-tester/handle', Controllers\ApiTesterController::class.'@handle')->name('api-tester-handle');
