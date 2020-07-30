import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);
Vue.config.silent = true

export default new Vuex.Store({
    state: {
        savedSingleUserConnections: {},
        generatedCode: 'Hello, click me after input the capacity of the expected lottery to show you the generated lottery key.',
        reportItems: [
            { id: 1, first_name: 'Fred', last_name: 'Flintstone' },
            { id: 2, first_name: 'Wilma', last_name: 'Flintstone' },
            // { id: 3, first_name: 'Barney', last_name: 'Rubble' },
        ],
        paginationPageNo: 1
    }, 
    mutations: {
        saveSingleUserConnections: (state) =>
            {state.savedSingleUserConnections = 'connections';},
        saveLotteryCode: (state, code) => 
            {state.generatedCode = code;},
        saveReportItems: (state, items) => 
            {state.reportItems = items;},
    }
});