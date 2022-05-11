import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Posts from '../pages/Posts.index.vue';
import Post from '../pages/Post.show.vue';
import Contact from '../pages/Contact.vue';
import NotFound from '../pages/404.vue';

const routes = [
   {
      path: '/posts',
      name: 'posts.index',
      component: Posts,
   },
   {
      path: '/posts/:slug',
      name: 'posts.show',
      component: Post,
   },
   {
      path: '/contact',
      name: 'contact',
      component: Contact,
   },
   {
      path: '/*', // rotta di fallback, cattura tutte le rotte diverse da quelle definite
      name: '404',
      component: NotFound,
   }
];

const router = new VueRouter({
   mode: 'history',
   routes
});

export default router;

