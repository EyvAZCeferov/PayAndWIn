require('./bootstrap');

window.Vue = require('vue');
var Turbolinks =require('turbolinks')
Turbolinks.start()

import { Lang } from 'laravel-vue-lang';
Vue.use(Lang, {
    locale: 'az',
	fallback: 'en',
});
// Vue.component('loginRegister', require('./components/LoginRegister.vue'));
import LoginRegister from './components/LoginRegister';

const app = new Vue({
    el: '#app',
    render:a=>a(LoginRegister)
});
