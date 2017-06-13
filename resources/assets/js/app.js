
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('materialize-css');

window.moment = require('moment');
moment.locale("id");

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

// const app = new Vue({
//     el: '#app',
// 	data: {
// 		messages : [],
// 		messagesAdmin : [],
// 	},
// 	methods: {
// 		getAll() {
// 			axios.get('/api/pesan/all/' + $('#KJashkjasdb').val()).then(response => {
// 				this.messages = response.data;
// 			});
// 		},
// 		addMessage(message) {
// 			this.messages.push(message);
// 			axios.post('/api/pesan', message).then(response => {
// 				console.log(response);
// 			});
// 		},
// 		addMessageAdmin(message) {
// 			this.messagesAdmin.push(message);
// 			axios.post('/admin/api/pesan', message).then(response => {
// 				console.log(response);
// 			});
// 		},
// 		pullFromServer(idDetailKursus) {
// 			axios.get('/api/pesan/' + idDetailKursus).then(response => {
//
// 				if ( response.data.length > 0 ) {
//
// 					this.messages.push(response.data[0]);
// 					var res = {
// 						'id_detail_kursus' : response.data[0].id_detail_kursus,
// 						'id_pesan' : response.data[0].id_pesan
// 					};
// 					axios.post('/api/pesan/setFalse', res).then(response => {
// 						console.log(response);
// 					});
// 				}
// 			})
// 			.catch(function (error){
// 				console.log(error);
// 			});
//
// 			console.log('selesai pull dari server');
// 		},
// 		pullFromServerAdmin(idDetailKursus) {
// 			axios.get('/admin/api/pesan?id=' + idDetailKursus).then(response => {
// 				console.log(response);
// 			})
// 			.catch(function (error){
// 				console.log(error);
// 			});
// 			console.log('selesai pull dari server admin');
// 		},
// 		userIsTyping(bool) {
//
// 			switch (bool) {
// 				case true:
//
// 					break;
// 				case false:
//
// 					break;
// 				default:
//
// 			}
// 		},
// 	},
// 	mounted() {
// 		this.getAll();
//
// 		setInterval(function () {
// 			this.pullFromServer($('#KJashkjasdb').val());
// 		}.bind(this), 2000)
// 	}
// });
