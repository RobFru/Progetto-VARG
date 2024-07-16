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
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

//Accept or Reject Article
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');

Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');

//Mail
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
//Aggiunto middleware perché non c'era nella spiegazione
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->middleware('auth')->name('make.revisor');

//Search
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');