<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
	public function index(){
		$data = array(
			"pageTitle" => "Support Center - " . config('app.name', 'BarterBread')
		);

		return view('bb_info_center/support_center')->with($data);
	}
	

	public function saveFeedback(Request $request){
		DB::table('bb_feedback')
			->insert([
				't_name' => $request->get('fbName'),
				't_email' => $request->get('fbEmail'),
				't_tele' => $request->get('fbTele'),
				't_message' => $request->get('fbMsg'),
				't_checked' => '0'
			]);

		return view('bb_info_center/support_center')
    		->with("pageTitle", "Contact Us - " . config('app.name', 'BarterBread'));
	}

    
    public function sendFeedback(Request $request){
    	$senderName = $request->get("fbName");
    	$senderEmail = $request->get("fbEmail");
    	$senderTele = $request->get("fbTele");
    	$senderMsg = $request->get("fbMsg");

    	//
    }
}
