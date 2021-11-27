@extends('frontend.layouts.app')

@section('meta_title') {{translate('Homepage')}} @endsection
@section('content')
@php
$main_social_links_name = json_decode( setting()->get('main_social_links_name_'.app()->getLocale()) );
$main_social_links_icon = json_decode(  setting()->get('main_social_links_icon_'.app()->getLocale()) );
@endphp
<!--Main Slider-->


@if(get_setting_by_lang('home_slider_status'))
<section id="main-banner-area" class="position-relative">

    <div id="revo_main_wrapper" class="rev_slider_wrapper fullwidthbanner-container m-0 p-0 bg-dark" data-alias="classic4export" data-source="gallery">
        <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
        <div id="rev_main" class="rev_slider fullwidthabanner white" data-version="5.4.1">
            <ul>
                @foreach (json_decode(get_setting_by_lang('home_slider_images'), true) as $key => $value)
                <li data-index="rs-0{{$key}}" data-transition="fade" data-slotamount="default" data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="{{$key+1}}">
                    <!-- MAIN IMAGE -->
                    <img src="{{!empty( json_decode(get_setting_by_lang('home_slider_images'), true)[$key] ) ? url('public/'.\App\Upload::find(json_decode(get_setting_by_lang('home_slider_images'), true)[$key])->file_name) : ''}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <!-- LAYER NR. 1 -->
                    <!-- <div class="overlay overlay-dark opacity-6"></div> -->
                    <div class="row">
                        <div class="col-md-12 text-center text-light media_query" style="position: relative; top: 140px; left: 0">
                            <h3 class="text-light text-capitalize wow fadeInUp pt-2" style="">Express Delivery</h3>
                            <h1 class="wow fadeInUp text-uppercase" style="">FAST, SAGE AND ACCURATE!</h1>
                            <h4 class="wow fadeInUp pt-2" style="">We'll do everything we can to make you a satisfied customer!</h4>
                            <br>
                            <a href="{{ route('login') }}" class="button gradient-btn mb-sm-0 text-uppercase" style="padding: 15px 50px; font-size: 16px;">Order Your Delivery</a>
                        </div>
                    </div>
                    
                </li>
                @endforeach
            </ul>
        </div>
    </div>


    @if(is_array($main_social_links_name))
    <ul class="social-icons-simple revicon white">
        @foreach ($main_social_links_name as $key => $social_link_name)
        @if($social_link_name || $main_social_links_icon[$key])
        <li class="d-table"><a href="{{$main_social_links_name[$key]}}"><i class="{{$main_social_links_icon[$key]}}"></i> </a> </li>
        @endif
        @endforeach
    </ul>
    @endif
</section>
@endif




