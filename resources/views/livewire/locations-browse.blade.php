@section('title')
    @if($locations[0]->get_customer)
        @if(app()->getLocale()=='az')
            {{ $locations[0]->get_customer->az_name }}
        @elseif(app()->getLocale()=='en')
            {{ $locations[0]->get_customer->en_name }}
        @elseif(app()->getLocale()=='ru')
            {{ $locations[0]->get_customer->ru_name }}
        @endif
    @endif
    @lang('static.menu.shops')
@endsection

@section('css')
<style type="text/css">
    #map {
        width: 100%;
        height: 500px;
    }
  </style>
@endsection

<div>
    <div class="container">
        <div class="row mb-5" style="margin-bottom: 30px">
            <div id="map"></div>
        </div>
    </div>

</div>

@section('js')
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
