
require('./bootstrap');
/**
 * Main components
 */
Vue.component( 'navbar', require('./components/main/NavBar/Navbar.vue'));
Vue.component( 'topbar', require('./components/main/Topbar/Topbar.vue'));
Vue.component( 'footervue', require('./components/main/Footer/FooterVue.vue'));
/*--- Carga de Imagenes ---*/
Vue.component('file-upload',require('./components/utils/FileUpload.vue'));

/**
 * Vue Router for to work with routes in app
 */
import router from './routes';
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
