@extends('layouts.main')
@section('title')
    Restaurant & Bakery
@endsection
@section('css')
<style type="text/css">
.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
}

.thumbnail {
    padding: 0;
}

.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    width: 100%;
}

.col-sm-3 a {
    border: 1px solid transparent;
    border-radius: 0;
    transition: all 3s ease;
}

.col-sm-3 a:hover {
    border: 1px solid #ff4647;
    border-radius: 100% 60% / 30% 10%;
    background: linear-gradient(rgba(56,123,131,0.7),rgba(56,123,131,0.7));
}
</style>
@stop

@section('content')



<!--ABOUT US TOP AREA START-->

<!--ABOUT US TOP AREA END-->

<!--ABOUT US TESTIMONIAL AREA START-->
<div class="about-team-area">
    <div class="container">
    	 <div class="row">
            <div class="col-sm-6" id="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                    <!-- <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-16">
                            <img src="https://bufiles.blob.core.windows.net/co3628/gallery/accessories/Thumb/falko_gallery_accessories16.jpg">
                        </a>
                    </li> -->

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-10"><img src="{{URL::to('assets/img/slider/slider_1.jpg')}}"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-1"><img src="{{URL::to('assets/img/slider/slider_2.jpg')}}"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-2"><img src="{{URL::to('assets/img/slider/slider_3.jpg')}}"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-3"><img src="{{URL::to('assets/img/slider/slider_4.jpg')}}"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-4"><img src="{{URL::to('assets/img/slider/slider_5.jpg')}}"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-5"><img src="{{URL::to('assets/img/slider/slider_6.jpg')}}"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-6"><img src="{{URL::to('assets/img/slider/slider_7.jpg')}}"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-7"><img src="{{URL::to('assets/img/slider/slider_9.jpg')}}"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-9"><img src="{{URL::to('assets/img/slider/slider_10.jpg')}}"></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <div class="col-xs-12" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <!-- <div class="active item" data-slide-number="16">
                                        <img src="https://bufiles.blob.core.windows.net/co3628/gallery/accessories/falko_gallery_accessories16.jpg"></div> -->

                                    <div class="active item" data-slide-number="10">
                                        <img src="{{URL::to('assets/img/slider/slider_1.jpg')}}"></div>

                                    <div class="item" data-slide-number="1">
                                        <img src="{{URL::to('assets/img/slider/slider_2.jpg')}}"></div>

                                    <div class="item" data-slide-number="2">
                                        <img src="{{URL::to('assets/img/slider/slider_3.jpg')}}"></div>

                                    <div class="item" data-slide-number="3">
                                        <img src="{{URL::to('assets/img/slider/slider_4.jpg')}}"></div>

                                    <div class="item" data-slide-number="4">
                                        <img src="{{URL::to('assets/img/slider/slider_5.jpg')}}"></div>
                                    
                                    <div class="item" data-slide-number="5">
                                        <img src="{{URL::to('assets/img/slider/slider_6.jpg')}}"></div>
                                    
                                    <div class="item" data-slide-number="6">
                                        <img src="{{URL::to('assets/img/slider/slider_7.jpg')}}"></div>
                                    
                                    <div class="item" data-slide-number="7">
                                        <img src="{{URL::to('assets/img/slider/slider_9.jpg')}}"></div>
                                    
                                    <div class="item" data-slide-number="9">
                                        <img src="{{URL::to('assets/img/slider/slider_10.jpg')}}"></div>
                                </div>
                                <!-- Carousel nav -->
                                <!--<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Slider-->
        </div>


    </div>
</div>
<!--ABOUT US TESTIMONIAL AREA END-->

<!--ABOUT US TEAM AREA START-->
<br /><br />
<!--ABOUT US TEAM AREA END-->
@endsection

@section('script')
<script>
  jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
</script>
@stop