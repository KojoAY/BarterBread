<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Image;

class ManageOffersController extends Controller
{
    //
    public function index() {

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
        
    	
    	// show offer list
	    $lastURL = $_SERVER['REQUEST_URI'];
	    $linkLength = (strlen($lastURL) - 1);
	    $fullURL = substr($lastURL, -$linkLength);
		$traderToken = Session::get("traderToken");

    	if(Session::has("traderToken")) {
	    	$traderToken = Session::get("traderToken");

	    	$getOfferListCount = DB::table("bb_list_offer")
	    		->where("usercode", "=", $traderToken)
	    		->count();

	    	$getOfferMadeCount = DB::table("bb_make_offer")
	    		->where("offererid", "=", $traderToken)
	    		->count();

	    	$getOfferList = DB::table("bb_list_offer")
	    		->select("*")
	    		->where("usercode", "=", $traderToken)
	    		->orderby("id", "desc")
	    		->paginate(10);
	    	

	    	$data = array(
	    		"pageTitle" => "Manage Offers - " . config('app.name', 'BarterBread'),
	    		"getOfferListCount" => $getOfferListCount,
	    		"getOfferMadeCount" => $getOfferMadeCount,
	    		"getOfferList" => $getOfferList
	    	);
	    	return view('account_manager.my_offers.show_offers')->with($data);
	    } else {
	    	return redirect()->action("LoginController@showLoginForm", ["rdir=". $fullURL]);
	    }
    }


