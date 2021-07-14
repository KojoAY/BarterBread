<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class OfferListController extends Controller
{
    //
    public function index(){
        $getOfferList = DB::table("bb_list_offer")
            ->select("*")
            ->orderby("id", "desc")
            ->paginate(30);


        $data = array(
            "getOfferList" => $getOfferList
        );

        return view("offer_list/list_all")->with($data);
    }


    public function showListByCategory($categ){
    	// 
    	$expCategCode = explode('_', $categ);
    	$getCategCode = $expCategCode[0];

    	$getListByCategory = DB::table("bb_list_offer")
    		->select("*")
    		->where("categoryid", "=", $getCategCode)
    		->orderby("id", "desc")
    		->paginate(30);

    	$getMainCategById = DB::table("bb_main_categories")
            ->select("*")->where("category_code", "=", $getCategCode)->first();

    	$data = array(
    		"getListByCategory" => $getListByCategory,
    		"getMainCategById" => $getMainCategById
    	);

    	return view("offer_list/list_by_category")->with($data);
    }


    public function showOfferDetails($ref){
    	//
    	$expCategCode = explode('_', $ref);
    	$getCategCode = $expCategCode[0];
        $hitDateTime = strtotime("now");
        $viewerIP = $_SERVER['REMOTE_ADDR'];

        $checkUserAlreadyViewed = DB::table('bb_offer_views')
                ->select('*')
                ->where([
                    ["viewerip", "=", $viewerIP],
                    ["offercode", "=", $getCategCode]
                ])
                ->first();

        if($checkUserAlreadyViewed === null){
            $saveHitsCount = DB::table("bb_offer_views")
                ->insert(
                    [
                        "offercode" => $getCategCode,
                        "viewerid" => '',
                        "viewerip" => $viewerIP,
                        "view_datetime" => $hitDateTime
                    ]
                );
        }


    	$getOfferDetails = DB::table("bb_list_offer")
    		->select("*")
    		->where("offercode", "=", $getCategCode)
    		->first();


    	$getMainCategById = DB::table("bb_main_categories")
            ->select("*")->where("category_code", "=", $getOfferDetails->categoryid)->first();


        $getHitsCount = DB::table("bb_offer_views")
            ->where("offercode", "=", $getCategCode)
            ->count();


        /*
        - if the user is logged in and has offer records, show them
        - if the user is logged in and doesn't have any records show "You have to upload an offer first"
        - if the user is not logged in, show the login form. Loggin and return to the details page
            - similar for the unregistered members
        */ 

        $traderToken = Session::get("traderToken");

        $getTradersOfferList = DB::table("bb_list_offer")
            ->select("*")
            ->where("usercode", "=", $traderToken)
            ->get();

        $countTradersOfferList = DB::table("bb_list_offer")
            ->where("usercode", "=", $traderToken)
            ->count();

        /*
        get the list of offers made by offerforid
        */
        $getOffersMade = DB::table("bb_make_offer")
            ->select("*")
            ->where("offerforid", "=", $getCategCode)
            ->paginate(5);



    	$data = array(
    		"getOfferDetails" => $getOfferDetails,
    		"getMainCategById" => $getMainCategById,
            "getTradersOfferList" => $getTradersOfferList,
            "countTradersOfferList" => $countTradersOfferList,
            "getCategCode" => $getCategCode,
            "getHitsCount" => $getHitsCount,
            "getOffersMade" => $getOffersMade
    	);

    	return view('offer_list/details')->with($data);
    }
}
