<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

//Auth::routes();


class LoginController extends Controller
{
    //
    public function showLoginForm() {
    	// check if Session['traderToken'] is set
        if (Session::has("traderToken")) {
            // if Session['traderToken'] is set, go to home page
            return redirect()->action('HomeController@index');
        } else {
            // if Session['traderToken'] is not set go to login page
            return view("auth.login");
        }
    }

    public function login(Request $request) {
        // 
        $email = $request->get('email');
        $password = $request->get('password');
        $rdirUrl = Session::get("lastURL");//$request->get('rdirURL');
        //$hashPass = Hash::make($password);

        // increase error counter to by 1 each time there is an error
        $errorCount =  $request->get('errorCnt');
        $errorCount += 1;

    	// check records if user exists
        $checkUserExists = DB::table('bb_account')
                ->select('*')
                ->where('email', '=', $email)->first();

        // if trader's email address exists and password matches
        if (($checkUserExists !== null) && (Hash::check($password, $checkUserExists->hash_pass))) {
            // set the following Sessions
            Session::put("traderToken", $checkUserExists->usercode);
            Session::put("traderFName", $checkUserExists->fname);
            Session::put("traderLName", $checkUserExists->lname);


            // see how to use to URL
            //Session::get("lastURL");

            // redirect to previous page or home page
            switch ($rdirUrl) {
                case '/list-offer':
                    return redirect()->action('ListOfferController@showListOfferForm');
                    break;
                
                default:
                    return redirect()->action('HomeController@index');
                    break;
            }
           
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

    public function logout(){
    	// 
		Session::flush();
		if (!Session::has('traderToken')) {
			return redirect()->action('HomeController@index');
		} else {}
	}
}
