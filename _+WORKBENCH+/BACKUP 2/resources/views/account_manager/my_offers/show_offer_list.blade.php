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
                        <h1>my offers</h1>
                        <ul class="list-ul">

                        @foreach ($getOfferList as $offerList)
                            
                            <li>
                            <section class="photo">
                                <!--article id="item-photo"></article-->
                                <?php
                                $photosArr = explode(' ', $offerList->photos);
                                echo '<article id="item-photo" style="background-image: url(/photos/items/thumbs/' . $photosArr[0] . ')"></article>';
                                ?>
                            </section>

                            <section class="item-desc">
                                
                                <article class="item-title-loc">
                                    <?php
                                    $expTitle = explode(' ', $offerList->title);
                                    $impTitle = implode('-', $expTitle);
                                    ?>
                                    <a href="/trader/offers/details/{{ $offerList->offercode }}/{{ $impTitle }}" id="item-title">{!! $offerList->title !!}</a>
                                    <div id="item-loc">
                                        <i class="fa fa-calculator"></i> 
                                        <?php
                                        $categId = $offerList->categoryid;
                                        $getMainCategById = DB::table("bb_main_categories")
                                            ->select("*")->where("id", "=", $categId)->first();

                                        echo $getMainCategById->category_name;
                                        ?>
                                    </div>

                                    <div class="offerStat">
                                        <a href="">OFFERS <span>0</span></a>
                                        <a href="">HITS <span>0</span></a>
                                    </div>
                                </article>
                                
                            </section>

                            <article class="item-wanted">
                                <strong>wanted</strong>
                                <?php
                                $getWantedList = DB::table('bb_wanted')
                                ->select('*')
                                ->where("offercode", "=", $offerList->offercode)
                                ->get();
                                
                                foreach ($getWantedList as $wantedList){
                                    echo '<span>' . $wantedList->title;
                                    echo ($wantedList->addcash != NULL)
                                        ? ' + GH&cent;' . $wantedList->addcash . ' <em title="plus chash amount">+&cent;</em>'
                                        : '';
                                    echo '</span>';
                                }
                                ?>
                            </article>

                            <article class="manage-btn">
                                <a href="/trader/offers/edit/{!! $offerList->offercode !!}/{!! $impTitle !!}" class="black-orangeBtn">Edit</a>
                                <span class="toRight">
                                    <a href="/trader/offers/del/{!! $offerList->offercode !!}/{!! $impTitle !!}" class="blueBtn">Delete</a>
                                    <a href="/trader/offers/stop/{!! $offerList->offercode !!}/{!! $impTitle !!}" class="blueBtn">End Trade</a>
                                </span>
                            </article>
                        </li>
                        @endforeach

                    </ul>
                        
                    </section>
                </section>
            </section>
	@endsection