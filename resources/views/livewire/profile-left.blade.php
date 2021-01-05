<style>
    li.active a{
        color:#7c9d32 !important;
    }
    li.active i.fa, li.active i.fas, li.active i, li.active svg{
        color:#7c9d32 !important;
    }
</style>
<div class="col-md-3">
    <div class="categories-home3">
        <h3>
            @if(auth()->user()->profilePhoto || auth()->user()->profilePhoto!=null)
                <img src="{{ get_image(auth()->user()->profilePhoto,'admins') }}" class="d-inline-block img-thumbnail" alt="{{ auth()->user()->name }}" />
            @endif
            {{ auth()->user()->name }}
        </h3>
        <i class="fa fa-chevron-circle-down icon-click"></i>
        <ul class="menu-vertical">
            <li class="{{ $dashboard }}">
                <i class="fas fa-columns"></i>
                &nbsp;&nbsp;
                <a href="{{ route('profile') }}" title="@lang('static.page.profile.tabs.dashboard')">
                    @lang('static.page.profile.tabs.dashboard')
                </a>
            </li>
            <li class="{{ $cards }}">
                <i class="far fa-credit-card"></i>
                &nbsp;&nbsp;
                <a href="{{ route('profile-cards') }}" title="@lang('static.page.profile.tabs.cards')">
                    @lang('static.page.profile.tabs.cards')
                </a>
            </li>
            <li class="{{ $shoppings }}">
                <i class="fa fa-store"></i>
                &nbsp;&nbsp;
                <a href="{{ route('profile-payed') }}" title="@lang('static.page.profile.tabs.payed')">
                    @lang('static.page.profile.tabs.payed')
                </a>
            </li>
        </ul>
    </div>
</div>
<!--End col-md-3-->
<script>
    $(function(){
        $('#topSubject').hide();
    })
</script>
