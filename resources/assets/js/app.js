
require('./bootstrap');
/**
 * Main components
 */
Vue.component( 'navbar', require('./components/main/NavBar/Navbar.vue'));
Vue.component( 'topbar', require('./components/main/Topbar/Topbar.vue'));
Vue.component( 'footervue', require('./components/main/Footer/FooterVue.vue'));
/*--- Carga de Imagenes ---*/
Vue.component('file-upload',require('./components/utils/FileUpload.vue'));
Vue.component('file-upload-multiple', require('./components/utils/FileUploadMultiple.vue'));
Vue.component('file-upload-images', require('./components/utils/FileUploadImages.vue'));
/*--- Full Loading ---*/
Vue.component('loading',require('./components/utils/Loading.vue'));
/*-- Pagination --*/
Vue.component('vue-pagination', require('./components/utils/Pagination.vue'));
/**
 * Vue Router for to work with routes in app
 */
import router from './router';
import store from './store';

/**
 * Vue Instance
 */
const app = new Vue({
    router,
    store,
    el: '#app',
    data:''

});
