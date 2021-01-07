@section('title')
    @lang('static.menu.profile.payed',['name'=>auth()->user()->name])
@endsection

<div>
    <div wire:ignore.self class="container container-ver2 box-cat-home3 space-50" style="padding-top: 40px">
        <div class="row">
            @include('livewire.profile-left',['dashboard'=>null,'cards'=>null,'shoppings'=>'active','settings'=>null])
            <!--Start col-md-9-->
            <div class="col-md-9">
                @if (session()->has('message'))
                    <div class="alert alert-info w-100" role="alert">
                        <strong>{{session('message')}}</strong>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('static.page.profile.table.columns.market')</th>
                            <th>@lang('static.page.profile.table.columns.payedCart')</th>
                            <th>@lang('static.page.shopping.cartlist.tableheader.total')</th>
                            <th>@lang('static.page.profile.table.columns.edvreturn')</th>
                            <th>@lang('static.page.profile.table.columns.buttons')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($payed!=null || $payed->count()>0 || $payed->count()==0 || count($payed)==0 || count($payed)>0 || $payed!==null)
                            @foreach($payed as $pay)
                            @php(json_decode($pay->payInfo))
                                <tr>
                                    <td>
                                        {{ $payInfo->market }}
                                    </td>
                                    <td>
                                        {{ $payInfo->market }}
                                    </td>
                                    <td>
                                        {{ $payInfo->market }}
                                    </td>
                                    <td>
                                        {{ $payInfo->market }}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                        <button
                                            class="btn btn-sm btn-danger"
                                            wire:click="delete('{{$pay->cardId}}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <button
                                            class="btn btn-sm btn-info"
                                            wire:click="info('{{$pay->cardId}}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    @lang('static.actions.null')
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
