import '@babel/polyfill'
import 'mutationobserver-shim'
import Vue from 'vue'
import './plugins/axios'
import './plugins/bootstrap-vue'
import App from './App.vue'
import router from "./router";
import store from "./store";

import vuetify from './plugins/vuetify'
import interceptorsSetup from './helpers/interceptors';
import Axios from 'axios'
import Vuelidate from 'vuelidate'
import { IconsPlugin } from "bootstrap-vue";
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import "@fortawesome/fontawesome-free/css/all.css";
import "@fortawesome/fontawesome-free/js/all.js";

import { faUser } from '@fortawesome/free-solid-svg-icons'
import { faTwitter } from '@fortawesome/free-brands-svg-icons'

/* add icons to the library */
library.add(faUserSecret, faTwitter, faUser)

/* add font awesome icon component */
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
// Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(Vuelidate)
Vue.prototype.$http = Axios;
Vue.prototype.$http.defaults.withCredentials = true;
import JQuery from "jquery";
window.$ = JQuery;
// Vue.prototype.jQuery = jQuery
// window.jQuery = jQuery
Vue.config.productionTip = false
import { BootstrapIconsPlugin } from 'bootstrap-icons-vue';
Vue.use(BootstrapIconsPlugin);
// import Vue from 'vue'
import VueSidebarMenu from 'vue-sidebar-menu'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
import '@mdi/font/css/materialdesignicons.css'
// import 'material-design-icons-iconfont/dist/material-design-icons.css'
Vue.use(VueSidebarMenu)
interceptorsSetup()
new Vue({
  vuetify,
  router,
  store,
  render: h => h(App)
}).$mount('#app')
