<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//Create Articles
Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');

// Index Articles
Route::get('/index/article', [ArticleController::class, 'index'])->name('index.article');

// Show Article
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('show.article');

//Categories
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

//Revisors
Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');

//Accept or Reject Article
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');

Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');