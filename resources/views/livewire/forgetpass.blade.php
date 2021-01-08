@section('title')
    @lang('static.menu.loginRegister.forgetPass')
@endsection
<div>
    <div class="container container-ver2 order-tracking space-padding-tb-30">
        <div class="modal fade  @if ($modal)display: block @endif"
            id="verify" tabindex="12" role="dialog"
            aria-hidden="@if ($modal) false @endif">
            <div class="modal-dialog modal-lg">
                <div class="modal-content popup-search">
                    <button type="button" class="close" wire:click="closeModal()" data-dismiss="modal"><i
                            class="fa fa-times" aria-hidden="true"></i>
                    </button>
                    <form wire:submit.prevent="verify">
                        @csrf
                        <div class="modal-body">
                            <div class="input-group">
                                <input type="text" class="form-control control-search"
                                    placeholder="@lang('static.page.loginRegister.verify.verifyInput')"
                                    wire:model="formFields.verify.verifyCode" required max="4" maxlength="4" />
                                <button class="button_search" type="submit">
                                    @lang('static.page.loginRegister.verify.verify')
                                </button>
                            </div><!-- /input-group -->

                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <p>@lang('static.page.loginRegister.forgerPass.describe')</p>
        <div class="row">
            @if (session()->has('message'))
                <div class="alert alert-info" role="alert">
                    <strong>{{session('message')}}</strong>
                </div>
            @endif
        </div>
        <div class="tracking-content center">
            <form wire:submit.prevent="sendCode" class="form-horizontal">
                <div class="box space-20">
                    <label for="inputfname" class="control-label">
                        @lang('static.form.labels.phonenumb')
                    </label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="+994 (__) ___-____"
                        wire:model="formFields.forget.phoneNumb"
                        data-slots="_"/>
                    @error('formFields.forget.phoneNumb') <span
                        class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button
                    class="link-v1 lh-50 rt"
                    type="submit"
                    title="@lang('static.page.loginRegister.forgerPass.newCodeSendMe')">
                    @lang('static.page.loginRegister.forgerPass.newCodeSendMe')
                </button>
            </form>
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
