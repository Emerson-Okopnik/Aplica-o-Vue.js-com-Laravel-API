import { createRouter, createWebHistory } from 'vue-router'
import { isAuthenticated } from '@/utils/auth'
import Login from '@/views/Login.vue'
import Register from '@/views/Register.vue'
import Home from '@/views/Home.vue'
import PeopleRegister from '@/components/PeopleRegister.vue'
import PeopleList from '@/components/PeopleList.vue'
import EditPeople from '@/components/EditPeople.vue';

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: Login,
  },
  {
    path: '/register',
    name: 'Register',
    component: Register,
  },
  {
    path: '/Home',
    name: 'Home',
    component: Home,
    meta: { requiresAuth: true },
  },
  {
    path: '/PeopleRegister',
    name: 'PeopleRegister',
    component: PeopleRegister,
    meta: { requiresAuth: true },
  },
  {
    path: '/PeopleList',
    name: 'PeopleList',
    component: PeopleList,
    meta: { requiresAuth: true },
  },
  {
    path: '/people/edit/:id',
    name: 'EditPeople',
    component: EditPeople,
    props: true,
    meta: { requiresAuth: true },
  },
  {
    path: '/:pathMatch(.*)*',
    redirect: '/Home',
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})


router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !isAuthenticated()) {
    next({ name: 'Login' })
  } else {
    next()
  }
})

export default router