import Vue from 'vue';
import Vuex from 'vuex';
import blogposts from './modules/blogposts';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        blogposts
    }
});