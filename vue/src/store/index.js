import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    products: [],
    authUser: null,
  },
  mutations: {
    set_products(state, value) {
      state.products = value;
    },
    set_auth_user(state, value) {
      state.authUser = value;
    },
  },
  actions: {},
  modules: {},
});
