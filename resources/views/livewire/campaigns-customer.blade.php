@section('title')
@if(!$all)
    @if($campaigns->count()>0)
        @if(app()->getLocale()=='az')
            {{ $campaigns[0]->getCustomer->az_name }}
        @elseif(app()->getLocale()=='en')
            {{ $campaigns[0]->getCustomer->en_name }}
        @elseif(app()->getLocale()=='ru')
            {{ $campaigns[0]->getCustomer->ru_name }}
        @endif
    @endif
@endif
    @lang('static.menu.campaigns')
@endsection
@section('customersActive', 'active')
<div class="container">
    @if($campaigns->count()>0)

    <div id="primary" class="col-xs-12 col-md-9">
        <div class="products ver2 grid_full grid_sidebar hover-shadow furniture blog-post-container  blog-post-columns-3">
            @foreach($campaigns as $campaign )
                <div class="blog-post-item">
                        <div class="blog-post-image hover-images">
                            <a href="{{ route('customerCampaignsBrowse',['id'=>$campaign->getCustomer->id,'slug'=>$campaign->slug]) }}">
                                @php($images=json_decode($campaign->images))
                                <img
                                src="data:image/png;base64,{{get_image($images[0],'posts',$campaign->clasor)}}"
                                alt="
                                @if(app()->getLocale()=='az')
                                    {{ $campaign->az_name }}
                                @elseif(app()->getLocale()=='en')
                                    {{ $campaign->en_name }}
                                @elseif(app()->getLocale()=='ru')
                                    {{ $campaign->ru_name }}
                                @endif
                                " /></a>
                        </div>
                        <div class="text">
                            <h3><a href="{{ route('customerCampaignsBrowse',['id'=>$campaign->getCustomer->id,'slug'=>$campaign->slug]) }}" title="
                                @if(app()->getLocale()=='az')
                                                        {{ $campaign->az_name }}
                                                    @elseif(app()->getLocale()=='en')
                                                        {{ $campaign->en_name }}
                                                    @elseif(app()->getLocale()=='ru')
                                                        {{ $campaign->ru_name }}
                                                    @endif
                                " >
                                @if(app()->getLocale()=='az')
                                                        {{ $campaign->az_name }}
                                                    @elseif(app()->getLocale()=='en')
                                                        {{ $campaign->en_name }}
                                                    @elseif(app()->getLocale()=='ru')
                                                        {{ $campaign->ru_name }}
                                                    @endif
                                </a></h3>
                            <p class="post-by"><span><i class="fa fa-address-card"></i>
                                @if(app()->getLocale()=='az')
                                {{ $campaign->getCustomer->az_name }}
                            @elseif(app()->getLocale()=='en')
                                {{ $campaign->getCustomer->en_name }}
                            @elseif(app()->getLocale()=='ru')
                                {{ $campaign->getCustomer->ru_name }}
                            @endif
                            </span><span><i class="fas fa-comment"></i> @lang('static.page.customers.customer.comments',['count'=>$campaign->getComments->count()])</span></p>
                            <p class="content">
                                @if(app()->getLocale()=='az')
                                {{ mb_substr($campaign->az_description,0,150) }}
                            @elseif(app()->getLocale()=='en')
                                {{ mb_substr($campaign->en_description,0,150) }}
                            @elseif(app()->getLocale()=='ru')
                                {{ mb_substr($campaign->ru_description,0,150) }}
                            @endif

                            </p>
                            <a class="link-v1 color-brand"
                                href="{{ route('customerCampaignsBrowse',['id'=>$campaign->getCustomer->id,'slug'=>$campaign->slug]) }}" title="@lang('static.actions.more')">
                                @lang('static.actions.more')</a>
                        </div>
                        <!-- End text -->
                    </div>
                    <!-- End item -->

                </div>
            @endforeach
    </div>
    @endif

        {{-- {{ $campaigns->links('/common/Functions/pager') }} --}}
    <!-- End pagination-container -->
    <div id="secondary" class="widget-area col-xs-12 col-md-3">
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
</div>
