<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;
use Socialite;


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
    #protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    #public function __construct()
    #{
    #    $this->middleware('guest', ['except' => 'logout']);
    #}



    //
    public function showLoginForm() {

        $pageURL = $_SERVER['REQUEST_URI'];
        $hitDateTime = strtotime("now");
        $viewerIP = $_SERVER['REMOTE_ADDR'];

        DB::table("bb_visitor_count")
        ->insert(
            [
                "pageurl" => $pageURL,
                "visitorip" => $viewerIP,
                "datetime" => $hitDateTime
            ]
        );
        
        // check if Session['traderToken'] is set
        if (Session::has("traderToken")) {
            // if Session['traderToken'] is set, go to home page
            Session::put("rdirURL", @$_GET['rdirURL']);
            $rdirUrl = htmlspecialchars(Session::has('rdirURL'));

            // redirect to profile page
            if(!session()->has('url.intended')) {
                if(!empty($rdirUrl)){
                    session(['url.intended' => url("/" . $rdirUrl)]);
                } else {
                    session(['url.intended' => url("/trader/profile")]);
                }
            }
            return redirect()->intended();
        } else {
            // if Session['traderToken'] is not set go to login page
            return view("auth.login");
        }
    }



    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($socSite)
    {
        // where $socSite is (facebook/google/twitter etc)
        return Socialite::driver($socSite)->stateless()->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($socSite)
    {
        $pageURL = $_SERVER['REQUEST_URI'];
        $hitDateTime = strtotime("now");
        $userIP = $viewerIP = $_SERVER['REMOTE_ADDR'];

        DB::table("bb_visitor_count")
        ->insert(
            [
                "pageurl" => $pageURL,
                "visitorip" => $viewerIP,
                "datetime" => $hitDateTime
            ]
        );


        $socUser = Socialite::driver($socSite)->stateless()->user();
        $fullName = $socUser->getName();
        $email = $socUser->getEmail();
        $fullName = $socUser->getName();

        $rdirUrl = htmlspecialchars(Session::has('rdirURL'));
        $userCode = 'BBT' . rand(111,999) . '-' . strtoupper(str_random(8));
        $activationCode = str_random(35);
        $joinedDate = strtotime("now");


        $checkUserExists = DB::table('bb_account')
            ->select('*')
            ->where('email', '=', $socUser->getEmail())->first();


        if($checkUserExists !== null) {

            Session::put("traderToken", $checkUserExists->usercode);
            Session::put("traderFName", $checkUserExists->fullname);

            //Auth::login($checkUserExists);
            if(!session()->has('url.intended')) {
                session(['url.intended' => url("/" . $rdirUrl)]);
            }
            return redirect()->intended();

        } else {
            DB::table('bb_account')
                ->insert(
                    [
                        'usercode'          => $userCode,
                        'fullname'          => $fullName,
                        'email'             => $email,
                        'tandc'             => '1',
                        'joined_date'       => $joinedDate,
                        'userip'            => $userIP,
                        'active_code'       => $activationCode,
                        'active_acc'        => '1',
                        'active_acc_date'   => $joinedDate
                    ]
                );

            //Auth::login($socUser);
            if(!session()->has('url.intended')) {
                session(['url.intended' => url("/" . $rdirUrl)]);
            }
            return redirect()->intended();
        }
    }


    public function logout(){

        $pageURL = $_SERVER['REQUEST_URI'];
        $hitDateTime = strtotime("now");
        $viewerIP = $_SERVER['REMOTE_ADDR'];

        DB::table("bb_visitor_count")
        ->insert(
            [
                "pageurl" => $pageURL,
                "visitorip" => $viewerIP,
                "datetime" => $hitDateTime
            ]
        );
        
        
        // 
        Session::flush();
        if (!Session::has('traderToken')) {
            return redirect()->action('HomeController@index');
        } else {}
    }
}
