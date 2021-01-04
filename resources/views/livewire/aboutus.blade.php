@section('title')
    @lang('static.menu.about')
@endsection
@section('aboutActive', 'active')
<div class="page-about">
    <div class="container container-ver2 space-50 head-about">
        <div class="choose-us">
            <div class="title-choose align-center about">
                <h3>@lang('static.page.about.title')</h3>
                <div class="align-center border-choose">
                    <div class="images">
                        <img src="{{asset('assets/libs/images/bg-border-center.png')}}" alt="pw">
                    </div>
                    <!--End images-->
                </div>
                <!--End border-->
            </div>
        </div>
        <!--End choose-us-->
        <div class="row">
            <div class="col-md-6">
                @php($cover=json_decode($this->about->images))
                <img class="img-responsive"
                     src="data:image/png;base64,{{get_image($cover[0],'about/aboutImages')}}"
                     alt="
                     @if(app()->getLocale()=='az')
                     {{ $about->az_title }}
                     @elseif(app()->getLocale()=='en')
                     {{ $about->en_title }}
                     @elseif(app()->getLocale()=='ru')
                     {{ $about->ru_title }}
                     @endif
                         ">
            </div>
            <!--End col-md-6-->
            <div class="col-md-6 pd-left-10">
                <h3>
                    @if(app()->getLocale()=='az')
                        {{ $about->az_motive }}
                    @elseif(app()->getLocale()=='en')
                        {{ $about->en_motive }}
                    @elseif(app()->getLocale()=='ru')
                        {{ $about->ru_motive }}
                    @endif
                </h3>
                <p>
                    @if(app()->getLocale()=='az')
                        {!! html_entity_decode(htmlspecialchars($about->az_description)) !!}
                    @elseif(app()->getLocale()=='en')
                        {!! html_entity_decode(htmlspecialchars($about->en_description)) !!}
                    @elseif(app()->getLocale()=='ru')
                        {!! html_entity_decode(htmlspecialchars($about->ru_description)) !!}
                    @endif
                </p>
                <div class="slider-about owl-carousel">

                    @foreach(json_decode($about->images) as $image)
                        <div class="items">
                            <a href="javascript:void(0)">
                                <img src="data:image/png;base64,{{get_image($image,'about/aboutImages')}}"
                                     alt="{{$image}}">
                            </a>
                        </div>
                    @endforeach
                </div>
                <!--End slider-->
            </div>
            <!--End col-md-6-->
        </div>
        <!--End row-->
    </div>
    <!--End container-->
    <div class="about-choose center space-padding-tb-40 space-30">
        <div class="choose-us about-choose">
            <div class="container container-ver2">
                <div class="title-choose align-center">
                    <h3>
                        @if(app()->getLocale()=='az')
                            {{ $whychooseUs->az_title }}
                        @elseif(app()->getLocale()=='en')
                            {{ $whychooseUs->en_title }}
                        @elseif(app()->getLocale()=='ru')
                            {{ $whychooseUs->ru_title }}
                        @endif
                    </h3>
                    <div class="align-center border-choose">
                        <div class="images">
                            <img src="{{asset('assets/libs/images/bg-border-center.png')}}" alt="icon">
                        </div>
                        <!--End images-->
                    </div>
                    <!--End border-->
                </div>
                <!--End title-->
                <div class="col-md-4 align-right">
                    @foreach($whychooseUs->getItems->sort() as $item)
                        <div class="items">
                            <div class="icon">
                                <img
                                    width="60"
                                    src="data:image/png;base64,{{get_image($item->icon,'about/whychooseus/items')}}"
                                    alt="{{$item->icon}}" />
                            </div>
                            <div class="text">
                                <h3>
                                    @if(app()->getLocale()=='az')
                                        {{ $item->az_title }}
                                    @elseif(app()->getLocale()=='en')
                                        {{ $item->en_title }}
                                    @elseif(app()->getLocale()=='ru')
                                        {{ $item->ru_title }}
                                    @endif
                                </h3>
                                <p>
                                    @if(app()->getLocale()=='az')
                                        {{ $item->az_description }}
                                    @elseif(app()->getLocale()=='en')
                                        {{ $item->en_description }}
                                    @elseif(app()->getLocale()=='ru')
                                        {{ $item->ru_description }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--End col-md-3-->
                <div class="col-md-4">
                    <img class="img-responsive"
                         src="data:image/png;base64,{{get_image($whychooseUs->cover_image,'about/whychooseus/table')}}"
                         alt="@if(app()->getLocale()=='az')
                         {{ $whychooseUs->az_title }}
                         @elseif(app()->getLocale()=='en')
                         {{ $whychooseUs->en_title }}
                         @elseif(app()->getLocale()=='ru')
                         {{ $whychooseUs->ru_title }}
                         @endif">
                </div>
                <!--End col-md-6-->
                <!--End col-md-3-->
            </div>
            <!--End container-->
        </div>
        <!--End choose-us-->
    </div>
    <!-- End about chose -->
    <div class="our-team">
        <div class="container container-ver2 center">
            <div class="choose-us">
                <div class="title-choose align-center about">
                    <h4>@lang('static.page.about.teams.wearefamily')</h4>
                    <h3>@lang('static.page.about.teams.title')</h3>
                    <div class="align-center border-choose">
                        <div class="images">
                            <img src="{{asset('assets/libs/images/bg-border-center.png')}}" alt="icon">
                        </div>
                        <!--End images-->
                    </div>
                    <!--End border-->
                </div>
            </div>
            <!--End choose-us-->
            <div class="row">
                @foreach($teams as $team)
                    <div class="col-md-4 col-sm-4 space-30">
                        <div class="interactive-banner interactive-banner-v1 center">
                            <div class="interactive-banner-body">
                                <img class="img-responsive"
                                     src="data:image/png;base64,{{get_image($team->image,'about/teams')}}"
                                     alt="images">
                            </div>
                        </div>
                        <div class="banner-title">
                            <h3>@if(app()->getLocale()=='az')
                                    {{ $team->az_title }}
                                @elseif(app()->getLocale()=='en')
                                    {{ $team->en_title }}
                                @elseif(app()->getLocale()=='ru')
                                    {{ $team->ru_title }}
                                @endif</h3>
                            <p>@if(app()->getLocale()=='az')
                                    {{ $team->az_description }}
                                @elseif(app()->getLocale()=='en')
                                    {{ $team->en_description }}
                                @elseif(app()->getLocale()=='ru')
                                    {{ $team->ru_description }}
                                @endif</p>
                            <div class="interactive-banner-profile text-center">
                                @php($socialLinks=json_decode($team->social))
                                <div class="action light-style">
                                    @if($socialLinks->facebook)
                                        <a href="{{$socialLinks->facebook}}"><i
                                                class="icons icons-bodered radius-x fab fa-facebook"></i></a>
                                    @endif
                                    @if($socialLinks->twitter)
                                        <a href="{{$socialLinks->twitter}}"><i
                                                class="icons icons-bodered radius-x fab fa-twitter"></i></a>
                                    @endif
                                    @if($socialLinks->whatsapp)
                                        <a href="tel:{{$socialLinks->whatsapp}}"><i
                                                class="icons icons-bodered radius-x fab fa-whatsapp"></i></a>
                                    @endif
                                    @if($socialLinks->email)
                                        <a href="mailto:{{$socialLinks->email}}"><i
                                                class="icons icons-bodered radius-x fa fa-envelope"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End row -->
        </div>
        <!-- End container-ver2 -->
    </div>
    <!-- End our team -->
</div>
<!-- End page-about -->


