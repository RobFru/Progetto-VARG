<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    //

    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        // TestVittorio per il rollback
        $article_to_rollback=Article::whereNotNull('is_accepted')->orderBy('id', 'desc')->first();
        return view('revisor.index', compact('article_to_check', 'article_to_rollback'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()
            ->back()
            ->with('message', "The article $article->title was accepted successfully");
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()
            ->back()
            ->with('message', "The article $article->title was rejected successfully");
    }

    public function goBack(Article $article){
        $article->setAccepted(null);
        return redirect()
        ->back()
        ->with('message', "The article $article->title was rollbacked successfully");
    }
    public function becomeRevisor(Request $request)
    {
        Mail::to('aulabvarg@gmail.com')->send(new BecomeRevisor(Auth::user(), $request->input('description')));
        return redirect()->route('homepage')->with('message', 'Your request has been sent successfully');
    }
    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

    public function formRevisor()
    {
        return view('revisor.form');
    }
}
