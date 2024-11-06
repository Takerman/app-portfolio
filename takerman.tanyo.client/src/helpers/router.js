import { createRouter, createWebHistory } from "vue-router";
import Blog from "../views/blog.vue";
import Home from "../views/home.vue";

export const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    linkActiveClass: 'active',
    routes: [
        { path: '/', component: Home },
        { path: '/blog', component: Blog, name: "blog" },
        { path: '/blog/:post', component: Blog, name: "blogPost" },
        { path: '/:pathMatch(.*)*', redirect: '/' }
    ]
});

export default router;