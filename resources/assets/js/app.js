
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
bus = new Vue({});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* Third Party's*/
Vue.component('paginate', require('vuejs-paginate'));

/* Prefabs */
Vue.component('voting-control', require('./components/prefabs/VotingControl.vue'));
Vue.component('book-card', require('./components/prefabs/BookCard.vue'));

/* Sections */
Vue.component('books', require('./components/Books.vue'));
Vue.component('book-form', require('./components/BookForm.vue'));
Vue.component('single-book', require('./components/SingleBook.vue'));

Vue.component('single-author', require('./components/SingleAuthor.vue'));

const app = new Vue({
    el: '#app'
});
