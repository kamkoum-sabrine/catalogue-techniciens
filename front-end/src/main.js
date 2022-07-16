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
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { fas } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(fas)

/* add font awesome icon component */
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.use(BootstrapVue);
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
Vue.use(VueSidebarMenu)
interceptorsSetup()
new Vue({
  vuetify,
  router,
  store,
  render: h => h(App)
}).$mount('#app')
