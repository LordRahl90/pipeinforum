
// require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueRouter);
Vue.use(VueAxios,axios);

import App from './App.vue';
import Example from './components/Example.vue';
import HomePage from './components/Homepage.vue';
import NewTopic from './components/Newtopic.vue';

const routes=[
    {
        name:"HomePage",
        path:"/",
        component: HomePage
    },
    {
        name: "NewTopic",
        path:"/newtopic",
        component: NewTopic
    }
];


const router=new VueRouter({mode:"history",routes:routes});
new Vue(Vue.util.extend({router},App)).$mount("#app");




