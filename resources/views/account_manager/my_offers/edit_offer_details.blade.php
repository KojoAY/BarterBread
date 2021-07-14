@extends('layouts.app')
	@section('content')

            <section class="main-content-block">
                <article class="bread-crumbs"><a href="{{ url('/') }}">home</a> &map; offer manager</article>

                <h1>edit offer details</h1>
                <section class="page-content-holder">
                    <nav class="accman-menu">
                        <section class="menu-items">
                            <a href="/trader/offers" class="blueBtn">
                                <i class="fa fa-th-list"></i>
                                My Offers
                            </a>
                        </section>

                        <ul class="offer-list-sum">
                            @foreach($getOfferList as $offerList)
                            <li>
                                <section>
                                <?php
                                $photosArr = explode(' ', $offerList->photos);
                                echo '<article id="item-photo" style="background-image: url(/photos/items/thumbs/' . $photosArr[0] . ')"></article>';
                                ?>
                                </section>

                                <section class="item-desc">
                                    
                                    <article class="item-title-loc">
                                        <?php
                                    $expTitle = explode(' ', $offerList->title);
                                    $impTitle = implode('-', $expTitle);
                                    ?>
                                        <a href="/trader/offers/details/{{ $offerList->offercode }}/{{ $impTitle }}" id="item-title">{!! $offerList->title !!}</a>
                                        <div id="item-loc">
                                            <!--i class="fa fa-calculator"></i--> 
                                            <?php
                                            /*$categId = $offerList->categoryid;
                                            $getMainCategById = DB::table("bb_main_categories")
                                                ->select("*")->where("id", "=", $categId)->first();

                                            echo $getMainCategById->category_name;*/
                                            ?>
                                              
                                            <span id="actVal">GH&cent;{!! number_format($offerList->actual_value, 2) !!}</span>
                                        </div>
                                        
                                        <!--div class="offerStat">
                                            <a href="#suggested-offers">OFFERS <span>0</span></a>
                                            <a>HITS <span>0</span></a>
                                        </div-->
                                    </article>
                                    
                                    <article class="manage-btn">
                                        <!--a href="/trader/offers/details/{{ $getOfferDetails->offercode }}/{{ $impTitle }}" class="black-orangeBtn">Details</a-->
                                        <a href="/trader/offers/edit/{!! $offerList->offercode !!}/{!! $impTitle !!}" class="black-orangeBtn">Edit</a>
                                        <span class="toRight">
                                            <a href="/trader/offers/del/{!! $offerList->offercode !!}/{!! $impTitle !!}" class="blueBtn">Delete</a>
                                        </span>
                                    </article>
                                </section>

                            </li>
                            @endforeach
                        </ul>
                        
                    </nav>
                    <!--h1>About Barterbread</h1-->

                    <section class="accman-content">
                        <?php 
                        $expTitle = explode(' ', $getOfferDetails->title);
                        $impTitle = implode('-', $expTitle);

                        $postURL = "/trader/offers/edit/{$getOfferDetails->offercode}/{$impTitle}"; ?>
                        <form method="POST" action="{{ url($postURL) }}" enctype="multipart/form-data" class="list-offerfrm">
                            {{ csrf_field() }}

                            <input type="hidden" name="unique_id" value="{!! $getOfferDetails->offercode !!}">

                            <h2 id="main-title">I'm offering</h2>
                            <article id="frm-caption">Fill the fields with details of your offer.</article>

                            <article>
                                <div>
                                    <label for="o_category" class="">Category<span id="ast">*</span></label>
                                </div>
                                <select name="o_category" required>
                                <?php
                                $cCnt = 1;
                                foreach ($getMainCategories as $mainCateg) {
                                    echo '<option value="' . $mainCateg->id . '"'; 
                                    echo ($getOfferDetails->categoryid == $mainCateg->id) ? 'selected="selected"' : '';
                                    echo '>' . $mainCateg->category_name . '</option>';
                                    $cCnt++;
                                }
                                ?>
                                </select>
                            </article>

                            <article>
                                <div>
                                    <label for="o_title" class="">Title<span id="ast">*</span></label>
                                </div>
                                <div>
                                    <input id="o_title" type="text" class="form-control" name="o_title" value="{{ $getOfferDetails->title }}" placeholder="" required>
                                </div>
                            </article>

                            <article>
                                <div>
                                    <label for="o_actValue" class="">Value<span id="ast">*</span></label><br>
                                    <em>(Estimated cash value of your offer.)</em>
                                </div>
                                <div>
                                    GH&cent;
                                    <input id="o_actValue" type="text" class="form-control" name="o_actValue" style="width: 100px;" value="{{ $getOfferDetails->actual_value }}" placeholder="0" required>
                                </div>
                            </article>

                            <article>
                                <div>
                                    <label for="description" class="">Description<span id="ast">*</span></label>
                                </div>
                                <div>
                                    <textarea id="description" class="form-control" name="o_desc" placeholder="" required>{{ $getOfferDetails->description }}</textarea>
                                </div>
                            </article>

                            <article class="offer-photos">
                                
                                <div>
                                    <label for="description" class="">Upload Photos</label><br>
                                    <em id="frm-caption">(First photo will be your default display photo)</em>
                                </div>

                                <?php
                                $trimPhotos = trim($getOfferDetails->photos);
                                $expPhotos = explode(' ', $trimPhotos);

                                $photoCnt = 5;
                                $cnt = 0;

                                foreach ($expPhotos as $photo) {
                                    echo '
                                    <label class="picHolder">
                                        <article id="imgHolder' . $cnt . '" style="background-image: url(/photos/items/thumbs/'. $photo .'); cursor: default;">
                                        </article>
                                        <!--input type="file" name="o_photos[]" onchange="readURL(this, \'#imgHolder' . $cnt . '\');" /-->

                                        <input type="hidden" name="checkPhotoName[]" value="'. $photo .'">

                                    </label>';
                                    $photoCnt--;
                                }

                                for($i = 0; $i < $photoCnt; $i++) {
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

                            <?php
                            $wCnt = 3;
                            $optNo = 0;

                            $getWantedList = DB::table("bb_wanted")
                                ->select("*")
                                ->where("offercode", "=", $getOfferDetails->offercode)
                                ->get();

                            foreach($getWantedList as $wanted) {
                                $optNo += 1;
                                $wCnt -= 1;

                                if($optNo == 1) {
                                    $ast = '<span id="ast">*</span>';
                                    $required = "required";
                                    $barterOpt = "barterOpt";
                                    echo '<article id="tag">Option ' . $optNo . '' . $ast . '</article>';
                                    echo '<article>
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
                                        </article>';

                                    echo '<section id="cashOpt">
                                            <article>
                                                <div>
                                                    <label for="w_price_1" class="">Price<span id="ast">*</span></label>
                                                </div>
                                                <div id="w_price_1" type="text" class="form-control" style="width: 120px; border: none;">
                                                    GH&cent;' . $getOfferDetails->actual_value . '
                                                </div>
                                            </article>
                                            
                                            <article>
                                                <label style="font-weight: normal;">
                                                    <input type="checkbox" name="w_nego_1" value="1" checked="checked"> Negotiable
                                                </label>
                                            </article>
                                        </section>';
                                } else {
                                    $ast = "";
                                    $required = "";
                                    $barterOpt = "";
                                    echo '<article id="tag" style="display: block; margin-top: 80px;">Option ' . $optNo . '' . $ast . '</article>';
                                }
                            ?>

                            <section id = "{{ $barterOpt }}">
                                <article>
                                    <div>
                                        <label for="w_category_{!! $optNo !!}" class="">Category{!! $ast !!}</label>
                                    </div>
                                    <select name="w_category_{!! $optNo !!}" {!! $required !!}>
                                    <?php
                                    $cCnt = 1;
                                    foreach ($getMainCategories as $wMainCateg) {
                                        echo '<option value="' . $wMainCateg->id . '"'; 
                                        echo ($wanted->categoryid == $wMainCateg->id) ? 'selected="selected"' : '';
                                        echo '>' . $wMainCateg->category_name . '</option>';
                                        $cCnt++;
                                    }
                                    ?>
                                    </select>
                                </article>

                                <article>
                                    <div>
                                        <label for="w_title_{!! $optNo !!}" class="">Title{!! $ast !!}</label>
                                    </div>
                                    <div>
                                        <input id="w_title_{!! $optNo !!}" type="text" class="form-control" name="w_title_{!! $optNo !!}" value="{{ $wanted->title }}" placeholder="" {!! $required !!}>
                                    </div>
                                </article>

                                <article>
                                    <div>
                                        <label for="w_addCash_{!! $optNo !!}" class="">Additional Cash</label><br>
                                        <em>Additional amount to make up for the value.</em>
                                    </div>
                                    <div>
                                        GH&cent;
                                        <input id="w_addCash_{!! $optNo !!}" type="text" class="form-control" name="w_addCash_{!! $optNo !!}" style="width: 100px;" value="{{ $wanted->addcash }}" placeholder="0">
                                    </div>
                                </article>

                                <input type="hidden" name="w_wantCode_{!! $optNo !!}" value="{!! $wanted->wantcode !!}">
                            </section>
                            <?php
                            }

                            $optNo += 1;
                            //echo $wCnt;
                            ?>



                            @for($i = 1; $i <= $wCnt; $i++, $optNo++)
                            <article id="tag" style="display: block; margin-top: 80px;">Option {{ $optNo }}</article>

                            <article>
                                <div>
                                    <label for="w_category_{{ $optNo }}" class="">Category</label>
                                </div>
                                <select name="w_category_{{ $optNo }}">
                                    <option></option>
                                <?php
                                $cCnt = 1;
                                foreach ($getMainCategories as $wMainCateg) {
                                    echo '<option value="' . $wMainCateg->id . '">' . $wMainCateg->category_name . '</option>';
                                    $cCnt++;
                                }
                                ?>
                                </select>
                            </article>

                            <article>
                                <div>
                                    <label for="w_title_{{ $optNo }}" class="">Title</label>
                                </div>
                                <div>
                                    <input id="w_title_{{ $optNo }}" type="text" class="form-control" name="w_title_{{ $optNo }}" value="{{ old('w_title_' . $optNo) }}" placeholder="">
                                </div>
                            </article>

                            <article>
                                <div>
                                    <label for="w_addCash_{{ $optNo }}" class="">Additional Cash</label><br>
                                    <em>Additional amount to make up for the value.</em>
                                </div>
                                <div>
                                    GH&cent;
                                    <input id="w_addCash_{{ $optNo }}" type="text" class="form-control" name="w_addCash_{{ $optNo }}" style="width: 100px;" value="{{ old('o_addCash_' . $optNo) }}" placeholder="0">
                                </div>
                            </article>
                            @endfor




                            <article>
                                <div>
                                    <label for="title" class="">Type of Barter</label>
                                </div>
                                
                                
                                <div style="margin: 5px 0;">
                                    <input id="o_barterType" type="radio" class="form-control" name="o_barterType" value="1" {{ ($getOfferDetails->barter_type == 1) ? 'checked="checked"' : '' }}> Limited Barter <em>(I want what is on my "I Need" list only)</em>
                                </div>
                                
                                <div style="margin: 5px 0;">
                                    <input id="o_barterType" type="radio" class="form-control" name="o_barterType" value="2" {{ ($getOfferDetails->barter_type == 2) ? 'checked="checked"' : '' }}> Open Barter <em>(I want what is on my "I Need" list and any offer within the value)</em>
                                </div>
                                
                            </article>



                            <h2 id="main-title">Contact Details</h2>
                            <article id="frm-caption">You can change your contact information in <a href="{{ url('/trader/profile') }}" style="font-weight: bold;">My Profile</a>.</article>

                            <!--article>
                                <div>
                                    <label for="o_contactBy" class="">Contact Me By</label>
                                </div>
                                <div>
                                
                                    <input id="o_contactBy" type="radio" class="form-control" name="o_contactBy" value="1" {{ ($getOfferDetails->contactby == 1) ? 'checked="checked"' : '' }}> Both
                                    
                                    <span id="sep"></span>
                                    <input id="o_contactBy" type="radio" class="form-control" name="o_contactBy" value="2" {{ ($getOfferDetails->contactby == 2) ? 'checked="checked"' : '' }}> Inbox
                                    <span id="sep"></span>
                                    
                                    <input id="o_contactBy" type="radio" class="form-control" name="o_contactBy" value="3" {{ ($getOfferDetails->contactby == 3) ? 'checked="checked"' : '' }}> Phone
                                    
                                </div>
                            </article-->

                            <article class="">
                                <button type="submit">
                                    Save Changes
                                </button>
                                <span class="toRight">
                                    <a href="/trader/offers/del/{!! $getOfferDetails->offercode !!}/{!! $impTitle !!}" class="blueBtn">Delete</a>
                                </span>
                            </article>
                        </form>
                        
                    </section>
                </section>
            </section>
	@endsection