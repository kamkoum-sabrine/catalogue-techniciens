import '@babel/polyfill'
import 'mutationobserver-shim'
import Vue from 'vue'
import './plugins/axios'
import './plugins/bootstrap-vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import interceptorsSetup from './helpers/interceptors';

Vue.config.productionTip = false
interceptorsSetup()
new Vue({
  vuetify,
  render: h => h(App)
}).$mount('#app')
