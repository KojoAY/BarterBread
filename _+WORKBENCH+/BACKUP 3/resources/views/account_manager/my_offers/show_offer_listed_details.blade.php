@extends('layouts.app')
	@section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; offer manager</article>

                <section class="page-content-holder">
                    <nav class="accman-menu">
                        <section class="menu-items">
                            <a href="/trader/offers" class="blueBtn">
                                <!--i class="fa fa-arrow-right"></i-->
                                Offer Dashboard
                            </a>

                            <a href="/trader/offers/listed-offers" class="blueBtn">
                                <!--i class="fa fa-arrow-right"></i-->
                                Offer List
                            </a>

                            <a href="/trader/offers/offers-made" class="blueBtn">
                                <!--i class="fa fa-arrow-left"></i-->
                                Offer Made
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
                                        <a href="/trader/offers/listed-offers/details/{{ $offerList->offercode }}/{{ $impTitle }}" id="item-title">{!! $offerList->title !!}</a>
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
                                    
                                </section>
                            </li>
                            @endforeach
                        </ul>
                        
                    </nav>
                    <!--h1>About Batabred</h1-->

                    <section class="accman-content">
                        <h1>my offers details</h1>
                        <?php
                        $expTitle = explode(' ', $getOfferDetails->title);
                        $impTitle = implode('-', $expTitle);
                        ?>
                        <section class="myOfferDetails">
                            <section class="photo">

                            <?php
                            $photosArr = explode(' ', $getOfferDetails->photos);
                            echo '<article id="item-photo" style="background-image: url(/photos/items/thumbs/' . $photosArr[0] . ')"></article>';
                            ?>
                                
                            </section>

                            <section class="item-desc">
                                
                                <article class="item-title-loc">
                                    <h1>{!! $getOfferDetails->title !!}</h1>
                                    <div id="item-loc">
                                        <i class="fa fa-calculator"></i> 
                                        <?php
                                        $categId = $getOfferDetails->categoryid;
                                        $getMainCategById = DB::table("bb_main_categories")
                                            ->select("*")->where("category_code", "=", $categId)->first();

                                        echo $getMainCategById->category_name;
                                        ?>
                                         | 
                                        <span id="actVal">GH&cent;{!! number_format($getOfferDetails->actual_value, 2) !!}</span>
                                    </div>

                                    <div class="offerStat">
                                        <?php
                                        echo '<a href="#received-offers">OFFERS <span>0</span></a>';
                                        $getHitsCount = DB::table("bb_offer_views")
                                            ->where("offercode", "=", $getOfferDetails->offercode)
                                            ->count();

                                        echo '<a>HITS <span>'. $getHitsCount . '</span></a>';
                                        ?>
                                    </div>
                                </article>
                                
                            </section>

                            <article class="item-wanted">
                                <strong>wanted</strong>
                                <?php
                                $cntSpan = 3;
                                $optNo = 1;
                                ?>

                                @foreach ($getWantedList as $wantedList)
                                <span>
                                    {!! $wantedList->title !!}
                                    @if ($wantedList->addcash != NULL)
                                        + GH&cent;{!! number_format($wantedList->addcash, 2) !!} <em title="plus cash amount">+&cent;</em>
                                    @endif
                                </span>
                                <?php
                                $cntSpan--;
                                $optNo++;
                                ?>
                                @endforeach
                                @for($i = 0; $i < $cntSpan; $i++, $optNo++)
                                    <span class="no-opt">NO OPTION {{ ($optNo) }}</span>
                                @endfor
                            </article>

                            <article class="manage-btn">
                                <a href="/trader/offers/edit/{!! $getOfferDetails->offercode !!}/{!! $impTitle !!}" class="black-orangeBtn">Edit</a>
                                <span class="toRight">
                                    <a href="/trader/offers/del/{!! $getOfferDetails->offercode !!}/{!! $impTitle !!}" class="blueBtn">Delete</a>
                                </span>
                            </article>
                        </section>
                        

                        <section class="wantedOfferList" id="received-offers">
                            <h1>Received Offers</h1>
                            
                            <section class="wantedHolder">
                                <section class="photo">
                                    <div id="item-photo"></div>
                                </section>

                                <section class="item-desc">
                                    
                                    <article class="item-title-loc">
                                        <a id="item-title">Gorgeous 1/2 Acre Lot near Liberty Mountain Ski & Golf Resort</a>
                                        <div id="item-loc">
                                            <i class="fa fa-calculator"></i> Electronics | 
                                            <i class="fa fa-map-marker"></i> Kasoa
                                        </div>

                                        <div id="actVal">
                                            GH&cent;<?php echo number_format("3500", 2);?>
                                        </div>
                                    </article>
                                </section>

                                <article class="manage-btn">
                                    <a href="/trader/offers/listed-offers/details/{{ $offerList->offercode }}/{{ $impTitle }}" class="black-orangeBtn">Details</a>

                                    <span class="toRight">
                                        <a href="/trader/offers/del/{!! $offerList->offercode !!}/{!! $impTitle !!}" class="blueBtn">Remove</a>
                                    </span>
                                </article>
                            </section>

                        </section>

                    </section>
                </section>
            </section>
	@endsection