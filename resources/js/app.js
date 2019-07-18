import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

import VueLaroute from 'vue-laroute';
import routes from './laroute';

Vue.use(VueLaroute, {
    routes,
    accessor: '$routes', // Optional: the global variable for accessing the router
});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

Vue.use(VueAxios, axios);

// headers needed for using ajax calls in VueAxios
axios.defaults.headers.common = {
    'Content-Type': 'application/json',
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': document.querySelector('meta[name="_token"]').getAttribute('content')
};

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navigation-component', require('./components/NavigationComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
