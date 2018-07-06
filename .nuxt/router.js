import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const _16739a5e = () => import('..\\pages\\projects\\index.vue' /* webpackChunkName: "pages_projects_index" */).then(m => m.default || m)
const _0fb8aaef = () => import('..\\pages\\team3.vue' /* webpackChunkName: "pages_team3" */).then(m => m.default || m)
const _1b505ba6 = () => import('..\\pages\\page.vue' /* webpackChunkName: "pages_page" */).then(m => m.default || m)
const _41fc0b29 = () => import('..\\pages\\blog\\index.vue' /* webpackChunkName: "pages_blog_index" */).then(m => m.default || m)
const _69c97414 = () => import('..\\pages\\home.vue' /* webpackChunkName: "pages_home" */).then(m => m.default || m)
const _54f1246d = () => import('..\\pages\\services\\index.vue' /* webpackChunkName: "pages_services_index" */).then(m => m.default || m)
const _33c5274e = () => import('..\\pages\\contact.vue' /* webpackChunkName: "pages_contact" */).then(m => m.default || m)
const _0faa936e = () => import('..\\pages\\team2.vue' /* webpackChunkName: "pages_team2" */).then(m => m.default || m)
const _64e45f88 = () => import('..\\pages\\about\\index.vue' /* webpackChunkName: "pages_about_index" */).then(m => m.default || m)
const _f6bcb718 = () => import('..\\pages\\team.vue' /* webpackChunkName: "pages_team" */).then(m => m.default || m)
const _21ca3d48 = () => import('..\\pages\\projects\\single\\SingleProject.vue' /* webpackChunkName: "pages_projects_single_SingleProject" */).then(m => m.default || m)
const _7ee99e2e = () => import('..\\pages\\blog\\single\\Single.vue' /* webpackChunkName: "pages_blog_single_Single" */).then(m => m.default || m)
const _26ea876a = () => import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */).then(m => m.default || m)



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
			path: "/projects",
			component: _16739a5e,
			name: "projects"
		},
		{
			path: "/team3",
			component: _0fb8aaef,
			name: "team3"
		},
		{
			path: "/page",
			component: _1b505ba6,
			name: "page"
		},
		{
			path: "/blog",
			component: _41fc0b29,
			name: "blog"
		},
		{
			path: "/home",
			component: _69c97414,
			name: "home"
		},
		{
			path: "/services",
			component: _54f1246d,
			name: "services"
		},
		{
			path: "/contact",
			component: _33c5274e,
			name: "contact"
		},
		{
			path: "/team2",
			component: _0faa936e,
			name: "team2"
		},
		{
			path: "/about",
			component: _64e45f88,
			name: "about"
		},
		{
			path: "/team",
			component: _f6bcb718,
			name: "team"
		},
		{
			path: "/projects/single/SingleProject",
			component: _21ca3d48,
			name: "projects-single-SingleProject"
		},
		{
			path: "/blog/single/Single",
			component: _7ee99e2e,
			name: "blog-single-Single"
		},
		{
			path: "/",
			component: _26ea876a,
			name: "index"
		}
    ],
    
    
    fallback: false
  })
}
