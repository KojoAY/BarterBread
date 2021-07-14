@extends('layouts.app')
        @section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; register</article>

                <section class="page-content-holder">
                    <section class="login_register_frmHolder">
                        <h1>Register</h1>
                        <article class="contSocMed">
                            <a id="fb" href="{{ url('trader/login/facebook') }}">
                                Continue with Facebook
                                <i class="fa fa-facebook fa-fw"></i>
                            </a>
                            <br>
                            <a id="gg" href="{{ url('trader/login/google') }}">
                                Continue with Google
                                <i class="fa fa-google fa-fw"></i>
                            </a>
                        </article>

                        <article class="notShare" style="border: none; border-top: 1px solid #ddd;">
                             By continuing or logging in, it means you agree to our 
                                <a href="{{ url('/terms-of-use') }}">Terms of Use</a> and 
                                <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>.
                        </article>
                            
                        <div style="font-weight:bold; text-align: center;">OR</div>

                        
                        <form method="post" action="{{ url('/trader/register') }}" enctype="multipart/form-data" class="trader-regfrm">
                            {{ csrf_field() }}

                            <article>
                                <div>
                                    <label for="fname" class="">Your Name</label>
                                </div>
                                <div class="col-50">
                                    <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" placeholder="First Name" required>
                                </div>

                                <div class="col-50">
                                    <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" placeholder="Last Name" required>
                                </div>
                            </article>

                            <article>
                                <div>
                                    <label for="email" class="">Your Email Address</label>
                                </div>
                                <div>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                                </div>
                            </article>

                            <article>
                                <div>
                                    <label for="password" class="">Create Your Password</label>
                                </div>
                                <div class="col-50">
                                    <input id="password" type="password" name="password" placeholder="Password" required>
                                </div>

                                <div class="col-50">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                            </article>

                            <article>
                                <input id="tandc" type="checkbox" class="form-control" value="1" name="tandc" required>
                                <label for="tandc" class="lbl-tandc">
                                    I have read and agree to the 
                                    <a href="{{ url('/terms-of-use') }}">Terms of Use</a> and 
                                    <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>
                                </label>
                            </article>

                            <input id="userID" type="hidden" class="form-control" name="userCode" value="<?php echo 'BBT' . rand(111,999) . '-' . strtoupper(str_random(8)); ?>">
                            
                            <input type="hidden" name="rdirURL" value="{!! @$_GET['rdir_url'] = (@$_GET['rdir_url'] === null) ? '-' : @$_GET['rdir_url'] !!}">
                            
                            <input type="hidden" name="rdirURL" value="{!! @$_GET['rdir'] !!}">

                            <article class="">
                                <button type="submit">
                                    Register
                                </button>
                            </article>
                        </form>

                        <section class="to-login">
                            <article id="frm-caption">Login if you already have an account.</article>
                            <a href="{{ url('/trader/login') }}" id="login-btn">Login</a>
                        </section>
                    </section>

                </section>
            </section>
            @endsection