    public function showOfferDetails($oid, $otitle) {

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

    		$getMainCategById = DB::table("bb_main_categories")
            ->select("*")->where("category_code", "=", $getOfferDetails->categoryid)->first();


            /*
	        get the list of offers made by offerforid
	        */
	        $getOffersMade = DB::table("bb_make_offer")
	            ->select("*")
	            ->where("offerforid", "=", $oid)
	            ->paginate(5);


	        $getHitsCount = DB::table("bb_offer_views")
            ->where("offercode", "=", $oid)
            ->count();


	        $data = array(
	        	"pageTitle" => "Manage Offers | Details - " . config('app.name', 'BarterBread'),
	        	"getOfferDetails" => $getOfferDetails,
	        	"getWantedList" => $getWantedList,
	        	"getOfferList" => $getOfferList,
	        	"getMainCategById" => $getMainCategById,
	        	"getOffersMade" => $getOffersMade,
	        	"getCategCode" => $oid,
	        	"getHitsCount" => $getHitsCount
	        );

	    	return view('account_manager.my_offers.show_offer_details')->with($data);

    	} else {
    		// if trader has not logged in redirect to login page
    		return redirect()->action("LoginController@showLoginForm", ["rdir=". $fullURL]);
	    }
    }

    public function showEditOfferDetailsForm($oid, $otitle) {

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
    	$lastURL = $_SERVER['REQUEST_URI'];
	    $linkLength = (strlen($lastURL) - 1);
	    $fullURL = substr($lastURL, -$linkLength);
    	$traderToken = Session::get('traderToken');
    	
    	if(Session::has("traderToken")) {
	    	// referece offer details by the 'offerCode'
	    	$getOfferDetails = DB::table('bb_list_offer')
	            ->select('*')
	            ->where('offercode', '=', $oid)
	            ->orderby('id', 'desc')
	            ->first();

	        $getWantedList = DB::table('bb_wanted')
	            ->select('*')
	            ->where('offercode', '=', $oid)
	            ->get();

	        $getMainCategories = DB::table('bb_main_categories')
	        	->select('*')
	        	->get();

	        // get the list of offers
	        $getOfferList = DB::table("bb_list_offer")
	    		->select("*")
	    		->where("usercode", "=", $traderToken)
	    		->orderby("id", "desc")
	    		->get();

	        $data = array(
            	"pageTitle" => "Manage Offers | Edit Details - " . config('app.name', 'BarterBread'),
	        	'getOfferDetails' => $getOfferDetails,
	        	'getWantedList' => $getWantedList,
	        	'getMainCategories' => $getMainCategories,
	        	'getOfferList' => $getOfferList
	        );

	    	return view('account_manager.my_offers.edit_offer_details')->with($data);
	    } else {
    		// if trader has not logged in redirect to login page
    		return redirect()->action("LoginController@showLoginForm", ["rdir=". $fullURL]);
	    }
    }

    // update offer details
    public function updateOfferDetails(Request $request, $oid, $otitle) {

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
    	$lastURL = $_SERVER['REQUEST_URI'];
	    $linkLength = (strlen($lastURL) - 1);
	    $fullURL = substr($lastURL, -$linkLength);
    	$traderToken = Session::get('traderToken');

	    if(Session::has("traderToken")){
	    	$userCode = Session::get('traderToken');
			$offerCode = $request->get('unique_id');
			$oCategory = $request->get('o_category');
			$title = $request->get('o_title');
			$actualValue = $request->get('o_actValue');
			$description = $request->get('o_desc');
			$barterType = $request->get('o_barterType');
			$contactBy = $request->get('o_contactBy');
			$postDateTime = $request->get('postDate');
			$updateDateTime = strtotime('now');
			$expireDateTime = NULL;

			$photoCnt = 0;
			$sizeOfPhotoArr = sizeof($request->get('checkPhotoName'));
	        $gather_photos = '';

	        /*
			if filearr[n] is not empty the leave checkphoto[n] and assign filearr[n] to the address
			or
			show an empty file input box after a photo is deleted
	        */
			for($picArr = 0; $picArr < $sizeOfPhotoArr; $picArr++) {
				$gather_photos .= $request->get('checkPhotoName')[$picArr] . ' ';
			}

	        if($request->hasFile('o_photos')){

				foreach ($request->o_photos as $photo) {
					if($photo == $request->get('checkPhotoName')[$photoCnt]) {
						// use to old name as the photo name
						echo $photoName = $code = $request->get('checkPhotoName')[$photoCnt];
					} else {
						// set new name for the photo
						$code = $offerCode . '_' .str_random(3) . '-' . rand(1111,9999);
						$photoName = $code . '.' . $photo->getClientOriginalExtension();
					}
					
					
	        		$gather_photos .= $photoName . ' ';

					$destinationPath = public_path('/photos/items/thumbs');
			        $img = Image::make($photo->getRealPath());
			        $img->resize(250, 250, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$photoName);


					$destinationPath = public_path('/photos/items');
	        		$photo->move($destinationPath, $photoName);

	        		$photoCnt++;
				}

			}

			// update the list offer record
	    	$saveOfferDetailsChanges = DB::table("bb_list_offer")
	    		->where("offercode", "=", $offerCode)
	    		->update(
	    			[
						'categoryid' => $oCategory,
						'title' => $title,
						'actual_value' => $actualValue,
						'description' => $description,
						'photos' => trim($gather_photos),
						'barter_type' => $barterType,
						'contactby' => $contactBy,
						'update_datetime' => $updateDateTime,
						'expire_datetime' => $expireDateTime
	    			]
	    		);


	    	// update the wanted list with the details
	    	for($i = 1; $i <= 3; $i++){
	    		if ($i == 1) {
	    			$wTradeType = $request->get("w_tradeType_1");
	    			if ($request->get("w_tradeType_1") == 1) {
						$wCategory = $request->get("w_category_".$i);
						$wTitle = $request->get("w_title_".$i);
						$wAddCash = $request->get("w_addCash_".$i);
						$cashOffer = "";
						$wNego = "0";
						$wantcode = $offerCode . '_' . str_random(3) . '' . rand(111,999);
					} else {
						$wCategory = "Cash Value";
						$wTitle = "";
						$wAddCash = "";
						$cashOffer = $actualValue;
						$wNego = $request->get("w_nego_1");
						$wantcode = $offerCode . '_' . str_random(3) . '' . rand(111,999);
					}
	    		} elseif ($i > 1) {

					$wTradeType = 1;
					$wCategory = $request->get("w_category_".$i);
					$wTitle = $request->get("w_title_".$i);
					$wAddCash = $request->get("w_addCash_".$i);
					$wCashOffer = "";
					$wNego = "0";
					$wantcode = $offerCode . '_' . str_random(3) . '' . rand(111,999);
	    		}

				/*$wCategory = $request->get("w_category_".$i);
				$wTitle = $request->get("w_title_".$i);
				$wAddCash = $request->get("w_addCash_".$i);*/
				$wWantCode = $request->get("w_wantCode_".$i);

				if(!empty($wTitle)) {
			    	$saveWantedDetailsChanges = DB::table('bb_wanted')
			    		->where("wantcode", "=", $wWantCode)
			    		->update(
			    			[
								'usercode' => $userCode, 
								'offercode' => $offerCode,
								'wantcode' => $wantcode,
								'tradetype' => $wTradeType, 
								'categoryid' => $wCategory, 
								'title' => $wTitle, 
								'addcash' => $wAddCash, 
								'cashoffer' => $wCashOffer, 
								'negotiable' => $wNego, 
								'post_datetime' => $postDateTime, 
								'update_datetime' => $updateDateTime
			    			]
			    		);
		    	}
	    	}

    		return redirect()->action('ManageOffersController@index');
    		
		} else {
    		// if trader has not logged in redirect to login page
    		return redirect()->action("LoginController@showLoginForm", ["rdir=". $fullURL]);
	    }
    }


    // offers made
    public function showOffersMadeList(){

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
        
    	
    	$lastURL = $_SERVER['REQUEST_URI'];
	    $linkLength = (strlen($lastURL) - 1);
	    $fullURL = substr($lastURL, -$linkLength);

    	if(Session::has("traderToken")) {
	    	$traderToken = Session::get("traderToken");


	    	$getOfferList = DB::table("bb_list_offer")
	    		->select("*")
	    		->where("usercode", "=", $traderToken)
	    		->orderby("id", "desc")
	    		->paginate(10);


	    	$getOfferMade = DB::table("bb_make_offer")
	    		->select("*")
	    		->where("offererid", "=", $traderToken)
	    		->paginate(10);
	    	

	    	$data = array(
            	"pageTitle" => "Manage Offers | Offers Made - " . config('app.name', 'BarterBread'),
	    		"getOfferList" => $getOfferList,
	    		"getOfferMade" => $getOfferMade
	    	);
	    	return view('account_manager.my_offers.show_offer_made_list')->with($data);
	    } else {
	    	return redirect()->action("LoginController@showLoginForm", ["rdir=". $fullURL]);
	    }
    }


    // offers made details
    public function showOffersMadeDetails($oid, $otitle) {

    	
    }


    // delete offer records
    public function deleteOfferDetails($oid, $otitle) {

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
        
    	
    	
    	$lastURL = $_SERVER['REQUEST_URI'];
	    $linkLength = (strlen($lastURL) - 1);
	    $fullURL = substr($lastURL, -$linkLength);
    	$traderToken = Session::get('traderToken');

    	$deleteOffer = DB::table('bb_list_offer')
    		->where("offercode", "=", $oid)
    		->delete();

    	return redirect()->action("ManageOffersController@index");
    }
}
