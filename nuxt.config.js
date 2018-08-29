module.exports = {
    build: {
        vendor: ['~/assets/js/replaceme.js'],
    },
    loading: '~/components/loading.vue',
    head:{
        script: [
            {src: "https://maps.googleapis.com/maps/api/js?key=AIzaSyD6SyhFeGyRXakUOo6WbZsRrFMaOgaOgYM", body: true}
        ],
        meta: [
            { hid: 'og:image', property: 'og:image', content: 'http://172.104.208.23/splash.png' },
            { hid: 'og:image:alt', property: 'og:image:alt', content: 'Ingenuity - Established This Century - Design Build General Contracting' },
            { hid: 'viewport', property: 'viewport', content: 'width=device-width, initial-scale=1.0, maximum-scale=1.0'}
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
        ],
    }
    
}

