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

                            <?= Session::get('errorMessage'); ?>
                            <form method="POST" action="{{ url('/trader/login') }}" class="trader-regfrm">
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
                                    <input id="remMe" type="checkbox" class="form-control" name="remMe">
                                    <label for="remMe" class="lbl-tandc">Remember me.</label>
                                </article>

                                <input type="hidden" name="errorCnt" value="{!! @$_GET['_err'] = (@$_GET['_err'] === null) ? 0 : @$_GET['_err'] !!}">

                                <input type="hidden" name="rdirURL" value="{!! @$_GET['rdir'] !!}">
                                
                                <article class="">
                                    <button type="submit">
                                        Login
                                    </button> 
                                    <a href="">Forgot password?</a>
                                </article>
                            </form>

                            <section class="to-login">
                                <article id="frm-caption">Create an account if you haven't already.</article>
                            @if(isset($_GET['rdir']))
                                <a href="{{ url('/trader/register?rdir='.$_GET['rdir']) }}" id="login-btn">Register</a>
                            @else
                                <a href="{{ url('/trader/register') }}" id="login-btn">Register</a>
                            @endif
                            </section>
                            
                        </li>
                    </ul>
                </section>
            </section>
            @endsection