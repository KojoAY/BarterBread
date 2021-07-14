@extends('layouts.app')
        @section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; login</article>
                
                <section class="page-content-holder">
                    <h1>Login</h1>

                    <ul class="reg-ul">

                        <li class="right-col">
                            {{ @Session::put("rdirURL", $_GET['rdir']) }}
                            <article class="contSocMed">
                                <a id="fb" href="{{ url('trader/login/facebook') }}">
                                    Continue with Facebook
                                    <i class="fa fa-facebook fa-fw"></i>
                                </a>
                                
                                <div>OR</div>

                                <a id="gg" href="{{ url('trader/login/google') }}">
                                    Continue with Google
                                    <i class="fa fa-google fa-fw"></i>
                                </a>
                            </article>

                            <article class="notShare">
                                We will not share your personal information with anyone.
                            </article>

                            <article>
                                <label>
                                    <!--input type="checkbox" name=""-->
                                    By continuing or logging in, it means you agree to our 
                                    <a href="{{ url('/terms-of-use') }}">Terms of Use</a> and 
                                    <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>.
                                </label>
                            </article>
                            
                        </li>
                        
                        <li class="left-col">
                            <article id="frm-caption">Barterbread.com offers you a full experience of a barter trader. The world's biggest barter trading platform.</article>

                            <article class="sep">
                                <i class="fa fa-newspaper-o"></i>
                                Have access to list your offers and manage your offers.
                            </article>

                            <article class="sep">
                                <i class="fa fa-exchange"></i>
                                Make offers to items or service you want anytime.
                            </article>

                            <article class="sep">
                                <i class="fa fa-magic"></i>
                                View and manage wishlist as an account holder.
                            </article>
                        </li>
                    </ul>
                </section>
            </section>
            @endsection