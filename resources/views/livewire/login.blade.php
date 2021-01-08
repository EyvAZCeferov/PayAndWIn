@section('title')
    @lang('static.menu.loginRegister.lrTitle')
@endsection
<div class="container container-ver2">

    <div class="modal fade @if($modal) modal-open in @endif"
     style="@if($modal)display: block @endif"
      id="verify" tabindex="12" role="dialog"
       aria-hidden="@if($modal) false @endif">
        <div class="modal-dialog modal-lg">
            <div class="modal-content popup-search">
                <button type="button" class="close" wire:click="closeModal()" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
                </button>
                <form wire:submit.prevent="verify" >
                    @csrf
                    <div class="modal-body">
                        <div class="input-group">
                            <input type="text" class="form-control control-search"
                                placeholder="@lang('static.page.loginRegister.verify.verifyInput')"
                                wire:model="formFields.verify.verifyCode"
                                required
                                max="4"
                                maxlength="4"
                                />
                            <button class="button_search" type="submit">
                                @lang('static.page.loginRegister.verify.verify')
                            </button>
                        </div><!-- /input-group -->

                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div class="page-login box">
        <div class="row">
            @if (session()->has('message'))
                <div class="alert alert-info" role="alert">
                    <strong>{{session('message')}}</strong>
                </div>
            @endif
        </div>
        <div class="row">

            <div class="col-md-6 sign-in space-30">
                <h3>@lang('static.menu.loginRegister.login')</h3>
                <p>@lang('static.page.loginRegister.login.desc')</p>
                <!-- End social -->
                <form class="form-horizontal" wire:submit.prevent="login">
                    <div class="group box space-20">
                        <label class="control-label">@lang('static.form.labels.phonenumb')</label>
                        <input
                            class="form-control"
                            type="text"
                            placeholder="+994 (__) ___-____"
                            wire:model="formFields.login.phoneNumb"
                            data-slots="_"/>
                        @error('formFields.login.phoneNumb') <span
                            class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="group box">
                        <label class="control-label">@lang('static.form.labels.password')</label>
                        <input
                            class="form-control"
                            type="password"
                            placeholder="@lang('static.form.inputs.inputPass')"
                            wire:model="formFields.login.password"/>
                        @error('formFields.login.password') <span
                            class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="remember">
                        <input id="remeber" wire:model="formFields.login.remember" type="checkbox" name="check"
                               value="remeber" checked="on"/>
                        <label for="remeber" class="label-check">@lang('static.form.inputs.rememberme')</label>
                        <a class="help" href="{{ route('forgetpass') }}">@lang('static.form.labels.forgotpass')?</a>
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
                    <form class="form-horizontal" wire:submit.prevent="register">
                        <div class="group box space-20">
                            <label class="control-label"
                            >@lang('static.form.labels.phonenumb')</label>
                            <input
                                class="form-control"
                                type="text"
                                placeholder="+994 (__) ___-____"
                                wire:model="formFields.register.phoneNumb"
                                data-slots="_"/>
                            @error('formFields.register.phoneNumb') <span
                                class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="group box">
                            <label class="control-label">@lang('static.form.labels.password')</label>
                            <input
                                class="form-control"
                                type="password"
                                placeholder="@lang('static.page.loginRegister.register.form.setPassword')"
                                wire:model="formFields.register.password"/>
                            @error('formFields.register.password') <span
                                class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="remember">
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
    </div>
</div>

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            for (const el of document.querySelectorAll("[placeholder][data-slots]")) {
                const pattern = el.getAttribute("placeholder"),
                    slots = new Set(el.dataset.slots || "_"),
                    prev = (j => Array.from(pattern, (c, i) => slots.has(c) ? j = i + 1 : j))(0),
                    first = [...pattern].findIndex(c => slots.has(c)),
                    accept = new RegExp(el.dataset.accept || "\\d", "g"),
                    clean = input => {
                        input = input.match(accept) || [];
                        return Array.from(pattern, c =>
                            input[0] === c || slots.has(c) ? input.shift() || c : c
                        );
                    },
                    format = () => {
                        const [i, j] = [el.selectionStart, el.selectionEnd].map(i => {
                            i = clean(el.value.slice(0, i)).findIndex(c => slots.has(c));
                            return i < 0 ? prev[prev.length - 1] : back ? prev[i - 1] || first : i;
                        });
                        el.value = clean(el.value).join``;
                        el.setSelectionRange(i, j);
                        back = false;
                    };
                let back = false;
                el.addEventListener("keydown", (e) => back = e.key === "Backspace");
                el.addEventListener("input", format);
                el.addEventListener("focus", format);
                el.addEventListener("blur", () => el.value === pattern && (el.value = ""));
            }
        });
    </script>
@endsection
