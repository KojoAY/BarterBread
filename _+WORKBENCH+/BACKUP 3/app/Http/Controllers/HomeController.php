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
            ->get();

        $data = array(
            "getListLatestOffers" => $getListLatestOffers,
            "getMainCategories" => $getMainCategories
        );

        return view('welcome')->with($data);
    }
}
