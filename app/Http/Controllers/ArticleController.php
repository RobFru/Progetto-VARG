<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
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
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article){

        return view('articles.show', compact('article'));
    }
    
    public static function middleware(): array
    {
        return [
            new Middleware( 'auth', only: [ 'create' ]),
        ];
    }
    public function byCategory(Category $category)
    {
        return view('articles.byCategory', ['articles' => $category->articles, 'category' => $category]);
    }
}
