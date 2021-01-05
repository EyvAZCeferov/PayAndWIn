@section('title')
    @lang('static.menu.profile.index',['name'=>auth()->user()->name])
@endsection
@section('css')
<script>
    $(function(){
        $('#topSubject').hide();
    })
</script>
@endsection

<div>
    <div class="container container-ver2 box-cat-home3 space-50" style="padding-top: 40px">
        <div class="row">
            @livewire('profile-left',['dashboard'=>'active'])
            <!--Start col-md-9-->

            <div class="col-md-9">
                Dashboard
            </div>
            <!--End col-md-9-->
        </div>
    </div>
</div>
