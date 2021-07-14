<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UsersController extends Controller
{
    //
    public function index() {
        $lastURL = $_SERVER['REQUEST_URI'];
        $linkLength = (strlen($lastURL) - 1);
        $fullURL = substr($lastURL, -$linkLength);

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
        
        

		if (Session::has("traderToken")) {
			// get the users information
	    	$userCode = Session::get("traderToken");
	    	$getUserInfo = DB::table("bb_account")
	    		->select("*")
	    		->where("usercode", "=", $userCode)
	    		->first();

            // get the list of countries
            $getCountryList = DB::table("bb_countries")
                ->select("*")
                ->where("country_zip_code", "=", $getUserInfo->country)
                ->first();


	    	$data = array(
                "pageTitle" => "My Profile - " . config('app.name', 'BarterBread'),
	    		"getUserInfo" => $getUserInfo,
                "getCountryList" => $getCountryList
	    	);

	    	return view("account_manager/my_info/show_user_info")->with($data);
		} else {
            return redirect()->action("LoginController@showLoginForm", ["rdir=". $fullURL]);
        }
    	
    }

    public function getEditProfileForm() {

        $lastURL = $_SERVER['REQUEST_URI'];
        $linkLength = (strlen($lastURL) - 1);
        $fullURL = substr($lastURL, -$linkLength);

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
        
        

        if(Session::has("traderToken")) {
    	// get the users information
	    	$userCode = Session::get("traderToken");
	    	$getUserInfo = DB::table("bb_account")
	    		->select("*")
	    		->where("usercode", "=", $userCode)
	    		->first();


            // get the list of countries
            $getCountryList = DB::table("bb_countries")
                ->select("*")
                ->get();


	    	$data = array(
                "pageTitle" => "My Profile | Edit Personal Information - " . config('app.name', 'BarterBread'),
	    		"getUserInfo" => $getUserInfo,
                "getCountryList" => $getCountryList
	    	);

    	   return view('account_manager/my_info/edit_user_info')->with($data);

        } else {
            return redirect()->action("LoginController@showLoginForm", ["rdir=". $fullURL]);
        }
    }

    public function saveUserInfoChanges(Request $request) {

        $lastURL = $_SERVER['REQUEST_URI'];
        $linkLength = (strlen($lastURL) - 1);
        $fullURL = substr($lastURL, -$linkLength);

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
        
        

        if(Session::has("traderToken")) {
        	// get user's info
        	$userCode = Session::get("traderToken");
        	$fullName = $request->get("fName");
        	$eMail = $request->get("eMail");
        	$password = $request->get("password");
        	$hashPassword = Hash::make($password);
        	$teleNo = $request->get("telNo");
        	$city = $request->get("city");
        	$region = $request->get("region");
        	$country = $request->get("country");
        	$zipCode = $request->get("zipCode");
        	$updateDateTime = strtotime("now");


        	DB::table("bb_account")
        		->where("usercode", "=", $userCode)
        		->update(
        			[
        				"usercode" => $userCode,
        				"fullname" => $fullName,
        				"email"	=> $eMail,
        				"hash_pass" => $hashPassword,
        				"password" => $password,
        				"tele" => $teleNo,
        				"city" => $city,
        				"region" => $region,
        				"country" => $country,
        				"zipcode" => $zipCode,
        				"update_datetime" => $updateDateTime
        			]
        		);
        	return redirect()->action("UsersController@index");
            
        } else {
            return redirect()->action("LoginController@showLoginForm", ["rdir=". $fullURL]);
        }
    }
}
