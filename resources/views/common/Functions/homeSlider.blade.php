<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/vendor/owl-slider.css') }}"/>
</head>
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

<script type="text/javascript" src="{{ asset('assets/libs/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/libs/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/libs/js/jquery.themepunch.plugins.min.js') }}"></script>
<script>
    $(function(){
        $('#topSubject').hide();
    })
</script>
