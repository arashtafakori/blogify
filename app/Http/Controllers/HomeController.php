<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome($locale = 'en')
    {        
        App::setLocale($locale);
        
        $items = Post::with('user')->orderBy('created_at', 'desc')->take(10)->get();

        return view("welcome", [
            'posts' => $items
           ]);
    }
}