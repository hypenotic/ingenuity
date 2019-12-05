import pkg from './package'

require('dotenv').config()

export default {
    mode: 'universal',
    /*
    ** Headers of the page
    */
    head: {
        title: 'Ingenuity - Established This Century - Design Build General Contracting',
        meta: [
            { charset: 'utf-8' },
            { name: 'viewport', content: 'width=device-width, initial-scale=1' },
            { hid: 'description', name: 'description', content: "A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot." },
            { hid: 'og:image', property: 'og:image', content: 'https://data.ingenuity.ca/custom/uploads/2018/03/ingenuity_card.jpg' },
            { hid: 'twitter:image', property: 'twitter:image', content: 'https://data.ingenuity.ca/custom/uploads/2018/03/ingenuity_card.jpg' },
            { hid: 'twitter:description', name: 'twitter:description', content: "A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot." },
            { hid: 'og:image:alt', property: 'og:image:alt', content: 'Ingenuity - Established This Century - Design Build General Contracting' },
            { hid: 'og:description', property: 'og:description', content: 'A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot.' },
            { hid: 'og:site_name', name: 'og:site_name', content: 'Ingenuity - Established This Century - Design Build General Contracting' },
            /*
            { 'http-equiv': 'Content-Security-Policy', content: "default-src 'none'; script-src 'self' http://* https://* 'unsafe-inline' 'unsafe-eval'; connect-src 'self' http://* https://* 'unsafe-inline'; img-src 'self' http://* https://* 'unsafe-inline' data:; style-src 'self' http://* https://* 'unsafe-inline'; font-src 'self' http://* https://* 'unsafe-inline' data:;"}
            */
        ],
        script: [
            { src: "https://maps.googleapis.com/maps/api/js?key=AIzaSyD6SyhFeGyRXakUOo6WbZsRrFMaOgaOgYM", body: true },
            { src: '//cdn.trackduck.com/toolbar/prod/td.js', "data-trackduck-id": '59930bc28fc753830a14d52d', async: true, body: true },
        ],
        link: [
            {
                rel: 'icon',
                type: 'image/png',
                sizes: '16x16',
                href: '/favicon-16x16.png',
            },
            {
                rel: 'icon',
                type: 'image/png',
                sizes: '32x32',
                href: '/favicon-32x32.png',
            },
            {
                rel: 'apple-touch-icon',
                sizes: '180x180',
                href: '/apple-touch-icon.png',
            },
            {
                rel: 'stylesheet',
                href: 'https://use.typekit.net/omn8cmb.css',
            },
        ],
    },
    /*
    ** Used to go to top of page for pagaination
    */
    router: {
        base: process.env.BASE_ROUTER,
        // scrollBehavior: function (to, from, savedPosition) {
        //     return { x: 0, y: 0 }
        // }
        pathToRegexpOptions: { strict: true }
    },
    /*
    ** Customize the progress-bar color
    */
    // loading: { color: '#ec515e', height: '3px' },
    loading: '~/components/loading.vue',
    /*
    ** Global CSS
    */
    css: [],
    /*
    ** Plugins to load before mounting the App
    */
    plugins: [
        { src: '~/plugins/vue-smooth' },
        { src: "~/plugins/aos.js", ssr: false },
        { src: "~/plugins/replaceme.js", ssr: false }
    ],
    /*
    ** Nuxt.js modules
    */
    modules: [
        '@nuxtjs/axios',
        '@nuxtjs/dotenv',
        ['@nuxtjs/google-analytics', { ua: 'UA-72042036-1' }]
        // ['@nuxtjs/google-tag-manager', { id: 'GTM-PTWZM2' }]
    ],
  /*
  ** Server configuration
  */
  server: {
    port: 9000, // default: 3000
  },
    /*
  ** Build configuration
  */
    build: {
        /*
        ** You can extend webpack config here
        */

        extend(config, ctx) {
        }
    }
}


