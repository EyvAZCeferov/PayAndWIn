<div class="rating">
    @if (session()->has('ratingInfo'))
        <div class="alert alert-info" role="alert">
            <strong>{{ session('ratingInfo') }}</strong>
        </div>
    @endif
    <div class="overflow-h">
        <div class="icon-rating">
            @if ($rating)
                @for($i = 0; $i < 5; $i++)
                    <input
                    type="radio"
                    id="star-horizontal-rating-{{ $i + 1 }}"
                    @if($i+1<= $rating) checked  @else checked="off" @endif />
                    <label for="star-horizontal-rating-{{ $i + 1 }}"><i class="fa fa-star"></i></label>
                @endfor
            @else
                @for ($i = 0; $i < 5; $i++)
                    <input type="radio"
                    id="star-horizontal-rating-{{ $i + 1 }}"
                    wire:model="ratingFields.r-{{ $i }}"
                        checked="off" />
                    <label for="star-horizontal-rating-{{ $i + 1 }}"><i class="fa fa-star"></i></label>
                @endfor
            @endif

        </div>
    </div>
</div>
