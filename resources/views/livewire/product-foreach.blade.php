<div>
    <div class="row">
        @if (session()->has('message'))
                        <div class="alert alert-info w-100" role="alert">
                            <strong>{{session('message')}}</strong>
                        </div>
        @endif
    </div>
    @foreach($data as $d)
        <div class="item-inner">
            <div class="product">
                <div class="product-images">
                    <a href="#" title="product-images">
                        <img class="primary_image" src="{{ asset('assets/libs/images/products/1.jpg') }}" alt=""/>
                        <img class="secondary_image" src="{{ asset('assets/libs/images/products/1.jpg')}}" alt=""/>
                    </a>
                </div>
                <a href="#" title="Bouble Fabric Blazer"><p class="product-title">Bouble Fabric Blazer</p></a>
                <p class="product-price-old">$700.00</p>
                <p class="product-price">$69.90</p>
                <p class="description">Dramatically transition excellent information rather than mission-critical results. Competently communicate fully tested core competencies through holistic resources. Professionally maintain high-payoff best practices whereas user-centric alignments. Intrinsicly engage future-proof best practices whereas economically sound resources. Holisticly maximize multidisciplinary synergy before magnetice-tailers.</p>
                <div class="action">
                        <a class="add-cart" href="javascript:void(0)"
                        wire:click="addCart()"
                        title="Add to cart"></a>
                        <a class="wish" href="javascript:void(0)"
                        wire:click="addWishList()" title="Wishlist"></a>
                        <a class="zoom" onclick="quick()" title="Quick view"></a>
                    </div>
                    <!-- End action -->
                <div class="social box">
                    <h3>@lang('static.actions.shareThis') :</h3>
                    <a class="twitter" href="#" title="social"><i class="fab fa-twitter-square"></i></a>
                    <a class="dribbble" href="#" title="social"><i class="fab fa-dribbble"></i></a>
                    <a class="skype" href="#" title="social"><i class="fab fa-skype"></i></a>
                    <a class="pinterest" href="#" title="social"><i class="fab fa-pinterest"></i></a>
                    <a class="facebook" href="#" title="social"><i class="fab fa-facebook-square"></i></a>
                </div>
            </div>
            <!-- End product -->
        </div>
    @endforeach
</div>
