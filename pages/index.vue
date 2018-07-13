<template>
    <div>
        <app-nav v-if="this.$store.state.pageList != null" v-bind:menu-links="menuLinks"></app-nav>
        <div class="home-hero" id="header-check">
            <div class="video-overlay">
            </div>
            <div class="video">
                <video playsinline autoplay muted loop poster="https://data.ingenuity.ca/custom/uploads/2018/02/poster.jpg" id="bgvid">
<!--                    <source media="(max-width: 450px)" src="src/assets/video/ingenuity_home.mp4" type="video/mp4">-->
                    <source media="(min-width: 450px)" src="~/assets/videos/ingenuity_fast.mp4" type="video/mp4">
                </video>
            </div>
            <div class="hgroup rw-wrapper">
                <h2 class="rw-sentence">
                    A <nuxt-link :to="'services'+'/'+'design-build'" class="sentence-link">Design Build</nuxt-link> &amp; <nuxt-link :to="'services/general-contracting/'" class="sentence-link">General Contracting</nuxt-link>&nbsp;<nuxt-link :to="'about-us/the-team'" class="sentence-link">team</nuxt-link> that <nuxt-link :to="'about-us/'" class="sentence-link">believes</nuxt-link> in <nuxt-link :to="'projects/'" class="rotator-link"><span class="replace-me"> happiness, craft, productivity, detail, creativity</span></nuxt-link><span class="sq-ft">&nbsp;/sq&nbsp;ft.</span>
                    
                </h2>.
            </div>
        </div>
    </div>
</template>

<script>
    import Nav from '~/components/Nav.vue';
    import { mapState } from 'vuex';
    export default {
        fetch ({store}){
            return store.dispatch('dummy');
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
                    { hid: 'og:url', property: 'og:url', content: 'http://172.104.208.23/' },
                    { hid: 'og:image', property: 'og:image', content: 'http://172.104.208.23/logo.png' },
                    { hid: 'description', name: 'description', content: 'A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot.' }
                ],
            }
        },
        data: function () {
            return {
                menuLinks: [],
                menuColor: "",
                pages: [],
                homePage: [],
                aboutPage: [],
            }
        },
        mounted: function(){
            var replace = new ReplaceMe(document.querySelector('.replace-me'), {
                animation: 'animated fadeInDown',                       // Animation class or classes
                speed: 5000,                                        // Delay between each phrase in miliseconds
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

<style lang="scss">
    @import '~/assets/sass/views/home.scss';
</style>
