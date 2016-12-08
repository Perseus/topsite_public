<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AccountLogin;
use Auth;

class UserController extends Controller
{
    //

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * returns account edit page
	 */

	public function accountPage()
	{

		return view('user.account.main');
	}

	/**
	 * returns password edit page
	 */

	public function changePass()
	{

		return view('user.account.changepw');
	}


	/**
	 * changes the password of the account
	 */

	public function editPass(Request $request)
	{
		$this->validate($request,
			[ 'oldpassword' => 'required|exists:account_login,originalPassword',
			  'newpassword' => 'required|alpha_num'
			]);
		$newPwCrypted = strtoupper(md5($request->newpassword));

		$user = Auth::user();
		$user->originalPassword = $request->newpassword;
		$user->password = $newPwCrypted;

		if($user->save())
		{
			return view('user.account.changepw')->withSuccess('Password was changed successfully');
		}
		else
			return view('user.account.changepw')->withError('Password could not be changed');
	}

	/**
	 * returns the change email page
	 */

	public function changeMail()
	{

		return view('user.account.changemail');
	}

	/**
	 * changes the user's email
	 */

	public function editMail(Request $request)
	{
		$this->validate($request,
			['oldmail' => 'required',
			 'newmail' => 'required|email']);

		$user = Auth::user();
		$user->email = $request->newmail;

		if($user->save())
		{
			return view('user.account.changemail')->withSuccess('eMail was changed successfully!');
		}
		else
			return view('user.account.changemail')->withError('eMail could not be changed.');
	}
}
