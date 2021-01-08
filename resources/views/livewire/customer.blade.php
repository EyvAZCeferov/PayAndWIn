@section('title')
    @if(app()->getLocale()=='az')
        {{ $customer[0]->az_name }}
    @elseif(app()->getLocale()=='en')
        {{ $customer[0]->en_name }}
    @elseif(app()->getLocale()=='ru')
        {{ $customer[0]->ru_name }}
    @endif
@endsection
@section('customersActive', 'active')
@section('css')
<style type="text/css">
    #map {
        width: 100%;
        height: 400px;
    }
  </style>
    @php($ims=json_decode($customer[0]->get_locations->images))

    <!-- Search Engine -->

        <meta name="image" content="data:image/png;base64,{{get_image($ims[0],'locations',$customer[0]->get_locations->clasor)}}"  />
        <meta name="description" content="
            @if(app()->getLocale()=='az')
                            {{ $customer[0]->get_locations->az_description }}
                        @elseif(app()->getLocale()=='en')
                            {{ $customer[0]->get_locations->en_description }}
                        @elseif(app()->getLocale()=='ru')
                            {{ $customer[0]->get_locations->ru_description }}
                        @endif
        " />

        <!-- Schema.org for Google -->
            <meta itemprop="name" content="
                @if(app()->getLocale()=='az')
                    {{ $customer[0]->az_name }}
                @elseif(app()->getLocale()=='en')
                    {{ $customer[0]->en_name }}
                @elseif(app()->getLocale()=='ru')
                    {{ $customer[0]->ru_name }}
                @endif
            " />
            <meta itemprop="description" content="
            @if(app()->getLocale()=='az')
            {{ $customer[0]->get_locations->az_description }}
        @elseif(app()->getLocale()=='en')
            {{ $customer[0]->get_locations->en_description }}
        @elseif(app()->getLocale()=='ru')
            {{ $customer[0]->get_locations->ru_description }}
        @endif
            "/>
            <meta itemprop="image" content="data:image/png;base64,{{get_image($ims[0],'locations',$customer[0]->get_locations->clasor)}}" />

    <!-- Twitter -->
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="
            @if(app()->getLocale()=='az')
                {{ $customer[0]->az_name }}
            @elseif(app()->getLocale()=='en')
                {{ $customer[0]->en_name }}
            @elseif(app()->getLocale()=='ru')
                {{ $customer[0]->ru_name }}
            @endif
        " />
        <meta name="twitter:description" content="@if(app()->getLocale()=='az')
        {{ $customer[0]->get_locations->az_description }}
    @elseif(app()->getLocale()=='en')
        {{ $customer[0]->get_locations->en_description }}
    @elseif(app()->getLocale()=='ru')
        {{ $customer[0]->get_locations->ru_description }}
    @endif" />
    <meta name="twitter:site" content="{{ settings('twitter') }}" />
    <meta name="twitter:creator" content="{{ settings('twitter') }}" />
    <meta name="twitter:image:src" content="data:image/png;base64,{{get_image($ims[0],'locations',$customer[0]->get_locations->clasor)}}" />

    <!-- Open Graph general (Facebook, Pinterest & Google+) -->

    <meta property="og:title" content="
        @if(app()->getLocale()=='az')
            {{ $customer[0]->az_name }}
        @elseif(app()->getLocale()=='en')
            {{ $customer[0]->en_name }}
        @elseif(app()->getLocale()=='ru')
            {{ $customer[0]->ru_name }}
        @endif
    " />
    <meta property="og:description" content="
        @if(app()->getLocale()=='az')
                        {{ $customer[0]->get_locations->az_description }}
                    @elseif(app()->getLocale()=='en')
                        {{ $customer[0]->get_locations->en_description }}
                    @elseif(app()->getLocale()=='ru')
                        {{ $customer[0]->get_locations->ru_description }}
                    @endif
    " />
    <meta property="og:image" content="data:image/png;base64,{{get_image($ims[0],'locations',$customer[0]->get_locations->clasor)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="website" />
    <meta name="og:site_name" content="{{ settings('projectName') }}">
    <meta name="fb:admins" content="Eyvaz Ceferov" />
    <meta name="fb:app_id" content="446204246395657" />
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/vendor/owl-slider.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/vendor/slick.css')}}"/>
    <script type="text/javascript" src="{{asset('assets/libs/js/jquery-3.2.0.min.js')}}"></script>
