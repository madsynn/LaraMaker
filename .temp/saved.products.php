
@section('content-off')

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <!-- Post Content
                    ============================================= -->
                    <div class="postcontent nobottommargin">


{{-- @include('frontend.shop.partials.layout.promo') --}}
{{-- @include('frontend.shop.partials.layout.4colrow') --}}



                        <!-- Shop
                        ============================================= -->
                        <div id="shop" class="shop product-3 product_box clearfix">
                        @foreach ($products as $product)
                            <div class="product clearfix" data-product-id="product-{{$product->id}}">
                                <div class="product-image">
@if($product->path)
<a href="{!! url($product->path . $product->file_name) !!}" data-lightbox="image">
<img class="image_fade" src="{!! url($product->path . $product->file_name) !!}" style="border: 1px solid #bdc3c7;" alt="{!! $product->title !!} image"/>
</a>
@else
<a href="#" data-lightbox="image"><img src="http://www.placehold.it/270x360/EFEFEF/AAAAAA?text=no+image" alt="{!! $product->name !!}"></a>
<a href="#" data-lightbox="image"><img src="http://www.placehold.it/270x360/EFEFEF/AAAAAA?text=still+no+image" alt="{!! $product->name !!}_alt"></a>
@endif
                                @if($product->sale_price)
                                <div class="sale-flash">50% Off*</div>
                                @endif
                                    <div class="product-overlay">
                                        <a href="/shop/addProduct/{{$product->id}}" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                {{--         <a href="{!! asset('/frontend/include/ajax/shop-item.php') !!}" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a> --}}
                                    </div>
                                </div>
                                <div class="product-desc center">
                                    <div class="product-title">
                                        <h3 itemprop="name" >
                                            <a href="{!! action('ShopController@product', ['slug'=>$product->slug]) !!}">
                                                {!! $product->name !!}
                                            </a>
                                        </h3>
                                    </div>
                                  @if($product->sale_price)  <div class="product-price"><del>${!! $product->price !!}</del> <ins>${!! $product->sale_price !!}</ins></div>@endif
                                  <div class="product-price"> ${!! $product->price !!} </div>
                              {{--       <div class="product-rating">
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star-half-full"></i>
                                    </div> --}}
                                </div>
                            </div>
                            @endforeach

                        </div><!-- #shop end -->

                    </div><!-- .postcontent end -->

                       {{-- @include('frontend.shop.partials.layout.full') --}}

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar nobottommargin col_last">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget widget_links clearfix">

                                <h4>Shop Categories</h4>
                                <ul>
                                    <li><a href="#">Hand Quilting</a></li>
                                    <li><a href="#">Machine Quilting</a></li>
                                    <li><a href="#">Automated Quilting</a></li>
                                    <li><a href="#">Qnique Quilter</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Grace's Favorites</a></li>

                                </ul>

                            </div>



                            <div class="widget clearfix">
                                <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FTheGraceCompany&amp;width=240&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=499481203443583" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:290px;" allowTransparency="true"></iframe>
                            </div>

                            <div class="widget subscribe-widget clearfix">

                                <h4>Subscribe For Latest Offers</h4>
                                <h5>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                                <form action="#" role="form" class="notopmargin nobottommargin">
                                    <div class="input-group divcenter">
                                        <input type="text" class="form-control" placeholder="Enter your Email" required="">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="submit"><i class="icon-email2"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div><!-- .sidebar end -->

                </div>

            </div>

        </section><!-- #content end -->
@endsection
---------------------------------------------------


        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <!-- Post Content
                    ============================================= -->
                    <div class="postcontent nobottommargin">


{{-- @include('frontend.shop.partials.layout.promo') --}}
{{-- @include('frontend.shop.partials.layout.4colrow') --}}



                        <!-- Shop
                        ============================================= -->
                        <div id="shop" class="shop product-3 product_box clearfix">
                        @foreach ($products as $product)
                            <div class="product clearfix" data-product-id="product-{{$product->id}}">
                                <div class="product-image">
@if($product->path)
<a href="{!! url($product->path . $product->file_name) !!}" data-lightbox="image">
<img class="image_fade" src="{!! url($product->path . $product->file_name) !!}" style="border: 1px solid #bdc3c7;" alt="{!! $product->title !!} image"/>
</a>
@else
<a href="#" data-lightbox="image"><img src="http://www.placehold.it/270x360/EFEFEF/AAAAAA?text=no+image" alt="{!! $product->name !!}"></a>
<a href="#" data-lightbox="image"><img src="http://www.placehold.it/270x360/EFEFEF/AAAAAA?text=still+no+image" alt="{!! $product->name !!}_alt"></a>
@endif
                                @if($product->sale_price)
                                <div class="sale-flash">50% Off*</div>
                                @endif
                                    <div class="product-overlay">
                                        <a href="/shop/addProduct/{{$product->id}}" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                {{--         <a href="{!! asset('/frontend/include/ajax/shop-item.php') !!}" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a> --}}
                                    </div>
                                </div>
                                <div class="product-desc center">
                                    <div class="product-title">
                                        <h3 itemprop="name" >
                                            <a href="{!! action('ShopController@product', ['slug'=>$product->slug]) !!}">
                                                {!! $product->name !!}
                                            </a>
                                        </h3>
                                    </div>
                                  @if($product->sale_price)  <div class="product-price"><del>${!! $product->price !!}</del> <ins>${!! $product->sale_price !!}</ins></div>@endif
                                  <div class="product-price"> ${!! $product->price !!} </div>
                              {{--       <div class="product-rating">
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star-half-full"></i>
                                    </div> --}}
                                </div>
                            </div>
                            @endforeach

                        </div><!-- #shop end -->

                    </div><!-- .postcontent end -->

                       {{-- @include('frontend.shop.partials.layout.full') --}}

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar nobottommargin col_last">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget widget_links clearfix">

                                <h4>Shop Categories</h4>
                                <ul>
                                    <li><a href="#">Hand Quilting</a></li>
                                    <li><a href="#">Machine Quilting</a></li>
                                    <li><a href="#">Automated Quilting</a></li>
                                    <li><a href="#">Qnique Quilter</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Grace's Favorites</a></li>

                                </ul>

                            </div>



                            <div class="widget clearfix">
                                <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FTheGraceCompany&amp;width=240&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=499481203443583" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:290px;" allowTransparency="true"></iframe>
                            </div>

                            <div class="widget subscribe-widget clearfix">

                                <h4>Subscribe For Latest Offers</h4>
                                <h5>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                                <form action="#" role="form" class="notopmargin nobottommargin">
                                    <div class="input-group divcenter">
                                        <input type="text" class="form-control" placeholder="Enter your Email" required="">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="submit"><i class="icon-email2"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div><!-- .sidebar end -->

                </div>

            </div>

        </section><!-- #content end -->