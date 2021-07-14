<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;
use Image;

class ListOfferController extends Controller
{
    public function showListOfferForm()
	{
		// get $_SERVER['REQUEST_URI'];
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
			// get the list of category
			$getMainCategories = DB::table('bb_main_categories')
	        	->select('*')
	        	->get();


	        $data = array(
	        	"getMainCategories" => $getMainCategories
	        );

			// check if the trader has logged in before showing the form
			return view('list_offer/offer_form')->with($data);
		} else {
			// go to login page
			return redirect()->action("LoginController@showLoginForm", ["rdir=". $fullURL]);
		}
		
	}


	public function listOffer(Request $request)
	{
		// get $_SERVER['REQUEST_URI'];
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
			$userCode = Session::get('traderToken');
			$offerCode = $request->get('unique_id');
			$oCategory = $request->get('o_category');
			$title = $request->get('o_title');
			$actualValue = $request->get('o_actValue');
			$description = $request->get('o_desc');
			$barterType = $request->get('o_barterType');
			$contactBy = $request->get('o_contactBy');
			$postDateTime = strtotime('now');
			$updateDateTime = NULL;
			$expireDateTime = NULL;
        	
        	$rdirUrl = htmlspecialchars($request->get('rdirURL'));

	        $gather_photos = '';
			
			//$this->validate($request, [
	        //    'o_photos' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	        //]);

			if($request->hasFile('o_photos')){
				foreach ($request->o_photos as $photo) {

					$code = $offerCode . '_' .str_random(3) . '-' . rand(1111,9999);
	        		$photoName = $code . '.' . $photo->getClientOriginalExtension();
					
	        		$gather_photos .= $photoName . ' ';

					$destinationPath = public_path('/photos/items/thumbs');
			        $img = Image::make($photo->getRealPath());
			        $img->resize(200, 200, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$photoName);


					$destinationPath = public_path('/photos/items');
	        		$photo->move($destinationPath, $photoName);
				}
			}

			DB::table('bb_list_offer')
				->insert([
					'usercode' => $userCode,
					'offercode' => $offerCode,
					'categoryid' => $oCategory,
					'title' => $title,
					'actual_value' => $actualValue,
					'description' => $description,
					'photos' => trim($gather_photos),
					'barter_type' => $barterType,
					'contactby' => $contactBy,
					'post_datetime' => $postDateTime,
					'update_datetime' => $updateDateTime,
					'expire_datetime' => $expireDateTime
				]);


			for($i = 1; $i <= 3; $i++){
				
				$wCategory = $request->get("w_category_".$i);
				$wTitle = $request->get("w_title_".$i);
				$wAddCash = $request->get("w_addCash_".$i);
				$wantcode = $offerCode . '_' . str_random(3) . '' . rand(111,999);

				if (!empty($wCategory) || !empty($wTitle)) {
				
					DB::table('bb_wanted')
						->insert([  
							'usercode' => $userCode, 
							'offercode' => $offerCode,
							'wantcode' => $wantcode,
							'categoryid' => $wCategory, 
							'title' => $wTitle, 
							'addcash' => $wAddCash, 
							'post_datetime' => $postDateTime, 
							'update_datetime' => $updateDateTime
						]);
				}
			}

			// Check the trader's personal info to see 
			// if their contact info is already saved
			$oTele = $request->get("o_tele");
			$oCountry = $request->get("o_country");
			$oZipCode = $request->get("o_zipcode");
			$oRegion = $request->get("o_region");
			$oCity = $request->get("o_city");

			$checkContactInfo = DB::table('bb_account')
					->select('*')
					->where('usercode','=',$userCode)->first();

			if ($checkContactInfo !== null) {
				// update the traders info with the contact info
				DB::table('bb_account')
					->where('usercode', '=', $userCode)
					->update(
						[
							'tele' => $oTele,
							'city' => '1',//$oCity,
							'region' => '1',//$oRegion,
							'country' => '1',//$oCountry,
							'zipcode' => '1',//$oZipCode
						]
					);
			}
			
			if(!empty($rdirUrl)) {
				if(!session()->has('url.intended')) {
	                session(['url.intended' => url("/" . $rdirUrl)]);
	            }
	            return redirect()->intended();
	            
	        } else {
				// go to "Edit Offer Details" after successfully
				// saving the information in the DB
				return redirect()->route("/trader/offers/listed-offers/details", ["oid" => $offerCode], ["otitle" => $title]);
			}

			/*
			return back()
	        	->with('success','Image Upload successful')
	        	->with('imageName',$photoName);
			*/
	        	
		} else {
			// go to login page
			return redirect()->action("LoginController@showLoginForm", ["rdir=". $fullURL]);
		}
	}
}
