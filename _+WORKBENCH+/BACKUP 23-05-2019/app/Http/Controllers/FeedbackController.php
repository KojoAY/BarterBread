<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
	public function index(){
		return view('support/support_center');
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

		return view('support/support_center');
	}

    
    public function sendFeedback(Request $request){
    	$senderName = $request->get("fbName");
    	$senderEmail = $request->get("fbEmail");
    	$senderTele = $request->get("fbTele");
    	$senderMsg = $request->get("fbMsg");

    	//
    }
}
