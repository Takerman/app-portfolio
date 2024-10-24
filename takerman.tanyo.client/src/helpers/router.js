import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";

export const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    linkActiveClass: 'active',
    routes: [
        { path: '/', component: Home },
        { path: '/home', component: Home, name: "home" },
        { path: '/:pathMatch(.*)*', redirect: '/' }
    ]
});

export default router;