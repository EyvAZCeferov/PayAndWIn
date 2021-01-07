@section('title')
    @lang('static.menu.profile.pininfo',['name'=>auth()->user()->name])
@endsection

<div wire:ignore.self class="container container-ver2 box-cat-home3 space-50" style="padding-top: 40px">
    <div class="row">
        @include('livewire.profile-left',['dashboard'=>null,'cards'=>'active','shoppings'=>null,'settings'=>null])
        <!--Start col-md-9-->
        <div class="col-md-9">
            <div class="row">
                <h2>
                    @php($pininfos=json_decode($pininfo->cardInfos))
                    @lang('static.page.profile.pininfo.headers.justPins',['count'=>$pininfos->price])
                </h2>
            </div>
            <div class="hoz-tab-container ver2 space-padding-tb-30">
                <ul class="tabs center">
                    <li class="item active" rel="paying">@lang('static.page.profile.pininfo.headers.pins')
                    </li>
                    <li class="item" rel="pay">@lang('static.page.profile.pininfo.headers.pinpaying')</li>
                </ul>
                <div class="tab-container">
                    <div id="paying">
                        <div class="row" id="printable">
                            <div class="col-12">
                                <div class="card mt-5 py-5 px-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="container">
                                                <div class="p-2">
                                                    <h2 class="panel-title font-size-20">
                                                        <strong>@lang('static.page.profile.pininfo.headers.bonushistory')</strong>
                                                    </h2>
                                                </div>
                                                @if ($payinfo)
                                                    <div>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <strong>
                                                                                @lang('static.page.profile.pininfo.table.organization')
                                                                            </strong>
                                                                        </th>
                                                                        <th class="text-center">
                                                                            <strong>@lang('static.page.shopping.cartlist.tableheader.qyt')</strong>
                                                                        </th>
                                                                        <th class="text-center">
                                                                            <strong>@lang('static.page.shopping.wishlist.tableheader.price')</strong>
                                                                        </th>
                                                                        <th class="text-center">
                                                                            <strong>@lang('static.page.profile.pininfo.table.date')</strong>
                                                                        </th>
                                                                        <th class="text-right">
                                                                            <strong>@lang('static.page.profile.pininfo.table.bonus')</strong>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($payinfo as $info)
                                                                        <tr>
                                                                            <td>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <a href="{{ route('payed-product-info',) }}">
                                                                                Get</a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="alert alert-danger w-100" role="alert">
                                                        <strong>
                                                            @lang('static.page.profile.pininfo.headers.nullhistory')
                                                        </strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-5 py-5 px-4">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="container">
                                                <div class="p-2">
                                                    <h2 class="panel-title font-size-20">
                                                        <strong>
                                                            @lang('static.page.profile.pininfo.headers.payinghistory')
                                                        </strong>
                                                    </h2>
                                                </div>
                                                @if (false)
                                                    <div>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <strong>@lang('static.page.profile.pininfo.table.organization')</strong>
                                                                        </th>
                                                                        <th class="text-center">
                                                                            <strong>@lang('static.page.shopping.cartlist.tableheader.qyt')</strong>
                                                                        </th>
                                                                        <th class="text-center">
                                                                            <strong>@lang('static.page.shopping.wishlist.tableheader.price')</strong>
                                                                        </th>
                                                                        <th class="text-center">
                                                                            <strong>@lang('static.page.profile.pininfo.table.date')</strong>
                                                                        </th>
                                                                        <th class="text-right">
                                                                            <strong>@lang('static.page.profile.pininfo.table.bonus')</strong>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr></tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="alert alert-danger w-100" role="alert">
                                                        <strong>
                                                            @lang('static.page.profile.pininfo.headers.nullhistory')
                                                        </strong>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end row -->

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-print-none">
                                <div class="float-right">
                                    <button onclick="PrintElem('printable')"
                                        class="btn btn-success waves-effect waves-light"><i
                                            class="fa fa-print"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="pay">
                        @if ($pinpaysuggest || $pinpaysuggest != null || $pinpaysuggest->count()>0)
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>
                                            @lang('static.form.labels.name')
                                        </th>
                                        <th>
                                            @lang('static.page.profile.pininfo.table.description')
                                        </th>
                                        <th>
                                            @lang('static.page.profile.pininfo.table.location')
                                        </th>
                                        <th>
                                            @lang('static.page.profile.pininfo.table.contact')
                                        </th>
                                        <th>
                                            @lang('static.page.profile.pininfo.table.pin')
                                        </th>
                                        <th>
                                            @lang('static.page.profile.pininfo.actions.buy')
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pinpaysuggest as $suggest)
                                        @php($names = json_decode($suggest->suggest_names))
                                            @php($descriptions = json_decode($suggest->suggest_descriptions))
                                                @php($locations = json_decode($suggest->suggest_location))
                                                    @php($socials = json_decode($suggest->suggest_social))
                                                        <tr>
                                                            <td>
                                                                @if(app()->getLocale()=='az')
                                                                    {{ $names->az_title }}
                                                                @elseif(app()->getLocale()=='en')
                                                                    {{ $names->en_title }}
                                                                @elseif(app()->getLocale()=='ru')
                                                                    {{ $names->ru_title }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(app()->getLocale()=='az')
                                                                    {{ $names->az_description }}
                                                                @elseif(app()->getLocale()=='en')
                                                                    {{ $names->en_description }}
                                                                @elseif(app()->getLocale()=='ru')
                                                                    {{ $names->ru_description }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(app()->getLocale()=='az')
                                                                    {{ $names->az_location }}
                                                                @elseif(app()->getLocale()=='en')
                                                                    {{ $names->en_location }}
                                                                @elseif(app()->getLocale()=='ru')
                                                                    {{ $names->ru_location }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(app()->getLocale()=='az')
                                                                    {{ $names->phone }}
                                                                @elseif(app()->getLocale()=='en')
                                                                    {{ $names->phone }}
                                                                @elseif(app()->getLocale()=='ru')
                                                                    {{ $names->phone }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="text-success">
                                                                    {{ $suggest->pin }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-primary">
                                                                   <i class="fa fa"></i>  @lang('static.page.profile.pininfo.actions.buy')
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="alert alert-danger w-100" role="alert">
                                                <strong>
                                                    @lang('static.page.profile.pininfo.headers.nullhistory')
                                                </strong>
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@section('js')
    <script>
        function PrintElem(elem) {
            var mywindow = window.open('', 'PRINT', 'height=800,width=800');

            mywindow.document.write('<html><head><title>' + document.title + '</title>');
            mywindow.document.write('</head><body >');
            mywindow.document.write('<h1>' + document.title + '</h1>');
            mywindow.document.write(document.getElementById(elem).innerHTML);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            mywindow.print();
            mywindow.close();

            return true;
        }

    </script>
@endsection
