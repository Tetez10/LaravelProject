<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::all();
        return view('home', compact('articles'));
    }
}
