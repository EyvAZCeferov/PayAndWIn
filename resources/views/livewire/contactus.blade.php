@section('title')
    @lang('static.menu.contact')
@endsection
@section('contactActive', 'active')
@section('css')
<script>

    $(function(){
        $('#topSubject').hide();
    })
</script>
<style type="text/css">
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        width: 100%;
        height: 500px;
    }
  </style>
@endsection
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
<div>
    <div class="container">
        <div id="map">

        </div>
    </div>
    <!-- End google map -->
    <div class="container container-ver2">
        <div class="page-contact">
            <div class="head">
                <div class="item">
                    <div class="icon">
                        <span class="pe-7s-map-marker"></span>
                    </div>
                    <div class="text">
                        <p>{{settings('coop_loc')}}</p>
                    </div>
                </div>
                <!-- End item -->
                <div class="item">
                    <div class="icon">
                        <span class="pe-7s-global"></span>
                    </div>
                    <div class="text">
                        <p><a href="mailto:{{settings('email')}}">{{settings('email')}}</a></p>
                    </div>
                </div>
                <!-- End item -->

                <div class="item">
                    <div class="icon">
                        <span class="pe-7s-call"></span>
                    </div>
                    <div class="text">
                        <p>@lang('static.form.labels.phonenumb'): <a
                                href="tel:{{settings('phoneNumb')}}">{{settings('phoneNumb')}}</a></p>
                    </div>
                </div>
                <!-- End item -->
            </div>
            <!-- End head -->
            <div class="content-text center">
                <h3>@lang('static.page.contactus.title')</h3>
                <p>@lang('static.page.contactus.leavemessage')</p>
                @if (session()->has('message'))
                    <div class="alert alert-info w-100" role="alert">
                        <strong>{{session('message')}}</strong>
                    </div>
                @endif
                <form class="form-horizontal space-50" wire:submit.prevent="sendMessage">
                    <div class="form-group col-md-6">
                        <input type="text" placeholder="@lang('static.form.labels.name')*"
                               class="form-control" wire:model="formFields.name"/>
                               @error('formFields.name') <span
                                            class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" placeholder="@lang('static.form.labels.email')*"
                               class="form-control" wire:model="formFields.email"/>
                               @error('formFields.email') <span
                                            class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" placeholder="@lang('static.form.labels.subject')*"
                               class="form-control" wire:model="formFields.subject"/>
                               @error('formFields.subject') <span
                                            class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                    <textarea placeholder="@lang('static.form.labels.desc')*"
                              class="form-control" wire:model="formFields.description"></textarea>
                              @error('formFields.description') <span
                                            class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="box align-left">
                        <button type="submit" class="link-v1 rt">@lang('static.form.buttons.sendmessage')</button>
                    </div>
                </form>
            </div>
            <!-- End content-text -->
        </div>
    </div>
    <!-- End container -->
</div>

