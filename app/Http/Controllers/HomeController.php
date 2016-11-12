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
        // get all the unbanned accounts and store them in an array which is used later in the JOIN query
        $getUnbannedAccounts = AccountLogin::where('ban',0)->select('id')->get();
        foreach($getUnbannedAccounts as $unbannedAccount)
        {
            $unbannedAccounts[] = $unbannedAccount->id;
        }
        // natural join character table with account table to find accounts that are not gms
        $getCharacters = Character::join('account',function($join) use ($unbannedAccounts)
            {
                $join->on('character.act_id','=','account.act_id')->where('gm',0);
            })->whereIn('account.act_id',$unbannedAccounts)->get(); // make sure they are not banned too
        // sort them according to need and take the top 30.
        $charactersbyLevel = $getCharacters->sortByDesc('degree')->take(30);
        $charactersByGold = $getCharacters->sortByDesc('gd')->take(30);
        $charactersByReputation = $getCharacters->sortByDesc('credit')->take(30);
        // join guild with the character table to check guilds having their leader id with the character ids to find the accounts
        $getGuilds = Guild::join('character',function($join)
            {
                $join->on('guild.leader_id','=','character.cha_id');
            })->join('account',function($join) use ($unbannedAccounts)
            {
                $join->on('character.act_id','=','account.act_id')->where('gm',0)->whereIn('account.act_id',$unbannedAccounts); // make sure they're not gms and they're not banned.
            })->get()->sortByDesc('member_total')->take(30);  // sort as needed and take top 30 results
    

        return view('ranking',compact('charactersbyLevel','charactersByGold','charactersByReputation','getGuilds'));

    }
}
