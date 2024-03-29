import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/components/Home'
import Explore from "@/components/Explore";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/explore',
    name: 'Explore',
    component: Explore
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
