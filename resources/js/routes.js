import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import Contacts from './pages/Blog.vue';
import PageDetail from './pages/PageDetail.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog,
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: Contacts,
        },
        {
            path: '/post/:slug',
            name: 'pageDetail',
            component: PageDetail,
        },
        /* {
            path: '/*',
            name: 'error404',
            component: Error404,
        }, */
    ]
});

export default router;
