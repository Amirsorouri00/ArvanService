window.Vue = require('vue')

import Vuex from 'vuex'
import VueRouter from 'vue-router'

import AttendInLottery from '../components/AttendInLottery'
import CreateLottery from '../components/CreateLottery'
import WinnersReport from '../components/WinnersReport'


Vue.use(VueRouter)
Vue.use(Vuex)


export default new VueRouter({
    routes: [
      {
        path: '/attendinlottery',
        name: 'attendInLottery',
        component: AttendInLottery
      },
      {
        path: '/createlottery',
        name: 'createLottery',
        component: CreateLottery
      },
      {
        path: '/winnersreport',
        name: 'winnersReport',
        component: WinnersReport
      },
    ]
  })
