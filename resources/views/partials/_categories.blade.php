<div class="col-sm-12 col-md-3 col-lg-3 hidden-sm hidden-xs ">
    <div class="h-16">
        <div class="h2-left-cat">
            <h2 class="left-crt-title">Cateogry</h2>
            <div class="h16-menu">
                <nav>
                    <div class="left-cart-menu">
                        <ul>

                            @foreach($categories as $category)
                            <li> <i class="fa fa-gift"></i>   <a href="#"> {{$category->name}}  </a>
                                @if($category->subCategories)
                                <span><i class="fa fa-caret-right"></i></span>
                                @endif
                                <ul class="cat-sb">
                                    @foreach($category->subCategories as $subCategory)
                                    <li><a href="{{route('product.category', $subCategory->name)}}">{{$subCategory->name}}</a></li>
                                     @endforeach

                                </ul>

                            </li>

                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>


    <div class="h2-left-cat nra">
        <h2 class="left-crt-title">Best Sellers</h2>
        <div class="b-p-area">
            @foreach($categories->take(1) as $category)

                @foreach($category->products()->inRandomOrder()->take(3)->get() as $pharm_product)
            <div class="product-sale-of">
                <div class="s-of-p-img">
                    <a href="#">
                        <img class="min-img" src="{{URL::to($pharm_product->small1)}}" alt="">
                    </a>
                </div>
                <div class="s-of-p-info">
                    <div class="tab-p-info">
                        <a href="#"> {{$pharm_product->title}} </a>
                        <div class="star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <h3>₦{{number_format($pharm_product->price)}} {{$pharm_product->unit ? '/' . $pharm_product->unit : ''}} </h3>
                    </div>
                </div>
            </div>
                  @endforeach
            @endforeach

        </div>
    </div>

    <!-- add area -->
    <div class="all-h17-left-add">
        <div class="new-adds electronics-bottom-bannar-area">
            <a href="#"><img src="assets/img/all-adds/90.jpg" alt=""></a>
        </div>

        <div class="new-adds electronics-bottom-bannar-area hidden-md">
            <a href="#"><img src="assets/img/all-adds/91.jpg" alt=""></a>
        </div>
        <div class="img-banner-small hidden-md">
            <div class="banner-img  b-stripe">
                <a href="#">
                    <img src="assets/img/all-adds/93.jpg" alt="" class="img-responsive">
                    <span class="b-line-9 b-position-1">&nbsp;</span>
                    <span class="b-line-9 b-position-2">&nbsp;</span>
                    <span class="b-line-9 b-position-3">&nbsp;</span>
                    <span class="b-line-9 b-position-4">&nbsp;</span>
                    <span class="b-line-9 b-position-5">&nbsp;</span>
                    <span class="b-line-9 b-position-6">&nbsp;</span>
                    <span class="b-line-9 b-position-7">&nbsp;</span>
                    <span class="b-line-9 b-position-8">&nbsp;</span>
                    <span class="b-line-9 b-position-9">&nbsp;</span>
                </a>
            </div>
        </div>
    </div>
    <!-- add area -->
</div>