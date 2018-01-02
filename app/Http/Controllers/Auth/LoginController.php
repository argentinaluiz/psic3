<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function loginSocial(Request $request){
        $this->validate($request, [
            'social_type' => 'required|in:google,github'
        ]);
        $socialType = $request->get('social_type');
        \Session::put('social_type',$socialType);
        return \Socialite::driver($socialType)->redirect();
    }

    public function loginCallback(){
        $socialType = \Session::pull('social_type');
        $userSocial = \Socialite::driver($socialType)->user();

        $user = User::where('email',$userSocial->email)->first();
        if(!$user){
            $user = User::create([
                'name' => $userSocial->name,
                'email' => $userSocial->email,
                //'password' => bcrypt(str_random(8))
                'password' => bcrypt('123456'),
                //'role' => User::ROLE_USER,
                //'phone' => '000',
                //'cpf' => '000'
            ]);
        }
        \Auth::login($user); //fazendo o login manual
        return redirect()->intended($this->redirectPath());
    }
}
