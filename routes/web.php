<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::controller(MessageController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/send_message', 'create');
});
