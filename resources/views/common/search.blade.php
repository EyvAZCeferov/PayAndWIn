@extends('..layouts.app')
@section('title')
    @lang('static.menu.search')
@endsection

@section('content')
<div class="blog-post-container blog-page blog-post-columns-3 center">
    <div class="container container-ver2">
        <div class="row">
            @foreach($datas as $data)
                <div class="blog-post-item">
                    <div class="blog-post-image hover-images">
                        <a
                        href="{{ route('customerCampaignsBrowse',['id'=>$data->getCustomer->id,'slug'=>$data->slug]) }}"
                        title="Post">
                        @php($images=json_decode($data->images))
                        <img src="data:image/png;base64,{{get_image($images[0],'posts',$data->clasor)}}"
                        alt="
                        @if(app()->getLocale()=='az')
                            {{ $data->az_name }}
                        @elseif(app()->getLocale()=='en')
                            {{ $data->en_name }}
                        @elseif(app()->getLocale()=='ru')
                            {{ $data->ru_name }}
                        @endif
                        " /></a>
                    </div>
                    <div class="text">
                        <h3>
                            <a
                            href="{{ route('customerCampaignsBrowse',['id'=>$data->getCustomer->id,'slug'=>$data->slug]) }}"
                            title="@if(app()->getLocale()=='az')
                                        {{ $data->az_name }}
                                    @elseif(app()->getLocale()=='en')
                                        {{ $data->en_name }}
                                    @elseif(app()->getLocale()=='ru')
                                        {{ $data->ru_name }}
                                    @endif">@if(app()->getLocale()=='az')
                                        {{ $data->az_name }}
                                    @elseif(app()->getLocale()=='en')
                                        {{ $data->en_name }}
                                    @elseif(app()->getLocale()=='ru')
                                        {{ $data->ru_name }}
                                    @endif</a></h3>
                        <p class="post-by"><span><i class="fa fa-address-card"></i>
                            @if(app()->getLocale()=='az')
                            {{ $data->getCustomer->az_name }}
                        @elseif(app()->getLocale()=='en')
                            {{ $data->getCustomer->en_name }}
                        @elseif(app()->getLocale()=='ru')
                            {{ $data->getCustomer->ru_name }}
                        @endif</span><span><i class="fas fa-comment"></i> @lang('static.page.customers.customer.comments',['count'=>$data->getComments->count()])</span></p>
                        <p class="content">
                            @if(app()->getLocale()=='az')
                            {{ mb_substr($data->az_description,0,150) }}
                        @elseif(app()->getLocale()=='en')
                            {{ mb_substr($data->en_description,0,150) }}
                        @elseif(app()->getLocale()=='ru')
                            {{ mb_substr($data->ru_description,0,150) }}
                        @endif
                        </p>
                        <a class="link-v1 color-brand"
                        href="{{ route('customerCampaignsBrowse',['id'=>$data->getCustomer->id,'slug'=>$data->slug]) }}"
                        title="@lang('static.actions.more')">@lang('static.actions.more')</a>
                    </div>
                    <!-- End text -->
                </div>
            @endforeach

        </div>
    </div>
    {{ $datas->links('/common/Functions/pager') }}

    <!-- End pagination-container -->
    </div>
@endsection
