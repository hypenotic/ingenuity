import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'

const _029515a8 = () => interopDefault(import('../pages/about-us/index.vue' /* webpackChunkName: "pages/about-us/index" */))
const _d6be199c = () => interopDefault(import('../pages/contact-us.vue' /* webpackChunkName: "pages/contact-us" */))
const _3ecf94dd = () => interopDefault(import('../pages/news/index.vue' /* webpackChunkName: "pages/news/index" */))
const _7d76e378 = () => interopDefault(import('../pages/projects/index.vue' /* webpackChunkName: "pages/projects/index" */))
const _43be9ffd = () => interopDefault(import('../pages/about-us/old.vue' /* webpackChunkName: "pages/about-us/old" */))
const _794e8c53 = () => interopDefault(import('../pages/about-us/the-team.vue' /* webpackChunkName: "pages/about-us/the-team" */))
const _f2487302 = () => interopDefault(import('../pages/projects/_slug/index.vue' /* webpackChunkName: "pages/projects/_slug/index" */))
const _389f5040 = () => interopDefault(import('../pages/services/_slug.vue' /* webpackChunkName: "pages/services/_slug" */))
const _30dcde83 = () => interopDefault(import('../pages/news/_id/_slug/index.vue' /* webpackChunkName: "pages/news/_id/_slug/index" */))
const _1f5c225b = () => interopDefault(import('../pages/index.vue' /* webpackChunkName: "pages/index" */))

Vue.use(Router)

const scrollBehavior = function (to, from, savedPosition) {
            return { x: 0, y: 0 }
        }

export function createRouter() {
  return new Router({
    mode: 'history',
    base: decodeURI('/'),
    linkActiveClass: 'nuxt-link-active',
    linkExactActiveClass: 'nuxt-link-exact-active',
    scrollBehavior,

    routes: [{
      path: "/about-us",
      component: _029515a8,
      name: "about-us"
    }, {
      path: "/contact-us",
      component: _d6be199c,
      name: "contact-us"
    }, {
      path: "/news",
      component: _3ecf94dd,
      name: "news"
    }, {
      path: "/projects",
      component: _7d76e378,
      name: "projects"
    }, {
      path: "/about-us/old",
      component: _43be9ffd,
      name: "about-us-old"
    }, {
      path: "/about-us/the-team",
      component: _794e8c53,
      name: "about-us-the-team"
    }, {
      path: "/projects/:slug",
      component: _f2487302,
      name: "projects-slug"
    }, {
      path: "/services/:slug?",
      component: _389f5040,
      name: "services-slug"
    }, {
      path: "/news/:id/:slug?",
      component: _30dcde83,
      name: "news-id-slug"
    }, {
      path: "/",
      component: _1f5c225b,
      name: "index"
    }],

    fallback: false
  })
}
