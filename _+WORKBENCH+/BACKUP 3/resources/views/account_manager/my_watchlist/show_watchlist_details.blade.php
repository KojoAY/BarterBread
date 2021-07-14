@extends('layouts.app')
	@section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; watchlist manager</article>

                <section class="page-content-holder">
                    <nav class="accman-menu">
                        <ul>
                            <li></li>
                        </ul>
                        
                    </nav>
                    <!--h1>About Batabred</h1-->

                    <section class="accman-content">
                        <h1>my watchlist</h1>
                        <form action="" method="post" enctype="">
                            <article>
                                <strong>first name:</strong> Kojo
                            </article>
                            <article>
                                <strong>last name:</strong> Amoafo-Yeboah
                            </article>
                            <article>
                                <strong>email:</strong> kojo.email@gmail.com
                            </article>
                            <article>
                                <strong>password:</strong> ********
                            </article>
                            <article>
                                <strong>phone no.:</strong> +233 24 406 2242
                            </article>
                            <article>
                                <strong>city:</strong> Tema
                            </article>
                            <article>
                                <strong>state:</strong> Greater Accra
                            </article>
                            <article>
                                <strong>country:</strong> Ghana
                            </article>

                            <button>
                                <i class="fa fa-edit"></i> Edit
                            </button>
                        </form>
                        
                    </section>
                </section>
            </section>
	@endsection