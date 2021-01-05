@section('title')
    @lang('static.menu.profile.cards',['name'=>auth()->user()->name])
@endsection

<div>
    <div class="modal fade addCart" tabindex="8" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content popup-search">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
                </button>
                    <div class="modal-body">
                        @include('common.Functions.cardAdd',['formFields'=>$formFields])
                    </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div wire:ignore.self class="container container-ver2 box-cat-home3 space-50" style="padding-top: 40px">
        <div class="row">
            @include('livewire.profile-left',['dashboard'=>null,'cards'=>'active','shoppings'=>null])
            <!--Start col-md-9-->
            <div class="col-md-9">
                <div class="right">
                    <span class="align-right">
                        <button class="btn btn-success" data-target=".addCart" data-toggle="modal">
                            @lang('static.form.buttons.add')
                        </button>
                    </span>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-info w-100" role="alert">
                        <strong>{{session('message')}}</strong>
                    </div>
                @endif
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>
                                @lang('static.page.profile.table.columns.number')
                            </th>
                            <th>
                                @lang('static.page.profile.table.columns.expirationDate')
                            </th>
                            <th>
                                @lang('static.page.profile.table.columns.money')
                            </th>
                            <th>
                                @lang('static.page.profile.table.columns.remove')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($cardsLists!=null)
                            @foreach($cardsLists as $card)
                                @php($cardInfo=json_decode($card->cardInfos))
                                <tr>
                                    <td>
                                        <h3>
                                            <span>
                                                {!! get_cart_type($card->cardId) !!}
                                            </span>
                                            {{ ccMasking($cardInfo->number) }}
                                        </h3>
                                    </td>
                                    <td>
                                        {{ $cardInfo->expiry }}
                                    </td>
                                    <td>
                                        @if($cardInfo->price)
                                            {{ $cardInfo->price }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        <button
                                        class="btn btn-sm w-25 btn-danger"
                                        wire:click="delete('{{$card->cardId}}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!--End col-md-9-->
        </div>
    </div>
</div>

