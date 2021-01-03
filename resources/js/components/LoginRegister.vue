<template>
    <div class="row">
            <div class="col-md-6 sign-in space-30">
                <h3>
                    {{ __('static.menu.loginRegister.login') }}
                    </h3>
                <p>{{ __('static.page.loginRegister.login.desc') }}</p>
                <!-- End social -->
                <form class="form-horizontal">
                    <div class="group box space-20">
                        <label class="control-label">{{ __('static.form.labels.phonenumb') }}</label>
                        <input
                        class="form-control"
                        type="text"
                        v-model="phoneNumb"
                        placeholder="+994 (__) ___-____"
                        data-slots="_" />
                    </div>
                    <div class="group box">
                        <label class="control-label">{{ __('static.form.labels.password') }}</label>
                        <input
                            class="form-control"
                            type="text"
                            v-model="password"
                            v-bind:placeholder="__('static.form.inputs.inputPass')"
                            />
                    </div>
                    <div class="remember">
                        <input id="remeber" type="checkbox" name="check" value="remeber" checked="on" />
                        <label for="remeber" class="label-check">{{ __('static.form.inputs.rememberme') }}</label>
                        <a class="help" href="javascript:void(0)">{{ __('static.form.labels.forgotpass') }}?</a>
                    </div>
                    <button type="submit" class="link-v1 rt">{{ __('static.menu.loginRegister.login') }}</button>
                </form>
                <!-- End form -->
            </div>
            <!-- End col-md-6 -->
            <div class="col-md-6">
                <div class="register box space-50">
                    <h3></h3>
                    <p></p>
                    <form class="form-horizontal">
                        <div class="group box space-20">
                            <label class="control-label"
                                   >{{__('static.form.labels.phonenumb')}}</label>
                            <input
                                class="form-control"
                                type="text"
                                v-model="phoneNumb"
                                placeholder="+994 (__) ___-____"
                                data-slots="_" />
                        </div>
                        <button type="submit" class="link-v1 rt" style="width: 20em">
                           {{__('static.menu.loginRegister.register')}}
                        </button>
                    </form>
                </div>
                <!-- End register -->
            </div>
            <!-- End col-md-6 -->
    </div>
</template>

<script>
    import firebase from 'firebase';
    export default{
        name:"LoginRegister",
        data:{
            phoneNumb:null,
            password:null,
        },
        methods:{
            login:function(){
                console.log(this.phoneumb)
            },
        },
    }
</script>
