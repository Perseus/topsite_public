<?php

namespace App\Providers;

use App\Account;
use App\Character;
use App\AccountLogin;
use App\Guild;
use App\StatLog;
use App\ContactUs;
use Illuminate\Support\ServiceProvider;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // get unread bug reports
        try {
           $unread = ContactUs::where('read','!=',1)->count();
        }catch(\Illuminate\Database\QueryException $ex)
        {
                Log::info('ContactUs database doesnt exist yet');
                $unread = '';
        }
            
            // get all gm accounts
        $getGmAccounts = Account::where('gm',99)->get();
        $gmAccounts = array();
        foreach($getGmAccounts as $gmAccount)
        {
            $gmAccounts[] = $gmAccount->act_id;
        }
        // get all characters that have that act_id that are online.
        $getOnlineGMChars = Character::whereIn('act_id',$gmAccounts)->where('delflag',0)->get();
        $onlineGMChars = array();
        foreach($getOnlineGMChars as $GMChar)
        {
            $onlineGMChars[] = ["name" => $GMChar->cha_name, 
                                "status" => ($GMChar->mem_addr > 0 ? "Online" : "Offline"),
                                "type" => ($GMChar->mem_addr > 0 ? "success" : "danger")];
        }



        $statistics = array();
        $statistics = [
        "accounts" => Account::count(),
        "characters" => Character::count(),
        "guild" => Guild::where('leader_id','!=',0)->count(),
        "online" => Character::where('mem_addr','!=',0)->count(),
        "max_online" => StatLog::max('play_num')
        ];
        // get all statistics!
        view()->share('onlineGMChars',$onlineGMChars);
        view()->share('statistics',$statistics);
        view()->share('unread',$unread);
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
