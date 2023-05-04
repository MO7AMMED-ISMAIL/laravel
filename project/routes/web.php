<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
Route::get('/', [ArticleController::class, 'index']);

Route::resource('articles', ArticleController::class);
