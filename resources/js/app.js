
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//bootstrap with vue
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);

// form vaildate
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate);

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);
// moment for date formate
window.moment = require('moment');
window.moment.locale(window.default_locale);
Vue.prototype.moment = window.moment;


//preloader in vue
import { VueSpinners } from '@saeris/vue-spinners'
Vue.use(VueSpinners)

// translate with laravel
import VueI18n from 'vue-i18n'
import Locales from './vue-i18n-locales.generated.js'
Vue.use(VueI18n)
const lang = window.default_locale;
const i18n = new VueI18n({
  locale: lang,
  messages: Locales
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('vue-load-image', require('../../node_modules/vue-load-image/src/components/VueLoadImage.vue'));
Vue.component('category', require('./components/category/index.vue'));
Vue.component('sub-category', require('./components/category/sub_index.vue'));
Vue.component('product', require('./components/product/index.vue'));
Vue.component('people', require('./components/people/index.vue'));
const app = new Vue({
    i18n,
    el: '#app',
});
