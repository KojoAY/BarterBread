@extends('layouts.app')
        @section('content')
            
            <section class="featured-ads">
                
            </section>
            
            <section class="home-feat-categ">
                <h1>Featured Categories</h1>
                <ul>
                    <li>Electronics
Cars & Vehicles
Fashion
Health & Beauty
Home & Garden
Jobs & Services
Real Estate
Hobby & Toys
Sports
Education
Food & Beverages
Tools & Machines
Pets & Animals
Books
Entertainment
Arts & Collectibles
Others</li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </section>

            <section class="howto-1">
                Find what you want <i class="fa fa-angle-double-right"></i> Make an offer <i class="fa fa-angle-double-right"></i> Barter!
            </section>

            <section class="home-featured-list">
                <h1>Featured List</h1>
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

            <section class="featured-list-by-categ home-featured-list">
                <h1>popular lists</h1>
                <article>
                    <h2>Home &amp; Garden</h2>
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
                </article>

                <article>
                    <h2>Electronics</h2>
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
                </article>

                <article>
                    <h2>Real Estate</h2>
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
                </article>

                <article>
                    <h2>Men's Fashion</h2>
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
                </article>
            </section>

        @endsection