<?php

namespace App\Http\Controllers\Auth;

use App\AccountLogin;
use App\Account;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Request;
use Log;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:30|alpha_num|unique:account_login',
            'email' => 'required|email|max:30|unique:account_login',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // insert in account_login
        $account =  AccountLogin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => strtoupper(md5($data['password'])),
            'originalPassword' => $data['password'],
            'ban' => 0
        ]);
        // insert in gamedb
        if($account)
        {
        $game = Account::create([
            'act_id' => $account->id,
            'act_name' => ''.$account->name.'',
            'gm' => 0, // unless you want it to be 99 for everyone, lol
            // add more columns here if you have more stuff in your database
            // format is 'column_name' => default_value,
            ]);
        }
        else return false;
        return $game;

    }
}
