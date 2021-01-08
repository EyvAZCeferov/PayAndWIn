@section('title')
@lang('static.menu.products')
@endsection
@section('css')
<link
rel="stylesheet"
type="text/css"
href="{{asset('assets/libs/vendor/range-price.css')}}"
/>
@endsection
<div class="container">
    <div id="primary" class="col-xs-12 col-md-9">
            <div class="wrap-breadcrumb">
                <div class="ordering">
                    <div class="float-left">
                        <span class="col active"></span>
                        <span class="list"></span>
                    </div>
                    <div class="float-right">
                    <form action="#" method="get" class="order-by">
                        <p>Sort by :</p>
                        <select class="orderby" name="orderby">
                                <option>popularity</option>
                                <option selected="selected">average rating</option>
                                <option>newness</option>
                                <option>price: low to high</option>
                                <option>price: high to low</option>
                        </select>
                    </form>
                    </div>
                </div>
            </div>
            <div class="products ver2 grid_full grid_sidebar hover-shadow furniture">

                @livewire('product-foreach', ['data' => [1,2,3,4,5],'table'=>'products'])

            </div>
            <!-- End product-content products  -->

        </div>
        <!-- End Primary -->

    <div id="secondary" class="widget-area col-xs-12 col-md-3">
        <aside class="widget widget_product_categories">
            <h3 class="widget-title">@lang('static.menu.categories')</h3>
            <ul class="product-categories">
                <li><a href="#" title="Men">Men</a>
                    <ul class="children">
                        <li><a href="#" title="Bag & Luggage">Bag & Luggage</a></li>
                        <li><a href="#" title="Eyewear">Eyewear</a></li>
                        <li><a href="#" title="Jewelry">Jewelry</a></li>
                        <li><a href="#" title="Shoes">Shoes</a></li>
                        <li><a href="#" title="Skyrts">Skyrts</a></li>
                    </ul>
                </li>
                <li><a href="#" title="woment">woment</a>
                    <ul>
                        <li><a href="#" title="Bag">Bag</a></li>
                        <li><a href="#" title="Bed & Bath">Bed & Bath</a></li>
                        <li><a href="#" title="Sport tops & Vest">Sport tops & Vest</a></li>
                        <li><a href="#" title="Sport undewear">Sport undewear</a></li>
                    </ul>
                </li>
                <li><a href="#" title="kids">kids</a></li>
                <li><a href="#" title="All Product">All Product</a></li>
            </ul>
        </aside>
        <aside class="widget widget_by_price">
            <h3 class="widget-title">@lang('static.page.customers.products.byPrice')</h3>
            <div class="layout-slider">
              <span><input id="Slider1" type="text" name="price" value="1;100" /></span>
            </div>
        </aside>
        <aside class="widget widget_link">
            <h3 class="widget-title">@lang('static.menu.shops')</h3>
            @php($customers=get_customers())
            <ul>
                <li>
                    <a
                        style="color:{{ $all ? '#7c9d32' :null }}"
                        href="javascript:void(0)"
                        wire:click="all()"

                        title="@lang('static.page.customers.campaigns.all')">
                     @lang('static.page.customers.campaigns.all')
                    </a>
                    @php($campaignsCount=0)
                        @foreach($customers as $customer)
                            @if($customer->get_posts)
                                @php($campaignsCount+=$customer->get_posts()->count())
                            @endif
                        @endforeach
                    <span style="color:{{ $all ? '#7c9d32' :null }}"
                         class="count">({{ $campaignsCount }})</span>
                </li>
                @foreach($customers as $customer)
                    <li>
                        <a  @if($thisCustomer!=null )
                          style="color:{{ $thisCustomer->id==$customer->id ? '#7c9d32' :null }}"
                         @endif
                         href="javascript:void(0)"
                          wire:click="customer({{ $customer->id }})"
                           title="{{ $customer->az_name }}">
                            @if(app()->getLocale()=='az')
                                {{ $customer->az_name }}
                            @elseif(app()->getLocale()=='en')
                                {{ $customer->en_name }}
                            @elseif(app()->getLocale()=='ru')
                                {{ $customer->ru_name }}
                            @endif
                        </a>
                        <span
                        @if($thisCustomer!=null )
                            style="color:{{ $thisCustomer->id==$customer->id ? '#7c9d32' :null }}"
                            @endif
                         class="count">({{ $customer->get_posts()->count() }})</span>
                    </li>

                @endforeach
            </ul>
        </aside>
    </div>
    <!-- End Secondary -->
    {{-- Start QuickPanel --}}
    <div class="quickview-wrapper">
        <div onclick="hideQuickView()" class="overlay-bg"></div>
        <div class="quick-modal show">
           <span class="qvloading"></span><span class="closeqv"><i class="fa fa-times"></i></span>
           <div id="quickview-content">
              <div class="woocommerce product product-details-content">
                 <div class="product-images">
                    <div class="main-image images"><img id="images-select" alt=""
                        src="{{ asset('assets/libs/images/products/1.jpg') }}"></div>
                    <div class="quick-thumbnails">
                       <ul class="thumb-content">
                           <li class="thumb"><a href="{{ asset('assets/libs/images/products/1.jpg') }}" title="thumb product view1" onclick="swap1(this);return false;"><img src="{{ asset('assets/libs/images/products/1.jpg') }}" alt="thumb product1"/></a></li>
                           <li class="thumb"><a href="{{ asset('assets/libs/images/products/1.jpg') }}" title="thumb product view1" onclick="swap1(this);return false;"><img src="{{ asset('assets/libs/images/products/1.jpg') }}" alt="thumb product1"/></a></li>
                           <li class="thumb"><a href="{{ asset('assets/libs/images/products/1.jpg') }}" title="thumb product view1" onclick="swap1(this);return false;"><img src="{{ asset('assets/libs/images/products/1.jpg') }}" alt="thumb product1"/></a></li>
                           <li class="thumb"><a href="{{ asset('assets/libs/images/products/1.jpg') }}" title="thumb product view1" onclick="swap1(this);return false;"><img src="{{ asset('assets/libs/images/products/1.jpg') }}" alt="thumb product1"/></a></li>
                       </ul>
                    </div>
                 </div>
                 <div class="product-info box-detalis-v2">
                     <div class="product-name">
                         <h1>HONG QUAT PACKGING</h1>
                    </div>
                    <div class="rating">
                         <div class="overflow-h">
                             <div class="icon-rating">
                                 <input type="radio" checked="" name="star-horizontal-rating" id="star-horizontal-rating-1">
                                 <label for="star-horizontal-rating-1"><i class="fa fa-star-half-o"></i></label>
                                 <input type="radio" checked="" name="star-horizontal-rating" id="star-horizontal-rating-2">
                                 <label for="star-horizontal-rating-2"><i class="fa fa-star"></i></label>
                                 <input type="radio" checked="" name="star-horizontal-rating" id="star-horizontal-rating-3">
                                 <label for="star-horizontal-rating-3"><i class="fa fa-star"></i></label>
                                 <input type="radio" name="star-horizontal-rating" id="star-horizontal-rating-4">
                                 <label for="star-horizontal-rating-4"><i class="fa fa-star"></i></label>
                                 <input type="radio" name="star-horizontal-rating" id="star-horizontal-rating-5">
                                 <label for="star-horizontal-rating-5"><i class="fa fa-star"></i></label>
                             </div>
                             <span>(4 reviews)</span>
                         </div>
                     </div>
                    <div class="wrap-price">
                       <p class="price-old">$200.00</p>
                       <p class="price">$200.00</p>
                    </div>
                    <div class="options padding-0">
                        <p>Lorem ipsum dolor sit amet isse potenti. Vesquam ante aliquet lacusemper elit. neque nulla, convallis non commodo et, euismod nonsese. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.</p>
                        <div class="action">
                             <form enctype="multipart/form-data">
                                 <div class="product-signle-options product_15 clearfix">
                                     <div class="selector-wrapper size">
                                         <div class="quantity"><span class="minus"><i class="fa fa-minus"></i></span>
                                             <input type="text" size="4" class="qty" title="Qty" value="1" data-step="1">
                                         <span class="plus"><i class="fa fa-plus"></i></span></div>
                                     </div>
                                 </div>
                             </form>
                             <a href="#" title="Add to cart" class="link-ver1 rt add-cart"><span>Add to cart</span></a>
                             <a href="#" title="Wishlist" class="link-ver1"><i class="icon icon-heart"></i></a>
                         </div>
                         <div class="infomation">
                             <p class="sku"><span>SKU: </span>671272</p>
                             <p class="category"><span>Category: </span> Swteaters</p>
                             <p class="tags"><span>Tags: </span>Sweaters, Turtleneck, Wool</p>
                         </div>
                    </div>
                 </div>
                 <!-- End product-info -->
              </div>
              <!-- End product -->
           </div>
           <!-- End quick view -->
        </div>
        <!-- End quick modal -->
     </div>
    {{-- End QuickPanel --}}
</div>

@section('js')
    <script type="text/javascript" src="{{ asset('assets/libs/js/jquery.themepunch.plugins.min.js') }}"></script>
<script type="text/javascript"
src="{{ asset('/assets/libs/js/price-range.js') }}"></script>
    <script type="text/javascript">
      jQuery("#Slider1").slider({
        from: 0,
        to: 100,
        step: 1,
        smooth: true,
        round: 0,
        skin: "plastic"
        });
    </script>
@endsection
