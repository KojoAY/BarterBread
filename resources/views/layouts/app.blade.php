<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Swap or Barter, Buy and Sell Products and Services on {{ config('app.name', 'BarterBread') }}">
        <meta name="keywords" content="barter trading, swap, phone swapping, online barter trading, online swapping, car swapping, product swapping, service swaping, swapping, service exchange, product exchange">
        <meta name="google-signin-client_id" content="497104216791-046sal9m2b6inqge2bn2c17e9erur8gj.apps.googleusercontent.com">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.css') }}"-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app-general-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app-accmanager-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app-form-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app-home-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app-list-styles.css') }}">
        <script src="https://apis.google.com/js/platform.js" async defer></script>

        <title>{{ (empty(@$pageTitle)) ? "Error 404" : @$pageTitle }}</title>

        <?php
        @$photosArr = explode(' ', @$getOfferDetails->photos);
        if(!empty($shareRef)){
            @$pgURL = "https://www.barterbread.com/" . @$shareRef;
            @$showImg = "https://www.barterbread.com/photos/items/" . @$photosArr[0];
        } else {
            $pgURL = "https://www.barterbread.com";
            @$showImg = "https://www.barterbread.com/images/barterbread_logo.png";
        }

        if(!empty(@$getOfferDetails->description)){
            @$showDesc = @$getOfferDetails->description;
        } else {
            @$showDesc = "Swap or Barter, Buy and Sell Products and Services on {{ config('app.name', 'BarterBread') }}";
        }
        ?>
        <!-- You can use Open Graph tags to customize link previews.
        Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
        <meta property="og:url"             content="{{ $pgURL }}" />
        <meta property="og:type"            content="Online Shop" />
        <meta property="og:title"           content="{{ @$pageTitle }}" />
        <meta property="og:description"     content="{{ @$showDesc }}" />
        <meta property="og:image"           content="{{ @$showImg }}" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>

    </head>
    <body>
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3&appId=333562444171867&autoLogAppEvents=1"></script>

        <section class="main-block"> <!-- start main block -->
            <header class="home-header"> <!-- start header -->

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
                                    <a href="/offers/{{ $mainCateg->category_code }}_{{ strtolower($impNameWithAmp) }}">
                                        <i class="fas fa-{{ $mainCateg->category_icon }} fa-fw"></i>
                                        {{ $mainCateg->category_name }} <!--i class="fa fa-caret-right"></i-->
                                    </a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </nav>

                        <a href="{{ url('/') }}" id="name-link"><img src="{{ url('images/barterbread_logo.png') }}" id="barterbread" title="barterbread.com" name="barterbread" border="0" alt="BarterBread is Ghana's first online barter trading platform. Swap products or services!"><span id="beta">BETA</span></a>
                    </article>

                    <article class="top-right-content">
                        <a href="{{ url('/listoffer') }}" class="post-ad-top-btn">
                            <i class="fas fa-plus"></i> List Offer
                        </a>
                        
                        @if (!Session::has('traderToken'))
                            <a href="{{ url('/trader/register') }}" title="Register">
                                <i class="fa fa-user-plus"></i>
                                <br>
                                Register
                            </a>

                            <a href="{{ url('/trader/login') }}" title="Login">
                                <i class="fa fa-sign-in"></i>
                                <br>
                                Login
                            </a>
                        @else
                            
                            <nav class="traderManagerMenu">
                                <a id="uIcon">
                                    <span>
                                        {{ substr(Session::get('traderFName'), 0, 1) }}
                                    </span>
                                    <!--i class="fa fa-caret-down"></i-->
                                </a>
                                <ul class="trdMenu-ul">
                                    <li>
                                        <a href="{{ url('/trader/profile') }}">
                                            <i class="fa fa-edit fa-fw"></i>
                                            My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/trader/offers') }}">
                                            <i class="fa fa-th-list fa-fw"></i>
                                            My Offers
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ url('/trader/logout') }}" id="logout" title="Logout">
                                            <i class="fa fa-sign-out fa-fw"></i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        @endif
                    </article>



                    <article class="search-block">
                        <form action="/filter" method="GET">
                            <input type="text" name="of" placeholder="Start search">
                            <button type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </article>

                </section>

            </header> <!-- end of header -->

        @yield('content')
        

            @if(!Session::has("traderToken"))
            <section class="howtos" style="margin-top: 0%; padding: 6% 3%;">
                <article>To have the full BarterBread experience you'll have to <a href="{{ url('/trader/register') }}">Create an account</a> first!</article>
                <article>Or <a href="{{ url('/trader/login') }}">login</a> if you are a member already.</article>
            </section>

            @else
            <section class="on-page-post-advert">
                <h2>
                    Find what you want <i class="fa fa-angle-double-right"></i> Make an offer <i class="fa fa-angle-double-right"></i> Barter!
                </h2>

                <a href="/offers">Start Here!</a>
            </section>
            @endif

            <footer>
                <ul class="col-ul">
                    <li class="site-name">
                        <a href="{{ url('/') }}">
                            <img src="{{ url('/images/barterbread_logo_footer.png') }}">
                        </a>
                        <article>
                            <strong style="color: #fff;">BarterBread</strong> offers a platform to barter/swap, sell and buy a wide variety of products and services with real people and vendors all over the world.
                        </article>
                        
                    </li>
                    <li>
                        <h2>BarterBread</h2>
                        <a href="{{ url('/about-us') }}">About Us</a><br>
                        <a href="{{ url('/careers') }}">Careers</a><br>
                        <a href="{{ url('/privacy-policy') }}">Privacy Policy</a><br>
                        <a href="{{ url('/terms-of-use') }}">Terms of Use</a>
                    </li>
                    <li>
                        <h2>Traders &amp; Market</h2>
                        <a href="{{ url('/offers') }}">Browse Offers</a><br>
                        @if (Session::has('traderToken'))
                        <a href="{{ url('/trader/profile') }}">My Profile</a><br>
                        <a href="{{ url('/trader/offers') }}">My Offers</a><br>
                        <a href="{{ url('/trader/logout') }}">Logout</a><br>
                        @else
                        <a href="{{ url('/trader/login') }}">Login</a><br>
                        <a href="{{ url('/trader/register') }}">Register</a><br>
                        @endif
                        <a href="{{ url('/listoffer') }}" class="orange-blackBtn">List Offer</a>
                    </li>
                    <li>
                        <h2>Help &amp; Support</h2>
                        <a href="{{ url('/contact-us') }}">Contact Us</a><br>
                        <a href="{{ url('/how-to') }}">How To</a>
                    </li>
                </ul>

                <article class="copyright">
                    Copyright &copy; 2019. BarterBread
                </article>
            </footer>
        </section> <!-- end header -->
    </body>
</html>
