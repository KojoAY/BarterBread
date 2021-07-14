@extends('layouts.app')
	@section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; offer manager</article>

                <section class="page-content-holder">
                    <!--nav class="accman-menu">
                        <ul>
                            <li></li>
                        </ul>
                        
                    </nav-->
                    <!--h1>About Batabred</h1-->

                    <section class="accman-content" style="margin-left: 0; border: none; width: 96.5%;">
                        <h1>Offer Dashboard</h1>
                        <ul class="list-ul">
                            <li class="listed-offer-cnt">
                                <h2>offers Listed</h2>
                                <article id="offer-count">{{ number_format($getOfferListCount) }}</article>
                                <article>
                                    <a href="/trader/offers/listed-offers" class="white-blackBtn">View List</a>
                                    <span class="toRight">
                                        <a href="/list-offer" class="orange-blackBtn">List Offer</a>
                                    </span>
                                    
                                </article>
                            </li>


                            <li class="listed-offer-cnt">
                                <h2>offers Made</h2>
                                <article id="offer-count">{{ number_format($getOfferMadeCount) }}</article>
                                <article>
                                    <a href="/trader/offers/offers-made" class="white-blackBtn">View List</a>
                                </article>
                            </li>
                        </ul>
                        
                    </section>
                </section>
            </section>
	@endsection