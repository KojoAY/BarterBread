@extends('layouts.app')
	@section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; support center</article>

                <section class="page-content-holder">
                    <h1>Support Center</h1>

                    <p>
                        <ul class="feedback-ul">
                            <li>
                                <h2>Contact Information</h2>
                                <article id="div">
                                    <i class="fa fa-phone fa-fw"></i> 
                                    +233 12 345 6789
                                </article>
                                <article id="div">
                                    <i class="fa fa-envelope fa-fw"></i> 
                                    <a href="mailto:support@barterbred.com">support@barterbred.com</a>
                                </article>
                            </li>
                            <li> 
                                <h2>Feedback Form</h2>
                                <form action="{{ url('support-center') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="text" name="fbName" placeholder="Name">
                                    <input type="text" name="fbEmail" placeholder="Email">
                                    <input type="text" name="fbTele" placeholder="Telephone">
                                    <textarea name="fbMsg" placeholder="Message"></textarea>
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