<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Image;

class ManageOffersReceivedController extends Controller
{
    //
    public function showOffersReceivedList($oid, $otitle){

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
    	// get $_SERVER['REQUEST_URI'];
	    $lastURL = $_SERVER['REQUEST_URI'];
	    $linkLength = (strlen($lastURL) - 1);
	    $fullURL = substr($lastURL, -$linkLength);

		$traderToken = Session::get('traderToken');

    	if (Session::has("traderToken")) {
    		// referece offer details by the 'offerCode'
	    	$getOfferDetails = DB::table('bb_list_offer')
	            ->select('*')
	            ->where('offercode', '=', $oid)
	            ->orderby('id', 'desc')
	            ->first();

	        $getWantedList = DB::table('bb_wanted')
	            ->select('*')
	            ->where('offercode', '=', $oid)
	            //->orderby('id', 'desc')
	            ->get();

	        // get the list of offers
            $getOfferList = DB::table("bb_list_offer")
    		->select("*")
    		->where("usercode", "=", $traderToken)
    		->orderby("id", "desc")
    		->get();


    		$getOffersReceived = DB::table("bb_make_offer")
	            ->select("*")
	            ->where("offerforid", "=", $oid)
	            ->paginate(20);

	        $data = array(
                "pageTitle" => "Manage Offers Reveived - " . config('app.name', 'BarterBread'),
	        	'getOfferDetails' => $getOfferDetails,
	        	'getWantedList' => $getWantedList,
	        	'getOfferList' => $getOfferList,
        		"getOffersReceived" => $getOffersReceived
	        );

	    	return view('account_manager.my_offers.show_offer_received_details')->with($data);

    	} else {
    		// if trader has not logged in redirect to login page
    		return redirect()->action("LoginController@showLoginForm", ["rdir=". $fullURL]);
	    }

    }
}