@endsection

<div class="container">
    <div class="product-details-content">
        <div wire:ignore.self class="col-md-6 col-sm-6 slide-vertical right">
            <div class="slider-for">
                @if($ims)
                    @foreach($ims as $image)
                        <div>
                      <span class="zoom">
                        <img class="zoom-images"
                            style="max-width: 400px"
                            src="data:image/png;base64,{{get_image($image,'locations',$customer[0]->get_locations->clasor)}}"
                            alt="{{$image}}"/>
                  </span>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- End slider-for -->
            <div class="slider-nav">
                @if($ims)
                    @foreach($ims as $image)
                        <div>
                            <img
                                style="max-width: 80px"
                                src="data:image/png;base64,{{get_image($image,'locations',$customer[0]->get_locations->clasor)}}"
                                alt="{{$image}}"/>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <!-- End col-md-6 -->
        <div class="col-md-6 col-sm-6">
            <div class="box-details-info">
                <div class="product-name">
                    <h1> @if(app()->getLocale()=='az')
                            {{ $customer[0]->az_name }}
                        @elseif(app()->getLocale()=='en')
                            {{ $customer[0]->en_name }}
                        @elseif(app()->getLocale()=='ru')
                            {{ $customer[0]->ru_name }}
                        @endif</h1>
                </div>
                <!-- End product-name -->
                @livewire('rating-system', ['table' => 'customers','postid'=>$customer[0]->id])
                <!-- End Rating -->
            </div>
            <!-- End box details info -->
            <div class="options">
                <p>@if(app()->getLocale()=='az')
                        {{ $customer[0]->get_locations->az_description }}
                    @elseif(app()->getLocale()=='en')
                        {{ $customer[0]->get_locations->en_description }}
                    @elseif(app()->getLocale()=='ru')
                        {{ $customer[0]->get_locations->ru_description }}
                    @endif</p>
                <!--End Description-->

                @include('common.Functions.sharebutton',['image'=>get_image_url($ims[0],'locations',$customer[0]->get_locations->clasor),'title'=>$customer[0]->az_name])
                <!-- End share -->
            </div>
            <!-- End Options -->
        </div>
    </div>
    <!-- End product-details-content -->
    <div class="hoz-tab-container ver2 space-padding-tb-30">
        <ul class="tabs center">
            <li class="item {{ $active ? "active" : null }}" rel="customer">@lang('static.page.customers.customer.comments',['count'=>$comments->count()])</li>
            <li class="item" rel="description">@lang('static.page.customers.customer.maps')</li>
        </ul>
        <div class="tab-container">
            @livewire('comment-system', ['id' => $customer[0]->id,'table'=>'customers'])
            <div id="description" class="tab-content">
                <div class="text center">
                    <div id="map"></div>
                </div>
            </div>

        </div>
    </div>
    <!-- tab-container -->
</div>

@section('js')
    <script type="text/javascript" src="{{asset('assets/libs/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/libs/js/engo-plugins.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/libs/js/jquery.mousewheel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/libs/js/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/libs/js/jquery.zoom.js')}}"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap&libraries=&v=weekly"
defer
></script>
<script>
  function initMap() {
    const myLatLng={'lat':{{ env('GOOGLE_MAPS_DEFAULT_CENTER_LAT') }},'lng':{{ env('GOOGLE_MAPS_DEFAULT_CENTER_LNG') }}};
    const map = new google.maps.Map(document.getElementById("map"), {
    zoom: {{ env('GOOGLE_MAPS_DEFAULT_ZOOM') }},
    center: myLatLng,
    });
    var infowindow = new google.maps.InfoWindow();
    @foreach($locations as $location)
    @php($geometry=json_decode($location->geometry))
    var data={lat:{{$geometry->latitude }},lng:{{ $geometry->longitude }}};
        addMarker(data,'{{ $location->get_customer->az_name }}',map);
        google.maps.event.addListener(map, "click", (event) => {
            addMarker(data,'{{ $location->get_customer->az_name }}',map);
    });
    @endforeach
  }
  function addMarker(location,label, map) {
    new google.maps.Marker({
      position: location,
      label: label,
      map: map,
    });

  }
</script>
@endsection
