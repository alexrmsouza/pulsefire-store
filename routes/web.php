<?php

use Illuminate\Support\Facades\Route;

Route::get(
    '{uri}',
    '\\'.Pallares\LaravelNuxt\Controllers\NuxtController::class
)->where('uri', '.*');
