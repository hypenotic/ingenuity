import Vue from 'vue'
import NuxtLoading from '~/components/loading.vue'


let layouts = {

  "_default": () => import('./layouts/default.vue'  /* webpackChunkName: "layouts/default" */).then(m => m.default || m)

}

let resolvedLayouts = {}

export default {
  head: {"script":[{"src":"https:\u002F\u002Fmaps.googleapis.com\u002Fmaps\u002Fapi\u002Fjs?key=AIzaSyD6SyhFeGyRXakUOo6WbZsRrFMaOgaOgYM","body":true},{"src":"\u002F\u002Fcdn.trackduck.com\u002Ftoolbar\u002Fprod\u002Ftd.js","data-trackduck-id":"59930bc28fc753830a14d52d","async":true,"body":true}],"meta":[{"hid":"og:image","property":"og:image","content":"https:\u002F\u002Fdata.ingenuity.ca\u002Fcustom\u002Fuploads\u002F2018\u002F03\u002Fingenuity_card.jpg"},{"hid":"twitter:image","property":"twitter:image","content":"https:\u002F\u002Fdata.ingenuity.ca\u002Fcustom\u002Fuploads\u002F2018\u002F03\u002Fingenuity_card.jpg"},{"hid":"og:image:alt","property":"og:image:alt","content":"Ingenuity - Established This Century - Design Build General Contracting"},{"hid":"viewport","name":"viewport","property":"viewport","content":"width=device-width, initial-scale=1"},{"hid":"og:description","property":"og:description","content":"A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot."},{"hid":"description","name":"description","content":"A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot."}],"link":[{"rel":"icon","type":"image\u002Fpng","sizes":"16x16","href":"\u002Ffavicon-16x16.png"},{"rel":"icon","type":"image\u002Fpng","sizes":"32x32","href":"\u002Ffavicon-32x32.png"},{"rel":"apple-touch-icon","sizes":"180x180","href":"\u002Fapple-touch-icon.png"},{"rel":"stylesheet","href":"https:\u002F\u002Fuse.typekit.net\u002Fomn8cmb.css"}],"style":[]},
  render(h, props) {
    const loadingEl = h('nuxt-loading', { ref: 'loading' })
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
      }
    }, [ templateEl ])

    return h('div',{
      domProps: {
        id: '__nuxt'
      }
    }, [
      loadingEl,
      transitionEl
    ])
  },
  data: () => ({
    layout: null,
    layoutName: ''
  }),
  beforeCreate () {
    Vue.util.defineReactive(this, 'nuxt', this.$options.nuxt)
  },
  created () {
    // Add this.$nuxt in child instances
    Vue.prototype.$nuxt = this
    // add to window so we can listen when ready
    if (typeof window !== 'undefined') {
      window.$nuxt = this
    }
    // Add $nuxt.error()
    this.error = this.nuxt.error
  },
  
  mounted () {
    this.$loading = this.$refs.loading
  },
  watch: {
    'nuxt.err': 'errorChanged'
  },
  
  methods: {
    
    errorChanged () {
      if (this.nuxt.err && this.$loading) {
        if (this.$loading.fail) this.$loading.fail()
        if (this.$loading.finish) this.$loading.finish()
      }
    },
    
    setLayout (layout) {
      if (!layout || !resolvedLayouts['_' + layout]) layout = 'default'
      this.layoutName = layout
      let _layout = '_' + layout
      this.layout = resolvedLayouts[_layout]
      return this.layout
    },
    loadLayout (layout) {
      if (!layout || !(layouts['_' + layout] || resolvedLayouts['_' + layout])) layout = 'default'
      let _layout = '_' + layout
      if (resolvedLayouts[_layout]) {
        return Promise.resolve(resolvedLayouts[_layout])
      }
      return layouts[_layout]()
      .then((Component) => {
        resolvedLayouts[_layout] = Component
        delete layouts[_layout]
        return resolvedLayouts[_layout]
      })
      .catch((e) => {
        if (this.$nuxt) {
          return this.$nuxt.error({ statusCode: 500, message: e.message })
        }
      })
    }
  },
  components: {
    NuxtLoading
  }
}

