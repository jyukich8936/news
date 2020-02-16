require('./bootstrap');


window.Vue = require('vue');
window.axios = require('axios');

import VueRouter from 'vue-router';
Vue.use(VueRouter)

import news_edit from './pages/NewsEdit.vue'
import news_list from './pages/NewsList.vue'
import news_create from './pages/NewsCreate.vue'

const Routes = [
  {
      path: '/news/list',
      name: 'news',
      component: news_list
  },
  {
      path: '/news/create',
      name: 'create',
      component: news_create
  },
  {
      path: '/news/:id/edit',
      name: 'edit',
      component: news_edit
  }
]

import App from './pages/App.vue'

const router = new VueRouter({
  base: '/dashboard',
  routes: Routes,
  mode: 'history',
})

const app = new Vue({
    router,
    render: h => h(App),
});

app.$mount('#app')
				