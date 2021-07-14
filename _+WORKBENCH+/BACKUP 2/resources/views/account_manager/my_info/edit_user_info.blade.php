@extends('layouts.app')
	@section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; profile manager</article>

                <section class="page-content-holder">
                    <nav class="accman-menu">
                        <ul>
                            <li class="user-info-sum">
                                <article class="photo">
                                    
                                    <h4>Upload Photo</h4>
                                </article>
                                <article>
                                    <a href="{{ url('/trader/profile') }}"><i class="fa fa-edit"></i> edit profile</a>
                                </article>
                            </li>

                            <li>
                                <a href="{{ url('/trader/offers') }}"><i class="fa fa-list"></i> my offers</a>
                            </li>

                            <li>
                                <a href="{{ url('/trader/watchlist') }}"><i class="fa fa-eye"></i> my watchlist</a>
                            </li>
                        </ul>
                        
                    </nav>
                    <!--h1>About Batabred</h1-->

                    <section class="accman-content">
                        <h1>Personal Information</h1>
                        <form action="" method="post" enctype="" class="edit-profile">
                            <article>
                                <strong>first name:</strong> 
                                <input type="text" name="fName" value="Kojo">
                            </article>
                            <article>
                                <strong>last name:</strong> 
                                <input type="text" name="lName" value="Amoafo-Yeboah">
                            </article>
                            <article>
                                <strong>email:</strong> 
                                <input type="text" name="eMail" value="kojo.email@gmail.com">
                            </article>
                            <article>
                                <strong>password:</strong> 
                                <input type="password" name="password" value="[trader's password]">
                            </article>
                            <article>
                                <strong>phone no.:</strong> 
                                <input type="text" name="telNo" value="+233 24 406 2242">
                            </article>
                            <article>
                                <strong>city:</strong> 
                                <input type="text" name="city" value="Tema">
                            </article>
                            <article>
                                <strong>region:</strong> 
                                <input type="text" name="region" value="Greater Accra">
                            </article>
                            <article>
                                <strong>country:</strong> 
                                <input type="text" name="country" value="Ghana">
                            </article>

                            <button>
                                <i class="fa fa-save"></i> Save Changes
                            </button>
                        </form>
                        
                    </section>
                </section>
            </section>
	@endsection