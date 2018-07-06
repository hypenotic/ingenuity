<template>
    <div>
        <app-loader></app-loader>
        <div v-if="this.$store.state.pageList != null">
            <app-nav v-bind:menu-links="menuLinks"></app-nav>
            <div class="home-hero" id="header-check">
                <div class="video-overlay">
                </div>
                <video playsinline autoplay muted loop poster="https://data.ingenuity.ca/custom/uploads/2018/02/poster.jpg"  id="bgvid">
                    <source media="(max-width: 450px)" src="src/assets/video/ingenuity_home.mp4" type="video/mp4">
                    <source media="(min-width: 450px)" src="src/assets/video/ingenuity_fast.mp4" type="video/mp4">			
                </video>
                <div class="hgroup rw-wrapper">
                    <h2 class="rw-sentence">
                        A <router-link :to="'services'+'/'+'design-build'" class="sentence-link">Design Build</router-link> & <router-link :to="'services/general-contracting/'" class="sentence-link">General Contracting</router-link> <router-link :to="'about-us/the-team'" class="sentence-link">team</router-link> that <router-link :to="'about-us/'" class="sentence-link">believes</router-link> in
                        <div class="rw-words rw-words-1">
                            <router-link :to="'projects/'" class="rotator-link"><span class="rotator">happiness <span class="sq-ft">/sq ft.</span></span></router-link>
                            <router-link :to="'projects/'" class="rotator-link"><span class="rotator">craft <span class="sq-ft">/sq ft.</span></span></router-link>
                            <router-link :to="'projects/'" class="rotator-link"><span class="rotator">productivity <span class="sq-ft">/sq ft.</span></span></router-link>
                            <router-link :to="'projects/'" class="rotator-link"><span class="rotator">detail <span class="sq-ft">/sq ft.</span></span></router-link>
                            <router-link :to="'projects/'" class="rotator-link"><span class="rotator">creativity <span class="sq-ft">/sq ft.</span></span></router-link>
                        </div>
                        <span id="move-over">/sq ft.</span>
                    </h2>.
                </div>
            </div>
            <app-footer v-if="this.$route.path != '/'"></app-footer>
        </div> 
        <div v-else>
            <transition name="fade">
                <div class="uk-container uk-container-expand loading-animation">
                    <div class="ldr">
                        <div class="ldr-blk"></div>
                        <div class="ldr-blk an_delay"></div>
                        <div class="ldr-blk an_delay"></div>
                        <div class="ldr-blk"></div>
                    </div>
                </div>
            </transition>  
        </div>
    </div>
    
</template>

<script>
    import es6Promise from 'es6-promise';
    es6Promise.polyfill();
    import 'es6-promise/auto'
    import axios from 'axios';
    import Nav from '../components/Nav.vue';
    import Footer from '../components/Footer.vue'; 
    import Loader from '../components/Loader.vue'; 
    import { mapState } from 'vuex';
    export default {
        components: {
            appNav: Nav,
            appFooter: Footer,
            appLoader: Loader
        },
        data: function () {
            return {
                loading: true,
                menuLinks: [],
                menuColor: "",
                pages: [],
                homePage: [],
                aboutPage: []    
            }
        },
        created: function() {
           
        }
    }
</script>

<style lang="scss">
    @import '../sass/variables.scss';
    @import '../sass/animate.scss';
    @import '../sass/typography.scss';
    @import '../sass/global.scss';
    @import '../sass/views/home.scss';
</style>
