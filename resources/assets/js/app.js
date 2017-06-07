
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('materialize-css');

// require('materialize-css/js/initial');
// require('materialize-css/js/jquery.easing.1.3');
// require('materialize-css/js/animation');
// window.Vel = require('materialize-css/js/velocity.min');
// require('materialize-css/js/hammer.min');
// require('materialize-css/js/jquery.hammer');
// require('materialize-css/js/global');
// require('materialize-css/js/toasts');
// require('./materialize-src/js/carousel');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));

const app = new Vue({
    el: '#app',
	data: {
		messages : [
			{
				message : "Hey bro!",
				user 	: "kmdr7"
			},
			{
				message : "Hello!",
				user 	: "kmdr7"
			}
		]
	},
	methods: {
		addMessage(message) {
			this.messages.push(message);
		}
	}
});
