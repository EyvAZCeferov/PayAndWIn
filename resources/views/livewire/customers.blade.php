@section('title')
    @lang('static.menu.customers')
@endsection
@section('customersActive', 'active')
<div class="blog-post-container blog-page blog-list-width">
    <div class="container container-ver2">
        <div class="row">
            @php($index=1)
            @foreach($customers as $customer)
                <div class="blog-post-item {{ $index%2==0 ? 'right' : 'left' }}">
                    <div class="blog-post-image hover-images">
                        <a href="{{ route('customer',$customer->id) }}" title="
                    @if(app()->getLocale()=='az')
                        {{ $customer->az_name }}
                        @elseif(app()->getLocale()=='en')
                        {{ $customer->en_name }}
                        @elseif(app()->getLocale()=='ru')
                        {{ $customer->ru_name }}
                        @endif
                            ">
                            <img src="data:image/png;base64,{{get_image($customer->logo,'customers')}}"
                                 alt="
                    @if(app()->getLocale()=='az')
                                 {{ $customer->az_name }}
                                 @elseif(app()->getLocale()=='en')
                                 {{ $customer->en_name }}
                                 @elseif(app()->getLocale()=='ru')
                                 {{ $customer->ru_name }}
                                 @endif
                                     "/></a>
                    </div>
                    <div class="text">
                        <h3>
                            <a href="{{ route('customer',$customer->id) }}" title=" @if(app()->getLocale()=='az')
                            {{ $customer->az_name }}
                            @elseif(app()->getLocale()=='en')
                            {{ $customer->en_name }}
                            @elseif(app()->getLocale()=='ru')
                            {{ $customer->ru_name }}
                            @endif">
                                @if(app()->getLocale()=='az')
                                    {{ $customer->az_name }}
                                @elseif(app()->getLocale()=='en')
                                    {{ $customer->en_name }}
                                @elseif(app()->getLocale()=='ru')
                                    {{ $customer->ru_name }}
                                @endif</a>
                        </h3>

                        <p class="post-by">
                            <a href="{{ route('customerLocationsBrowse', $customer->id) }}" >
                                 <span>  
                                     @lang('static.menu.shops')
                                  &nbsp; 
                                 <i
                                class="fa fa-map fa-1x"></i> 
                                {{ $customer->get_locations()->count() }}
                            </span>
                            </a>
                        </p>
                        <p class="post-by">
                            <a href="{{ route('customerCampaigns', $customer->id) }}" >
                            <span> @lang('static.menu.campaigns')
                             &nbsp; <i
                                class="fa fa-list-ul fa-1x"></i> 
                                {{ $customer->get_posts()->count() }}
                            </span>
                            </a>
                        </p>
                        <p class="post-by">
                            <a href="{{ route('products', $customer->id) }}" >
                                <span> 
                                @lang('static.menu.products') &nbsp; 
                                <i
                                    class="fa fa-map fa-1x"></i>
                                    0</span>
                            </a>
                            </p>
                        <a class="link-v1 color-brand" href="{{ route('customer',$customer->id) }}"
                           title="@lang('static.actions.more')">@lang('static.actions.more')</a>
                    </div>
                    <!-- End text -->
                </div>
                @php($index++)
            @endforeach

        </div>
    </div>
    {{ $customers->links('/common/Functions/pager') }}
</div>
