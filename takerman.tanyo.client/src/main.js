import { createApp } from 'vue';
import App from './App.vue';
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import "./assets/css/style.css";
import moment from 'moment';
import router from './helpers/router.js';

Date.prototype.toJSON = function () { return moment(this).format(); }

const app = createApp(App);
app.config.productionTip = false;
app.use(router)
	.mount('#app');
