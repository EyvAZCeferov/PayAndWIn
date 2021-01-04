@section('title')
    @lang('static.menu.shopping.ordersuccess')
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
                <div class="item active center">
                    <p class="icon">03</p>
                    <h3>@lang('static.menu.shopping.ordersuccess')</h3>
                </div>
            </div>
            <!-- End col-md-4 -->
        </div>
    </div>
    <!-- End container -->
    <div class="container container-ver2">
        <div class="box float-left order-complete center space-50">
            <div class="icon space-20">
                <img src="{{ asset('assets/libs/images/icon-order-complete.png') }}" alt="icon">
            </div>
            <p class="box center space-50">@lang('static.page.shopping.order.other.describe')</p>
            <div class="box">
                <a class="link-v1 lh-50 margin-right-20 space-20 color-brand" href="{{ route('index') }}" title="@lang('static.menu.index')">@lang('static.menu.index')</a>
                <a class="link-v1 lh-50 rt space-20" href="{{ route('track') }}" title="@lang('static.menu.shopping.trackProduct')">@lang('static.menu.shopping.trackProduct')</a>
            </div>
        </div>
    </div>
</div>
