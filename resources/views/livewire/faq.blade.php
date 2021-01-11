@section('title')
    @lang('static.menu.faq')
@endsection
<div class="main-content">
<div class="page-faq">
    <div class="container container-ver2">
        @foreach($faqs as $faq)
            <div class="content-text space-50">
                <h2>
                    @if(app()->getLocale()=='az')
                        {{ $faq->az_title }}
                    @elseif(app()->getLocale()=='en')
                        {{ $faq->en_title }}
                    @elseif(app()->getLocale()=='ru')
                        {{ $faq->ru_title }}
                    @endif
                </h2>
                <div class="row">
                    <div class="col-md-6 space-50">
                        <p>
                            @if(app()->getLocale()=='az')
                                {{ $faq->az_description }}
                            @elseif(app()->getLocale()=='en')
                                {{ $faq->en_description }}
                            @elseif(app()->getLocale()=='ru')
                                {{ $faq->ru_description }}
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6 space-50">
                        @if($faq->image)
                        <img
                        class="img-fluid img-responsive"
                        src="data:image/png;base64,{{get_image($faq->image,'/about/faqs')}}"
                        alt="
                        @if(app()->getLocale()=='az')
                            {{ $faq->az_title }}
                        @elseif(app()->getLocale()=='en')
                            {{ $faq->en_title }}
                        @elseif(app()->getLocale()=='ru')
                            {{ $faq->ru_title }}
                        @endif
                        " />
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!-- End container -->
</div>
</div>
