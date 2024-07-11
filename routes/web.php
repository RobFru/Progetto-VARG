<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//Create Articles
Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');

// Index Articles
Route::get('/index/article', [ArticleController::class, 'index'])->name('index.article');