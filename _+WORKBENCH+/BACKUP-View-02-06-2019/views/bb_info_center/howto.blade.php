@extends('layouts.app')
	@section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; how to</article>

                <section class="page-content-holder">
                    <h1>How To</h1>

                    <p>
                        <h2 style="margin-top: 40px;">List an Offer</h2>
                        <p>
                            <strong>1 <i class="fa fa-caret-right"></i></strong> First <a href="{{ url('/trader/login') }}" class="blueBtn">login</a> with your email and password<br>
                            <strong>2 <i class="fa fa-caret-right"></i></strong> Click on "List Offer" button at the top right corner on every page.<br>
                            <strong>3 <i class="fa fa-caret-right"></i></strong> Enter the details of your offer under "I'm Offering" field, and details of at least one item you want under the "I Need" field<br>
                            <strong>4 <i class="fa fa-caret-right"></i></strong> Click on "List Offer" to add your offer to the list.<br>
                            <strong>5 <i class="fa fa-caret-right"></i></strong> Wait to receive offers from other traders.
                        </p>
                    
                        <h2 style="margin-top: 40px;">Make an offer</h2>
                        <p>
                            <strong>1 <i class="fa fa-caret-right"></i></strong> Browse through the list of offers or use the filter to find offers.<br>
                            <strong>2 <i class="fa fa-caret-right"></i></strong> Select the offer you want to view the details.<br>
                            <strong>3 <i class="fa fa-caret-right"></i></strong> Click on "Make an Offer" button and select from your list of offers you have uploaded already. Upload your offer details If you do not have any offers listed.<br>
                            <strong>4 <i class="fa fa-caret-right"></i></strong> But you need to <a href="{{ url('/trader/login') }}" class="blueBtn">login</a> first.<br>
                            <strong>5 <i class="fa fa-caret-right"></i></strong> Wait to be contacted or your offer to be accepted.
                        </p>

                    </p>
                </section>
            </section>
	@endsection