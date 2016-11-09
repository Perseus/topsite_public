<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Account;
use App\Character;
use App\News;
use App\Downloads;
use App\Guild;
use App\AccountLogin;

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
        // 5 news articles per page
        $news = News::paginate(5);
        return view('home',compact('news'));
    }

    public function downloads()
    {
        // 10 downloads per page to be shown
        $downloads = Downloads::paginate(10);
        return view('downloads',compact('downloads'));
    }

    public function ranking()
    {
        // 3 types of rankings
        // 1. By experience / level
        // 2. By gold
        // 3. By guild members
        $unbannedAccounts = array();
        $getUnbannedAccounts = AccountLogin::where('ban',0)->select('id')->get();
        foreach($getUnbannedAccounts as $unbannedAccount)
        {
            $unbannedAccounts[] = $unbannedAccount->id;
        }
        $getCharacters = Character::join('account',function($join) use ($unbannedAccounts)
            {
                $join->on('character.act_id','=','account.act_id')->where('gm',0);
            })->whereIn('account.act_id',$unbannedAccounts)->get();
        $charactersbyLevel = $getCharacters->sortByDesc('degree')->take(30);
        $charactersByGold = $getCharacters->sortByDesc('gd')->take(30);
        $getGuilds = Guild::join('character',function($join)
            {
                $join->on('guild.leader_id','=','character.cha_id');
            })->join('account',function($join) use ($unbannedAccounts)
            {
                $join->on('character.act_id','=','account.act_id')->where('gm',0)->whereIn('account.act_id',$unbannedAccounts);
            })->get()->sortByDesc('member_total')->take(30);
    

        return view('ranking',compact('charactersbyLevel','charactersByGold','getGuilds'));

    }
}
