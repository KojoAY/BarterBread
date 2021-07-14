@extends('layouts.app')
    @section('content')
            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; electronics</article>
                <section class="list-block">
                    <h1 id="title">Electronics</h1>
                    <span id="list-type"><a href="" class="fa fa-th-large" id="act"></a> <a href="" class="fa fa-th-list"></a></span>
                    
                    <ul class="list-ul">
                        <li>
                            <section class="photo">
                                <article id="item-photo"></article>
                                
                            </section>

                            <section class="item-desc">
                                
                                <article class="item-title-loc">
                                    <a href="{{ url('/electronics/details') }}" id="item-title">Brand New out of the box iPhone 10 plus</a>
                                    <div id="item-loc">
                                        <i class="fa fa-map-marker"></i> Tema | <i class="fa fa-calculator"></i> Electronics
                                    </div>

                                    <div id="actVal">
                                        GH&cent;<?php echo number_format("3500", 2);?>
                                    </div>
                                </article>
                            </section>
                            
                            <article class="item-wanted">
                                <strong>wanted</strong><!--
                                --><span>iPhone 6</span><!--
                                --><span>
                                    Samsung Note 4 + GH¢300.00
                                    <em title="plus chash amount">+&cent;</em>
                                </span><!--
                                --><span>
                                    Gorgeous 1/2 Acre Lot near Liberty Mountain Ski & Golf Resor
                                </span>
                            </article>
                        </li><!--
                                    

                        --><li id="mid">
                            <section class="photo">
                                <article id="item-photo"></article>
                                
                            </section>

                            <section class="item-desc">
                                
                                <article class="item-title-loc">
                                    <a href="{{ url('/electronics/details') }}" id="item-title">Gorgeous 1/2 Acre Lot near Liberty Mountain Ski & Golf Resor ...</a>
                                    <div id="item-loc">
                                        <i class="fa fa-map-marker"></i> Latebiokorshi | <i class="fa fa-cogs"></i> Real Estate
                                    </div>

                                    <div id="actVal">
                                        GH&cent;<?php echo number_format("1200000", 2);?>
                                    </div>
                                </article>
                                
                            </section>

                            <article class="item-wanted">
                                <strong>wanted</strong><!--
                                --><span></span><!--
                                --><span></span><!--
                                --><span><em title="plus chash amount">+&cent;</em></span>
                            </article>
                        </li><!--
                                    

                        --><li>
                            <section class="photo">
                                <article id="item-photo"></article>
                                
                            </section>

                            <section class="item-desc">
                                
                                <article class="item-title-loc">
                                    <a href="{{ url('/electronics/details') }}" id="item-title">6 months old Boabull puppies</a>
                                    <div id="item-loc">
                                        <i class="fa fa-map-marker"></i> Doodowa | <i class="fa fa-asterisk"></i> Pets &amp; Animals
                                    </div>

                                    <div id="actVal">
                                        GH&cent;<?php echo number_format("2450", 2);?>
                                    </div>
                                </article>
                                
                            </section>
                        
                            <article class="item-wanted">
                                <strong>wanted</strong><!--
                                --><span></span><!--
                                --><span></span><!--
                                --><span></span>
                            </article>
                        </li>
                    </ul>
                    <article class="pagination-nav">
                        <a href="" class="fa fa-chevron-left"></a>
                        <a href="">1</a>
                        <a href="">2</a>
                        <a href="">3</a>
                        <a href="" id="act">4</a>
                        <a href="" class="fa fa-chevron-right"></a>
                    </article>
                </section>
            </section>

            <section class="home-traders-list">
                <h1>Featured Taders</h1>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </section>

            <section class="on-page-post-advert">
                <h2>Do you have anything product or service to barter?</h2>
                <h1>Start Trading!</h1>
                <a href="">List Offer</a>
            </section>

    @endsection