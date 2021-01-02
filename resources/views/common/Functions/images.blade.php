<div wire:ignore.self class="col-md-6 col-sm-6 slide-vertical {{ $align }}">
    <div class="slider-for">
        @if($images)
            @foreach($images as $image)
                <div>
              <span class="zoom">
                <img class="zoom-images"
                    style="max-width: 400px"
                    src="data:image/png;base64,{{get_image($image,'locations',$clasor)}}"
                    alt="{{$image}}"/>
          </span>
                </div>
            @endforeach
        @endif
    </div>
    <!-- End slider-for -->
    <div class="slider-nav">
        @if($cimages)
            @foreach($images as $image)
                <div>
                    <img
                        style="max-width: 80px"
                        src="data:image/png;base64,{{get_image($image,'locations',$clasor)}}"
                        alt="{{$image}}"/>

                </div>
            @endforeach
        @endif
    </div>
</div>
