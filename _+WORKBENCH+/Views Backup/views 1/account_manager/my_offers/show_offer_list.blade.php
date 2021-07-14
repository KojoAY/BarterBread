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
                                <a href="{{ url('/trader/suggestions') }}"><i class="fa fa-check"></i> my suggestions</a>
                            </li>

                            <li>
                                <a href="{{ url('/trader/watchlist') }}"><i class="fa fa-eye"></i> my watchlist</a>
                            </li>
                        </ul>
                        
                    </nav>
                    <!--h1>About Batabred</h1-->

                    <section class="accman-content">
                        <h1>my offers</h1>
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

                                </article>
                                
                            </section>

                            <article class="item-wanted">
                                <strong>wanted</strong><!--
                                --><span></span><!--
                                --><span></span><!--
                                --><span><em title="plus chash amount">+&cent;</em></span>
                            </article>

                            <article class="manage-btn">
                                <a href="" class="black-orange">Edit</a>
                                <a href="" class="black-orange">Delete</a>
                                <a href="" class="black-orange">End Trade</a>
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

                                </article>
                                
                            </section>

                            <article class="item-wanted">
                                <strong>wanted</strong><!--
                                --><span></span><!--
                                --><span>
                                    <em title="plus chash amount">+&cent;</em>
                                </span><!--
                                --><span></span>
                            </article>

                            <article class="manage-btn">
                                <a href="" class="black-orange">Edit</a>
                                <a href="" class="black-orange">Delete</a>
                                <a href="" class="black-orange">End Trade</a>
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

                                </article>
                                
                            </section>

                            <article class="item-wanted">
                                <strong>wanted</strong><!--
                                --><span></span><!--
                                --><span></span><!--
                                --><span></span>
                            </article>

                            <article class="manage-btn">
                                <a href="" class="black-orange">Edit</a>
                                <a href="" class="black-orange">Delete</a>
                                <a href="" class="black-orange">End Trade</a>
                            </article>
                        </li>
                    </ul>
                        
                    </section>
                </section>
            </section>
	@endsection