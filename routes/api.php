<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('get', [DataController::class, 'get']);
Route::post('store', [DataController::class, 'store']);
Route::post('update', [DataController::class, 'update']);
Route::post('delete', [DataController::class, 'delete']);