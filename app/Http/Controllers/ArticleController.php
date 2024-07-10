<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //
    public function create()
    {
        return view('articles.create');
    }

    public static function middleware(): array
    {
        return [
            new Middleware( 'auth', only: [ 'create' ]),
        ];
    }
}
