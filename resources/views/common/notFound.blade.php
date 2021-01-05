@extends('..layouts.app')
@section('title')
    @lang('static.menu.404')
@endsection
@section('content')
    <div class="container">
        <div class="page-404">
            <!-- End images -->
            <div class="text center">
                <div class="icon-box box">
                    <img src="{{asset('assets/libs/images/icon-page404.png')}}" alt="404 PW">
                </div>
                <h3>@lang('static.menu.404')</h3>
                <p>@lang('static.page.404.desc') <a href="{{route('index')}}"
                                                    title="@lang('static.menu.index')">@lang('static.menu.index')
                        <i
                            class="fa fa-angle-double-right"></i></a></p>
                <form action="{{ route('search') }}" method="POST">
                    @csrf
                    <input type="text"
                           onblur="if (this.value == '') {this.value = @lang('static.standart.topPanel.searchPlaceholder');}"
                           onfocus="if(this.value != '') {this.value = '';}"
                           value="@lang('static.standart.topPanel.searchPlaceholder')"
                           class="input-text required-entry"
                           title="@lang('static.standart.topPanel.searchPlaceholder')"
                           id="newsletter" name="keyword"
                           required />
                    <button class="submit" title="@lang('static.standart.topPanel.search')"
                            type="submit">@lang('static.standart.topPanel.search')</button>
                </form>
            </div>
            <!-- End text -->
        </div>
        <!-- End page404 -->
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $('#topSubject').hide();
        })
    </script>
@endsection
