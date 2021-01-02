<div class="rating">
    @if (session()->has('ratingInfo'))
        <div class="alert alert-info" role="alert">
            <strong>{{session('ratingInfo')}}</strong>
         </div>
    @endif
    <div class="overflow-h">
        <div class="icon-rating">
            @if($rating)
                @for($i=1;$i<6;$i++)
                    @if($i<=$rating->rating)
                        <input type="radio" id="star-horizontal-rating-{{$i}}"
                        checked="on" />
                        <label for="star-horizontal-rating-{{$i}}"><i class="fa fa-star"></i></label>
                    @endif
                @endfor
            @else
                @for($i=1;$i<6;$i++)
                    <input type="radio" id="star-horizontal-rating-{{$i}}"
                        wire:model="ratingFields.r-{{ $i }}"
                        checked="off"
                    />
                    <label for="star-horizontal-rating-{{$i}}"><i class="fa fa-star"></i></label>
                @endfor
            @endif

        </div>
    </div>
</div>
