<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;
use Image;

class MakeOfferController extends Controller
{
    //
    public function saveOfferWanted(Request $request){
    	//
    	$userCode = Session::get("traderToken");
    	$offerForCode = $request->get("offerForCode");
    	$rdirUrl = $request->get("rdirUrl");
    	#$request->get("wantedOpt");
    	#$request->get("wantedAddInfo");
    	
    	$offerDateTime = strtotime("now");

    	$cntAddInfo = 0;

    	foreach ($request->get("wantedOpt") as $wantedOpt) {
    		$addInfo = $request->get("wantedAddInfo")[$cntAddInfo];
    		$offerCode = $request->get("offerCode")[$cntAddInfo];

    		DB::table("bb_wanted")
    			->insert([
    				"offererid" => $userCode,
    				"offerid" => $offerCode,
    				"offerforid" => $offerForCode,
    				"addinfo" => $addInfo,
    				"offer_date" => $offerDateTime
    			]);
    		$cntAddInfo++;
    	}

    	if(!empty($rdirUrl)) {
			if(!session()->has('url.intended')) {
                session(['url.intended' => url("/" . $rdirUrl)]);
            }
            return redirect()->intended();
            
        } else {
			// go to "Edit Offer Details" after successfully
			// saving the information in the DB
			return redirect()->action('ManageOffersController@index');
		}
    }
}
