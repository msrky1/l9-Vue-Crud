import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import EmployeeView from '@/components/EmployeeView'
import FormView from '@/components/FormView'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/empview',
      name: 'EmployeeView',
      component: EmployeeView
    }, 

    {
      path: '/form',
      name: 'FormView',
      component: FormView
    }
    
  ]
})
