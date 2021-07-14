<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;

class SearchResultsController extends Controller
{
    //
    public function showSearchResults(){

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
    	$keyword = $_GET['of'];

    	$getSearchResults = DB::table("bb_list_offer")
    		->select("*")
    		->where([
    			["title", "LIKE", "%$keyword%"]//,
    			//["description", "LIKE", "%$keyword%"]
    		])
    		->orderby("id", "desc")
    		->paginate(30);


    	DB::table("bb_search_keywords")
    		->insert([
    			"keyword" => $keyword
    		]);



    	$data = array(
    		"getSearchResults" => $getSearchResults//,
    		//"getMainCategById" => $getMainCategById
    	);

    	return view("offer_list/search_results")->with($data);
    }
}
