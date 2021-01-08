<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="{{ settings('description') }}" />
    <meta name="author" content="{{ settings('projectName') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/vendor/owl-slider.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/vendor/settings.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/logos/favicon.png') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <script type="text/javascript" src="{{ asset('assets/libs/js/jquery-3.2.0.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/libs/vendor/fontawesome/css/all.min.css') }}" />
    <style>
        .turbolinks-progress-bar {
            height: 3px;
            background-color: #7c9d32;
        }

        .svg-inline--fa.fa-plus.fa-w-14 {
            display: none;
            overflow: hidden;
        }

        body::-webkit-scrollbar {
            width: 0.6em;
        }

        body::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px #fff;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #7c9d32;
            outline: 1px solid #ffffff;
            border-radius: 5px
        }

        body::-webkit-scrollbar-corner {
            border-radius: 5px
        }

    </style>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script type="text/javascript">
        function callbackThen(response) {
            // read HTTP status
            console.log('Recaptcha ilə qorunursunuz :-) ');

            // read Promise object
            response.json().then(function(data) {
                console.log(data);
            });
        }

        function callbackCatch(error) {
            console.error('Error:', error)
        }

    </script>

    @livewireStyles
    @livewireScripts
    @toastr_css

    {!! htmlScriptTagJsApi([
    'callback_then' => 'callbackThen',
    'callback_catch' => 'callbackCatch',
    ]) !!}

    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
    <div>
        <div class="awe-page-loading">
            <div class="awe-loading-wrapper">
                <div class="awe-loading-icon">
                    <img src="data:image/png;base64,{{ get_image(settings('logo'), 'commons/logos') }}"
                        alt="{{ settings('projectName') }} logo" />
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="modal fade searchModal" tabindex="8" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content popup-search">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"
                            aria-hidden="true"></i>
                    </button>
                    <form class="submitable" action="{{ route('search') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="input-group">
                                <input type="text" class="form-control control-search"
                                    placeholder="@lang('static.standart.topPanel.searchPlaceholder')" name="keyword"
                                    required />
                                <button class="button_search"
                                    type="submit">@lang('static.standart.topPanel.search')</button>
                            </div><!-- /input-group -->

                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!-- End pushmenu -->
        <div class="wrappage">
            <header id="header" class="header-v3 header-v2">
                <div id="topbar" class="topbar-ver2">
                    <div class="container container-ver2">
                        <div class="inner-topbar box">
                            <div class="float-left">
                                <p><i class="fa fa-envelope"></i> @lang('static.standart.topPanel.contactMail')
                                    <span><a href="mailto:{{ settings('email') }}" class="acc">
                                            {{ settings('email') }}</a></span>
                                </p>
                            </div>
                            <div class="float-right align-right">
                                @if (auth()->check())
                                    <a class="acc" href="{{ route('profile') }}">
                                        <i class="fa fa-user"></i>
                                        @lang('static.menu.account')
                                    </a>
                                    <!-- End hover-menu -->
                                @else
                                    <a href="{{ route('login') }}">@lang('static.menu.loginRegister.login')</a>
                                    &nbsp; &nbsp; &nbsp;
                                    <a href="{{ route('login') }}">@lang('static.menu.loginRegister.register')</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End container -->
                </div>
                <!-- End topbar -->
                <div class="header-top">
                    <div class="container container-ver2">
                        <div class="box">
                            <p class="icon-menu-mobile"><i class="fa fa-bars"></i></p>
                            <div class="logo">
                                <a href="{{ route('index') }}" title="{{ settings('projectName') }} Logo">
                                    <img src="data:image/png;base64,{{ get_image(settings('logo'), 'commons/logos') }}"
                                        width="60" alt="{{ settings('projectName') }} Logo">
                                </a>
                            </div>
                            <div class="logo-mobile"><a href="{{ route('index') }}"><img
                                        src="data:image/png;base64,{{ get_image(settings('logo'), 'commons/logos') }}"
                                        alt="{{ settings('projectName') }} Logo" width="60"></a></div>

                            <div class="box-right">
                                <div class="cart hover-menu">
                                    <p class="icon-cart" title="@lang('static.actions.addtocart')">
                                        <i class="icon"></i>
                                        <span class="cart-count">{{ getcartlist()->count() }}</span>
                                    </p>
                                    <div class="cart-list list-menu">
                                        <ul class="list">
                                            @foreach(getcartlist() as $cartElement)
                                                <li>
                                                    <a href="#" title="" class="cart-product-image"><img
                                                            src="{{ asset('assets/libs/images/products/1.jpg') }}"
                                                            alt="Product"></a>
                                                    <div class="text">
                                                        <p class="product-name">{{ $cartElement->name }}</p>
                                                        <p class="product-price"><span class="price-old">$700.00</span><span
                                                                class="price">{{ $cartElement->price }}</span></p>
                                                        <p class="@lang('static.page.shopping.cartlist.tableheader.qyt')">
                                                            @lang('static.page.shopping.cartlist.tableheader.qyt'):{{ $cartElement->qty }}</p>
                                                    </div>
                                                    <a class="close" href="#" title="close"><i
                                                            class="fa fa-times-circle"></i></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <p class="total"><span
                                                class="left">@lang('static.page.shopping.cartlist.tableheader.total'):</span>
                                            <span class="right">$1121.98</span>
                                        </p>
                                        <div class="bottom">
                                            <a class="link-v1" href="{{ route('cartlist') }}"
                                                title="@lang('static.page.index.showCartList')">@lang('static.page.index.showCartList')</a>
                                            <a class="link-v1 rt" href="{{ route('checkout') }}"
                                                title="@lang('static.menu.shopping.checkout')">@lang('static.menu.shopping.checkout')</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="search dropdown" data-toggle="modal" data-target=".searchModal">
                                    <i class="icon"></i>
                                </div>
                                <div class="cart ">
                                    <p class="icon-cart">
                                        <a href="{{ route('wishlist') }}">
                                            <i class="far text-gray fa-heart fa-2x"></i>
                                        </a>
                                        <span class="cart-count">{{ getwishlist()->count() }}</span>
                                    </p>
                                </div>
                            </div>
                            <nav class="mega-menu">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <ul class="nav navbar-nav" id="navbar">
                                    <li class="level1 @yield('homeActive',null)">
                                        <a href="{{ route('index') }}"
                                            title="@lang('static.menu.home')">@lang('static.menu.home')</a>
                                    </li>
                                    <li class="level1 @yield('aboutActive',null) ">
                                        <a href="{{ route('aboutus') }}"
                                            title="@lang('static.menu.about')">@lang('static.menu.about')</a>
                                    </li>
                                    <li class="level1 dropdown @yield('customersActive',null)">
                                        <a href="{{ route('customers') }}"
                                            title="@lang('static.menu.campaigns')">@lang('static.menu.customers')</a>
                                        <div class="sub-menu sub-menu-v2 dropdown-menu">
                                            <div class="top-sub-menu">
                                                <img src="{{ asset('assets/forsite/bgTop.jpg') }}"
                                                    alt="@lang('static.menu.shops')">
                                            </div>

                                            <ul class="menu-level-1">
                                                @php($customers = get_customers())
                                                    @foreach ($customers as $customer)
                                                        <li class="level2">
                                                            <a href="{{ route('customer', $customer->id) }}">
                                                                @if (app()->getLocale() == 'az')
                                                                    {{ $customer->az_name }}
                                                                @elseif(app()->getLocale()=='en')
                                                                    {{ $customer->en_name }}
                                                                @elseif(app()->getLocale()=='ru')
                                                                    {{ $customer->ru_name }}
                                                                @endif
                                                            </a>
                                                            <ul class="menu-level-2">
                                                                <li class="level3"><a
                                                                        href="{{ route('products', $customer->id) }}">@lang('static.menu.products')</a>
                                                                </li>
                                                                <li class="level3"><a
                                                                        href="{{ route('customerCampaigns', $customer->id) }}">@lang('static.menu.campaigns')</a>
                                                                </li>
                                                                <li class="level3"><a
                                                                        href="{{ route('customerLocationsBrowse', $customer->id) }}">@lang('static.menu.shops')</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <!-- End RightSubMenu -->

                                            </div>
                                            <!-- End Dropdow Menu -->
                                        </li>

                                        <li class="level1 @yield('contactActive',null)">
                                            <a href="{{ route('contactus') }}" title="@lang('static.menu.contact')">
                                                @lang('static.menu.contact')
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- End container -->
                    </div>
                    <!-- End header-top -->
                </header><!-- /header -->
                {{-- Start Container--}}

                <div class="container" id="topSubject">
                    <div class="banner-header banner-lbook3 space-30">
                        <img src="{{ asset('assets/forsite/bgTop.jpg') }}" alt="Pw Top Panel" height="200">
                        <div class="text">
                            <h3>@yield('title')</h3>
                            <p><a href="{{ route('index') }}"
                                    title="@lang('static.menu.index')">@lang('static.menu.index')</a>
                                &nbsp;
                                <i class="fa fa-caret-right"></i>@yield('title')
                            </p>
                        </div>
                    </div>
                </div>

                @yield('content')
                <!-- End container -->

                <footer id="footer" style="margin-top: 5em" class="pt-5 mt-5 align-left">
                    <div class="container container-ver2">
                        <div class="footer-inner">
                            <div class="row">
                                <div class="col-md-5 col-sm-4">
                                    <h3 class="title-footer">@lang('static.menu.about')</h3>
                                    <p>{{ settings('description') }}</p>
                                    <a class="link-footer" href="{{ route('aboutus') }}"
                                        title="@lang('static.menu.about')">@lang('static.actions.more') <i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                </div>

                                <div class="col-md-3 col-sm-4">
                                    <h3 class="title-footer">@lang('static.menu.contact')</h3>
                                    <div class="social space-30">
                                        <a href="{{ settings('twitter_page') }}"
                                            title="{{ settings('projectName') }} Twitter"><i class="fab fa-twitter"></i></a>
                                        <a href="{{ settings('facebook_page') }}"
                                            title="{{ settings('projectName') }} Facebook"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a href="{{ settings('youtube_page') }}"
                                            title="{{ settings('projectName') }} Youtube"><i class="fab fa-youtube"></i></a>
                                        <a href="{{ settings('instagram_page') }}"
                                            title="{{ settings('projectName') }} Instagram"><i
                                                class="fab fa-instagram"></i></a>
                                        <a href="mailto:{{ settings('email') }}"
                                            title="{{ settings('projectName') }} Email"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <h3 class="title-footer">@lang('static.standart.bottomPanel.getNews')</h3>
                                    <p>@lang('static.standart.bottomPanel.updateInMinute')</p>
                                    <div class="subscribe">
                                        <form class="submitable" action="{{ route('emailsender') }}" method="post"
                                            accept-charset="utf-8">
                                            @csrf
                                            <input type="text"
                                                onblur="if (this.value == '') {this.value = '@lang('static.form.inputs.inputemail')';}"
                                                onfocus="if(this.value != '') {this.value = '';}"
                                                value="@lang('static.form.inputs.inputemail')"
                                                class="input-text required-entry validate-email"
                                                title="@lang('static.form.inputs.inputemail')" name="email">
                                            <button class="button button1 hover-white"
                                                title="@lang('static.form.buttons.submit')"
                                                type="submit">@lang('static.form.buttons.submit')<i
                                                    class="fas fa-long-arrow-alt-right"></i></button>
                                        </form>
                                    </div>
                                    <!-- End subscribe -->
                                </div>
                            </div>
                            <!-- End row -->
                        </div>
                        <!-- End footer-inner -->
                    </div>
                    <!-- End container -->
                    <div class="footer-bottom box">
                        <div class="container container-ver2">
                            <div class="box bottom">
                                <p class="float-left">@lang('static.standart.bottomPanel.copyright')
                                    {{ settings('copyright') }}.
                                </p>
                                <div class="float-right">
                                    <ul class="menu-bottom-footer">
                                        <li><a href="{{ route('faq') }}"
                                                title="@lang('static.menu.faq')">@lang('static.menu.faq')</a></li>
                                        <li><a href="{{ route('termofuse') }}"
                                                title="@lang('static.menu.termofuse')">@lang('static.menu.termofuse')</a>
                                        </li>
                                    </ul>
                                    <div class="language">
                                        <span>@lang('static.standart.bottomPanel.langs'):</span>
                                        @if (app()->getLocale() == 'az')
                                            <div class="hover-menu">
                                                <p>AZ <i class="fa fa-angle-down"></i></p>
                                                <div class="list-menu">
                                                    <ul>
                                                        <li><a href="{{ route('locale', 'en') }}">EN</a></li>
                                                        <li><a href="{{ route('locale', 'ru') }}">RU</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @elseif(app()->getLocale()=='en')
                                            <div class="hover-menu">
                                                <p>EN <i class="fa fa-angle-down"></i></p>
                                                <div class="list-menu">
                                                    <ul>
                                                        <li><a href="{{ route('locale', 'az') }}">AZ</a></li>
                                                        <li><a href="{{ route('locale', 'ru') }}">RU</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @elseif(app()->getLocale()=='en')
                                            <div class="hover-menu">
                                                <p>RU <i class="fa fa-angle-down"></i></p>
                                                <div class="list-menu">
                                                    <ul>
                                                        <li><a href="{{ route('locale', 'az') }}">AZ</a></li>
                                                        <li><a href="{{ route('locale', 'en') }}">EN</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- End language -->
                                </div>
                            </div>
                        </div>
                        <!-- End container -->
                    </div>
                </footer>
            </div>
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/libs/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/libs/js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/libs/js/engo-plugins.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/libs/js/jquery.mousewheel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/libs/js/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/libs/js/jquery.zoom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/libs/js/store.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/libs/vendor/fontawesome/js/all.min.js') }}"></script>
        <script>
            function onSubmit(token) {
                document.getElementsByClassName("submitable").submit();
            }

        </script>
        @toastr_js
        @toastr_render
        @yield('js')

    </body>

    </html>
