import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: () => import('../layouts/Main.vue'),
    redirect: { name: 'Tasks'},
    children: [
      {
        path: '/tasks',
        name: 'Tasks',
        component: () => import('../pages/Tasks.vue')
      }
    ]
  }
]

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router
