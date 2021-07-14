<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Batabred is Ghana's first online barter trading platform. Swap any product or service!">
        <meta name="keywords" content="barter trading, swap, phone swapping, online barter trading, online swapping, car swapping, product swapping, service swaping, swapping, service exchange, product exchange">
        <link rel="stylesheet" type="text/css" href="{{ url('css/font-awesome.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/app-general-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/app-accmanager-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/app-form-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/app-home-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/app-list-styles.css') }}">

        <title>Batabred - The first online barter trading platform in Ghana.</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        <script src="{{ url('js/jquery.min.js') }}"></script>
        <script src="{{ url('js/script.js') }}"></script>

    </head>
    <body>
        <section class="main-block"> <!-- start main block -->
            <header class="home-header"> <!-- start header -->
                <section class="top-bar">
                    <article class="top-left-content">
                        <nav class="lang">
                            <a>EN</a>
                        </nav>
                        <nav class="links">
                            <a href="{{ url('/about-us') }}">About Us</a>
                            <a href="{{ url('/support-center') }}">Support Center</a>
                        </nav>
                    </article>

                    <article class="top-right-content">
                        <a href="{{ url('/list-offer') }}" class="post-ad-top-btn">List Offer</a>

                        @if (Session::has('traderToken'))
                            

                            <nav class="traderManagerMenu">
                                <a id="uIcon">
                                    <span>
                                        {{ substr(Session::get("traderFName"), 0, 1) . "" . substr(Session::get("traderLName"), 0, 1) }}
                                    </span>
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="trdMenu-ul">
                                    <li>
                                        <a href="{{ url('/trader/profile') }}">
                                            <i class="fa fa-edit"></i>
                                            My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/trader/offers') }}">
                                            <i class="fa fa-list"></i>
                                            My Offers
                                        </a>
                                        <!--nav>
                                            <a href="/trader/offers/listed-offers"><i class="fa fa-caret-right"></i> Offers Listed</a>
                                            <a href="/trader/offers/offers-made"><i class="fa fa-caret-right"></i> Offers Made</a>
                                        </nav-->
                                    </li>

                                    <li>
                                        <a href="{{ url('/trader/logout') }}" id="logout" title="Logout">
                                            <i class="fa fa-sign-out"></i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        @else
                            <a class="fa fa-user-plus" href="{{ url('/trader/register') }}" title="Register"></a>
                            <a class="fa fa-sign-in" href="{{ url('/trader/login') }}" title="Login"></a>

                        @endif

                    </article>
                </section>

                <section class="header-block">
                    <article class="left-content">
                        <nav>
                            <a class="fa fa-navicon"></a>
                            <ul class="main-category-menu">
                                <i class="fa fa-caret-down"></i>
                                <?php
                                $getMainCategories = DB::table("bb_main_categories")
                                    ->select("*")
                                    ->get();

                                $data = array(
                                    "getMainCategories" => $getMainCategories
                                );
                                ?>
                                
                                @foreach ($getMainCategories as $mainCateg)

                                <?php
                                $expName = explode(" ", $mainCateg->category_name);
                                $impName = implode("-", $expName);

                                $expNameWithAmp = explode('&amp;', $impName);
                                $impNameWithAmp = implode('and', $expNameWithAmp);
                                ?>
                                <li>
                                    <a href="/offers/{{ $mainCateg->category_code }}_{{ strtolower($impNameWithAmp) }}">{{ $mainCateg->category_name }} <i class="fa fa-caret-right"></i></a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </nav>
                        <a href="{{ url('/') }}" id="name-link"><img src="{{ url('images/batabred-logo.jpg') }}" id="batabred" title="batabred.com" name="batabred" border="0" alt="Batabred is Ghana's first online barter trading platform. Swap products or services!"><span id="beta">BETA</span></a>
                    </article>

                    <article class="search-block">
                        <form action="/filter" method="POST">
                            <input type="text" name="fo" placeholder="Start search">
                            <button type="submit">
                                <i class="fa fa-search"></i> GO
                            </button>
                        </form>
                    </article>

                </section>

            </header> <!-- end of header -->

        @yield('content')

            <section class="howtos">
                <h1>How to trade</h1>
                <ul>
                    <li>
                        <h2>Make an Offer</h2>
                        <p><strong>1 <i class="fa fa-caret-right"></i></strong> Login with your email and password</p>
                        <p><strong>2 <i class="fa fa-caret-right"></i></strong> Go to the List Offer page by clicking on the "List Offer" button.</p>
                        <p><strong>3 <i class="fa fa-caret-right"></i></strong> Select the category of your offer. Fill the form with the details of your offer. The form displays according to the category you select.</p>
                        <p><strong>4 <i class="fa fa-caret-right"></i></strong> Proceed to select the items and/or services you want to exchange with your offer</p>
                        <p><strong>5 <i class="fa fa-caret-right"></i></strong> Finally click on the "List My Ad" button to add your offer to the list.</p>
                    </li>
                    <li>
                        <h2>find an offer</h2>
                        <p><strong>1 <i class="fa fa-caret-right"></i></strong> Login with your email and password</p>
                        <p><strong>2 <i class="fa fa-caret-right"></i></strong> Browse through the list of offers or use the filter to find offers</p>
                        <p><strong>3 <i class="fa fa-caret-right"></i></strong> Select the offer you want to view the details. If interested in the offer, click on the offers the trader wants for his or her offer <em>(if you have the item/service they want)</em></p>
                    </li>
                </ul>

                @if(Session::has("traderToken"))
                <section class="on-page-post-advert" style="margin: 0 2%;">
                    <h2>
                        Find what you want <i class="fa fa-angle-double-right"></i> Make an offer <i class="fa fa-angle-double-right"></i> Barter!
                    </h2>

                    <a href="/offers">Start Here!</a>
                </section>
                @else
                <article>But you need to <a href="">sign up first!</a></article>
                <article>Or <a href="">sign in</a> if you are a member already.</article>
                @endif
            </section>

            <footer>
                Copyright &copy; 2018. Batabred.com
                <span>
                    <a href="">Privacy Policy</a>
                    <a href="">Terms of Use</a>
                </span>
            </footer>
        </section> <!-- end header -->
    </body>
</html>
