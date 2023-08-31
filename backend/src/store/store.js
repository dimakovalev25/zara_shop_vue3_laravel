import {createStore} from "vuex";
import * as mutations from './mutations.js'
import * as actions from './actions.js'
import state from './state.js'

const store = createStore({
    state,
    getters: {},
    actions,
    mutations
});

export default store