import { createRouter, createWebHistory } from "vue-router";
import Databases from "../views/Databases.vue";
import Tanyo from "../views/Tanyo.vue";

export const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    linkActiveClass: 'active',
    routes: [
        { path: '/', component: Databases },
        { path: '/databases', component: Databases, name: "databases" },
        { path: '/tanyo/:database', component: Tanyo, name: "tanyo" },
        { path: '/:pathMatch(.*)*', redirect: '/' }
    ]
});

export default router;