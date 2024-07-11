<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;


class ArticleController extends Controller
{
    //
    public function create()
    {
        return view('articles.create');
    }

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);
        return view('index.article', compact('articles'));
    }
    public static function middleware(): array
    {
        return [
            new Middleware( 'auth', only: [ 'create' ]),
        ];
    }
}
