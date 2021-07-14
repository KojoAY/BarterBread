<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RegisterController extends Controller
{
    // show registration form
    public function showRegistrationForm() {
    	// 
    	if (Session::has('traderToken')) {
	    	// redirect to home page or the previous page after login
	    	// eg.: return redirect()->action('MasterController@dashboard', ['acc'=>Session::get('user_token')]);
    		return redirect()->action('HomeController@index');
    	} else {
    		// route to registration page if the user is not already logged
	    	return view("auth.register");
	    }
    }


    // save registration information
    public function register(Request $request) {
    	// 
    	$firstName = $request->get('fname');
    	$lastName = $request->get('lname');
    	$email = $request->get('email');
    	$password = $request->get('password');
    	$hashPassword = Hash::make($password);
    	$tandc = $request->get('tandc');
    	$user_code = $request->get('userCode');
		$activationCode = str_random(35);
		$joinedDate = strtotime('now');

    	$checkUserExists = DB::table('bb_account')
				->select('*')
				->where('email', '=', $email)->first();

		if ($checkUserExists === null) {
			// 
			DB::table('bb_account')
	    		->insert(
	    			[
	    				'usercode'			=> $user_code,
	    				'fname'				=> $firstName,
	    				'lname'				=> $lastName,
	    				'username'			=> '',
	    				'password'			=> $password,
	    				'hash_pass'			=> $hashPassword,
	    				'email'				=> $email,
	    				'tele'				=> '',
	    				'city'				=> '0',
	    				'region'			=> '0',
	    				'country'			=> '0',
	    				'zipcode'			=> '0',
	    				'tandc'				=> $tandc,
	    				'joined_date'		=> $joinedDate,
	    				'ip'				=> '',
	    				'active_code'		=> $activationCode,
	    				'active_acc'		=> '0',
	    				'active_acc_date'	=> $joinedDate
	    			]
	    		);


			$checkUserExistsAgain = DB::table('bb_account')
				->select('*')
				->where('email', '=', $email)->first();

			if ($checkUserExistsAgain !== null) {
				// 
				Session::put('traderToken', $checkUserExistsAgain->usercode);
				Session::put("traderFName", $checkUserExistsAgain->fname);
            	Session::put("traderLName", $checkUserExistsAgain->lname);
		    	// redirect to the previous page after registration
		    	// or to the home page if the previous page link is not available
		    	//$_SERVER['REQUEST_URI'];
		    	if (Session::has('traderToken')) {
		    		// redirect to previous page or home page
		            switch ($rdirUrl) {
		                case 'list-offer':
		                    return redirect()->action('ListOfferController@showListOfferForm');
		                    break;
		                
		                default:
		                    return redirect()->action('HomeController@index');
		                    break;
		            }
					//return redirect()->action('HomeController@index', ['tid'=>Session::get('traderToken')]);
				} else {
					// display error page (eg.: something went wrong... please login after a while...)
					#Session::flush();
					#return redirect()->action('');
				}
			}
		}
		else {
			//$request->session()->flash('err_message', $error_message);
			//return redirect()->action('UserController@signup', ['_err'=>'1']); 
		}
    }
}
