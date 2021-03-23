<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(__DIR__ . '/auth.php');
