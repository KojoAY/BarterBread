@extends('layouts.app')
        @section('content')
            
            <section class="featured-ads">
                <img src="{{ asset('images/banner.jpg') }}" width="100%">
            </section>
            
            <section class="home-feat-categ">
                <!--h1>Categories</h1-->
                
                <ul>
                    @foreach ($getMainCategories as $mainCateg)

                    <?php
                    $expName = explode(" ", $mainCateg->category_name);
                    $impName = implode("-", $expName);

                    $expNameWithAmp = explode('&amp;', $impName);
                    $impNameWithAmp = implode('and', $expNameWithAmp);
                    ?>
                    <li>
                        <i class="fas fa-{{ $mainCateg->category_icon }} fa-fw"></i><br>
                        <a href="/offers/{{ $mainCateg->category_code }}_{{ strtolower($impNameWithAmp) }}">{{ $mainCateg->category_name }}</a> 
                        <span>
                        <?php
                        $countMainCategory = DB::table("bb_list_offer")
                            ->where("categoryid", "=", $mainCateg->category_code)
                            ->count();

                        echo "<sup>[" . $countMainCategory . "]</sup>";

                        ?>
                        </span>
                    </li>
                    @endforeach
                    <li class="all-offers">
                        <a href="/offers">
                            <?php
                            $countAllOffers = DB::table("bb_list_offer")
                                ->count();

                            echo "Browse All <div>" . $countAllOffers . "</div> Offers";

                            ?>
                        </a>
                    </li>
                </ul>
            </section>

            <!--section class="howto-1">
                Find what you want <i class="fa fa-angle-double-right"></i> Make an offer <i class="fa fa-angle-double-right"></i> Barter!
            </section>

            <section class="on-page-post-advert">
                <h2>
                    Find what you want <i class="fa fa-angle-double-right"></i> Make an offer <i class="fa fa-angle-double-right"></i> Barter!
                </h2>

                <a href="/offers">Start Here!</a>
            </section-->

            <section class="home-featured-list">
                <h1>Recently Added</h1>
                <ul class="list-ul">
                    @foreach($getListLatestOffers as $listLatestOffer)
                    <li>
                        <section class="photo">
                            <?php
                            $photosArr = explode(' ', $listLatestOffer->photos);
                            echo '<a href="/offers/details/{{ $listLatestOffer->offercode }}_{{ strtolower($impNameWithAmp) }}" id="item-title">
                                <article id="item-photo" style="background-image: url(/photos/items/thumbs/' . $photosArr[0] . ')"></article>
                            </a>';
                            ?>
                        </section>

                        <section class="item-desc">
                            
                            <article class="item-title-loc">
                                <?php
                                $categId = $listLatestOffer->categoryid;
                                $getMainCategById = DB::table("bb_main_categories")
                                    ->select("*")->where("category_code", "=", $categId)->first();

                                $expName = explode(" ", $listLatestOffer->title);
                                $impName = implode("-", $expName);

                                $expNameWithAmp = explode('&amp;', $impName);
                                $impNameWithAmp = implode('and', $expNameWithAmp);
                                ?>
                                <a href="/offers/details/{{ $listLatestOffer->offercode }}_{{ strtolower($impNameWithAmp) }}" id="item-title">{{ $listLatestOffer->title }}</a>
                                <div id="item-loc">
                                    Tema | {{ $getMainCategById->category_name }}
                                </div>

                                <div id="actVal">
                                    GH&cent;<?php echo number_format($listLatestOffer->actual_value, 2);?>
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
                            ->where("offercode", "=", $listLatestOffer->offercode)
                            ->get();
                            
                            foreach ($getWantedList as $wantedList){
                                echo '<span>' . $wantedList->title;
                                echo ($wantedList->addcash != NULL)
                                    ? ' + GH&cent;' . $wantedList->addcash . ' <em title="plus chash amount">+&cent;</em>'
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
            </section>

            <section class="on-page-post-advert">
                <h2>Have any Product/Service to Barter?</h2>
                <h1>Get Started!</h1>
                <a href="/list-offer">List Offer</a>
            </section>

        @endsection