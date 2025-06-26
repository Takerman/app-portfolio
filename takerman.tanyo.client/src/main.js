import { createApp } from 'vue';
import App from './App.vue';
import { createI18n } from 'vue-i18n';
import { createPinia } from 'pinia';
import mitt from 'mitt';
// import "vue-owl-carousel";
import 'animate.css';
import './style.css';
import cookies from "./helpers/cookies.js";
import moment from 'moment';
import en from './langs/en.json';
import router from './helpers/router.js';

Date.prototype.toJSON = function () { return moment(this).format(); }

const emitter = mitt();
let pinia = createPinia();
const i18n = createI18n({
	locale: cookies.get('language') || 'en',
	legacy: false,
	locale: cookies.get('language') || 'en',
	fallbackLocale: 'en',
	formatFallbackMessages: true,
	messages: {
		en: en
	}
});

const app = createApp(App);
app.config.globalProperties.emitter = emitter;
app.config.productionTip = false;
app.use(pinia)
	.use(i18n)
	.use(router)
	.mount('#app');
