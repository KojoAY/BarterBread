@extends('layouts.app')
    @section('content')
            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; <a href="{{ url('/trader/offers') }}">my offers</a> &map; {{ strtolower($getOfferDetails->title) }}</article>
                <section class="list-block">

                    <h1 id="title">My offer details</h1>
                    <section class="page-content-holder">
                        <nav class="accman-menu">
                            <section class="menu-items">
                                <a href="/trader/offers" class="blueBtn">
                                    <i class="fa fa-th-list"></i>
                                    My Offers
                                </a>
                            </section>

                            <ul class="offer-list-sum">
                                @foreach($getOfferList as $offerList)
                                <li>
                                    <section>
                                    <?php
                                    $photosArr = explode(' ', $offerList->photos);
                                    echo '<article id="item-photo" style="background-image: url(/photos/items/thumbs/' . $photosArr[0] . ')"></article>';
                                    ?>
                                    </section>

                                    <section class="item-desc">
                                        
                                        <article class="item-title-loc">
                                            <?php
                                        $expTitle = explode(' ', $offerList->title);
                                        $impTitle = implode('-', $expTitle);
                                        ?>
                                            <a href="/trader/offers/details/{{ $offerList->offercode }}/{{ $impTitle }}" id="item-title">{!! $offerList->title !!}</a>
                                            <div id="item-loc">
                                                <!--i class="fa fa-calculator"></i--> 
                                                <?php
                                                /*$categId = $offerList->categoryid;
                                                $getMainCategById = DB::table("bb_main_categories")
                                                    ->select("*")->where("id", "=", $categId)->first();

                                                echo $getMainCategById->category_name;*/
                                                ?>
                                                  
                                                <span id="actVal">GH&cent;{!! number_format($offerList->actual_value, 2) !!}</span>
                                            </div>
                                            
                                            <!--div class="offerStat">
                                                <a href="#suggested-offers">OFFERS <span>0</span></a>
                                                <a>HITS <span>0</span></a>
                                            </div-->
                                        </article>
                                        
                                        <article class="manage-btn">
                                            <!--a href="/trader/offers/details/{{ $getOfferDetails->offercode }}/{{ $impTitle }}" class="black-orangeBtn">Details</a-->
                                            <a href="/trader/offers/edit/{!! $getOfferDetails->offercode !!}/{!! $impTitle !!}" class="black-orangeBtn">Edit</a>
                                            <span class="toRight">
                                                <a href="/trader/offers/del/{!! $getOfferDetails->offercode !!}/{!! $impTitle !!}" class="blueBtn">Delete</a>
                                            </span>
                                        </article>
                                    </section>

                                </li>
                                @endforeach
                            </ul>
                            
                        </nav>

                        <section class="accman-content">
                            <ul class="details-ul">
                                <li class="left-col">
                                    <h2 id="main-title">{{ $getOfferDetails->title }}
                                    <sup>Closed</sup></h2>
                                    

                                    <article class="details-list-date">
                                        <?php
                                        $getTradersLocation = DB::table("bb_account")
                                            ->select("*")
                                            ->where("usercode", "=", $getOfferDetails->usercode)
                                            ->first();
                                        ?>
                                        <strong>Listed By </strong> 
                                        {{ $getTradersLocation->fname . " " . $getTradersLocation->lname }}
                                        <br>
                                        <strong>On:</strong>
                                        {{ date('l, F d, Y h:ia', $getOfferDetails->post_datetime) }}
                                        |
                                        <!--i class="fa fa-map-marker"></i--> 
                                        {{ $getTradersLocation->city . ", " . $getTradersLocation->region . ", " . $getTradersLocation->country }}
                                         
                                    </article>
                                    <?php
                                    $photosArr = explode(' ', $getOfferDetails->photos);
                                    echo '<article class="offer-pics" style="background-image: url(/photos/items/' . $photosArr[0] . ')"></article>';

                                    $cntPhoto = 0;
                                    ?>
                                    <article class="details-thumbs">
                                    @foreach($photosArr as $photo)
                                    <a id="offPhoto{{ $cntPhoto }}" onclick="getPhoto(this.id)">
                                        <img src="/photos/items/thumbs/{{ $photo }}" photoName="{{ $cntPhoto }}">
                                    </a>
                                    <?php $cntPhoto++;?>
                                    @endforeach
                                    </article>

                                    <article class="details-desc">
                                        <h2 id="cap">description</h2>
                                        {{ $getOfferDetails->description }}
                                    </article>

                                    <article class="details-actual-value">
                                        <h2>Value <i class="fa fa-caret-right"></i></h2>
                                        <div id="val">GH&cent;<?php echo number_format($getOfferDetails->actual_value, 2);?></div>
                                    </article>
                                    
                                    <article class="stats">
                                        <span><i class="fa fa-eye"></i><sub>{{ $getHitsCount }}</sub></span>
                                        <span id="share"><a class="fa fa-share-alt"></a></span>
                                    </article>

                                    <article class="item-wanted" id="make-offer">
                                        <strong>wanted</strong>
                                        <?php
                                        $cntSpan = 3;
                                        $optNo = 1;

                                        $getWantedList = DB::table('bb_wanted')
                                        ->select('*')
                                        ->where("offercode", "=", $getOfferDetails->offercode)
                                        ->get();
                                        
                                        foreach ($getWantedList as $wantedList){
                                            echo '<span>' . $wantedList->title;
                                            echo ($wantedList->addcash != NULL)
                                                ? ' + GH&cent;' . number_format($wantedList->addcash, 2) . ' <em title="plus cash amount">+&cent;</em>'
                                                : '';
                                            echo '</span>';
                                            
                                            $cntSpan--;
                                            $optNo++;
                                        }

                                        for($i = 0; $i < $cntSpan; $i++, $optNo++){
                                            echo '<span class="no-opt">NO OPTION ' . ($optNo) . '</span>';
                                        }
                                        ?>
                                    </article>

                                    <article class="myOfferList">
                                        @if(Session::has("traderToken"))
                                        {{ "" }}
                                        @else
                                        <h1>Make an Offer</h1>
                                        @endif

                                    <?php
                                    $lastURL = $_SERVER['REQUEST_URI'];
                                    $linkLength = (strlen($lastURL) - 1);
                                    $fullURL = substr($lastURL, -$linkLength);
                                    $fullURL .= "#make-offer";
                                    ?>

                                    <form action="/offers/details/{{ $fullURL }}" method="post" enctype="" class="makeOfferFrm">
                                    
                                    <?php
                                    $expOfferTitle = explode(" ", $getOfferDetails->title);
                                    $impOfferTitle = implode("-", $expOfferTitle);
                                    ?>

                                    @if(Session::has("traderToken"))
                                        @if($getOfferDetails->usercode == Session::get("traderToken"))
                                        <label style="text-align: center; padding: 20px 0;">
                                            <a href="/trader/offers/edit/{!! $getOfferDetails->offercode !!}/{!! $impOfferTitle !!}" class="black-orangeBtn" style="margin: 0 10px; padding: 10px 30px;">Edit Offer</a>

                                            <a href="/trader/offers/del/{!! $getOfferDetails->offercode !!}/{!! $impOfferTitle !!}" class="blueBtn" style="margin: 0 10px; padding: 0px 0px;">Delete Offer</a>
                                            
                                        </label>

                                        @else
                                            @if($countTradersOfferList == 0)
                                            <label style="text-align: center; padding: 20px 0;">
                                                Upload your offer details.<br> <a href="/list-offer?rdir={{ $fullURL }}" class="orange-blackBtn">List Offer</a>
                                            </label>

                                            @else
                                            <em id="cap">Select an offer from your offer list.</em>
                                            @foreach($getTradersOfferList as $traderOfferList)
                                            <label>
                                                <input type="checkbox" name="wantedOpt[]">
                                                <?php
                                                $photosArr = explode(' ', $traderOfferList->photos);
                                                echo '<article class="offer-pics" style="background-image: url(/photos/items/thumbs/' . $photosArr[0] . ')"></article>';
                                                ?>
                                                <span>
                                                    <h3>{{ $traderOfferList->title }}</h3>
                                                </span>
                                            </label>

                                            <textarea placeholder="Additional Infomation" name="wantedAddInfo[]"></textarea>

                                            <input type="hidden" name="offerCode[]" value="{{ $traderOfferList->offercode }}">

                                            @endforeach

                                                @if(Session::has("traderToken"))
                                                <button>
                                                    Edit
                                                </button>
                                                <button>
                                                    Delete
                                                </button>
                                                @else
                                                <button>
                                                    Make Offer
                                                </button>
                                                @endif
                                            <input type="hidden" name="offerForCode" value="{{ $getOfferDetails->offercode }}">
                                            <input type="hidden" name="rdirUrl" value="{{ $fullURL }}">
                                            @endif


                                            <?php
                                            /*
                                            $teleNo = $getTradersLocation->tele;
                                            $zipCode = $getTradersLocation->zipcode;
                                            $isZero = substr($teleNo, 0, 1);
                                            
                                            
                                            <!--article class="trader-contact">
                                            
                                                <h3>Trader's Contact No.:</h3> 
                                                <h1>
                                                    {{ ($isZero == 0) ? $zipCode . substr($teleNo, 1) : $zipCode . $teleNo }}
                                                </h1>
                                            </article-->*/
                                            ?>
                                        @endif
                                    @else

                                        <label style="padding: 10px 0; text-align: center;">
                                            <a href="/trader/login?rdir={{ $fullURL }}" class="orange-blackBtn">Login</a> to make an offer!
                                        </label>
                                        
                                    @endif
                                    </form>

                                    </article>
                                </li>
                            </ul>
                        </section>
                    </section>

                    
                </section>
            </section>

    @endsection