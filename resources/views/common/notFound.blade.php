@extends('..layouts.app')
@section('title')
    @lang('static.menu.404')
@endsection
@section('css')
    @toastr_css
@endsection
@section('js')
    @toastr_js
    @toastr_render
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
                <form action="#" method="get" accept-charset="utf-8">
                    <input type="text"
                           onblur="if (this.value == '') {this.value = @lang('static.standart.topPanel.searchPlaceholder');}"
                           onfocus="if(this.value != '') {this.value = '';}"
                           value="@lang('static.standart.topPanel.searchPlaceholder')"
                           class="input-text required-entry"
                           title="@lang('static.standart.topPanel.searchPlaceholder')"
                           id="newsletter" name="email">
                    <button class="button" title="@lang('static.standart.topPanel.search')"
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
