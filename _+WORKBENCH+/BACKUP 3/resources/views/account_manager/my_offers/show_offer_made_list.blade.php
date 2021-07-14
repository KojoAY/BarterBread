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
                        
                    </nav>
                    <!--h1>About Batabred</h1-->

                    <section class="accman-content">
                        <h1>offers made</h1>
                        <ul class="list-ul">

                        @foreach ($getOfferList as $offerList)
                            
                            <li>
                            <section class="photo">
                                <!--article id="item-photo"></article-->
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
                                    <a href="/trader/offers/offers-made/details/{{ $offerList->offercode }}/{{ $impTitle }}" id="item-title">{!! $offerList->title !!}</a>
                                    <div id="item-loc">
                                        <?php
                                        $categId = $offerList->categoryid;
                                        $getMainCategById = DB::table("bb_main_categories")
                                            ->select("*")->where("category_code", "=", $categId)->first();

                                        echo $getMainCategById->category_name;
                                        ?>
                                    </div>

                                    <div class="offerStat">
                                        <?php
                                        $getOfferCount = DB::table("bb_make_offer")
                                            ->where("offerid", "=", $offerList->offercode)
                                            ->count();

                                        echo '<a href="/trader/offers/offers-made/details/' . $offerList->offercode . '/' . $impTitle . '">OFFERS MADE <span>' . $getOfferCount . '</span></a>';
                                        
                                        ?>
                                        
                                    </div>
                                </article>
                                
                            </section>

                            
                            <article class="manage-btn">
                                <a href="/trader/offers/offers-made/details/{{ $offerList->offercode }}/{{ $impTitle }}" class="black-orangeBtn">Details</a>
                                <a href="/trader/offers/edit/{!! $offerList->offercode !!}/{!! $impTitle !!}" class="black-orangeBtn">Edit</a>
                                <span class="toRight">
                                    <a href="/trader/offers/del/{!! $offerList->offercode !!}/{!! $impTitle !!}" class="blueBtn">Delete</a>
                                </span>
                            </article>
                        </li>
                        @endforeach
                    </ul>
                        
                    {!! $getOfferList->render() !!}
                    </section>
                </section>
            </section>
	@endsection