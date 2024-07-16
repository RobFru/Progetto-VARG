<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    //


    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'DESC')->take(6)->get();
        return view('welcome', compact('articles'));
    }
    public function create()
    {
        return view('create.articles');
    }

    // serchered bar
    public function searchArticles(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->paginate(6);
        return view('articles.searched', ['articles' => $articles, 'query' => $query]);
    }
}
