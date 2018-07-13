module.exports = {
    build: {
        vendor: ['~/assets/js/replaceme.js'],
    },
    loading: '~/components/loading.vue',
    head:{
        meta: [
            { hid: 'og:image', property: 'og:image', content: 'http://172.104.208.23/splash.png' },
            { hid: 'og:image:alt', property: 'og:image:alt', content: 'Ingenuity - Established This Century - Design Build General Contracting' },
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