<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $this->validate($request,[
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);
	if(is_numeric($request->username)){
		$loginType = 'no_handphone';
	}else
	{
        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
	}
	//dd($request);
        $login = [
            $loginType => $request->username,
            'password' => $request->password
        ];

	//dd(auth()->attempt($login));

        if(auth()->attempt($login)){
            return redirect()->route('dashboard');
        }else{
	    //return redirect()->route('login')->withErrors(['error' => 'Email Address atau Username dan Password Salah']);
	return redirect()->route('login')->withErrors(['errors' => 'Email Address / Username / No. Handphone dan Password Salah']);
	}
    }

	public function redirectToProvider($provider)
	{
        	return Socialite::driver($provider)->redirect();
    	}

	public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
	$authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect()->route('dashboard');
    }
	public function findOrCreateUser($user, $provider)
	{
	  $authUser = User::where('provider_id',$user->id)->first();
	  if($authUser){
		return $authUser;
	  }
	 else{
	   $emailUser = User::where('email',$user->email)->first();
	   //dd($user);
	   if($emailUser){
		$emailUser->provider = $provider;
		$emailUser->provider_id = $user->id;
		$emailUser->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
		$emailUser->save();
		return $emailUser;
	   }
	   else
	   {
		$user =  User::create([
            'name' => $user->name,
            'email' => $user->email,
            'username' => $user->id,
            'password' => Hash::make('qwertynum123'),
	    'no_handphone' => str_pad(random_int(1,99999999),8,'0',STR_PAD_LEFT),
	    'address'=> 'jakarta',
	    'kota'=> 'jakarta',
	    'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	]);
		return $user;
	   }
	 }
	}
}
