
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import Auth from './auth.js';
window.Vue.use(VueRouter);
window.Vue.use(Auth)


import BooksIndex from './components/books/BooksIndex.vue';
import BooksCreate from './components/books/BooksCreate.vue';
import BooksEdit from './components/books/BooksEdit.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';

const routes = [
    {
        path: '/',
        components: {
            companiesIndex: BooksIndex
        },
        meta: { requiresAuth: true }
    },
    {path: '/admin/books/create', component: BooksCreate, name: 'createbook'},
   {path: '/admin/books/edit/:id', component: BooksEdit, name: 'editbook'},
   {path: '/register', component: Register, name: 'register'},
   {path: '/login', component: Login, name: 'login'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')