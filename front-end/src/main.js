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
Vue.use(Vuelidate)
Vue.prototype.$http = Axios;
Vue.prototype.$http.defaults.withCredentials = true;
import JQuery from "jquery";
window.$ = JQuery;
// Vue.prototype.jQuery = jQuery
// window.jQuery = jQuery
Vue.config.productionTip = false
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
