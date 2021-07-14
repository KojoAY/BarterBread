@extends('layouts.app')
	@section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; offer manager</article>

                <section class="page-content-holder">
                    <nav class="accman-menu">
                        <ul>
                            <li class="user-info-sum">
                                <article class="photo">
                                    
                                    <h4>Kojo Amoafo-Yeboah</h4>
                                </article>
                                <article>
                                    <a href="{{ url('/trader/profile') }}"><i class="fa fa-edit"></i> edit profile</a>
                                </article>
                            </li>

                            <li>
                                <a href="{{ url('/trader/offers') }}"><i class="fa fa-list"></i> my offers</a>
                            </li>

                            <li>
                                <a href="{{ url('/trader/watchlist') }}"><i class="fa fa-eye"></i> my watchlist</a>
                            </li>
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
                                            ->select("*")->where("id", "=", $categId)->first();

                                        echo $getMainCategById->category_name;
                                        ?>
                                         | 
                                        <span id="actVal">GH&cent;{!! number_format($getOfferDetails->actual_value, 2) !!}</span>
                                    </div>

                                    <div class="offerStat">
                                        <a>OFFERS <span>0</span></a>
                                        <a>HITS <span>0</span></a>
                                    </div>
                                </article>
                                
                            </section>

                            <article class="item-wanted">
                                <strong>wanted</strong>
                                @foreach ($getWantedList as $wantedList)
                                <span>
                                    {!! $wantedList->title !!}
                                    @if ($wantedList->addcash != NULL)
                                        + GH&cent;{!! $wantedList->addcash !!} <em title="plus chash amount">+&cent;</em>
                                    @endif
                                </span>
                                @endforeach
                            </article>

                            <article class="manage-btn">
                                <a href="/trader/offers/edit/{!! $getOfferDetails->offercode !!}/{!! $impTitle !!}" class="black-orangeBtn">Edit</a>
                                <span class="toRight">
                                    <a href="/trader/offers/del/{!! $getOfferDetails->offercode !!}/{!! $impTitle !!}" class="blueBtn">Delete</a>
                                    <a href="/trader/offers/stop/{!! $getOfferDetails->offercode !!}/{!! $impTitle !!}" class="blueBtn">End Trade</a>
                                </span>
                            </article>
                        </section>
                        

                        <section class="wantedOfferList">
                            <h1>Offers</h1>
                            
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

                                    <article class="offerDesc">
                                        <h3>DESCRIPTION</h3> The management team responsible for the Industrial Sales Divisions development. This plan provides detailed investor information and includes the basic ... The management team responsible for the Industrial Sales Divisions development. This plan provides detailed investor information and includes the basic ...
                                        The management team responsible for the Industrial Sales Divisions development. This plan provides detailed investor information and includes the basic ...
                                        The management team responsible for the Industrial Sales Divisions development. This plan provides detailed investor information and includes the basic ...

                                        The management team responsible for the Industrial Sales Divisions development. This plan provides detailed investor information and includes the basic ...
                                        The management team responsible for the Industrial Sales Divisions development. This plan provides detailed investor information and includes the basic ...
                                    </article>
                                </section>
                            </section>


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


                                    <article class="offerDesc">
                                        <h3>DESCRIPTION</h3> The management team responsible for the Industrial Sales Divisions development. This plan provides detailed investor information and includes the basic ... The management team responsible for the Industrial Sales Divisions development. This plan provides detailed investor information and includes the basic ...
                                        The management team responsible for the Industrial Sales Divisions development. This plan provides detailed investor information and includes the basic ...
                                        The management team responsible for the Industrial Sales Divisions development. This plan provides detailed investor information and includes the basic
                                    </article>
                                </section>
                            </section>

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


                                    <article class="offerDesc">
                                        <h3>DESCRIPTION</h3> The management team responsible for the Industrial Sales Divisions development. This plan provides detailed investor information and includes the basic ...
                                        The management team responsible for the Industrial Sales Divisions development. This plan provides detailed investor information and includes the basic ...
                                    </article>
                                </section>
                            </section>
                        </section>


                    </section>
                </section>
            </section>
	@endsection