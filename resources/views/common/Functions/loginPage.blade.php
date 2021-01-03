<div class="row">
               
    <div class="col-md-6 sign-in space-30">
        <h3>@lang('static.menu.loginRegister.login')</h3>
        <p>@lang('static.page.loginRegister.login.desc')</p>
        <!-- End social -->
        <form class="form-horizontal"  wire:submit.prevent="login">
            <div class="group box space-20">
                <label class="control-label">@lang('static.form.labels.phonenumb')</label>
                <input
                class="form-control"
                type="text"
                placeholder="+994 (__) ___-____"
                wire:model="formFields.login.phoneNumb"
                data-slots="_" />
                @error('formFields.login.phoneNumb') <span
                        class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="group box">
                <label class="control-label">@lang('static.form.labels.password')</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="@lang('static.form.inputs.inputPass')"
                    wire:model="formFields.login.password" />
                    @error('formFields.login.password') <span
                        class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="remember">
                <input id="remeber" wire:model="formFields.login.remember" type="checkbox" name="check" value="remeber" checked="on" />
                <label for="remeber" class="label-check">@lang('static.form.inputs.rememberme')</label>
                <a class="help" href="javascript:void(0)">@lang('static.form.labels.forgotpass')?</a>
            </div>
            <button type="submit" class="link-v1 rt">@lang('static.menu.loginRegister.login')</button>
        </form>
        <!-- End form -->
    </div>
    <!-- End col-md-6 -->
    <div class="col-md-6">
        <div class="register box space-50">
            <h3>@lang('static.menu.loginRegister.register')</h3>
            <p>@lang('static.page.loginRegister.register.desc')</p>
            <form class="form-horizontal"  wire:submit.prevent="register">
                <div class="group box space-20">
                    <label class="control-label"
                           >@lang('static.form.labels.phonenumb')</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="+994 (__) ___-____"
                        wire:model="formFields.register.phoneNumb"
                        data-slots="_" />
                        @error('formFields.register.phoneNumb') <span
                        class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="link-v1 rt" style="width: 20em">
                    @lang('static.menu.loginRegister.register')
                </button>
            </form>
        </div>
        <!-- End register -->
    </div>
    <!-- End col-md-6 -->
</div>