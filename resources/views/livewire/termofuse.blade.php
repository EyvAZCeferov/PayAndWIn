@section('title')
    @lang('static.menu.termofuse')
@endsection
<div class="main-content">
    <div class="page-faq">
        <div class="container container-ver2">
            <div class="content-text space-50">
                <h2>{{ settings('projectName') }} @lang('static.menu.termofuse')</h2>
                <div class="row">
                    <div class="col-md-12 space-50">
                        <h3>@lang('static.page.termofuse.termusedescb')</h3>
                        <p>
                            @if(app()->getLocale()=='az')
                                {{ $termofuse->az_description }}
                            @elseif(app()->getLocale()=='en')
                                {{ $termofuse->en_description }}
                            @elseif(app()->getLocale()=='ru')
                                {{ $termofuse->ru_description }}
                            @endif
                        </p>
                    </div>

                </div>
            </div>


        </div>
        <!-- End container -->
    </div>
</div>
