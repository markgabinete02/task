import Vue from "vue";
import Vuex from "vuex";
Vue.config.devtools = true;

Vue.use(Vuex);

import task from './task'

export default new Vuex.Store({
  modules: {
    task
  }
})
