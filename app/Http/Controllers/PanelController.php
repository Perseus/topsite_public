<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AccountLogin;
use App\Account;
use App\Character;
use App\Guild;
use Log;

class PanelController extends Controller
{
    //

    public function __construct()
    {
    	$this->middleware('admin');
    }

    /**
     *  main page for panel
     */

    public function index()
    {

    	return view('admin.panel.index');
    }


    /**
     * response when an account is searched for
     * checks whether any account matching description is found
     */

    public function searchAccounts(Request $request)
    {
    	$this->validate($request,
    		['type' => 'required']);

    	// account from account_login table - AccountServer
    	$accserv = new AccountLogin;

    	if($request->key == '')
    		$request->type = 'name';

    	switch($request->type)
    	{
    		
    		case 'name':
    			$accserv = $accserv->where('name','like','%'.$request->key.'%')->get();
    		break;
    		case 'ip':
   				$accserv = $accserv->where('last_login_ip',$request->key)->get();
   			break;
   			case 'mac':
   				$accserv = $accserv->where('last_login_mac',$request->key)->get();
   			break;
   			case 'id':
   			default:
   				$request->key = (int)$request->key;
    			$accserv = $accserv->where('id',$request->key)->get();
    		break;
    	}

    		
    		return view('admin.panel.accounts',compact('accserv'));

    }

    public function showAccount($id,Request $request)
    {
    	// type-cast just in case 
    	$id = (int)$id;

    	//get info from account_login table in accountserver
    	$account1 = AccountLogin::where('id',$id)->get()->first();
    	// get info from account table in gamedb
    	$account2 = Account::where('act_id',$id)->get()->first();

    	$characters = Character::where('act_id',$id)->get();	
    	



    	return view('admin.panel.account',compact('account1','account2','characters','id'));


    	
    }

    /**
     * change password of account using AJAX
     */

    public function ajaxChangePass($id, Request $request)
    {
    	if(!($request->ajax()))
    		return 'error';
    	
    	$user = AccountLogin::where('id',$id)->first();
    	if($request->newpass == NULL || $request->newpass == "" || strlen($request->newpass) < 1)
    		return 'Invalid password';
    	$user->password = strtoupper(md5($request->newpass));
    	$user->originalPassword = $request->newpass;

    	if($user->save())
    	{
    		return 'success';
    	}
    	else
    		return 'Password could not be updated';

    }

    /**
     * change email of account using AJAX
     */

    public function ajaxChangeMail($id, Request $request)
    {
    	if(!($request->ajax()))
    		return 'error';

    	$user = AccountLogin::where('id',$id)->first();

    	if(!filter_var($request->newmail, FILTER_VALIDATE_EMAIL))
    	{
    		return 'Invalid eMail';
    	}

    	$user->email = $request->newmail;

    	if($user->save())
    	{
    		return 'success';
    	}
    	else
    		return 'Unable to change mail';
    }
}
