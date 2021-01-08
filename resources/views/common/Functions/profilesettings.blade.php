<style>
    .btn{
        width:100%;
    }

    #selectImage{
        width:100%;
        display: none;
    }

    form{
        width: 100%;
    }

    form .form-control,form .form-control:focus{
        border-color:transparent;
        border-bottom-color: #bebcc1;
        box-shadow:none;
    }

    form .btn{
        border-radius: 0px;
        border-color: transparent;
    }

    .btn.btn-default{
        background: #ebebeb;
        color:#8f9096;
    }

    .btn.btn-primary{
        background:#7c9d32;
        color:white;
    }

    .main > .row{
        height: 100%;
    }

    @media screen and (max-width:768px){
        .content{
            padding-left:50px;
            width: 100%;
            padding-top: 200px;
            padding-bottom: 50px;
        }

        form{
            width: 100%;
            margin:auto;
        }

    }

</style>

<div class="container-fluid main" style="height:100vh;padding-left:0px;">

    <div class="row align-items-center" style="height:100%">
        <form wire:submit.prevent="update" class="row w-100">

            <div wire:ignore.self class="col-md-12">

                <div class="container content clear-fix">

                <div class="row" style="height:100%">

                    <div class="col-md-3">

                    <div class="d-inline">
                        @if(auth()->user()->profilePhoto !=null)
                            <img
                            src="data:image/png;base64,{{ get_image_from_google(auth()->user()->profilePhoto,'users') }}"
                            width="130px" style="margin:0;" alt="{{ auth()->user()->name }}" />
                        @else
                            <img src="https://image.flaticon.com/icons/svg/236/236831.svg" width="130px" style="margin:0;" />
                        @endif
                        <br>
                        <p class="mt-2">
                            <label class="btn" for="selectImage" style="color:#8f9096;font-weight:600">
                                @lang('static.page.profile.settings.form.labels.profilePicture')
                            </label>
                            <input accept="image/*" type="file" wire:model="formFields.profilePhoto" id="selectImage" />
                        </p>
                    </div>

                    </div>

                    <div class="col-md-9">

                        <div class="container">

                            <div class="form-group">

                                <label for=email>@lang('static.form.labels.email')</label>
                                <input
                                wire:model="formFields.email"
                                value="{{ auth()->user()->email ? auth()->user()->email :null }}"
                                type="email" class="form-control" id="email">

                            </div>
                            <div class="form-group">

                                <label for=pass>@lang('static.form.labels.oldpassword')</label>
                                <input wire:model="formFields.password.old_password"  type="password" class="form-control" id="pass">

                            </div>
                            <div class="form-group">

                                <label for=pass_new>@lang('static.form.labels.newPassword')</label>
                                <input wire:model="formFields.password.new_password" type="password" class="form-control" id="pass_new">

                            </div>
                            <div class="form-group">

                                <label for=pass_new-repeat>@lang('static.form.labels.newPassword_repeat')</label>
                                <input wire:model="formFields.password.new_password_repeat" type="password" class="form-control" id="pass_new-repeat">

                            </div>
                            
                            <div class="row mt-5">

                                <div class="col">

                                    <button type="submit" class="btn btn-primary btn-block">
                                        @lang('static.page.profile.settings.form.buttons.savechanges')
                                    </button>

                                </div>


                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </form>

    </div>

    </div>

</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
