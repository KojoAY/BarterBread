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

class ManageOffersController extends Controller
{
    //
    public function index() {
    	// show offer list

    	$lastURL = $_SERVER['REQUEST_URI'];
		#$getLastURL = explode('/', $lastURL);
		#$getLastURL = implode('-', $getLastURL);
		Session::put("lastURL", $lastURL);

    	if(Session::has("traderToken")) {
	    	$traderToken = Session::get("traderToken");

	    	$getOfferList = DB::table("bb_list_offer")
	    		->select("*")
	    		->where("usercode", "=", $traderToken)
	    		->orderby("id", "desc")
	    		->get();
/*
	    	$getMainCategById = DB::table("bb_main_categories")
	    		->select("*")
	    		->where("categoryid", "=", "")
	    		->get();
	    	*/
	    	$data = array(
	    		"getOfferList" => $getOfferList
	    	);
	    	return view('account_manager.my_offers.show_offer_list')->with($data);
	    } else {
	    	return redirect()->action("LoginController@showLoginForm");
	    }
    }

    public function showOfferDetails($oid, $otitle) {

    	// get $_SERVER['REQUEST_URI'];
    	#http://localhost:8000/trader/offers/details?oref=zk6-2500-eRgw
		$lastURL = $_SERVER['REQUEST_URI'];
		#$getLastURL = explode('/', $lastURL);
		#$getLastURL = implode('-', $getLastURL);
		Session::put("lastURL", $lastURL);

    	//if (Session::has("traderToken")) {
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

	        $data = array(
	        	'getOfferDetails' => $getOfferDetails,
	        	'getWantedList' => $getWantedList
	        );

	    	return view('account_manager.my_offers.show_offer_details')->with($data);

    	/*} else {
    		// if trader has not logged in redirect to login page
    		return redirect()->action("LoginController@showLoginForm");
	    }*/
    }

    public function showEditOfferDetails($oid, $otitle) {
    	// 
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

        $data = array(
        	'getOfferDetails' => $getOfferDetails,
        	'getWantedList' => $getWantedList,
        	'getMainCategories' => $getMainCategories
        );

    	return view('account_manager.my_offers.edit_offer_details')->with($data);
    }

    // update offer details
    public function updateOfferDetails(Request $request, $oid, $otitle) {
    	// 
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
		        $img->resize(200, 200, function ($constraint) {
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
			$wCategory = $request->get("w_category_".$i);
			$wTitle = $request->get("w_title_".$i);
			$wAddCash = $request->get("w_addCash_".$i);
			$wWantCode = $request->get("w_wantCode_".$i);

			if(!empty($wTitle)) {
		    	$saveWantedDetailsChanges = DB::table('bb_wanted')
		    		->where("wantcode", "=", $wWantCode)
		    		->update(
		    			[
							'categoryid' => $wCategory, 
							'title' => $wTitle, 
							'addcash' => $wAddCash, 
							'update_datetime' => $updateDateTime
		    			]
		    		);
	    	}
    	}

    	return redirect()->action('ManageOffersController@index');
    }


    // delete offer records
    public function deleteOfferDetails($oid, $otitle) {
    	/*
    	$deleteOffer = DB::table('bb_list_offer');
    		->where("offercode", "=", $oid)
    		->delete*/
    }
}
