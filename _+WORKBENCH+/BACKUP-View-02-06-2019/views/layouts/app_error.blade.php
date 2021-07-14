<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Swap or Barter, Buy and Sell Products and Services on {{ config('app.name', 'BarterBread') }}">
        <meta name="keywords" content="barter trading, swap, phone swapping, online barter trading, online swapping, car swapping, product swapping, service swaping, swapping, service exchange, product exchange">

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

        <title>Error 404</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>

    </head>
    <body>
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
                                        {{ substr(Session::has('traderFName'), 0, 1) }}
                                    </span>
                                    <i class="fa fa-caret-down"></i>
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

            <section class="howtos">
                <h1>How to trade</h1>
                <ul>
                    <li>
                        <h2>List an Offer</h2>
                        <p><strong>1 <i class="fa fa-caret-right"></i></strong> First <a href="{{ url('/trader/login') }}" class="blueBtn">login</a> with your email and password</p>
                        <p><strong>2 <i class="fa fa-caret-right"></i></strong> Click on "List Offer" button at the top right corner on every page.</p>
                        <p><strong>3 <i class="fa fa-caret-right"></i></strong> Enter the details of your offer under "I'm Offering" field, and details of at least one item you want under the "I Need" field</p>
                        <p><strong>4 <i class="fa fa-caret-right"></i></strong> Click on "List Offer" to add your offer to the list.</p>
                        <p><strong>5 <i class="fa fa-caret-right"></i></strong> Wait to receive offers from other traders.</p>
                    </li>
                    <li>
                        <h2>Make an offer</h2>
                        <p><strong>1 <i class="fa fa-caret-right"></i></strong> Browse through the list of offers or use the filter to find offers.</p>
                        <p><strong>2 <i class="fa fa-caret-right"></i></strong> Select the offer you want to view the details.</p>
                        <p><strong>3 <i class="fa fa-caret-right"></i></strong> Click on "Make an Offer" button and select from your list of offers you have uploaded already. Upload your offer details If you do not have any offers listed.</p>
                        <p><strong>4 <i class="fa fa-caret-right"></i></strong> But you need to <a href="{{ url('/trader/login') }}" class="blueBtn">login</a> first.</p>
                        <p><strong>5 <i class="fa fa-caret-right"></i></strong> Wait to be contacted or your offer to be accepted.</p>
                    </li>
                </ul>

                @if(!Session::has("traderToken"))
                <section style="border-top: 1px dotted #ddd; margin-top: 3%; padding: 3% 0% 3% 0%;">
                    <article>But you need to <a href="{{ url('/trader/register') }}">register</a> first!</article>
                    <article>Or <a href="{{ url('/trader/login') }}">login</a> if you are a member already.</article>
                </section>
                @endif
            </section>

            @if(Session::has("traderToken"))
            <section class="on-page-post-advert">
                <h2>
                    Find what you want <i class="fa fa-angle-double-right"></i> Make an offer <i class="fa fa-angle-double-right"></i> Barter!
                </h2>

                <a href="/offers">Start Here!</a>
            </section>
            @endif

            <footer>
                <ul class="col-ul">
                    <li>
                        <h2>BarterBread</h2>
                        <a href="{{ url('/about-us') }}">About Us</a><br>
                        <a href="{{ url('/career') }}">Career</a><br>
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
                    <li class="site-name">
                        <a href="{{ url('/') }}">
                            <img src="{{ url('/images/barterbread_logo_footer.png') }}">
                        </a>
                        <article>
                            <i class="fa fa-phone fa-fw"></i> +233 50 228 3111<br>
                            <i class="fa fa-envelope fa-fw"></i> <a href="mailto:info@barterbread.com">info@barterbread.com</a>
                        </article>
                        <article class="copyright">
                            Copyright &copy; 2019. BarterBread.com
                        </article>
                        
                    </li>
                </ul>
            </footer>
        </section> <!-- end header -->
    </body>
</html>
