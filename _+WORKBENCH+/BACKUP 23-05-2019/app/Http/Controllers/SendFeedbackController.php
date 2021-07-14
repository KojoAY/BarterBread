<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class SendFeedbackController extends Controller
{
    //
    public function sendFeedback(Request $request){
    	$senderName = $request->get("fbName");
    	$senderEmail = $request->get("fbEmail");
    	$senderTele = $request->get("fbTele");
    	$senderMsg = $request->get("fbMsg");

    	//
    }
}
