<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ url('css/font-awesome.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/app-general-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/app-accmanager-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/app-form-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/app-home-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/app-list-styles.css') }}">

        <title>Batabred.com</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

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

                        @if (Route::has('login'))

                            @if (Auth::check())
                                
                                {!! 
                                    substr(Auth::user()->fname, 0, 1), 
                                    substr(Auth::user()->lname, 0, 1) 
                                !!}

                                <a class="fa fa-sign-out" href="{{ url('/trader/logout') }}" title="Logout"></a>
                                
                            @else
                                <a class="fa fa-user-plus" href="{{ url('/trader/register') }}" title="Register"></a>
                                <a class="fa fa-sign-in" href="{{ url('/trader/login') }}" title="Login"></a>
                            @endif

                        @endif
                        
                    </article>
                </section>

                <section class="header-block">
                    <article class="left-content">
                        <nav>
                            <a class="fa fa-navicon"></a>
                            <ul class="main-category-menu">
                                <i class="fa fa-caret-down"></i>
                                <li><a href="{{ url('/electronics') }}">Electronics <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Cars &amp; Vehicles <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Fashion <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Health &amp; Beauty <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Home &amp; Garden <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Jobs &amp; Services <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Real Estate <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Hobby &amp; Toys <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Sports <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Education <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Food &amp; Beverages <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Tools &amp; Machines <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Pets &amp; Animals <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Books <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Entertainment <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Arts &amp; Collectibles <i class="fa fa-caret-right"></i></a></li>
                                <li><a href="">Others <i class="fa fa-caret-right"></i></a></li>
                            </ul>
                        </nav>
                        <a href="{{ url('/') }}" id="name-link"><img src="{{ url('images/batabred-logo.jpg') }}" id="batabred" title="batabred.com" name="batabred" border="0"><span id="beta">BETA</span></a>
                    </article>

                    <article class="search-block">
                        <form action="" method="">
                            <input type="text" name="" placeholder="Start search">
                            <button type="submit">
                                <i class="fa fa-search"></i> GO
                            </button>
                        </form>
                    </article>

                    <article class="right-content">
                        <span id="alert-icon"><a class="fa fa-bell-o fa-rotate-30"></a><sup>0</sup></span>
                        <span><a class="fa fa-eye"></a><sup>0</sup></span>
                        <span><a class="fa fa-shopping-cart"></a><sup>0</sup></span>
                    </article>
                </section>

                <section class="search-block-min">
                    <form action="" method="">
                        <input type="text" name="" placeholder="Start search">
                        <button type="submit">
                            <i class="fa fa-search"></i> GO
                        </button>
                    </form>
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

                <article>But you need to <a href="">sign up first!</a></article>
                <article>Or <a href="">sign in</a> if you are a member already.</article>
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
