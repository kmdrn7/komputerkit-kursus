try {
    window.$ = window.jQuery = require('./jquery.min.js');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.moment = require('moment');

moment.locale("id");

window.Vue = require('vue');

Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));

// window.DataTable = require('./dt.min');

// $('#DT').DataTable();

require('./material.min');
require('./bootstrap.min');
require('./bootstrap-notify');
require('./chartist.min');
require('./material-dashboard');
require('./demo');
