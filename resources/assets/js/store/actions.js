const actions  = {
  alertErrorCommit({commit}, val){
    commit('alert_error_update',val)
  },
  increment({commit}){
    commit('increment')
  }
}
export default actions;
