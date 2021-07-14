@extends('layouts.app')
        @section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; login</article>
                
                <section class="page-content-holder">
                    <section class="login_register_frmHolder">
                        <h1>Login</h1>

                        {{ @Session::put("rdirURL", $_GET['rdir']) }}
                            <article class="contSocMed">

                                <div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-auto-logout-link="false" data-use-continue-as="true"></div>

                                
                                <a id="fb" href="{{ url('trader/login/facebook') }}">
                                    <i class="fa fa-facebook fa-fw"></i> Continue with Facebook
                                </a>
                                <br>
                                <a id="gg" href="{{ url('trader/login/google') }}">
                                    <i class="fa fa-google fa-fw"></i> Continue with Google
                                    
                                </a>
                            </article>

                            <article class="notShare" style="border: none; border-top: 1px solid #ddd;">
                                 By continuing or logging in, it means you agree to our 
                                    <a href="{{ url('/terms-of-use') }}">Terms of Use</a> and 
                                    <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>.
                            </article>
                                
                            <div style="font-weight:bold; text-align: center;">OR</div>

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

                                <!--article>
                                    <label>
                                        <input type="checkbox" name="">
                                        By continuing or logging in, it means you agree to our 
                                        <a href="{{ url('/terms-of-use') }}">Terms of Use</a> and 
                                        <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>.
                                    </label>
                                </article-->
                            </form>

                            <section class="to-login">
                                <article id="frm-caption">Create an account if you haven't already.</article>
                            @if(isset($_GET['rdir']))
                                <a href="{{ url('/trader/register?rdir='.$_GET['rdir']) }}" id="login-btn">Register</a>
                            @else
                                <a href="{{ url('/trader/register') }}" id="login-btn">Register</a>
                            @endif
                            </section>
                    </section>

                </section>
            </section>
            @endsection