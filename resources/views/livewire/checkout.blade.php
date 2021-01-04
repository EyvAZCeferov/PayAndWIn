@section('title')
    @lang('static.menu.shopping.checkout')
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
                                <li>
                                    <span class="name">Modern Chair</span>
                                    <span class="qty">01</span>
                                    <span class="total">$520.00</span>
                                </li>
                                <li>
                                    <span class="name">Toldbod Lamp</span>
                                    <span class="qty">02</span>
                                    <span class="total">$190.00</span>
                                </li>
                                <li>
                                    <span class="name">Getama Sofa</span>
                                    <span class="qty">03</span>
                                    <span class="total">$270.00</span>
                                </li>
                            </ul>
                        </div>
                        <!-- End product-name -->
                        <ul class="product-order">
                            <li>
                                <span class="left">@lang('static.page.shopping.cartlist.other.subtotal')</span>
                                <span class="right">$980.00</span>
                            </li>
                            <li>
                                <span class="left">ƏDV 18%</span>
                                <span class="right brand">$980.00</span>
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
