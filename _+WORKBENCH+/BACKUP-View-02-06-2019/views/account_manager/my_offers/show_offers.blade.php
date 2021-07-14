@extends('layouts.app')
	@section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; offer manager</article>

                <section class="page-content-holder">
                    <section class="accman-content fill-page">
                        <h1>My offers</h1>
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
                                    <a href="/trader/offers/details/{{ $offerList->offercode }}/{{ $impTitle }}" id="item-title">{!! $offerList->title !!}</a>
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
                                        // number of offers made with this ad
                                        $getOfferMadeCount = DB::table("bb_make_offer")
                                            ->where("offerid", "=", $offerList->offercode)
                                            ->count();

                                        echo '<a href="/trader/offers/offers-made/details/' . $offerList->offercode . '/' . $impTitle . '" title="Offers Made">
                                            <i class="fa fa-arrow-up fa-rotate-30"></i>
                                        <span>' . $getOfferMadeCount . '</span></a>';


                                        // number of offers received for this ad
                                        $getOfferReceivedCount = DB::table("bb_make_offer")
                                            ->where("offerforid", "=", $offerList->offercode)
                                            ->count();

                                        echo '<a href="/trader/offers/offers-received/details/' . $offerList->offercode . '/' . $impTitle . '" title="Offers Received">
                                            <i class="fa fa-arrow-down fa-rotate-30"></i>
                                         <span>' . $getOfferReceivedCount . '</span></a>';
                                        

                                        // number of views
                                        $getHitsCount = DB::table("bb_offer_views")
                                            ->where("offercode", "=", $offerList->offercode)
                                            ->count();

                                        echo '<a title="Views"><i class="fa fa-eye"></i> <span>'. $getHitsCount . '</span></a>';
                                        ?>
                                        
                                    </div>
                                </article>
                                
                            </section>

                            <article class="item-wanted">
                                <strong>wanted</strong>
                                <?php
                                $cntSpan = 3;
                                $optNo = 1;
                                
                                $getWantedList = DB::table('bb_wanted')
                                ->select('*')
                                ->where("offercode", "=", $offerList->offercode)
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
                                <a href="/trader/offers/details/{{ $offerList->offercode }}/{{ $impTitle }}" class="black-orangeBtn">Details</a>
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