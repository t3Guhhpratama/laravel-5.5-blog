import Vue from 'vue'
import Vuex from 'vuex'
import VueResource from 'vue-resource';
import actions from './actions'
import state from './state'
import mutations from './mutations'
import cart from './modules/cart'

Vue.use(Vuex)
Vue.use(VueResource)

export default new Vuex.Store({
    state:state,
    mutations:mutations,
    actions:actions,
    modules:{
      cart
    }
})
