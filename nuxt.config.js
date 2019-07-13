module.exports = {
    build: {
        vendor: [
            '~/assets/js/replaceme.js'
        ],
    },
    modules: [
        ['@nuxtjs/google-analytics', { ua: 'UA-72042036-1' }]
    ],
    loading: '~/components/loading.vue',
    head:{
        script: [
            {src: "https://maps.googleapis.com/maps/api/js?key=AIzaSyD6SyhFeGyRXakUOo6WbZsRrFMaOgaOgYM", body: true},
            { src: '//cdn.trackduck.com/toolbar/prod/td.js', "data-trackduck-id": '59930bc28fc753830a14d52d', async: true, body: true },
        ],
        meta: [
            { hid: 'og:image', property: 'og:image', content: 'https://data.ingenuity.ca/custom/uploads/2018/03/ingenuity_card.jpg' },
            { hid: 'twitter:image', property: 'twitter:image', content: 'https://data.ingenuity.ca/custom/uploads/2018/03/ingenuity_card.jpg' },
            { hid: 'og:image:alt', property: 'og:image:alt', content: 'Ingenuity - Established This Century - Design Build General Contracting' },
            { hid: 'viewport', name:'viewport',  property: 'viewport', content: 'width=device-width, initial-scale=1'},
            { hid: 'og:description', property: 'og:description', content: 'A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot.' },
            { hid: 'description', name: 'description', content: 'A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot.' }
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
    plugins: [
        {src: '~/plugins/aos', ssr: false}
    ],
}

