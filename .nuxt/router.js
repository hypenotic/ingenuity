import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const _78c31f7c = () => import('..\\pages\\contact-us.vue' /* webpackChunkName: "pages_contact-us" */).then(m => m.default || m)
const _3d88c81a = () => import('..\\pages\\about-us\\index.vue' /* webpackChunkName: "pages_about-us_index" */).then(m => m.default || m)
const _50572344 = () => import('..\\pages\\news\\index.vue' /* webpackChunkName: "pages_news_index" */).then(m => m.default || m)
const _0f099252 = () => import('..\\pages\\projects\\index.vue' /* webpackChunkName: "pages_projects_index" */).then(m => m.default || m)
const _62583d08 = () => import('..\\pages\\about-us\\old.vue' /* webpackChunkName: "pages_about-us_old" */).then(m => m.default || m)
const _e41743b0 = () => import('..\\pages\\about-us\\the-team.vue' /* webpackChunkName: "pages_about-us_the-team" */).then(m => m.default || m)
const _56ef872b = () => import('..\\pages\\services\\_slug.vue' /* webpackChunkName: "pages_services__slug" */).then(m => m.default || m)
const _86179fda = () => import('..\\pages\\projects\\_slug\\index.vue' /* webpackChunkName: "pages_projects__slug_index" */).then(m => m.default || m)
const _267ce9ce = () => import('..\\pages\\news\\_id\\_slug\\index.vue' /* webpackChunkName: "pages_news__id__slug_index" */).then(m => m.default || m)
const _00adefd1 = () => import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */).then(m => m.default || m)



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
			component: _78c31f7c,
			name: "contact-us"
		},
		{
			path: "/about-us",
			component: _3d88c81a,
			name: "about-us"
		},
		{
			path: "/news",
			component: _50572344,
			name: "news"
		},
		{
			path: "/projects",
			component: _0f099252,
			name: "projects"
		},
		{
			path: "/about-us/old",
			component: _62583d08,
			name: "about-us-old"
		},
		{
			path: "/about-us/the-team",
			component: _e41743b0,
			name: "about-us-the-team"
		},
		{
			path: "/services/:slug?",
			component: _56ef872b,
			name: "services-slug"
		},
		{
			path: "/projects/:slug",
			component: _86179fda,
			name: "projects-slug"
		},
		{
			path: "/news/:id/:slug?",
			component: _267ce9ce,
			name: "news-id-slug"
		},
		{
			path: "/",
			component: _00adefd1,
			name: "index"
		}
    ],
    
    
    fallback: false
  })
}
