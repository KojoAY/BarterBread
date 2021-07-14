@extends('layouts.app')
    @section('content')
            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; available offers</article>
                <section class="list-block">
                    
                    <h1 id="title">Available Offers</h1>

                    @if($getOfferList->count() == 0)
                        <article style="text-align: center; padding: 20px 0;">
                            Sorry, no offers at this time. Be the first to <a href="{{ url('/listoffer') }}">List an Offer</a>!
                        </article>
                    @else

                    <ul class="list-ul">
                        @foreach($getOfferList as $offerList)
                        <li>
                            <section class="photo">
                                <?php
                                $photosArr = explode(' ', $offerList->photos);
                                echo '<article id="item-photo" style="background-image: url(/photos/items/thumbs/' . $photosArr[0] . ')"></article>';
                                ?>
                            </section>

                            <section class="item-desc">
                                
                                <article class="item-title-loc">
                                    <?php
                                    $categId = $offerList->categoryid;
                                    $getMainCategById = DB::table("bb_main_categories")
                                        ->select("*")->where("category_code", "=", $categId)->first();

                                    $expName = explode(" ", $offerList->title);
                                    $impName = implode("-", $expName);

                                    $expNameWithAmp = explode('&amp;', $impName);
                                    $impNameWithAmp = implode('and', $expNameWithAmp);
                                    ?>
                                    <a href="/offers/details/{{ $offerList->offercode }}_{{ strtolower($impNameWithAmp) }}" id="item-title">{{ $offerList->title }}</a>
                                    <div id="item-loc"> 
                                        <?php
                                        $getTradersLocation = DB::table("bb_account")
                                            ->select("*")
                                            ->where("usercode", "=", $offerList->usercode)
                                            ->first();

                                        echo $getTradersLocation->city;
                                        ?> | {{ $getMainCategById->category_name }}
                                    </div>

                                    <div id="actVal">
                                        GH&cent;<?php echo number_format($offerList->actual_value, 2);?>
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
                        </li>@endforeach<!--
                        -->
                    </ul>
                    {!! $getOfferList->render() !!}
                    @endif
                </section>
            </section>

            <section class="on-page-post-advert">
                <h2>Do you have anything product or service to barter?</h2>
                <h1>Start Trading!</h1>
                <a href="{{ url('/listoffer') }}">List Offer</a>
            </section>

    @endsection