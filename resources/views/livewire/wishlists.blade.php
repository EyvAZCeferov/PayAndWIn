@section('title')
    @lang('static.menu.shopping.wishlists')
@endsection
<div>
    <div class="cart-box-container">
        <div class="container container-ver2">
            <div class="box cart-container">
                <table class="table cart-table space-80">
                    <thead>
                        <tr>
                            <th class="product-photo">@lang('static.page.shopping.wishlist.tableheader.productName')</th>
                            <th class="produc-name"></th>
                            <th class="produc-price">@lang('static.page.shopping.wishlist.tableheader.price')</th>
                            <th class="product-quantity">@lang('static.page.shopping.wishlist.tableheader.stockstat.title')</th>
                            <th class="add-cart">@lang('static.page.shopping.wishlist.tableheader.addToCart')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="item_cart">
                            <td class="product-photo"><img src="{{ asset('assets/libs/images/products/1.jpg') }}" alt="Futurelife"></td>
                            <td class="produc-name"><a href="#" title="">Name product 01</a></td>
                            <td class="produc-price"><input value="$69.90" size="4" type="text"></td>
                            <td class="product-instock"><span><i class="fa fa-check-circle"></i>In Stock</span></td>
                            <td class="add-cart"><a class="link-v1 lh-50 rt" href="javascript:void(0)"><i class="fa fa-cart-arrow-down"></i></a></td>
                        </tr>
                        <tr class="item_cart">
                            <td class="product-photo"><img src="{{ asset('assets/libs/images/products/1.jpg') }}" alt="Futurelife"></td>
                            <td class="produc-name"><a href="#" title="">Name product 01</a></td>
                            <td class="produc-price"><input value="$51.59" size="4" type="text"></td>
                            <td class="product-instock"><span class="out"><i class="fa fa-check-circle"></i>Out Stock</span></td>
                            <td class="add-cart"><a class="link-v1 lh-50 rt" href="javascript:void(0)"><i class="fa fa-cart-arrow-down"></i></a></td>
                        </tr>
                    </tbody>
                </table>
        </div>
        <!-- End container -->
    </div>
</div>