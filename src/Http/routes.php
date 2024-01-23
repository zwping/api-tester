<?php

use Encore\Admin\ApiTester\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('api-tester', Controllers\ApiTesterController::class.'@index');