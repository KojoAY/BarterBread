<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Socialite;

//Auth::routes();


class LoginController extends Controller
{
    //
    public function showLoginForm() {
    	// check if Session['traderToken'] is set
        if (Session::has("traderToken")) {
            // if Session['traderToken'] is set, go to home page
            //$rdirUrlIsset = @$_GET['rdirURL'];
            Session::put("rdirURL", @$_GET['rdirURL']);
            $rdirUrl = htmlspecialchars(Session::get('rdirURL'));

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
            $data = array(
                "pageTitle" => "Login - " . config('app.name', 'BarterBread')
            );

            // if Session['traderToken'] is not set go to login page
            return view("auth.login")->with($data);
        }
    }

    public function login(Request $request) {
        // 
        $email = $request->get('email');
        $password = $request->get('password');
        $rdirUrl = htmlspecialchars(Session::get('rdirURL'));
        //$hashPass = Hash::make($password);

        // increase error counter to by 1 each time there is an error
        $errorCount =  $request->get('errorCnt');
        $errorCount += 1;

    	// check records if user exists
        $checkUserExists = DB::table('bb_account')
                ->select('*')
                ->where('email', '=', $email)->first();

        // if trader's email address exists and password matches
        //if (($checkUserExists !== null) && (Hash::check($password, $checkUserExists->hash_pass))) {
        if ($checkUserExists !== null) {
            // set the following Sessions
            Session::put("traderToken", $checkUserExists->usercode);
            Session::put("traderFName", $checkUserExists->fullname);

            if(!session()->has('url.intended')) {
                session(['url.intended' => url("/" . $rdirUrl)]);
            }
            return redirect()->intended();
           
        } else {
            // check if a login error has been committed
            // if it's been committed less than 1 to 3 times
            if ($errorCount < 3) {
                // error message (Wrong login details)
                $errorMessage = "<label style=\"color: #c81111; text-align:center; margin-bottom:10px;\">
                            Email address/password does not exit.
                        </label>";

                // assign error message
                $request->session()->flash('errorMessage', $errorMessage);
                // return to login page to login again
                return redirect()->action('LoginController@showLoginForm', ['_err'=>$errorCount]); 
            } else {
                // redirect to the register page
                return redirect()->action('RegisterController@showRegistrationForm'); 
            }
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

        $rdirUrl = htmlspecialchars(Session::get('rdirURL'));
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

            #if($checkUserExists !== null) {

                Session::put("traderToken", $checkUserExists->usercode);
                Session::put("traderFName", $checkUserExists->fullname);

                //Auth::login($checkUserExists);
                if(!session()->has('url.intended')) {
                    session(['url.intended' => url("/" . $rdirUrl)]);
                }
            #}

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
			return redirect("/");//->action('HomeController@index');
		} else {}
	}
}
