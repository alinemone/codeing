/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.$ = window.jQuery = require('jquery');
require('./file/popper.min.js');
require('./file/bootstrap.min.js');
require('./file/jquery.mCustomScrollbar.concat.min.js');
require('@fortawesome/fontawesome-free/js/all.min.js');
require('./file/popupHoverProduct.js');
window.swal = require('sweetalert2');
window.ClassicEditor = require('@ckeditor/ckeditor5-build-classic');
window.Stepper = require('bs-stepper/dist/js/bs-stepper.js');
window.Dropzone = require('./file/dropzone.js');

require('./file/script.js');




window.Vue = require('vue');
import VueSweetalert2 from 'vue-sweetalert2';
window.Swal = VueSweetalert2;
Vue.use(VueSweetalert2);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('commentComponent', require('./components/commentComponent.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#application',
});
