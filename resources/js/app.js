window.Vue = require('vue');
window.axios = require('axios');
import VueRouter from 'vue-router';
import EmailList from './components/EmailList';
import EmailCreate from './components/EmailCreate';

Vue.use(VueRouter);

Vue.component('home-component', require('./components/HomeComponent.vue').default);

const routes = [
    { path: '/create-email', component: EmailCreate },
    { path: '/list-email', component:EmailList }
  ]

const router = new VueRouter({
    routes
});

const app = new Vue({
    router
}).$mount('#app');
