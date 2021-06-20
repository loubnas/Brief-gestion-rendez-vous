import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
// import inscri from '../views/inscr.vue'
// import reference from '../views/reference.vue'
// import rendezvous from '../views/rendezvous.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/inscr',
    name: 'Register',
    // component: inscri
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/inscr.vue')
  },

  {
    path: '/reference',
    name: 'reference',
    // component:reference
    // component: inscri
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/reference.vue')
  },

  {
    path: '/rendezvous/:reference',
    name: 'Rendezvous',
    // component:rendezvous
    // component: inscri
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/rendezvous.vue')
  },
  {
    path: '/addrendezvous/:reference',
    name: '/Addrendezvous',
    // component:rendezvous
    // component: inscri
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/addrendezvous.vue')
  },
  {
    path: '/updaterendezvous/:Id',
    name: '/Updaterendezvous',
    // component:rendezvous
    // component: inscri
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/updaterendezvous.vue')
  },

  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
