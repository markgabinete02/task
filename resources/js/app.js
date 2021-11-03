require('./bootstrap');

import Vue from 'vue'
import vuetify from '../plugins/vuetify'
import App from './App.vue'
import store from './store'
import router from './router'

new Vue({
  store,
  router,
  vuetify,
  'el': '#app',
  render: h => h(App),
})
