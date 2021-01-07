@section('title')
    @lang('static.menu.profile.settings',['name'=>auth()->user()->name])
@endsection

<div>
    <div class="container container-ver2 box-cat-home3 space-50" style="padding-top: 40px">
        <div class="row">
            @include('livewire.profile-left',['dashboard'=>null,'cards'=>null,'shoppings'=>null,'settings'=>'active'])
            <!--Start col-md-9-->
            <div class="col-md-9">
                @if (session()->has('message'))
                    <div class="alert alert-info w-100" role="alert">
                        <strong>{{session('message')}}</strong>
                    </div>
                @endif
                @include('common.Functions.profilesettings',['userinfos'=>$userinfos])
            </div>
        </div>
    </div>
</div>
