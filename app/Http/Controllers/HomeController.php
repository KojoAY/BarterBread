<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getListLatestOffers = DB::table("bb_list_offer")
            ->select("*")
            ->orderby("id", "desc")
            ->paginate(6);

        $getMainCategories = DB::table("bb_main_categories")
            ->select("*")
            //->orderby("id", "desc")
            //->paginate(8);
            ->get();

        $data = array(
            "getListLatestOffers" => $getListLatestOffers,
            "getMainCategories" => $getMainCategories,
            "pageTitle" => config('app.name', 'BarterBread') . " - Swap or Barter, Buy and Sell Products and Services"
        );



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


        return view('welcome')->with($data);
        //return view('welcome');
    }
}
