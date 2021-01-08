@section('title')
    @lang('static.menu.shopping.checkout')
@endsection
@section('css')
<style type="text/css">
    /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */
    #map {
        width: 100%;
        height: 200px;
    }
    .get_loc{
        width:5em;
        height: 3em;
        background-color: #7c9d32;
        border:0 #7c9d32;
    }
    .get_loc i, .get_loc svg{
        color: #fff;
    }
    .get_loc:hover{
        background-color: #fff;
        border:0 #fff;
    }
    .get_loc:hover i, .get_loc:hover svg{
        color: #7c9d32;
    }
</style>
@endsection
<div>
    <div class="container container-ver2 space-padding-tb-30">
        <div class="row head-cart">
            <div class="col-md-4 space-30">
                <div class="item active center">
                    <p class="icon">01</p>
                    <h3>@lang('static.menu.shopping.cartlists')</h3>
                </div>
            </div>
            <!-- End col-md-4 -->
            <div class="col-md-4 space-30">
                <div class="item active center">
                    <p class="icon">02</p>
                    <h3>@lang('static.menu.shopping.checkout')</h3>
                </div>
            </div>
            <!-- End col-md-4 -->
            <div class="col-md-4 space-30">
                <div class="item center">
                    <p class="icon">03</p>
                    <h3>@lang('static.menu.shopping.ordersuccess')</h3>
                </div>
            </div>
            <!-- End col-md-4 -->
        </div>
    </div>
    <!-- End container -->
<div class="cart-box-container check-out">
    <div class="container container-ver2">
        <div class="row">
            <div class="col-md-6 space-30">
                <form class="form-horizontal">
                    <div class="form-group col-md-12">
                        <label for="inputfname" class=" control-label">@lang('static.page.shopping.checkout.other.cupponCode')</label>
                        <input type="text" placeholder="PAYANDWIN" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputfname" class=" control-label">
                            @lang('static.page.shopping.checkout.other.payingcards')
                        </label>
                        <select class="form-control">
                            <option value="">
                                @lang('static.page.shopping.checkout.other.selectcard')
                            </option>
                            @foreach($creditCarts as $cards)
                            @php($cardInfos=json_decode($cards->cardInfos))
                                <option value="{{ $cards->cardId }}">
                                    {{ ccMasking($cardInfos->number) }}
                                     -- {{ $cardInfos->price }} ₼
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputfname" class=" control-label">
                            @lang('static.page.shopping.checkout.other.bonuscards')
                        </label>
                        <select class="form-control">
                            <option value="">
                                @lang('static.page.shopping.checkout.other.selectcard')
                            </option>
                            @foreach($bonuseCards as $cards)
                            @php($cardInfos=json_decode($cards->cardInfos))
                                <option value="{{ $cards->cardId }}">
                                    {{ ccMasking($cardInfos->number) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <!-- End col-md-8 -->
            <div class="col-md-6 space-30">
                <div class="box">
                    <h3 class="title-brand">@lang('static.page.shopping.checkout.order.yourOrder')</h3>
                    <div class="info-order">
                        <div class="product-name">
                            <ul>
                                <li class="head">
                                    <span class="name">@lang('static.page.shopping.wishlist.tableheader.productName')</span>
                                    <span class="qty"><b>@lang('static.page.shopping.cartlist.tableheader.qyt')</b></span>
                                    <span class="total"><b>@lang('static.page.shopping.cartlist.tableheader.total')</b></span>
                                </li>
                                @foreach($cartlist as $cart)
                                    <li>
                                        <span class="name">{{ $cart['name'] }}</span>
                                        <span class="qty">{{ $cart['qty'] }}</span>
                                        <span class="total">{{ $cart['price'] }}</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- End product-name -->
                        <ul class="product-order">
                            <li>
                                <span class="left">@lang('static.page.shopping.cartlist.other.subtotal')</span>
                                @php($total=Gloudemans\Shoppingcart\Facades\Cart::instance('sopping')->total())
                                <span class="right">{{ $total }} ₼</span>
                            </li>
                            <li>
                                <span class="left">ƏDV 18%</span>
                                <span class="right brand">{{ floor(floatval($total)*18/100) }} ₼</span>
                            </li>
                        </ul>
                    </div>
                    <!-- End info-order -->

                    <a class="link-v1 box lh-50 rt full" href="{{ route('ordersuccess') }}" title="@lang('static.page.shopping.checkout.other.endShopping')">@lang('static.page.shopping.checkout.other.endShopping')</a>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
</div>
<!-- End cat-box-container -->
</div>

@section('js')
    {{-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap&libraries=&v=weekly"
    defer
    ></script>
<script>
let map, infoWindow,myLatLng;

function initMap() {
  myLatLng={'lat':{{ env('GOOGLE_MAPS_DEFAULT_CENTER_LAT') }},'lng':{{ env('GOOGLE_MAPS_DEFAULT_CENTER_LNG') }}};
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: {{ env('GOOGLE_MAPS_DEFAULT_ZOOM') }},
    center: myLatLng,
    mapTypeId: 'satellite'
  });
  infoWindow = new google.maps.InfoWindow();
  const locationButton = document.createElement("button");
  locationButton.innerHTML = '<i class="fa fa-map-marker-alt"></i>';
  locationButton.classList.add("get_loc");
  map.controls[google.maps.ControlPosition.BOTTOM_RIGHT].push(locationButton);
  locationButton.addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          infoWindow.setPosition(pos);
          infoWindow.setContent("Location found.");
          infoWindow.open(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}
</script> --}}
@endsection