@if(get_setting_by_lang('home_banner1_status') && !empty(json_decode(get_setting_by_lang('home_banner1_title'), true)))
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="services-slider" class="owl-carousel">
                @foreach (json_decode(get_setting_by_lang('home_banner1_title'), true) as $key => $value)
                <div class="item">
                    <div class="service-box">
                        <span><i class="{{!empty(get_setting_by_lang('home_banner1_icon')) ? json_decode(get_setting_by_lang('home_banner1_icon'), true)[$key] : ''}}"></i></span>
                        <h3 class="bottom10 text-nowrap text-uppercase"><a href="javascript:void(0)">{{json_decode(get_setting_by_lang('home_banner1_title'), true)[$key]}}</a></h3>
                        <p>{{json_decode(get_setting_by_lang('home_banner1_desc'), true)[$key]}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
<!--Some Services ends-->
<!--Some Feature -->
@if(get_setting_by_lang('home_section1_status') && get_setting_by_lang('home_section1_title') !== null)

<section id="about" class="single-feature padding mt-n5">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 text-sm-left text-center wow fadeInLeft" data-wow-delay="300ms">
                <div class="heading-title mb-4">
                    <h2 class="darkcolor font-normal bottom30" style="text-transform: uppercase;
                    font-weight: 700;">{!!  get_setting_by_lang('home_section1_title')  !!}</h2>
                </div>
                <p class="bottom35" style="color: #26313c; text-align: justify;">{{ get_setting_by_lang('home_section1_desc')  }}</p>
                <a href="{{ get_setting_by_lang('home_section1_link')  }}" class="button gradient-btn mb-sm-0 mb-4">Learn More</a>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="300ms">
                <div class="image"><img alt="SEO" src="{{!empty(get_setting_by_lang('home_section1_image')) ? url('public/'.\App\Upload::find(json_decode(get_setting_by_lang('home_section1_image'), true))->file_name) : ''}}"></div>
            </div>
        </div>
    </div>
</section>
@endif

<!--Some Feature ends-->
<!-- WOrk Process-->
@if(get_setting_by_lang('home_process_status') && !empty(json_decode(get_setting_by_lang('home_process_title'), true)))

<section id="our-process" class="padding" style="background-image: url('public/themes/main/frontend/logistic/images/MAXUS_eDELIVER9_Specs.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <div class="heading-title whitecolor wow fadeInUp" data-wow-delay="300ms">
                    <h2 class="font-normal" style="text-transform: uppercase;font-weight: 700;">{{translate('OUR WORK PROCESS')}} </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <ul class="process-wrapp">
                @foreach (json_decode(get_setting_by_lang('home_process_title'), true) as $key => $value)
                <li class="whitecolor wow fadeIn" data-wow-delay="300ms">
                    <span class="pro-step bottom20">0{{$key+1}}</span>
                    <p class="fontbold bottom20">{{json_decode(get_setting_by_lang('home_process_title'), true)[$key]}}</p>
                    <p class="mt-n2 mt-sm-0">{{json_decode(get_setting_by_lang('home_process_desc'), true)[$key]}}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endif
<!--WOrk Process ends-->
<!-- Mobile Apps -->
@if(get_setting_by_lang('home_section_status') && !empty(json_decode(get_setting_by_lang('home_msection_title'), true)))

<section id="our-apps" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7 col-sm-12">
                <div class="heading-title bottom30 wow fadeInLeft" data-wow-delay="200ms">
                    <span class="defaultcolor text-center text-md-left">{{get_setting_by_lang('home_msection_subtitle')}}</span>
                    <h2 class="bottom30 darkcolor font-normal text-center text-md-left" style="text-transform: uppercase;
                    font-weight: 700;">{{get_setting_by_lang('home_msection_htitle')}}</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-12 wow fadeInRight" data-wow-delay="200ms">
                <p class="heading_space mt-n3 mt-sm-0 text-center text-md-left">{{get_setting_by_lang('home_msection_hdesc')}}</p>
            </div>
        </div>
        <div class="row d-flex align-items-center" id="app-feature">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="text-center text-md-left">
                    @for($i = 0; $i < 2; $i++)
                    <div class="feature-item mt-3 wow fadeInLeft" data-wow-delay="200ms">
                        <div class="icon"><i class="{{@json_decode(get_setting_by_lang('home_msection_icon'), true)[$i]}}"></i></div>
                        <div class="text">
                            <h4 class="bottom15">
                                <span class="d-inline-block">{{@json_decode(get_setting_by_lang('home_msection_title'), true)[$i]}}</span>
                            </h4>
                            <p>{{@json_decode(get_setting_by_lang('home_msection_desc'), true)[$i]}}</p>
                        </div>
                    </div>
                    @endfor

                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-12 text-center">
                <div class="image feature-item d-inline-block wow fadeIn my-5 my-md-0" data-wow-delay="400ms">
                    <img src="{{!empty(get_setting_by_lang('home_msection_image')) ? url('public/'.\App\Upload::find(json_decode(get_setting_by_lang('home_msection_image'), true))->file_name) : ''}}" alt="mobile phones">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="text-center text-md-right">
                    @for($i = 2; $i < 4; $i++)
                    <div class="feature-item mt-3 wow fadeInLeft" data-wow-delay="200ms">
                        <div class="icon"><i class="{{@json_decode(get_setting_by_lang('home_msection_icon'), true)[$i]}}"></i></div>
                        <div class="text">
                            <h4 class="bottom15">
                                <span class="d-inline-block">{{@json_decode(get_setting_by_lang('home_msection_title'), true)[$i]}}</span>
                            </h4>
                            <p>{{@json_decode(get_setting_by_lang('home_msection_desc'), true)[$i]}}</p>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!--Mobile Apps ends-->
@if(get_setting_by_lang('home_statistics_status') && get_setting_by_lang('home_statistics_title1') !== null)
<!-- Counters -->
<section id="bg-counters" class="padding bg-counters" style="background-image: url({{ !empty(get_setting_by_lang('home_statistics_image')) ?  url('public/'.\App\Upload::find(json_decode(get_setting_by_lang('home_statistics_image'), true))->file_name) : ''}});">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="overlay overlay-dark opacity-6 z-index-0"></div>
            <div class="col-lg-4 col-md-4 col-sm-4 bottom10">
                <div class="counters whitecolor  top10 bottom10">
                    <span class="count_nums font-light" data-to="{{ get_setting_by_lang('home_statistics_num1')  }}" data-speed="2500"> </span>
                </div>
                <h3 class="font-light whitecolor top20">{{ get_setting_by_lang('home_statistics_title1')  }}</h3>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <p class="whitecolor top20 bottom20 font-light title">{{ get_setting_by_lang('home_statistics_desc')  }}</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 bottom10">
                <div class="counters whitecolor top10 bottom10">
                    <span class="count_nums font-light" data-to="{{ get_setting_by_lang('home_statistics_num2')  }}" data-speed="2500"> </span>
                </div>
                <h3 class="font-light whitecolor top20">{{ get_setting_by_lang('home_statistics_title2')  }}</h3>
            </div>
        </div>
    </div>
</section>
@endif
<!-- Counters ends-->




@if(get_setting_by_lang('home_testimonials_status'))
<!-- Testimonials -->
<section id="our-testimonial" class="bglight padding_bottom">
    <div class="parallax page-header" style="background:black">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6 col-md-12 text-center text-lg-right">
                    <div class="heading-title wow fadeInUp padding_testi" data-wow-delay="300ms">
                        <span class="whitecolor">Quisque tellus risus, adipisci</span>
                        <h2 class="whitecolor font-normal text-uppercase">What People Say</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="owl-carousel" id="testimonial-slider">
            <!--item 1-->
            @foreach (json_decode(get_setting_by_lang('home_testimonials_images'), true) as $key => $value)
            <div class="item testi-box">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12 text-center">
                        <div class="testimonial-round d-inline-block">
                            <img src="{{!empty(get_setting_by_lang('home_testimonials_images')) ? url('public/'.\App\Upload::find(json_decode(get_setting_by_lang('home_testimonials_images'), true)[$key])->file_name) : ''}}" alt="">
                        </div>
                        <h4 class="defaultcolor font-light text-capitalize top15">{{json_decode(get_setting_by_lang('home_testimonials_name'), true)[$key]}}</h4>
                        <p>{{json_decode(get_setting_by_lang('home_testimonials_job'), true)[$key]}}</p>
                    </div>
                    <div class="col-lg-6 offset-lg-2 col-md-10 offset-md-1 text-lg-left text-center">
                        <p class="bottom15" style="margin-top: 110px;">{{json_decode(get_setting_by_lang('home_testimonials_desc'), true)[$key]}}</p>
                        <span class="d-inline-block test-star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
<!--testimonials end-->
@endif

<!-- Contact Us -->

<!-- Contact US -->
<section id="contact_us" class="bglight position-relative" style="scroll-behavior: smooth;">
    <div class="container">
        <div class="contactus-wrapp" style="background: #333333;box-shadow: 0px 0px 26px 0px;border-radius: 10px;padding: 23px 50px;">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="heading-title wow fadeInUp text-center text-md-left" data-wow-delay="300ms">
                        <h3 class="darkcolor bottom20 text-light">Stay Connected</h3>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <form class="getin_form wow fadeInUp" action="{{route('subscribe.store')}}" method="POST" data-wow-delay="400ms" onsubmit="return false;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12" id="result"></div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for="userName" class="d-none"></label>
                                    <input class="form-control" type="text" placeholder="Name" required id="userName" name="name">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for="companyName" class="d-none"></label>
                                    <input class="form-control" type="text" placeholder="Company"  id="companyName" name="company">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for="email" class="d-none"></label>
                                    <input class="form-control" type="email" placeholder="Email" required id="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <button type="submit" class="button gradient-btn w-100" id="submit_btn">subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact-us" class="padding_bottom" style="padding-bottom: 0rem;">
    <div class="parallax page-header" >
        <div class="container" style="padding-top:80px;padding-bottom:100px ">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="heading-title whitecolor wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                        <span class="whitecolor text-dark">Contact With Us</span>
                        <h2 class="font-normal text-dark" style="text-transform: uppercase;font-weight: 700;">We’re Here to Help You</h2>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-lg-12">

                    <form class="form-row" action="{{route('contact.store')}}" method="POST">
                        @csrf
                        <div class="col-lg-6 wow fadeInUp" style="animation-delay: 400ms; animation-name: fadeInUp;">
                            <div class="form-group form-design">
                                <input type="text" name="name" placeholder="Your Name" value="" style="width:100%;padding: 15px;margin: 0px;">
                            </div>
                            <div class="form-group form-design">
                                <input type="email" name="email" placeholder="Email Address" value="" style="width:100%;padding: 15px;margin: 0px;">
                            </div>
                            <div class="form-group form-design">
                                <input type="text" name="number" placeholder="Contact Number" value="" style="width:100%;padding: 15px;margin: 0px;">
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInUp" style="animation-delay: 400ms; animation-name: fadeInUp;">
                            <textarea name="message" placeholder="Wirte Your Message..."style="width:100%;margin-bottom: 10px; min-height: 121px;"></textarea>
                            <div class="form-group button-hover">
                                <button type="submit" class="btn-block button gradient-btn w-100" style="padding-top: 18px;padding-bottom: 18px;border-radius: 0px;">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Us End-->



@endsection

@section('script')

<link href="{{ static_asset('themes/main/frontend/logistic/css/slick-theme.css')}}" rel="stylesheet">
<link href="{{ static_asset('themes/main/frontend/logistic/css/slick.css')}}" rel="stylesheet">
<script src="{{ static_asset('themes/main/frontend/logistic/js/slick.min.js')}}"></script>
<script>
    $(document).ready(function(){

        var $imagesSlider = $(".client-feedback>div"),
        $thumbnailsSlider = $(".client-thumbnails>div");

            // Images Options
            $imagesSlider.slick({
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                cssEase: 'linear',
                fade: true,
                dots: true,
                arrows:false,
                autoplay: false,
                draggable: false,
                asNavFor: ".client-thumbnails>div",
            });
            // Thumbnails Options
            $thumbnailsSlider.slick({
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                cssEase: 'linear',
                autoplay: true,
                arrows:false,
                centerMode: true,
                draggable: false,
                focusOnSelect: true,
                asNavFor: ".client-feedback>div",
            });
        });
    </script>
    @endsection