@extends('layouts.app')
        @section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; login</article>

                <section class="page-content-holder">
                    <h1>Login</h1>

                    <ul class="reg-ul">

                        <li class="left-col">
                            <article id="frm-caption">Batabred.com offers you a full experience of a barter trader. The world's biggest barter trading platform.</article>

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

                        <li class="right-col">
                            <article id="frm-caption">Enter your correct details to login.</article>
                            <form method="POST" action="{{ url('/traders/register') }}" class="trader-regfrm">
                                {{ csrf_field() }}

                                <article>
                                    <div>
                                        <label for="email" class="">Email Address</label>
                                    </div>
                                    <div>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                                    </div>
                                </article>

                                <article>
                                    <div>
                                        <label for="password" class="">Password</label>
                                    </div>
                                    <div>
                                        <input id="password" type="password" name="password" placeholder="Password" required>
                                    </div>
                                </article>

                                <article>
                                    <input id="tandc" type="checkbox" class="form-control" name="tandc" required>
                                    <label for="tandc" class="lbl-tandc">Remember me.</label>
                                </article>

                                <article class="">
                                    <button type="submit">
                                        Login
                                    </button> 
                                    <a href="">Forgot password?</a>
                                </article>
                            </form>

                            <section class="to-login">
                                <article id="frm-caption">Create an account if you haven't already.</article>
                                <a href="{{ url('/traders/register') }}" id="login-btn">Register</a>
                            </section>
                            
                        </li>
                    </ul>
                </section>
            </section>
            @endsection