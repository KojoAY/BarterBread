@extends('layouts.app')
        @section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; list offer</article>

                <section class="page-content-holder">
                    <h1>List Offer</h1>
                    
                    <form method="POST" action="{{ url('/list-offer') }}" enctype="multipart/form-data" class="list-offerfrm">
                        {{ csrf_field() }}

                        <input type="hidden" name="unique_id" value="<?php echo str_random(3) . '-' . rand(1111,9999) . '-' . str_random(4); ?>">

                        <h2 id="main-title">I'm offering</h2>
                        <article id="frm-caption">Fill the fields with details of your offer.</article>

                        <article>
                            <div>
                                <label for="actValue" class="">Category<span id="ast">*</span></label>
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
                                <label for="title" class="">Title<span id="ast">*</span></label>
                            </div>
                            <div>
                                <input id="title" type="text" class="form-control" name="o_title" value="{{ old('title') }}" placeholder="" required>
                            </div>
                        </article>

                        <article>
                            <div>
                                <label for="actValue" class="">Actual Value<span id="ast">*</span></label><br>
                                <em>(Estimated cash value of your offer.)</em>
                            </div>
                            <div>
                                GH&cent;
                                <input id="actValue" type="text" class="form-control" name="o_actValue" style="width: 100px;" value="{{ old('actValue') }}" placeholder="0" required>
                            </div>
                        </article>

                        <article>
                            <div>
                                <label for="description" class="">Description<span id="ast">*</span></label>
                            </div>
                            <div>
                                <textarea id="description" class="form-control" name="o_description" value="{{ old('description') }}" placeholder="" required></textarea>
                            </div>
                        </article>

                        <article class="offer-photos">
                            
                            <div>
                                <label for="description" class="">Upload Photos</label><br>
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
                                <label for="title" class="">Category<span id="ast">*</span></label>
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
                                <label for="title" class="">Title<span id="ast">*</span></label>
                            </div>
                            <div>
                                <input id="title" type="text" class="form-control" name="w_title_1" value="{{ old('title') }}" placeholder="" required>
                            </div>
                        </article>

                        <article>
                            <div>
                                <label for="title" class="">Description<span id="ast">*</span></label>
                            </div>
                            <div>
                                <textarea id="description" class="form-control" name="w_description_1" value="{{ old('description') }}" placeholder="" required></textarea>
                            </div>
                        </article>






                        <article id="tag" style="display: block; margin-top: 80px;">Option 2</article>

                        <article>
                            <div>
                                <label for="title" class="">Category</label>
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
                                <label for="title" class="">Title</label>
                            </div>
                            <div>
                                <input id="title" type="text" class="form-control" name="w_title_2" value="{{ old('title') }}" placeholder="">
                            </div>
                        </article>

                        <article>
                            <div>
                                <label for="title" class="">Description</label>
                            </div>
                            <div>
                                <textarea id="description" class="form-control" name="w_description_2" value="{{ old('description') }}" placeholder=""></textarea>
                            </div>
                        </article>




                        <article id="tag" style="display: block; margin-top: 80px;">Option 3</article>

                        <article>
                            <div>
                                <label for="title" class="">Category</label>
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
                                <label for="title" class="">Title</label>
                            </div>
                            <div>
                                <input id="title" type="text" class="form-control" name="w_title_3" value="{{ old('title') }}" placeholder="">
                            </div>
                        </article>

                        <article>
                            <div>
                                <label for="title" class="">Description</label>
                            </div>
                            <div>
                                <textarea id="description" class="form-control" name="w_description_3" value="{{ old('description') }}" placeholder=""></textarea>
                            </div>
                        </article>


                        <article>
                            <div>
                                <label for="title" class="">Type of Barter</label>
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
                                <label for="title" class="">City<span id="ast">*</span></label>
                            </div>
                            <div>
                                <input id="title" type="text" class="form-control" name="city" value="{{ old('title') }}" placeholder="" required>
                            </div>
                        </article>


                        <article>
                            <div>
                                <label for="title" class="">Region<span id="ast">*</span></label>
                            </div>
                            <div>
                                <input id="title" type="text" class="form-control" name="region" value="{{ old('title') }}" placeholder="" required>
                            </div>
                        </article>


                        <article>
                            <div>
                                <label for="title" class="">Telephone<span id="ast">*</span></label>
                            </div>
                            <div>
                                <input id="title" type="text" class="form-control" name="tele" value="{{ old('title') }}" placeholder="" required>
                            </div>
                        </article>


                        <article>
                            <div>
                                <label for="title" class="">Contact Me By<span id="ast">*</span></label>
                            </div>
                            <div>
                            
                                <input id="o_contactMedium" type="radio" class="form-control" name="o_contactMedium" value="1" checked="checked"> Both
                                
                                <span id="sep"></span>
                                <input id="o_contactMedium" type="radio" class="form-control" name="o_contactMedium" value="2"> Inbox
                                <span id="sep"></span>
                                
                                <input id="o_contactMedium" type="radio" class="form-control" name="o_contactMedium" value="3"> Phone
                                
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