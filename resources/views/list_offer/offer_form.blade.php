@extends('layouts.app')
        @section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; list offer</article>
                <section class="page-content-holder">
                    <h1>List Offer</h1>
                    
                    <form method="POST" action="{{ url('/list-offer') }}" enctype="multipart/form-data" class="list-offerfrm">
                        {{ csrf_field() }}

                        <input type="hidden" name="unique_id" value="<?php echo str_random(3) . '-' . rand(1111,9999) . '-' . str_random(4); ?>">

                        <input type="hidden" name="rdirURL" value="{!! @$_GET['rdir'] !!}">
                        
                        <h2 id="main-title">I'm offering</h2>
                        <article id="frm-caption">Fill the fields with details of your offer.</article>

                        <article>
                            <div>
                                <label for="o_category" class="">Category<span id="ast">*</span></label>
                            </div>
                            <select name="o_category" required>
                                <option> </option>
                                @foreach($getMainCategories as $mainCateg)
                                <option value="$mainCateg->category_code">{{ $mainCateg->category_name }}</option>
                                @endforeach
                            </select>
                        </article>

                        <article>
                            <div>
                                <label for="o_title" class="">Title<span id="ast">*</span></label>
                            </div>
                            <div>
                                <input id="o_title" type="text" class="form-control" name="o_title" value="{{ old('o_title') }}" placeholder="" required>
                            </div>
                        </article>

                        <article>
                            <div>
                                <label for="o_actValue" class="">Value<span id="ast">*</span></label><br>
                                <em>(Estimated cash value of your offer.)</em>
                            </div>
                            <div>
                                GH&cent;
                                <input id="o_actValue" type="text" class="form-control" name="o_actValue" style="width: 100px;" value="{{ old('o_actValue') }}" placeholder="0" required>
                            </div>
                        </article>

                        <article>
                            <div>
                                <label for="o_desc" class="">Description<span id="ast">*</span></label>
                            </div>
                            <div>
                                <textarea id="o_desc" class="form-control" name="o_desc" value="{{ old('o_desc') }}" placeholder="" required></textarea>
                            </div>
                        </article>

                        <article class="offer-photos">
                            
                            <div>
                                <label for="o_photos" class="">Upload Photos</label><br>
                                <em id="frm-caption">(First photo will be your default display photo)</em>
                            </div>

                            <?php
                            for($i = 0; $i < 5; $i++) {
                                echo '
                                <label class="picHolder">
                                    <article id="imgHolder' . $i . '">
                                        <i class="fa fa-camera"></i>
                                    </article>
                                    <input type="file" name="o_photos[]" onchange="readURL(this, \'#imgHolder' . $i . '\');" />
                                    
                                </label>';
                            }?>
                        </article>



                        <script type="text/javascript">
                        function readURL(input, imgHolder) {
                            $(imgHolder).empty();

                            if (input.files && input.files[0]) {

                                var imgPath = $(input)[0].value;
                                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

                                
                                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                                    if (typeof (FileReader) != "undefined") {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            
                                            $("<img />", {
                                                "src": e.target.result,
                                                "class": "thumb-image"
                                            }).appendTo(imgHolder);

                                            /*$("<input />", {
                                                "type": "radio",
                                                "name": "def_img",
                                                "class": "default-img",
                                                "checked": "checked",
                                                "value": "Default"
                                            }).appendTo(imgHolder);*/

                                        }
                                        $(imgHolder).show();

                                        $(imgHolder+" .fa-camera").hide();
                                        reader.readAsDataURL(input.files[0]);

                                    } else {
                                        alert("This browser does not support FileReader.");
                                    }

                                } else {
                                    alert("Pls select only images");
                                }
                            }
                        }
                        </script>


                        <h2 id="main-title">I want</h2>
                        <article id="frm-caption">Fill the fields with details of what you want to barter your offer for.</article>

                        <article id="tag">Option 1<span id="ast">*</span></article>
                        <article>
                            <div>
                                <label for="w_tradeType_1" class="">Trade Type<span id="ast">*</span></label>
                            </div>
                            <label style="font-weight: normal;">
                                <input type="radio" name="w_tradeType_1" id="w_tradeType_1_1" value="1" checked="checked"> Barter (Swap)
                            </label>
                            <span style="display: inline-block; margin: 0 30px;"></span>
                            <label style="font-weight: normal;">
                                <input type="radio" name="w_tradeType_1" id="w_tradeType_1_2" value="2"> Cash Value
                            </label>
                        </article>

                        <section id="cashOpt">
                            <article>
                                <div>
                                    <label for="w_price_1" class="">Price<span id="ast">*</span></label>
                                </div>
                                <div id="w_price_1" type="text" class="form-control" style="width: 120px; border: none;">
                                    GH&cent;0.00
                                </div>
                            </article>
                            
                            <article>
                                <label style="font-weight: normal;">
                                    <input type="checkbox" name="w_nego_1" value="1" checked="checked"> Negotiable
                                </label>
                            </article>
                        </section>

                        <section id="barterOpt">
                            <article>
                                <div>
                                    <label for="w_category_1" class="">Category<span id="ast">*</span></label>
                                </div>
                                <select name="w_category_1" required>
                                    <option> </option>
                                    @foreach($getMainCategories as $mainCateg)
                                    <option value="$mainCateg->category_code">{{ $mainCateg->category_name }}</option>
                                    @endforeach
                                </select>
                            </article>

                            <article>
                                <div>
                                    <label for="w_title_1" class="">Title<span id="ast">*</span></label>
                                </div>
                                <div>
                                    <input id="w_title_1" type="text" class="form-control" name="w_title_1" value="{{ old('w_title_1') }}" placeholder="" required>
                                </div>
                            </article>

                            <article>
                                <div>
                                    <label for="o_addCash_1" class="">Top Up Cash</label><br>
                                    <em>(Amount an offerer must add to make up for the value of your offer.)</em>
                                </div>
                                <div>
                                    GH&cent;
                                    <input id="o_addCash_1" type="text" class="form-control" name="w_addCash_1" style="width: 100px;" value="{{ old('o_addCash_1') }}" placeholder="0">
                                </div>
                            </article>
                        </section>





                        <article id="tag" style="display: block; margin-top: 80px;">Option 2</article>

                        <article>
                            <div>
                                <label for="w_category_2" class="">Category</label>
                            </div>
                            <select name="w_category_2">
                                <option> </option>
                                @foreach($getMainCategories as $mainCateg)
                                <option value="$mainCateg->category_code">{{ $mainCateg->category_name }}</option>
                                @endforeach
                            </select>
                        </article>

                        <article>
                            <div>
                                <label for="w_title_2" class="">Title</label>
                            </div>
                            <div>
                                <input id="w_title_2" type="text" class="form-control" name="w_title_2" value="{{ old('w_title_2') }}" placeholder="">
                            </div>
                        </article>

                        <article>
                            <div>
                                <label for="w_addCash_2" class="">Additional Cash</label><br>
                                <em>(Additional amount to make up for the value.)</em>
                            </div>
                            <div>
                                GH&cent;
                                <input id="w_addCash_2" type="text" class="form-control" name="w_addCash_2" style="width: 100px;" value="{{ old('o_addCash_2') }}" placeholder="0">
                            </div>
                        </article>




                        <article id="tag" style="display: block; margin-top: 80px;">Option 3</article>

                        <article>
                            <div>
                                <label for="w_category_3" class="">Category</label>
                            </div>
                            <select name="w_category_3">
                                <option> </option>
                                @foreach($getMainCategories as $mainCateg)
                                <option value="$mainCateg->category_code">{{ $mainCateg->category_name }}</option>
                                @endforeach
                            </select>
                        </article>

                        <article>
                            <div>
                                <label for="w_title_3" class="">Title</label>
                            </div>
                            <div>
                                <input id="w_title_3" type="text" class="form-control" name="w_title_3" value="{{ old('w_title_3') }}" placeholder="">
                            </div>
                        </article>

                        <article>
                            <div>
                                <label for="w_addCash_3" class="">Additional Cash</label><br>
                                <em>(Additional amount to make up for the value.)</em>
                            </div>
                            <div>
                                GH&cent;
                                <input id="w_addCash_3" type="text" class="form-control" name="w_addCash_3" style="width: 100px;" value="{{ old('o_addCash_3') }}" placeholder="0">
                            </div>
                        </article>


                        <article style="border-top: 1px solid #ddd; margin-top: 40px; padding-top: 30px;">
                            <div>
                                <label for="o_barterType" class="">Type of Barter</label>
                            </div>
                            <div style="margin: 5px 0;">
                                <label style="font-weight: normal;">
                                    <input id="o_barterType" type="radio" class="form-control" name="o_barterType" value="1" checked="checked"> Limited Barter <em>(I want what is on my "I Need" list only)</em>
                                </label>
                            </div>
                            <div style="margin: 5px 0;">
                                <label style="font-weight: normal;">
                                    <input id="o_barterType" type="radio" class="form-control" name="o_barterType" value="2"> Open Barter <em>(I want what is on my "I Need" list and any offer within the value)</em>
                                </label>
                            </div>
                        </article>



                        <h2 id="main-title">Contact Details</h2>
                        <article id="frm-caption">
                            Fill the fields with contact details.<br>
                            <em>(or update your contact details in <strong><a href="{{ url('/trader/profile') }}">My Profile</a></strong>)</em>
                        </article>


                        <article>
                            <div>
                                <label for="o_city" class="">City<span id="ast">*</span></label>
                            </div>
                            @if(empty($getTraderContacts->city))
                            <div>
                                <input id="o_city" type="text" class="form-control" name="o_city" value="{{ (empty(@$getTraderContacts->city)) ? '' : @$getTraderContacts->city }}" placeholder="" required>
                            </div>
                            @else
                            <div id="o_city" type="text" class="form-control" style="color: #999; border: none;">
                                {{ $getTraderContacts->city }}
                            </div>
                            @endif
                        </article>


                        <article>
                            <div>
                                <label for="o_region" class="">Region<span id="ast">*</span></label>
                            </div>
                            @if(empty($getTraderContacts->region))
                            <div>
                                <input id="o_region" type="text" class="form-control" name="o_region" value="{{ (empty(@$getTraderContacts->region)) ? '' : @$getTraderContacts->region }}" placeholder="" required>
                            </div>
                            @else
                            <div id="o_region" type="text" class="form-control" style="color: #999; border: none;">
                                {{ $getTraderContacts->region }}
                            </div>
                            @endif
                        </article>


                        <article>
                            <div>
                                <label for="o_tele" class="">Telephone<span id="ast">*</span></label>
                            </div>
                            @if(empty($getTraderContacts->tele))
                            <div>
                                <input id="o_tele" type="text" class="form-control" name="o_tele" value="{{ (empty(@$getTraderContacts->tele)) ? '' : @$getTraderContacts->tele }}" placeholder="" required>
                            </div>
                            @else
                            <div id="o_tele" type="text" class="form-control" style="color: #999; border: none;">
                                {{ $getTraderContacts->tele }}
                            </div>
                            @endif
                        </article>


                        <!--article>
                            <div>
                                <label for="o_contactBy" class="">Contact Me By<span id="ast">*</span></label>
                            </div>
                            <div>
                            
                                <input id="o_contactBy" type="radio" class="form-control" name="o_contactBy" value="1" checked="checked"> Both
                                
                                <span id="sep"></span>
                                <input id="o_contactMedium" type="radio" class="form-control" name="o_contactBy" value="2"> Inbox
                                <span id="sep"></span>
                                
                                <input id="o_contactBy" type="radio" class="form-control" name="o_contactBy" value="3"> Phone
                                
                            </div>
                        </article-->

                        <article class="">
                            <button type="submit">
                                Post Offer
                            </button>
                        </article>
                    </form>
                </section>
            </section>
            @endsection