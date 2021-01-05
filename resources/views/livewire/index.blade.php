@section('title')
    @lang('static.menu.index')
@endsection
@section('homeActive', 'active')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/vendor/owl-slider.css') }}"/>
<script>
    $(function(){
        $('#topSubject').hide();
    })
</script>
@endsection
<div>
    <div class="tp-banner-container hidden-dot ver1">
        <div class="tp-banner" >
            <ul>
                @foreach($sliderCampaigns as $campaign)
                    <!-- SLIDE  -->
                    <li data-transition="random" data-slotamount="6" data-masterspeed="1000" >
                        <!-- MAIN IMAGE -->
                        @php($images=json_decode($campaign->images))
                        <img
                        src="data:image/png;base64,{{get_image($images[0],'posts',$campaign->clasor)}}"
                        alt="
                        @if(app()->getLocale()=='az')
                            {{ $campaign->az_name }}
                        @elseif(app()->getLocale()=='en')
                            {{ $campaign->en_name }}
                        @elseif(app()->getLocale()=='ru')
                            {{ $campaign->ru_name }}
                        @endif
                        "  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

                        <!-- LAYER NR. 9 -->
                        <div class="tp-caption color-white customin randomrotateout font-ros tp-resizeme size-60 text-shadow"
                                data-x="650"
                                data-y="305"
                                data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                data-speed="500"
                                data-start="2000"
                                data-easing="Power4.easeOut"
                                data-splitin="chars"
                                data-splitout="none"
                                data-elementdelay="0.1"
                                data-endelementdelay="0.1"
                                style="z-index: 3"> @if(app()->getLocale()=='az')
                                    {{ $campaign->az_name }}
                                @elseif(app()->getLocale()=='en')
                                    {{ $campaign->en_name }}
                                @elseif(app()->getLocale()=='ru')
                                    {{ $campaign->ru_name }}
                                @endif
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption color-white font-ros weight-300 skewfromleft customout size-20 letter-spacing-2 text-shadow"
                                data-x="505"
                                data-y="390"
                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="800"
                                data-start="1600"
                                data-easing="Power4.easeOut"
                                data-endspeed="300"
                                data-endeasing="Power1.easeIn"
                                data-captionhidden="on"
                                style="z-index: 4"> @if(app()->getLocale()=='az')
                                    {{ $campaign->az_description }}
                                @elseif(app()->getLocale()=='en')
                                    {{ $campaign->en_description }}
                                @elseif(app()->getLocale()=='ru')
                                    {{ $campaign->ru_description }}
                                @endif
                        </div>

                        <!-- LAYER NR. 7 -->
                        <div class="tp-caption skewfromleft customout font-roc link-1 height-40 size-16"
                                data-x="865"
                                data-y="460"
                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="800"
                                data-start="1500"
                                data-easing="Power4.easeOut"
                                data-endspeed="300"
                                data-endeasing="Power1.easeIn"
                                data-captionhidden="on"
                                style="z-index: 5"><a
                                href="{{ route('customerCampaignsBrowse',['id'=>$campaign->getCustomer->id,'slug'=>$campaign->slug]) }}"
                                 title="@lang('static.actions.more')" class="">@lang('static.actions.more')</a>
                        </div>
                        <!-- LAYER NR. 8s -->
                    </li>
                    <!-- SLIDER -->
                @endforeach
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!-- End Slider Home2 -->
    <div class="container container-ver2">
        <div class="choose-us choose-us-home2">
            <div class="col-md-4">
                <img class="img-responsive hidden-table" src="{{ asset('assets/libs/images/banner/6.jpg') }}" alt="banner">
            </div>
            <!--End col-md-4-->
            <div class="col-md-8">
                <div class="title-choose align-center">
                    <h3>@lang('static.page.index.weArePW')</h3>
                    <p>@if(app()->getLocale()=='az')
                            {{ $about->az_description }}
                        @elseif(app()->getLocale()=='en')
                            {{ $about->en_description }}
                        @elseif(app()->getLocale()=='ru')
                            {{ $about->ru_description }}
                        @endif</p>
                </div>
                <!--End title-choose-->
                <div class="align-center border-choose">
                    <div class="images">
                        <img src="{{ asset('assets/libs/images/bg-border-center.png') }}" alt="icon">
                    </div>
                </div>
                <!--End border-choose-->
                <div class="shipping-v2 home3-shiping home2-shipping">
                @foreach($whyChooseUsItems as $item)
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="border">
                            <img
                            width="75"
                            src="data:image/png;base64,{{get_image($item->icon,'about/whychooseus/items')}}"
                             alt="@if(app()->getLocale()=='az')
                                        {{ $item->az_title }}
                                    @elseif(app()->getLocale()=='en')
                                        {{ $item->en_title }}
                                    @elseif(app()->getLocale()=='ru')
                                        {{ $item->ru_title }}
                                    @endif">
                            <h3>@if(app()->getLocale()=='az')
                                        {{ $item->az_title }}
                                    @elseif(app()->getLocale()=='en')
                                        {{ $item->en_title }}
                                    @elseif(app()->getLocale()=='ru')
                                        {{ $item->ru_title }}
                                    @endif</h3>
                            <p>@if(app()->getLocale()=='az')
                                        {{ $item->az_description }}
                                    @elseif(app()->getLocale()=='en')
                                        {{ $item->en_description }}
                                    @elseif(app()->getLocale()=='ru')
                                        {{ $item->ru_description }}
                                    @endif</p>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <!--End col-md-8-->
        </div>
    </div>
    <!--End Shipping Version 2-->
    <div class="bg-slider-one-item space-80 bg-home2-slider">
        <div class="container container-ver2">
            <div class="title-text-v2 align-center">
                <h3>    @lang('static.menu.customers')</h3>
                <img src="{{ asset('assets/libs/images/title-line.png') }}" alt="icon">
            </div>
            <!--End title-->
            <div class="brand-content owl-carousel">
            @foreach($customers as $customer)
                <div class="items">
                    <a href="#">
                        <img class="img-responsive" src="data:image/png;base64,{{get_image($customer->logo,'customers')}}" alt="@if(app()->getLocale()=='az')
                            {{ $customer->az_name }}
                            @elseif(app()->getLocale()=='en')
                            {{ $customer->en_name }}
                            @elseif(app()->getLocale()=='ru')
                            {{ $customer->ru_name }}
                            @endif" />
                        </a>
                </div>
            @endforeach
            </div>
        </div>
        <!--End container-->
    </div>
    <!--End bg-slider-->
    <div class="container">
            <div class="title-text-v2">
                <h3>@lang('static.menu.products')</h3>
            </div>
            <div class="featured-products home_2 new-arrivals lastest">
                <ul class="tabs tabs-title">

                    <li class="item" rel="tab_1">@lang('static.page.customers.campaigns.all')</li>
                    @foreach($customers as $customer)
                        <li class="item" rel="tab_{{ $customer->id }}">@if(app()->getLocale()=='az')
                            {{ $customer->az_name }}
                            @elseif(app()->getLocale()=='en')
                            {{ $customer->en_name }}
                            @elseif(app()->getLocale()=='ru')
                            {{ $customer->ru_name }}
                            @endif</li>
                    @endforeach
                </ul>
                <div class="tab-container space-10">
                    <div id="tab_1" class="tab-content">
                        <div class="products hover-shadow ver2 border-space-product">

                            <div class="product">
                                <div class="product-images">
                                    <a href="#" title="product-images">
                                        <img class="primary_image" src="{{ asset('assets/libs/images/products/featured/1.jpg') }}" alt=""/>
                                        <img class="secondary_image" src="{{ asset('assets/libs/images/products/featured/1.jpg') }}" alt=""/>
                                    </a>
                                    <div class="action">
                                            <a class="add-cart" href="#" title="Add to cart"></a>
                                            <a class="wish" href="#" title="Wishlist"></a>
                                            <a class="zoom" href="#" title="Quick view"></a>
                                        </div>
                                        <!-- End action -->
                                </div>
                                <a href="#" title="Union Bed"><p class="product-title">BlueBerry</p></a>
                                <p class="product-price-old">$700.00</p>
                                <p class="product-price">$350.00</p>

                            </div>

                        </div>
                        <!-- End product-tab-content products -->
                    </div>
                    <!-- End tab-content -->
                    @foreach($customers as $customer)
                        <div id="tab_{{ $customer->id }}" class="tab-content">
                            <div class="products hover-shadow ver2 border-space-product">

                                <div class="product hover-shadow">
                                    <div class="product-images">
                                        <a href="#" title="product-images">
                                            <img class="primary_image" src="{{ asset('assets/libs/images/products/featured/1.jpg') }}" alt=""/>
                                            <img class="secondary_image" src="{{ asset('assets/libs/images/products/featured/1.jpg') }}" alt=""/>
                                        </a>
                                        <div class="action">
                                                <a class="add-cart" href="#" title="Add to cart"></a>
                                                <a class="wish" href="#" title="Wishlist"></a>
                                                <a class="zoom" href="#" title="Quick view"></a>
                                            </div>
                                            <!-- End action -->
                                    </div>
                                    <a href="#" title="Union Bed"><p class="product-title">Union Bed</p></a>
                                    <p class="product-price-old">$700.00</p>
                                    <p class="product-price">$350.00</p>

                                </div>
                                <!-- End item -->
                            </div>
                            <!-- End product-tab-content products -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- End container -->
        <div class="container container-ver2 blog-home1">
            <div class="title-text-v2">
                <div class="icon-title align-center space-20">
                    <img src="{{ asset('assets/libs/images/title-lastest-from.png') }}" alt="icon-title">
                </div>
                <h3>@lang('static.menu.campaigns')</h3>
            </div>
            <!-- End title -->
            <div class="blog-content owl-carousel slider-three-item">
                @foreach($campaigns as $campaign)
                    <div class="item">
                        @php($images=json_decode($campaign->images))
                        <a class="hover-images"
                        href="{{ route('customerCampaignsBrowse',['id'=>$campaign->getCustomer->id,'slug'=>$campaign->slug]) }}">
                            <img class="img-responsive"
                            src="data:image/png;base64,{{get_image($images[0],'posts',$campaign->clasor)}}"
                             alt="
                             @if(app()->getLocale()=='az')
                                {{ $campaign->az_name }}
                            @elseif(app()->getLocale()=='en')
                                {{ $campaign->en_name }}
                            @elseif(app()->getLocale()=='ru')
                                {{ $campaign->ru_name }}
                            @endif
                             ">
                        </a>
                        <div class="text-v2">
                            <a
                            href="{{ route('customerCampaignsBrowse',['id'=>$campaign->getCustomer->id,'slug'=>$campaign->slug]) }}"
                                 ><h3>
                                    @if(app()->getLocale()=='az')
                                {{ $campaign->az_name }}
                            @elseif(app()->getLocale()=='en')
                                {{ $campaign->en_name }}
                            @elseif(app()->getLocale()=='ru')
                                {{ $campaign->ru_name }}
                            @endif
                                    </h3></a>
                            <p class="by">
                                @if(app()->getLocale()=='az')
                                {{ $campaign->getCustomer->az_name }}
                            @elseif(app()->getLocale()=='en')
                                {{ $campaign->getCustomer->en_name }}
                            @elseif(app()->getLocale()=='ru')
                                {{ $campaign->getCustomer->ru_name }}
                            @endif
                                </p>
                            <p class="des">
                                @if(app()->getLocale()=='az')
                                {{ $campaign->az_description }}
                            @elseif(app()->getLocale()=='en')
                                {{ $campaign->en_description }}
                            @elseif(app()->getLocale()=='ru')
                                {{ $campaign->ru_description }}
                            @endif
                                </p>
                        </div>
                    </div>
                @endforeach
                <!-- End item -->
            </div>
            <!-- End blog-content owl-carousel -->
        </div>
</div>

@section('js')
    <script>
        $(function(){
            $('#topSubject').hide();
        })
    </script>
    <script type="text/javascript" src="{{ asset('assets/libs/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/libs/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/libs/js/jquery.themepunch.plugins.min.js') }}"></script>
@endsection

