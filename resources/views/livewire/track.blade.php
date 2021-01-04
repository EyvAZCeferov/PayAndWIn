@section('title')
    @lang('static.menu.shopping.trackProduct')
@endsection
<div>
    <div class="container container-ver2 order-tracking space-padding-tb-30">
        <p>@lang('static.page.shopping.track.other.describe')</p>
        <div class="tracking-content center">
            <form class="form-horizontal">
                <div class="box space-20">
                    <label for="inputfname" class="control-label">@lang('static.page.shopping.track.other.orderId')</label>
                    <input id="inputfname" class="form-control" type="text">
                </div>
                <a class="link-v1 lh-50 rt" title="@lang('static.page.shopping.track.other.track')">@lang('static.page.shopping.track.other.track')</a>
            </form>
        </div>
    </div>
</div>
