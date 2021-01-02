@section('title')
    @lang('static.menu.loginRegister.lrTitle')
@endsection

<div class="container container-ver2">
    <div class="page-login box">
        <div class="row">
            <div class="col-md-6 sign-in space-30">
                <h3>@lang('static.menu.loginRegister.login')</h3>
                <p>@lang('static.page.loginRegister.login.desc')</p>
                <!-- End social -->
                <form class="form-horizontal" method="POST">
                    <div class="group box space-20">
                        <label class="control-label" for="inputemail">@lang('static.form.labels.phonenumb')</label>
                        <input class="form-control" type="text" placeholder="@lang('static.form.inputs.inputphonenumb')"
                               id="inputemail">
                    </div>
                    <div class="group box">
                        <label class="control-label" for="inputemail">@lang('static.form.labels.password')</label>
                        <input class="form-control" type="text" placeholder="@lang('static.form.inputs.inputPass')"
                               id="inputpass">
                    </div>
                    <div class="remember">
                        <input id="remeber" type="checkbox" name="check" value="remeber">
                        <label for="remeber" class="label-check">@lang('static.form.inputs.rememberme')</label>
                        <a class="help" href="#" title="help ?">@lang('static.form.labels.forgotpass')?</a>
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
                    <form class="form-horizontal" method="POST">
                        <div class="group box space-20">
                            <label class="control-label"
                                   for="inputemailres">@lang('static.form.labels.phonenumb')</label>
                            <input class="form-control" type="text"
                                   placeholder="@lang('static.form.inputs.inputphonenumb')" id="inputemailres">
                        </div>
                        <button type="submit" class="link-v1 rt">@lang('static.menu.loginRegister.register')</button>
                    </form>
                </div>
                <!-- End register -->
            </div>
            <!-- End col-md-6 -->
        </div>
    </div>
</div>
