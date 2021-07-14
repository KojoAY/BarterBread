@extends('layouts.app')
	@section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; my offers &map; offers made &map; {{ strtolower($getOfferDetails->title) }}</article>

                <h1>offers made</h1>
                <section class="page-content-holder">
                    <nav class="accman-menu">
                        <section class="menu-items">
                            <a href="/trader/offers" class="blueBtn">
                                <i class="fa fa-th-list"></i>
                                My Offers
                            </a>
                        </section>

                        <ul class="offer-list-sum">
                           
                            <li>
                                <?php
                                $expTitle = explode(' ', $getOfferDetails->title);
                                $impTitle = implode('-', $expTitle);
                                ?>
                                <section class="item-photo-holder">
                                <?php
                                $photosArr = explode(' ', $getOfferDetails->photos);
                                echo '<article id="item-photo" style="background-image: url(/photos/items/thumbs/' . $photosArr[0] . ')"></article>';
                                ?>
                                </section>

                                <section class="item-desc">
                                    
                                    <article class="item-title-loc">
                                        <a href="/trader/offers/listed-offers/details/{{ $getOfferDetails->offercode }}/{{ $impTitle }}" id="item-title">{!! $getOfferDetails->title !!}</a>
                                        <div id="item-loc">
                                        <?php
                                        $categId = $getOfferDetails->categoryid;
                                        $getMainCategById = DB::table("bb_main_categories")
                                            ->select("*")->where("category_code", "=", $categId)->first();

                                        echo $getMainCategById->category_name;
                                        ?>
                                              
                                        </div>
                                        <span id="actVal">GH&cent;{!! number_format($getOfferDetails->actual_value, 2) !!}</span>

                                        <div class="offerStat">
                                        <?php
                                        // number of offers made with this ad
                                        $getOfferMadeCount = DB::table("bb_make_offer")
                                            ->where("offerid", "=", $getOfferDetails->offercode)
                                            ->count();

                                        echo '<a href="/trader/offers/offers-made/details/' . $getOfferDetails->offercode . '/' . $impTitle . '" title="Offers Made">
                                            <i class="fa fa-arrow-up fa-rotate-30"></i>
                                            <span>' . $getOfferMadeCount . '</span></a>';


                                        // number of offers received for this ad
                                        $getOfferReceivedCount = DB::table("bb_make_offer")
                                            ->where("offerforid", "=", $getOfferDetails->offercode)
                                            ->count();

                                        echo '<a href="/trader/offers/offers-received/details/' . $getOfferDetails->offercode . '/' . $impTitle . '" title="Offers Received">
                                            <i class="fa fa-arrow-down fa-rotate-30"></i>
                                            <span>' . $getOfferReceivedCount . '</span></a>';
                                        

                                        // number of views
                                        $getHitsCount = DB::table("bb_offer_views")
                                            ->where("offercode", "=", $getOfferDetails->offercode)
                                            ->count();

                                        echo '<a title="Views"><i class="fa fa-eye"></i> <span>'. $getHitsCount . '</span></a>';
                                        ?>
                                        </div>
                                    </article>

                                </section>

                                <!--section class="details-desc">
                                    <h2 id="cap">description</h2>
                                    {{ $getOfferDetails->description }}
                                </section-->

                                <article class="item-wanted">
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

                                <article class="manage-btn">
                                    <a href="/trader/offers/details/{{ $getOfferDetails->offercode }}/{{ $impTitle }}" class="black-orangeBtn">Details</a>
                                    <a href="/trader/offers/edit/{!! $getOfferDetails->offercode !!}/{!! $impTitle !!}" class="black-orangeBtn">Edit</a>
                                    <span class="toRight">
                                        <a href="/trader/offers/del/{!! $getOfferDetails->offercode !!}/{!! $impTitle !!}" class="blueBtn">Delete</a>
                                    </span>
                                </article>
                            </li>
                        </ul>
                        
                    </nav>

                    <section class="accman-content">
                        <h2>offers list</h2>
                        <ul class="man-offer-made-rece-list">
                            <?php $cntOM = 0; ?>
                            @foreach($getOffersMade as $offerMade)
                            <li>
                                <?php
                                $getOffersMadeByOfferID = DB::table("bb_list_offer")
                                    ->select("*")
                                    ->where("offercode", "=", $offerMade->offerforid)
                                    ->first();

                                $photosArr = explode(' ', $getOffersMadeByOfferID->photos);
                                echo '
                                <article class="pic-holder" style="background-image: url(/photos/items/thumbs/' . $photosArr[0] . ')"></article>';
                                ?>
                                <article>
                                    <h3>{{ $getOffersMadeByOfferID->title }}</h3>
                                    <a id="trader-info">
                                        <article>
                                            <?php
                                            $getTraderPersonalInfo = DB::table("bb_account")
                                                ->select("*")
                                                ->where("usercode", "=", $offerMade->offererid)
                                                ->first();
                                            ?>
                                            <h4>{{ $getTraderPersonalInfo->fname . " " . $getTraderPersonalInfo->lname}}</h4>

                                            <?php
                                            $getCountOffersByTrader = DB::table("bb_list_offer")
                                                ->where("usercode", "=", $offerMade->offererid)
                                                ->count();
                                            ?>
                                            <span>
                                                {{ ($getCountOffersByTrader == 1 ) ? $getCountOffersByTrader . " " . "Offer" : $getCountOffersByTrader . " " . "Offers" }} 
                                            </span>
                                        </article>
                                    </a>
                                </article>
                                <?php
                                $expTitle = explode(" ", $getOffersMadeByOfferID->title);
                                $impTitle = implode("-", $expTitle);
                                ?>
                                <a href="/offers/details/{{ $offerMade->offerid . "_" . $impTitle }}" id="details-btn">Details</a>
                            </li>
                            <?php $cntOM++; ?>
                            @endforeach

                            {!! ($cntOM == 0) ? "<li><article style=\"text-align: center; margin-top: 10%;\">No offers made yet.</article></li>" : "" !!}

                        </ul>
                        {!! $getOffersMade->render() !!}
                    </section>
                </section>
            </section>
	@endsection