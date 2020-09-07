import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store.js';
//import 'bootstrap/dist/css/bootstrap.css';
//import 'bootstrap';
import JQuery from 'jquery';
window.$ = window.jQuery = JQuery;
import Popper from 'popper.js/dist/umd/popper.js';
window.Popper = Popper;


//import BootstrapVue from 'bootstrap-vue';
import FlashMessage from '@smartweb/vue-flash-message';
import VueClipboard from 'vue-clipboard2'
 
//Vue.use(BootstrapVue);
Vue.use(FlashMessage);
Vue.use(VueClipboard)

new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
