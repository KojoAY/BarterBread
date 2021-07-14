@extends('layouts.app')
    @section('content')
            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; <a href="{{ url('/electronics') }}">electronics</a> &map; details</article>
                <section class="list-block">
                    <h1 id="title">Electronics</h1>
                    
                    <ul class="details-ul">
                        <li class="left-col">
                            <h2 id="main-title">Digital Camera
                            <sup>Closed</sup></h2>
                            

                            <article class="details-list-date">
                                <strong>Listed By</strong> Kojo Amoafo-Yeboah | 
                                <strong>On:</strong> Monday, December 25, 2017
                                <br>
                                <i class="fa fa-map-marker"></i> A1/4 Klagon, Lashibi, Greater Accra
                            </article>
                            <article class="offer-pics"></article>

                            <p>
                                Details of offer...
                            </p>

                            <article class="item-wanted" id="makeOffer">
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

                            <article class="myOfferList">
                                <h1>My Offer List</h1>

                                <form action="" method="post" enctype="" class="makeOfferFrm">
                                    <em id="cap">Select an offer from your list.</em>

                                    <label>
                                        <input type="checkbox" name="">
                                        <article class="pic-holder"></article>
                                        <span>
                                            <h3>iPhone 6</h3>
                                        </span>
                                    </label>
                                    
                                    <label>
                                        <input type="checkbox" name="">
                                        <article class="pic-holder"></article>
                                        <span>
                                            <h3>Gorgeous 1/2 Acre Lot near Liberty Mountain Ski & Golf Resor</h3>
                                        </span>
                                    </label>

                                    <label>
                                        <input type="checkbox" name="">
                                        <article class="pic-holder"></article>
                                        <span>
                                            <h3>Brand New out of the box iPhone 10 plus</h3>
                                        </span>
                                    </label>

                                    <textarea placeholder="Additional Infomation"></textarea>

                                    <button>
                                        Submit Offer
                                    </button>
                                </form>
                            </article>

                            <article class="trader-contact">
                                <h3>Trader's Contact No.:</h3> 
                                <h1>+233 123456789</h1>
                            </article>
                        </li>



                        <li class="right-col">
                            
                            <article class="details-actual-value">
                                <em>Buy at actual value or offer product/service.</em>
                            </article>

                            <article class="details-actual-value">
                                <h2>Actual value <i class="fa fa-caret-right"></i></h2>
                                <div id="val">GH&cent;<?php echo number_format("1234", 2);?></div>
                            </article>

                            <article class="contact-info">
                                <a href="#makeOffer">Make Offer</a>
                            </article>
                            

                            <article class="detials-right-advert">
                                <h6>advert</h6>
                            </article>

                            <article class="details-offers">
                                <h1>Offers</h1>

                                <ul>
                                    <li>
                                        <article class="pic-holder"></article>
                                        <article>
                                            <h3>iPhone 6</h3>
                                            <a href="" id="trader-info">
                                                <article>
                                                    <h4>Kojo Amoafo-Yeboah</h4>
                                                    <span>5 Offers</span>
                                                </article>
                                            </a>
                                        </article>
                                        <a id="details-btn">Details</a>
                                    </li>

                                    <li>
                                        <article class="pic-holder"></article>
                                        <article>
                                            <h3>Samsung Note 4 + GH&cent;300.00</h3>
                                            <a href="" id="trader-info">
                                                <article>
                                                    <h4>Kwame Charles</h4>
                                                    <span>1 Offer</span>
                                                </article>
                                            </a>
                                        </article>
                                        <a id="details-btn">Details</a>
                                    </li>

                                    <li>
                                        <article class="pic-holder"></article>
                                        <article>
                                            <h3>1 Plot (70x100 feet) of Land at Oyibi</h3>
                                            <a href="" id="trader-info">
                                                <article id="trader-name">
                                                    <h4>Lovely Shy Ceecee Bla Girl</h4>
                                                    <span>2 Offers</span>
                                                </article>
                                            </a>
                                        </article>
                                        <a id="details-btn">Details</a>
                                    </li>

                                    <li>
                                        <article class="pic-holder"></article>
                                        <article>
                                            <h3>Samsumg S6</h3>
                                            <a href="" id="trader-info">
                                                <article>
                                                    <h4>Kofi Oppong</h4>
                                                    <span>12 Offers</span>
                                                </article>
                                            </a>
                                        </article>
                                        <a id="details-btn">Details</a>
                                    </li>

                                    <li>
                                        <article class="pic-holder"></article>
                                        <article>
                                            <h3>Hyundai Elantra 2014</h3>
                                            <a href="" id="trader-info">
                                                <article>
                                                    <h4>Michael jackson</h4>
                                                    <span>8 Offer</span>
                                                </article>
                                            </a>
                                        </article>
                                        <a id="details-btn">Details</a>
                                    </li>
                                </ul>
                            </article>


                            <article class="stats">
                                <span><i class="fa fa-eye"></i><sub>5</sub></span>
                                <span id="share"><a class="fa fa-share-alt"></a></span>
                            </article>

                            <article class="detials-right-advert">
                                <h6>advert</h6>
                            </article>

                            <article class="detials-right-advert">
                                <h6>advert</h6>
                            </article>
                        </li>
                    </ul>
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