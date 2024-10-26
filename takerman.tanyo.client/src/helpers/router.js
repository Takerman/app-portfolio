import { createRouter, createWebHistory } from "vue-router";
import Blog from "../views/Blog.vue";
import Contacts from "../views/Contacts.vue";
import CV from "../views/CV.vue";
import Home from "../views/Home.vue";
import Portfolio from "../views/Portfolio.vue";
import Skills from "../views/Skills.vue";

export const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    linkActiveClass: 'active',
    routes: [
        { path: '/', component: Home },
        { path: '/blog', component: Blog, name: "blog" },
        { path: '/contacts', component: Contacts, name: "contacts" },
        { path: '/cv', component: CV, name: "cv" },
        { path: '/home', component: Home, name: "home" },
        { path: '/portfolio', component: Portfolio, name: "portfolio" },
        { path: '/skills', component: Skills, name: "skills" },
        { path: '/:pathMatch(.*)*', redirect: '/' }
    ]
});

export default router;