import Vue from 'vue'
import NuxtLoading from '~/components/loading.vue'
import NuxtBuildIndicator from './components/nuxt-build-indicator'

import _6f6c098b from '../layouts/default.vue'

const layouts = { "_default": _6f6c098b }

export default {
  head: {"title":"Ingenuity - Established This Century - Design Build General Contracting","meta":[{"charset":"utf-8"},{"name":"viewport","content":"width=device-width, initial-scale=1"},{"hid":"description","name":"description","content":"A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot."},{"hid":"og:image","property":"og:image","content":"https:\u002F\u002Fdata.ingenuity.ca\u002Fcustom\u002Fuploads\u002F2018\u002F03\u002Fingenuity_card.jpg"},{"hid":"twitter:image","property":"twitter:image","content":"https:\u002F\u002Fdata.ingenuity.ca\u002Fcustom\u002Fuploads\u002F2018\u002F03\u002Fingenuity_card.jpg"},{"hid":"twitter:description","name":"twitter:description","content":"A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot."},{"hid":"og:image:alt","property":"og:image:alt","content":"Ingenuity - Established This Century - Design Build General Contracting"},{"hid":"og:description","property":"og:description","content":"A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot."},{"hid":"og:site_name","name":"og:site_name","content":"Ingenuity - Established This Century - Design Build General Contracting"}],"script":[{"src":"https:\u002F\u002Fmaps.googleapis.com\u002Fmaps\u002Fapi\u002Fjs?key=AIzaSyD6SyhFeGyRXakUOo6WbZsRrFMaOgaOgYM","body":true},{"src":"\u002F\u002Fcdn.trackduck.com\u002Ftoolbar\u002Fprod\u002Ftd.js","data-trackduck-id":"59930bc28fc753830a14d52d","async":true,"body":true}],"link":[{"rel":"icon","type":"image\u002Fpng","sizes":"16x16","href":"\u002Ffavicon-16x16.png"},{"rel":"icon","type":"image\u002Fpng","sizes":"32x32","href":"\u002Ffavicon-32x32.png"},{"rel":"apple-touch-icon","sizes":"180x180","href":"\u002Fapple-touch-icon.png"},{"rel":"stylesheet","href":"https:\u002F\u002Fuse.typekit.net\u002Fomn8cmb.css"}],"style":[]},

  render(h, props) {
    const loadingEl = h('NuxtLoading', { ref: 'loading' })
    const layoutEl = h(this.layout || 'nuxt')
    const templateEl = h('div', {
      domProps: {
        id: '__layout'
      },
      key: this.layoutName
    }, [ layoutEl ])

    const transitionEl = h('transition', {
      props: {
        name: 'layout',
        mode: 'out-in'
      },
      on: {
        beforeEnter(el) {
          // Ensure to trigger scroll event after calling scrollBehavior
          window.$nuxt.$nextTick(() => {
            window.$nuxt.$emit('triggerScroll')
          })
        }
      }
    }, [ templateEl ])

    return h('div', {
      domProps: {
        id: '__nuxt'
      }
    }, [loadingEl, h(NuxtBuildIndicator), transitionEl])
  },
  data: () => ({
    isOnline: true,
    layout: null,
    layoutName: ''
  }),
  beforeCreate() {
    Vue.util.defineReactive(this, 'nuxt', this.$options.nuxt)
  },
  created() {
    // Add this.$nuxt in child instances
    Vue.prototype.$nuxt = this
    // add to window so we can listen when ready
    if (process.client) {
      window.$nuxt = this
      this.refreshOnlineStatus()
      // Setup the listeners
      window.addEventListener('online', this.refreshOnlineStatus)
      window.addEventListener('offline', this.refreshOnlineStatus)
    }
    // Add $nuxt.error()
    this.error = this.nuxt.error
  },

  mounted() {
    this.$loading = this.$refs.loading
  },
  watch: {
    'nuxt.err': 'errorChanged'
  },

  computed: {
    isOffline() {
      return !this.isOnline
    }
  },
  methods: {
    refreshOnlineStatus() {
      if (process.client) {
        if (typeof window.navigator.onLine === 'undefined') {
          // If the browser doesn't support connection status reports
          // assume that we are online because most apps' only react
          // when they now that the connection has been interrupted
          this.isOnline = true
        } else {
          this.isOnline = window.navigator.onLine
        }
      }
    },

    errorChanged() {
      if (this.nuxt.err && this.$loading) {
        if (this.$loading.fail) this.$loading.fail()
        if (this.$loading.finish) this.$loading.finish()
      }
    },

    setLayout(layout) {
      if(layout && typeof layout !== 'string') throw new Error('[nuxt] Avoid using non-string value as layout property.')

      if (!layout || !layouts['_' + layout]) {
        layout = 'default'
      }
      this.layoutName = layout
      this.layout = layouts['_' + layout]
      return this.layout
    },
    loadLayout(layout) {
      if (!layout || !layouts['_' + layout]) {
        layout = 'default'
      }
      return Promise.resolve(layouts['_' + layout])
    }
  },
  components: {
    NuxtLoading
  }
}
