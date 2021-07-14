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
                        <a href="/offers/{{ $mainCateg->category_code }}_{{ strtolower($impNameWithAmp) }}">
                            <i class="fas fa-{{ $mainCateg->category_icon }} fa-fw"></i><br>
                            {{ $mainCateg->category_name }}
                        </a> 
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
                    @if($getListLatestOffers->count() == 0)
                        <article style="text-align: center; padding: 20px 0;">
                            Sorry, no offers at this time. Be the first to <a href="{{ url('/listoffer') }}" class="blueBtn">List an Offer</a>!
                        </article>
                    @else
                    @foreach($getListLatestOffers as $listLatestOffer)

                    <?php
                    $categId = $listLatestOffer->categoryid;
                    $getMainCategById = DB::table("bb_main_categories")
                        ->select("*")->where("category_code", "=", $categId)->first();

                    $expName = explode(" ", $listLatestOffer->title);
                    $impName = implode("-", $expName);

                    $expNameWithAmp = explode('&amp;', $impName);
                    $impNameWithAmp = implode('and', $expNameWithAmp);
                    

                    $link = $listLatestOffer->offercode . "_" . strtolower($impNameWithAmp);
                    ?>
                    <li>
                        <section class="photo">
                            <?php
                            $photosArr = explode(' ', $listLatestOffer->photos);
                            ?>
                            <a href="/offers/details/{{ $link }}" id="item-title">
                                <article id="item-photo" style="background-image: url(/photos/items/thumbs/{{ $photosArr[0] }})"></article>
                            </a>
                            
                        </section>

                        <section class="item-desc">
                            
                            <article class="item-title-loc">
                                <a href="/offers/details/{{ $link }}" id="item-title">{{ $listLatestOffer->title }}</a>
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
                    @endif
                </ul>
            </section>

            <section class="on-page-post-advert">
                <h2>Have any Product/Service to Barter?</h2>
                <h1>Get Started!</h1>
                <a href="/listoffer">List Offer</a>
            </section>


            <section class="howtos">
                <h1>How To</h1>
                <ul>
                    <li>
                        <h2>List an Offer</h2>
                        <p><strong>1 <i class="fa fa-caret-right"></i></strong> First <a href="{{ url('/trader/login') }}" class="blueBtn">login</a> with your email and password</p>
                        <p><strong>2 <i class="fa fa-caret-right"></i></strong> Click on "List Offer" button at the top right corner on every page.</p>
                        <p><strong>3 <i class="fa fa-caret-right"></i></strong> Enter the details of your offer under "I'm Offering" field, and details of at least one item you want under the "I Want" field</p>
                        <p><strong>4 <i class="fa fa-caret-right"></i></strong> Click on "List Offer" to add your offer to the list.</p>
                        <p><strong>5 <i class="fa fa-caret-right"></i></strong> Wait to receive offers from other traders.</p>
                    </li>
                    <li>
                        <h2>Make an offer</h2>
                        <p><strong>1 <i class="fa fa-caret-right"></i></strong> Browse through the list of offers or use the filter to find offers.</p>
                        <p><strong>2 <i class="fa fa-caret-right"></i></strong> Select the offer you want to view the details.</p>
                        <p><strong>3 <i class="fa fa-caret-right"></i></strong> Click on "Make an Offer" button and select from your list of offers you have uploaded already. Upload your offer details If you do not have any offers listed.</p>
                        <p><strong>4 <i class="fa fa-caret-right"></i></strong> But you need to <a href="{{ url('/trader/login') }}" class="blueBtn">login</a> first.</p>
                        <p><strong>5 <i class="fa fa-caret-right"></i></strong> Wait to be contacted or your offer to be accepted.</p>
                    </li>
                </ul>

            </section>

        @endsection