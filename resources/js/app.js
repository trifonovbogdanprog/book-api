
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

axios.defaults.headers['Authorization'] = localStorage.getItem('token');

import BooksIndex from './components/books/BooksIndex.vue';
import BooksCreate from './components/books/BooksCreate.vue';
import BooksEdit from './components/books/BooksEdit.vue';
import Register from './components/Register.vue';

const routes = [
    {
        path: '/',
        components: {
            companiesIndex: BooksIndex
        }
    },
    {path: '/admin/books/create', component: BooksCreate, name: 'createbook'},
   {path: '/admin/books/edit/:id', component: BooksEdit, name: 'editbook'},
   {path: '/register', component: Register, name: 'register'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')