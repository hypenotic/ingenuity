<template>
    <div class="home-hero" id="header-check">
        <div class="video-overlay">
        </div>
        <div class="video">
            <!-- <video playsinline autoplay muted loop id="bgvid">
                <source src="/assets/videos/ingenuity_fast.mp4" type="video/mp4">
            </video> -->
            <iframe name="iframe1" id="iframe1" src="https://player.vimeo.com/video/442032431?autoplay=1&loop=1&autopause=0" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
        <div class="hgroup rw-wrapper" id="content-start">
            <h2 class="rw-sentence">
                A <nuxt-link to="services/design-build/" class="sentence-link">Design Build</nuxt-link> &amp; <nuxt-link to="services/general-contracting/" class="sentence-link">General Contracting</nuxt-link>&nbsp;<nuxt-link to="about-us/the-team/" class="sentence-link">team</nuxt-link> that <nuxt-link to="about-us/" class="sentence-link">believes</nuxt-link> in <nuxt-link to="projects/" class="rotator-link"><span class="replace-me"> happiness, <span style="display: none">craft, productivity, detail, creativity</span></span></nuxt-link><span class="sq-ft">&nbsp;/sq&nbsp;ft.</span>
            </h2>.
        </div>
    </div>
</template>

<script>
    import { helper } from '~/plugins/helper.js';
    
    import Nav from '~/components/Nav.vue';

    export default {
        async fetch ({store}) {
            await store.dispatch('apiMenu')
        },
        components: {
            appNav: Nav,
        },
        head () {
            return {
                title: "Ingenuity",
                meta: [
                    { hid: 'og:title', property: 'og:title', content: "Ingenuity" },
                    { hid: 'og:type', property: 'og:type', content: 'website' },
                    { hid: 'og:url', property: 'og:url', content: this.$store.state.siteUrl + "" + this.$route.path},
                    { hid: 'og:description', property: 'og:description', content: 'A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot.' },
                    { hid: 'description', name: 'description', content: 'A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot.' }
                ],
            }
        },
        mounted(){
            var replace = new ReplaceMe(document.querySelector('.replace-me'), {
                animation: 'animated fadeIn',                       // Animation class or classes
                speed: 2500,                                        // Delay between each phrase in miliseconds
                separator: ',',                                     // Phrases separator
                hoverStop: false,                                   // Stop rotator on phrase hover
                clickChange: false,                                 // Chnage phrase on click
                loopCount: 'infinite',                              // Loop Count - 'infinite' or number
                autoRun: true,                                      // Run rotator automatically
                onInit: false,                                      // Function
                onChange: false,                                    // Function
                onComplete: false                                   // Function
            });
        }
    }
</script>

<style lang="scss" scoped>
    @import '~/assets/sass/variables.scss';
    @import '~/assets/sass/views/home.scss';

    .video iframe{
        width: 101%;
        height: 101%;
    }
</style>
