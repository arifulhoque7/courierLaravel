<!--Site Footer Here-->
<footer id="site-footer" class="padding_top" style="background: #000000; padding: 70px 0 0 10px !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="footer_panel padding_bottom_half bottom20">
                    <a href="#" class="footer_logo bottom25"><img src="https://localhost/courier_demo/public/assets/img/Akash%20Parcel@300x.png"
                            alt="MegaOne"></a>
                    <p class="whitecolor bottom25">Akash Parcel & Courier Service Provides Home Delivery Service In Bangladesh. With  Akash Parcel, You Can deliver Your Parcel In The Quickest Time. You Can Deliver Everything Legal Products by akash parcel To Your Customer's Doorstep To Important Personal Documents And Parcels To Your Customer.</p>
                    <div class="d-table w-100 address-item whitecolor bottom25">
                        <span class="d-table-cell align-middle"><i class="fas fa-mobile-alt"></i></span>
                        <p class="d-table-cell align-middle bottom0">
                            +88 01889999667  <a class="d-block" href="mailto:supportme@akashparcel.com">supportme@akashparcel.com</a>
                        </p>
                    </div>
                    {{-- <ul class="social-icons white wow fadeInUp" data-wow-delay="300ms"
                        style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                        <li><a href="javascript:void(0)" class=""><i class=" fab fa-facebook-f"></i> </a> </li>
                        <li><a href="javascript:void(0)" class=""><i class=" fab fa-twitter"></i> </a> </li>
                        <li><a href="javascript:void(0)" class=""><i class=" fab fa-linkedin-in"></i> </a> </li>
                        <li><a href="javascript:void(0)" class=""><i class=" fab fa-instagram"></i> </a> </li>
                    </ul> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="footer_panel padding_bottom_half bottom20">
                    <h3 class="whitecolor bottom25">Head Office</h3>
                    <ul class="latest_news whitecolor">
                        <li>199/A West Agaragaon, (North Shamoly), 1st Floor,
                            Sher-e–BanglaNagor, Dhaka <br>
                            Hot Line : +880 1889 999 667 <br>
                            Email : info@akashparcel.com
                        </li>
                    </ul>
                    <h3 class="whitecolor bottom25" style="margin-top: 56px;">Working Hour</h3>
                    <ul class="hours_links whitecolor">
                        <li><span>Saturday-Friday:</span> <span>9 AM - 6 PM</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="footer_panel padding_bottom_half bottom20">
                    <h3 class="whitecolor bottom25">Contact Us</h3>
                   
                    <ul class="latest_news whitecolor mt-4">
                        <li>
                            Merchant Relation :<br>
                            Email : merchentsupport@akashparcel.com 
                        </li>
                        <li>Sales & Marketing <br>
                            Phone : +880 1842 173 886 <br>
                            Email : sales@akashparcel.com
                        </li>
                        <li>
                            Operation <br>
                            Phone: +880 1842 173 885 <br>
                            Email : operation@akashparcel.com 
                        </li>
                       
                    </ul>

                </div>
            </div>
            </div>
        </div>


        
        <div class="py-4 d-flex flex-lg-column" style="color: white">
            <!--begin::Container-->
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                <!--begin::Copyright-->
                <div class="order-2 order-md-1">
                    {{-- <a href="{{url('/')}}">{!! setting()->get('main_footer_copy_right_'.app()->getLocale()) ?? '' !!}</a> --}}
                    @if(isset($footer_menu))
                        @forelse ($footer_menu->items as $item)
                            {{-- @if(count($item->child) > 0)
                                {{$item->label}} has {{count($item->child)}} child <br> 
                            @endif --}}
                            <a class="mr-2" href="{{$item->link}}">{{$item->label}}</a>
                            @if(!$loop->last)
                                |
                            @endif
                        @empty
                            
                        @endforelse
                    @endif
                </div>
                <!--end::Copyright-->
                <!--begin::Nav-->
                <div class="nav nav-dark">
                    @if(setting()->get('main_footer_copy_right_'.app()->getLocale()))
                        {{setting()->get('main_footer_copy_right_'.app()->getLocale())}} 
                    @else
                        Copyright © {{date('Y')}} All rights reserved.
                    @endif
                </div>
                <!--end::Nav-->
            </div>
            <!--end::Container-->
        </div>
    </div>
</footer>
<!--Footer ends-->
