require('./bootstrap');

window.Vue = require('vue');

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('tasks', require('./components/Task.vue'));

const app = new Vue({
    el: '#app'
});
