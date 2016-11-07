<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Account;
use App\News;
use App\Downloads;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news = News::paginate(5);
        return view('home',compact('news'));
    }

    public function downloads()
    {
        $downloads = Downloads::paginate(10);
        return view('downloads',compact('downloads'));
    }
}
