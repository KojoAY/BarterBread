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
                    <h1>About Batabred</h1-->

                    <section class="accman-content" style="margin-left: 0; border: none; width: 96.5%;">
                        <h1>Edit Personal Information</h1>
                        <form action="/trader/profile/edit" method="post" enctype="multipart/form-data" class="edit-profile">
                            {{ csrf_field() }}
                            
                            <article>
                                <strong>first name:</strong> 
                                <input type="text" name="fName" value="{{ $getUserInfo->fname }}">
                            </article>
                            <article>
                                <strong>last name:</strong> 
                                <input type="text" name="lName" value="{{ $getUserInfo->lname }}">
                            </article>
                            <article>
                                <strong>email:</strong> 
                                <input type="text" name="eMail" value="{{ $getUserInfo->email }}">
                            </article>
                            <article>
                                <strong>password:</strong> 
                                <input type="password" name="password" value="{{ $getUserInfo->password }}">
                            </article>
                            <article>
                                <strong>phone no.:</strong> 
                                <input type="text" name="telNo" value="{{ $getUserInfo->tele }}">
                            </article>
                            <article>
                                <strong>city:</strong> 
                                <input type="text" name="city" value="{{ $getUserInfo->city }}">
                            </article>
                            <article>
                                <strong>region:</strong> 
                                <input type="text" name="region" value="{{ $getUserInfo->region }}">
                            </article>
                            <article>
                                <strong>country:</strong> 
                                <select>
                                @foreach($getCountryList as $country)
                                    <option value="{{ $country->country_zip_code }}" {!! ($country->country_zip_code == $getUserInfo->country) ? 'selected="selected"': '' !!}>
                                        {{ $country->country_name }}
                                    </option>
                                @endforeach
                                </select>
                            </article>

                            <article>
                                <strong>Zip Code:</strong> 
                                <input type="text" name="zipCode" value="{{ $getUserInfo->zipcode }}">
                            </article>

                            <button type="submit">
                                <i class="fa fa-save"></i> Save Changes
                            </button>

                            <a href="/trader/profile" class="blueBtn">
                                Cancel
                            </a>
                        </form>
                        
                    </section>
                </section>
            </section>
	@endsection