@extends('layouts.app')
	@section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; profile manager</article>

                <section class="page-content-holder">
                    <!--nav class="accman-menu">
                        <ul>
                            <li class="user-info-sum">
                            </li>
                        </ul>
                        
                    </nav>
                    <h1>About Barterbread</h1-->

                    <section class="accman-content" style="margin-left: 0; border: none; width: 96.5%;">
                        <h1>Personal Information</h1>
                        <form action="" method="post" enctype="">

                            <article>
                                <strong>name:</strong> {{ $getUserInfo->fullname }}
                            </article>
                            <article>
                                <strong>email:</strong> {{ $getUserInfo->email }}
                            </article>
                            <article>
                                <strong>password:</strong> ********
                            </article>
                            <article>
                                <strong>phone no.:</strong> {{ $getUserInfo->tele }}
                            </article>
                            <article>
                                <strong>city:</strong> {{ $getUserInfo->city }}
                            </article>
                            <article>
                                <strong>state:</strong> {{ $getUserInfo->region }}
                            </article>
                            <article>
                                <strong>country:</strong> 
                                {!! @$getCountryList->country_name !!}
                            </article>
                            <article>
                                <strong>zip code:</strong> {{ $getUserInfo->zipcode }}
                            </article>

                            <a href="/trader/profile/edit" class="black-orangeBtn">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </form>
                        
                    </section>
                </section>
            </section>
	@endsection