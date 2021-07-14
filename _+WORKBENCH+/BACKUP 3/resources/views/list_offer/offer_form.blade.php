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
                                <option>Electronics</option>
                                <option>Cars &amp; Vehicles</option>
                                <option>Fashion</option>
                                <option>Health &amp; Beauty</option>
                                <option>Home &amp; Garden</option>
                                <option>Jobs &amp; Services</option>
                                <option>Real Estate</option>
                                <option>Hobby &amp; Toys</option>
                                <option>Sports</option>
                                <option>Education</option>
                                <option>Food &amp; Beverages</option>
                                <option>Tools &amp; Machines</option>
                                <option>Pets &amp; Animals</option>
                                <option>Books</option>
                                <option>Entertainment</option>
                                <option>Arts &amp; Collectibles</option>
                                <option>Others</option>
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
                                <label for="o_actValue" class="">Actual Value<span id="ast">*</span></label><br>
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


                        <h2 id="main-title">I need</h2>
                        <article id="frm-caption">Fill the fields with details of what you want to barter your offer for.</article>

                        <article id="tag">Option 1<span id="ast">*</span></article>

                        <article>
                            <div>
                                <label for="w_category_1" class="">Category<span id="ast">*</span></label>
                            </div>
                            <select name="w_category_1" required>
                                <option> </option>
                                <option>Electronics</option>
                                <option>Cars &amp; Vehicles</option>
                                <option>Fashion</option>
                                <option>Health &amp; Beauty</option>
                                <option>Home &amp; Garden</option>
                                <option>Jobs &amp; Services</option>
                                <option>Real Estate</option>
                                <option>Hobby &amp; Toys</option>
                                <option>Sports</option>
                                <option>Education</option>
                                <option>Food &amp; Beverages</option>
                                <option>Tools &amp; Machines</option>
                                <option>Pets &amp; Animals</option>
                                <option>Books</option>
                                <option>Entertainment</option>
                                <option>Arts &amp; Collectibles</option>
                                <option>Others</option>
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
                                <em>(Amount an offerer must add to make up for the actual value of your offer.)</em>
                            </div>
                            <div>
                                GH&cent;
                                <input id="o_addCash_1" type="text" class="form-control" name="w_addCash_1" style="width: 100px;" value="{{ old('o_addCash_1') }}" placeholder="0">
                            </div>
                        </article>






                        <article id="tag" style="display: block; margin-top: 80px;">Option 2</article>

                        <article>
                            <div>
                                <label for="w_category_2" class="">Category</label>
                            </div>
                            <select name="w_category_2">
                                <option> </option>
                                <option>Electronics</option>
                                <option>Cars &amp; Vehicles</option>
                                <option>Fashion</option>
                                <option>Health &amp; Beauty</option>
                                <option>Home &amp; Garden</option>
                                <option>Jobs &amp; Services</option>
                                <option>Real Estate</option>
                                <option>Hobby &amp; Toys</option>
                                <option>Sports</option>
                                <option>Education</option>
                                <option>Food &amp; Beverages</option>
                                <option>Tools &amp; Machines</option>
                                <option>Pets &amp; Animals</option>
                                <option>Books</option>
                                <option>Entertainment</option>
                                <option>Arts &amp; Collectibles</option>
                                <option>Others</option>
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
                                <em>Additional amount to make up for the actual value.</em>
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
                                <option>Electronics</option>
                                <option>Cars &amp; Vehicles</option>
                                <option>Fashion</option>
                                <option>Health &amp; Beauty</option>
                                <option>Home &amp; Garden</option>
                                <option>Jobs &amp; Services</option>
                                <option>Real Estate</option>
                                <option>Hobby &amp; Toys</option>
                                <option>Sports</option>
                                <option>Education</option>
                                <option>Food &amp; Beverages</option>
                                <option>Tools &amp; Machines</option>
                                <option>Pets &amp; Animals</option>
                                <option>Books</option>
                                <option>Entertainment</option>
                                <option>Arts &amp; Collectibles</option>
                                <option>Others</option>
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
                                <em>Additional amount to make up for the actual value.</em>
                            </div>
                            <div>
                                GH&cent;
                                <input id="w_addCash_3" type="text" class="form-control" name="w_addCash_3" style="width: 100px;" value="{{ old('o_addCash_3') }}" placeholder="0">
                            </div>
                        </article>


                        <article>
                            <div>
                                <label for="o_barterType" class="">Type of Barter</label>
                            </div>
                            <div style="margin: 5px 0;">
                                <input id="o_barterType" type="radio" class="form-control" name="o_barterType" value="1" checked="checked"> Limited Barter <em>(I want what is on my "I Need" list only)</em>
                            </div>
                            <div style="margin: 5px 0;">
                                <input id="o_barterType" type="radio" class="form-control" name="o_barterType" value="2"> Open Barter <em>(I want what is on my "I Need" list and any offer within the actual value)</em>
                            </div>
                        </article>



                        <h2 id="main-title">Contact Details</h2>
                        <article id="frm-caption">Fill the fields with contact details.</article>


                        <article>
                            <div>
                                <label for="o_city" class="">City<span id="ast">*</span></label>
                            </div>
                            <div>
                                <input id="o_city" type="text" class="form-control" name="o_city" value="{{ old('o_city') }}" placeholder="" required>
                            </div>
                        </article>


                        <article>
                            <div>
                                <label for="o_region" class="">Region<span id="ast">*</span></label>
                            </div>
                            <div>
                                <input id="o_region" type="text" class="form-control" name="o_region" value="{{ old('o_region') }}" placeholder="" required>
                            </div>
                        </article>


                        <article>
                            <div>
                                <label for="o_tele" class="">Telephone<span id="ast">*</span></label>
                            </div>
                            <div>
                                <input id="o_tele" type="text" class="form-control" name="o_tele" value="{{ old('o_tele') }}" placeholder="" required>
                            </div>
                        </article>


                        <article>
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
                        </article>

                        <article class="">
                            <button type="submit">
                                Post Offer
                            </button>
                        </article>
                    </form>
                </section>
            </section>
            @endsection