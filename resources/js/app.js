require('./bootstrap')

import { createApp } from 'vue';
import App from "./App.vue";
import { createRouter, createWebHistory } from "vue-router";
import { createStore } from 'vuex';
import axios from "axios";
import VueAxios from 'vue-axios';

import HomeComponent from "./components/HomeComponent.vue";

const app = createApp(App);

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: "/", component: HomeComponent },
    ],
});

const store = createStore({
    state() {
        return {
            selectedUser: "",
        }
    }
})

app.use(VueAxios, axios);
app.use(router);
app.use(store);
app.mount('#app')