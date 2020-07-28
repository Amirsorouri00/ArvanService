window.Vue = require('vue')

import Vuex from 'vuex'
import VueRouter from 'vue-router'

import AttendInLottery from '../components/ExampleComponent'
import CreateLottery from '../components/KeyGeneratorComponent'
import WinnersReport from '../components/WinnersReport'


Vue.use(VueRouter)
Vue.use(Vuex)


export default new VueRouter({
    routes: [
      {
        path: '/home',
        name: 'home',
        component: AttendInLottery
      },
      {
        path: '/blog',
        name: 'blog',
        component: CreateLottery
      },
      {
        path: '/foo',
        name: 'winners_report',
        component: WinnersReport
      },
    ]
  })
