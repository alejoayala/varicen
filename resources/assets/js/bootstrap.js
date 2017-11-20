
window._ = require('lodash');

/*window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');*/

window.Vue = require('vue');
window.axios = require('axios');

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

/**
 * Vue Progress bar to show youtube like progress bar on ajax calls
 */
import VueProgressBar from 'vue-progressbar';
import VTooltip from 'v-tooltip';
import VuejsDialog from 'vuejs-dialog';
import Autocomplete from 'v-autocomplete';
import 'v-autocomplete/dist/v-autocomplete.css';


Vue.use(VueProgressBar, {
    color: '#ce1126',
    failedColor: 'red',
    height: '2px'
});

Vue.use(VTooltip);
Vue.use(VuejsDialog);
Vue.use(Autocomplete);
