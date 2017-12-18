import VueRouter from 'vue-router'
import routes from './routes'
import store from './store'

const router = new VueRouter({
  mode: 'history',
  linkActiveClass: 'active',
  routes
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!store.getters.authenticated) {
      next({
        path: '/login',
        query: { redirect: to.fullPath }
      })
    } else {
      console.log("from: ",from.path)
      if(to.path == "/"){
        next({
          path: '/dashboard'
        })
      }else{
        next()
      }

    }
  } else if (to.matched.some(record => record.meta.redirectIfLogged)) {
    if (store.getters.authenticated) {
      next({
        path: '/'
      })
    } else {
      next()
    }
  } else {
    next()
  }
})

export default router
