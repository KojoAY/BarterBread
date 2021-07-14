@extends('layouts.app')
        @section('content')
            
            <section class="featured-ads">
                
            </section>
            
            <section class="home-feat-categ">
                <h1>Categories</h1>
                <ul>
                    <li>
                        Electronics
                    </li>
                    <li>
                        Cars &amp; Vehicles
                    </li>
                    <li>
                        Fashion
                    </li>
                    <li>
                        Health &amp; Beauty
                    </li>
                    <li>
                        Home &amp; Garden
                    </li>
                    <li>
                        Jobs &amp; Services
                    </li>
                    <li>
                        Real Estate
                    </li>
                    <li>
                        Hobby &amp; Toys
                    </li>
                    <li>
                        Sports
                    </li>
                    <li>
                        Education
                    </li>
                    <li>
                        Food &amp; Beverages
                    </li>
                    <li>
                        Tools &amp; Machines
                    </li>
                    <li>
                        Pets &amp; Animals
                    </li>
                    <li>
                        Books
                    </li>
                    <li>
                        Entertainment
                    </li>
                    <li>
                        Arts &amp; Collectibles
                    </li>
                    <li>
                        Others
                    </li>
                </ul>
            </section>

            <!--section class="howto-1">
                Find what you want <i class="fa fa-angle-double-right"></i> Make an offer <i class="fa fa-angle-double-right"></i> Barter!
            </section-->

            <section class="on-page-post-advert">
                <h2>
                    Find what you want <i class="fa fa-angle-double-right"></i> Make an offer <i class="fa fa-angle-double-right"></i> Barter!
                </h2>

                <a href="">Start Here!</a>
            </section>

            <section class="home-featured-list">
                <h1>Recently Added</h1>
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
                                Gorgeous 1/2 Acre Lot near Liberty Mountain Ski &amp; Golf Resor
                            </span>
                        </article>
                    </li><!--
                                

                    --><li id="mid">
                        <section class="photo">
                            <article id="item-photo"></article>
                            
                        </section>

                        <section class="item-desc">
                            
                            <article class="item-title-loc">
                                <a href="{{ url('/electronics/details') }}" id="item-title">Gorgeous 1/2 Acre Lot near Liberty Mountain Ski &amp; Golf Resor ...</a>
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
                    </li><!--
                                

                    --><li>
                        <section class="photo">
                            <article id="item-photo"></article>
                            
                        </section>

                        <section class="item-desc">
                            
                            <article class="item-title-loc">
                                <a href="{{ url('/electronics/details') }}" id="item-title">Gorgeous 1/2 Acre Lot near Liberty Mountain Ski &amp; Golf Resor ...</a>
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


                    --><li id="mid">
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
                    </li><!--


                    --><li>
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
                                Gorgeous 1/2 Acre Lot near Liberty Mountain Ski &amp; Golf Resor
                            </span>
                        </article>
                    </li>
                </ul>
            </section>

            <section class="on-page-post-advert">
                <h2>Have any Product/Service to Barter?</h2>
                <h1>Get Started!</h1>
                <a href="">List Offer</a>
            </section>

        @endsection