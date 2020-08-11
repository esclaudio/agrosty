require('./bootstrap');

window.Vue = require('vue');

Vue.component('message', require('./components/Message.vue').default);

const app = new Vue({
    el: '#app',
});
