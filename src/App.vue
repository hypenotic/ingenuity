<template>
    <div>
        <div v-if="this.$store.state.pageList != null">
            <app-nav v-bind:menu-links="menuLinks"></app-nav>
            <transition name="fade">
                <router-view :load-check="loading" :key="$route.fullPath"></router-view>
            </transition> 
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
    import Nav from './components/Nav.vue';
    import Footer from './components/Footer.vue'; 
    import { mapState } from 'vuex';
    export default {
        components: {
            appNav: Nav,
            appFooter: Footer
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
            this.$store.dispatch("getMenu", {'type': 'initial-load'});
            this.$store.dispatch("getPages", {'type': 'initial-load'});
            this.$store.dispatch("getProjects", {'type': 'initial-load'});
            this.$store.dispatch("getBlogPosts", {'type': 'initial-load'});
            this.$store.dispatch("getContacts", {'type': 'initial-load'});
            this.$store.dispatch("getServices", {'type': 'initial-load'});
            this.$store.dispatch("getTeam", {'type': 'initial-load'});
        }
    }
</script>

<style lang="scss">
    @import './sass/variables.scss';
    @import './sass/animate.scss';
    @import './sass/typography.scss';
    @import './sass/global.scss';
</style>
