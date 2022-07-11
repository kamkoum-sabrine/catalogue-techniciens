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

Vue.prototype.$http = Axios;
Vue.prototype.$http.defaults.withCredentials = true;

Vue.config.productionTip = false
interceptorsSetup()
new Vue({
  vuetify,
  router,
  store,
  render: h => h(App)
}).$mount('#app')
