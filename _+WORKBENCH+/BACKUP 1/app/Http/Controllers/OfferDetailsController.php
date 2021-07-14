<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;
use Image;

class OfferDetailsController extends Controller
{
    public function showListOfferForm()
	{
		return view('list_offer/details');
	}


	public function listOffer(Request $request)
	{
		
		$userID = '1';//Session::get('user_token');
		$listDateTime = strtotime('now');
		$itemID = $request->get('unique_id');

		
		//$this->validate($request, [
        //    'o_photos' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //]);
        $gather_photos = '';

		if($request->hasFile('o_photos')){
			foreach ($request->o_photos as $photo) {

				$code = $itemID . '_' .str_random(3) . '-' . rand(1111,9999);
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



		DB::table('list_offers')
			->insert([
				'itemid' => $itemID,
				'userid' => $userID,
				'title' => $request->get('o_title'),
				'description' => $request->get('o_description'),
				'category' => $request->get('o_category'),
				//'subcategory' => ,
				'actual_value' => $request->get('o_actValue'),
				'photos' => trim($gather_photos),
				'barter_type' => $request->get('o_barterType'),
				'contact_medium' => $request->get('o_contactMedium'),
				'list_datetime' => $listDateTime,
				'update_datetime' => $listDateTime
			]);


		for($i = 1; $i <= 3; $i++){
			
			$category = $request->get("w_category_".$i);
			$title = $request->get("w_title_".$i);
			$desc = $request->get("w_description_".$i);

			if (!empty($category) || !empty($title) || !empty($disc)) {
			
				DB::table('wanted_items')
					->insert([ 
						'itemid' => $itemID, 
						'userid' => $userID, 
						'title' => $title, 
						//'cash_opt' => , 
						'category' => $category, 
						//'subcategory' => , 
						'description' => $desc,
						'list_datetime' => $listDateTime, 
						'update_datetime' => $listDateTime
					]);

			}
		}

		return back()
        	->with('success','Image Upload successful')
        	->with('imageName',$photoName);

	}
}
