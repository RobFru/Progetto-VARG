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
        // se l'user è loggato allora ritorna la create
        if (auth()->check()) {
            return view('articles.create');
        }
        // se l'user non è loggato redirecta alla login page
        return redirect('/login');
    }

    public function index()
    {
        // determina quanti articoli mostra prima di creare una seconda pagina (determina anche l'ordine degli articoli)
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
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
        $articles = $category->articles()->where('is_accepted', true)->get();
        return view('articles.byCategory', ['articles' => $articles, 'category' => $category]);
    }
}
