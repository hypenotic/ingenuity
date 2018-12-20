import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const _0cd9cd03 = () => import('../pages/contact-us.vue' /* webpackChunkName: "pages/contact-us" */).then(m => m.default || m)
const _c78ac20e = () => import('../pages/about-us/index.vue' /* webpackChunkName: "pages/about-us/index" */).then(m => m.default || m)
const _91ef22a4 = () => import('../pages/news/index.vue' /* webpackChunkName: "pages/news/index" */).then(m => m.default || m)
const _5aea1795 = () => import('../pages/projects/index.vue' /* webpackChunkName: "pages/projects/index" */).then(m => m.default || m)
const _ddaf6ce4 = () => import('../pages/about-us/old.vue' /* webpackChunkName: "pages/about-us/old" */).then(m => m.default || m)
const _7ff53562 = () => import('../pages/about-us/the-team.vue' /* webpackChunkName: "pages/about-us/the-team" */).then(m => m.default || m)
const _7d55e131 = () => import('../pages/services/_slug.vue' /* webpackChunkName: "pages/services/_slug" */).then(m => m.default || m)
const _f96161e0 = () => import('../pages/projects/_slug/index.vue' /* webpackChunkName: "pages/projects/_slug/index" */).then(m => m.default || m)
const _2d506714 = () => import('../pages/news/_id/_slug/index.vue' /* webpackChunkName: "pages/news/_id/_slug/index" */).then(m => m.default || m)
const _1e64a9ea = () => import('../pages/index.vue' /* webpackChunkName: "pages/index" */).then(m => m.default || m)



if (process.client) {
  window.history.scrollRestoration = 'manual'
}
const scrollBehavior = function (to, from, savedPosition) {
  // if the returned position is falsy or an empty object,
  // will retain current scroll position.
  let position = false

  // if no children detected
  if (to.matched.length < 2) {
    // scroll to the top of the page
    position = { x: 0, y: 0 }
  } else if (to.matched.some((r) => r.components.default.options.scrollToTop)) {
    // if one of the children has scrollToTop option set to true
    position = { x: 0, y: 0 }
  }

  // savedPosition is only available for popstate navigations (back button)
  if (savedPosition) {
    position = savedPosition
  }

  return new Promise(resolve => {
    // wait for the out transition to complete (if necessary)
    window.$nuxt.$once('triggerScroll', () => {
      // coords will be used if no selector is provided,
      // or if the selector didn't match any element.
      if (to.hash) {
        let hash = to.hash
        // CSS.escape() is not supported with IE and Edge.
        if (typeof window.CSS !== 'undefined' && typeof window.CSS.escape !== 'undefined') {
          hash = '#' + window.CSS.escape(hash.substr(1))
        }
        try {
          if (document.querySelector(hash)) {
            // scroll to anchor by returning the selector
            position = { selector: hash }
          }
        } catch (e) {
          console.warn('Failed to save scroll position. Please add CSS.escape() polyfill (https://github.com/mathiasbynens/CSS.escape).')
        }
      }
      resolve(position)
    })
  })
}


export function createRouter () {
  return new Router({
    mode: 'history',
    base: '/',
    linkActiveClass: 'nuxt-link-active',
    linkExactActiveClass: 'nuxt-link-exact-active',
    scrollBehavior,
    routes: [
		{
			path: "/contact-us",
			component: _0cd9cd03,
			name: "contact-us"
		},
		{
			path: "/about-us",
			component: _c78ac20e,
			name: "about-us"
		},
		{
			path: "/news",
			component: _91ef22a4,
			name: "news"
		},
		{
			path: "/projects",
			component: _5aea1795,
			name: "projects"
		},
		{
			path: "/about-us/old",
			component: _ddaf6ce4,
			name: "about-us-old"
		},
		{
			path: "/about-us/the-team",
			component: _7ff53562,
			name: "about-us-the-team"
		},
		{
			path: "/services/:slug?",
			component: _7d55e131,
			name: "services-slug"
		},
		{
			path: "/projects/:slug",
			component: _f96161e0,
			name: "projects-slug"
		},
		{
			path: "/news/:id/:slug?",
			component: _2d506714,
			name: "news-id-slug"
		},
		{
			path: "/",
			component: _1e64a9ea,
			name: "index"
		}
    ],
    
    
    fallback: false
  })
}
