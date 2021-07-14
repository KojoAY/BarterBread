@extends('layouts.app')
	@section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; contact us</article>

                <section class="page-content-holder">
                    <h1>Contact Us</h1>

                    <p>
                        <ul>
                            <li>
                                <i class="fa fa-phone fa-fw"></i> 
                                +233 12 345 6789

                                <i class="fa fa-envelope fa-fw"></i> 
                                <a href="mailto:support@barterbred.com">support@barterbred.com</a>
                            </li>
                            <li> 
                                <form action="" method="POST">
                                    <input type="" name="" placeholder="Name">
                                    <input type="" name="" placeholder="Email">
                                    <input type="" name="" placeholder="Telephone">
                                    <textarea placeholder="Message"></textarea>
                                    <button>
                                        Send
                                    </button>
                                </form>
                            </li>
                        </ul>

                    </p>
                </section>
            </section>
	@endsection