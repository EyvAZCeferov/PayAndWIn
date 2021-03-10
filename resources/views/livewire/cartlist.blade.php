@section('title')
    @lang('static.menu.shopping.cartlists')
@endsection
<div>
    <div class="cart-box-container">
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
                    <div class="item center">
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
        <div class="container container-ver2">
            <div class="box cart-container">
                <table class="table cart-table space-30">
                    <thead>
                        <tr>
                            <th class="product-photo">@lang('static.page.shopping.wishlist.tableheader.productName')</th>
                            <th class="produc-name"></th>
                            <th class="produc-price">@lang('static.page.shopping.wishlist.tableheader.price')</th>
                            <th class="product-quantity">@lang('static.page.shopping.cartlist.tableheader.qyt')</th>
                            <th class="total-price">@lang('static.page.shopping.cartlist.tableheader.total')</th>
                            <th class="product-remove"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartshis as $cart)
                            <tr class="item_cart">
                                <td class="product-photo">
                                    <img src="{{ asset('assets/libs/images/products/1.jpg') }}"
                                    alt="Futurelife">
                                </td>
                                <td class="produc-name"><a href="#" title="">{{ $cart['name'] }}</a></td>
                                <td class="produc-price"><input value="${{ $cart['price'] }}" size="4" type="text"></td>
                                <td class="product-quantity">
                                    <form enctype="multipart/form-data">
                                    <div class="product-signle-options product_15 clearfix">
                                        <div class="selector-wrapper size">
                                            <div class="quantity">
                                                <input data-step="1" value="{{ $cart['qty'] }}" title="@lang('static.page.shopping.cartlist.tableheader.qyt')" class="qty" size="4" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </td>
                                <td class="total-price"></td>
                                <td class="product-remove">
                                    <a
                                    href="javascript:void(0)"
                                    class="remove"
                                    title="close"
                                    wire:click="remove('{{ $cart['rowId'] }}')" >
                                        <img src="{{ asset('assets/libs/images/icon-delete-cart.png') }}" alt="close" />
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row-total">
                    <div class="float-left">
                        <h3>@lang('static.page.shopping.cartlist.other.subtotal')</h3>
                    </div>
                    <!--End align-left-->
                    <div class="float-right">
                        <p>{{ Gloudemans\Shoppingcart\Facades\Cart::instance('sopping')->total() }}</p>
                    </div>
                    <!--End align-right-->
                </div>
                <div class="box space-30">
                    <div class="float-left">
                        <a
                            class="link-v1 lh-50 margin-right-20 space-20"
                            href="javascript:void(0)"
                            wire:click="clearCart()"
                            title="@lang('static.page.shopping.cartlist.other.clearCart')"
                            >
                            @lang('static.page.shopping.cartlist.other.clearCart')
                        </a>
                    </div>
                    @auth
                    <!-- End float left -->
                    <div class="float-right">
                        <a class="link-v1 lh-50 bg-brand" href="{{ route('checkout') }}" title="@lang('static.page.shopping.cartlist.other.continueCart')">@lang('static.page.shopping.cartlist.other.continueCart')</a>
                    </div>
                    <!-- End float-right -->
                    @endauth
                </div>
                <!-- End box -->
        </div>
        <!-- End container -->
    </div>
</div>
