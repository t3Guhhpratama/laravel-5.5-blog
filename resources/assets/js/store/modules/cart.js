const state = {
  added: []
}

const mutations = {
  addToCart(state, {id}){
    state.added.push({id})
  }
}

const actions = {
  

}

export default {
  state,
  actions,
  mutations
}
