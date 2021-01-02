@section('title')
    @lang('static.menu.campaigns')
@endsection
@section('campaignsActive', 'active')

<div class="blog-post-container blog-page blog-post-columns-3 center">
    <div class="container container-ver2">
        <div class="row">
            @foreach ($campaigns as $campaign)
                <div class="blog-post-item">
                    @endforeach
                    <div class="blog-post-image hover-images">
                        <a href="#" title="
@if(app()->getLocale()=='az')
                        {{$campaign->az_name}}
                        @elseif(app()->getLocale()=='en')
                        {{$campaign->en_name}}
                        @elseif(app()->getLocale()=='ru')
                        {{$campaign->ru_name}}
                        @endif
                            "><img src="assets/images/ImgBlog/1.jpg" alt="
@if(app()->getLocale()=='az')
                            {{$campaign->az_name}}
                            @elseif(app()->getLocale()=='en')
                            {{$campaign->en_name}}
                            @elseif(app()->getLocale()=='ru')
                            {{$campaign->ru_name}}
                            @endif
                                "></a>
                    </div>
                    <div class="text">
                        <h3>
                            <a href="{{route('campaigns',$campaign->slug)}}"
                               title="@if(app()->getLocale()=='az')
                               {{$campaign->az_name}}
                               @elseif(app()->getLocale()=='en')
                               {{$campaign->en_name}}
                               @elseif(app()->getLocale()=='ru')
                               {{$campaign->ru_name}}
                               @endif">
                                @if(app()->getLocale()=='az')
                                    {{$campaign->az_name}}
                                @elseif(app()->getLocale()=='en')
                                    {{$campaign->en_name}}
                                @elseif(app()->getLocale()=='ru')
                                    {{$campaign->ru_name}}
                                @endif
                            </a></h3>
                        <p class="post-by">
                            @if($campaign->getCustomer)
                                <span><i class="fas fa-search-location"></i>
                            @if(app()->getLocale()=='az')
                                        {{$campaign->getCustomer->az_name}}
                                    @elseif(app()->getLocale()=='en')
                                        {{$campaign->getCustomer->en_name}}
                                    @elseif(app()->getLocale()=='ru')
                                        {{$campaign->getCustomer->ru_name}}
                                    @endif
                            </span>
                            @endif
                            <span><i
                                    class="far fa-comment"></i>

                                36 @lang('static.page.campaigns.comments')
                            </span></p>
                        <p class="content">
                            @if(app()->getLocale()=='az')
                                {{$campaign->az_description}}
                            @elseif(app()->getLocale()=='en')
                                {{$campaign->en_description}}
                            @elseif(app()->getLocale()=='ru')
                                {{$campaign->ru_description}}
                            @endif
                        </p>
                        <a class="link-v1 color-brand"
                           href="{{route('campaignsBrowse',['cat'=>'bazarstore','slug'=>$campaign->slug])}}"
                           title="@lang('static.actions.more')">
                            @lang('static.actions.more')</a>
                    </div>
                    <!-- End text -->
                </div>
        </div>
    </div>
    <div class="pagination-container pagination-blog">
        <nav class="pagination">
            <a class="prev page-numbers" href="#"><i class="fa fa-angle-left"></i></a>
            {{$campaigns->links()}}
            <a class="next page-numbers" href="#"><i class="fa fa-angle-right"></i></a>
        </nav>
    </div>
    <!-- End pagination-container -->
</div>
