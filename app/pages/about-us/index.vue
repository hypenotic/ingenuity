<template>
    <div>
        <app-banner :page="page" id="content-start"></app-banner>
        <section class="intro main-wrapper">
            <div class="main-content standard-center" v-html="page.content.rendered"></div>
        </section>
        <div class="tabs-wrapper" id="tablist-anchor">
            <ul role="tablist" class="_tabs tablist">
                <li :role="tab.title.rendered" v-for="(tab, i) in tabs" @click="currentTab = i" :key="'about-tab-'+i" @keyup.enter="currentTab = i" :class="{ active: checkActive(i)}" tab-index="0">
                    <nuxt-link :id="tab.slug+'-tab'" :to="{hash: '#tablist-anchor'}" role="tab" :aria-controls="tab.slug" aria-selected="true" v-html="tab.title.rendered"></nuxt-link>
                </li>
            </ul>
            <transition name="fade">
                <div class="_tabs content">
                    <div class="content-inner">
                        <!-- <h2 v-html="tabs[currentTab].title.rendered"></h2> -->
                        <div v-html="tabs[currentTab].content.rendered">
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
    import { helper } from '~/plugins/helper.js';

    import Nav from '~/components/Nav.vue';
    import Banner from '~/components/Banner.vue';
    import Footer from '~/components/Footer.vue';

    export default {
        async fetch ({store}) {
            await store.dispatch('apiPages')
            await store.dispatch('apiMenu')
            await store.dispatch('apiBlogs')
        },
        layout: 'small-nav',
        data () {
            return{
                currentTab: 0
            }
        },
        head () {
            return {
                title: "About Us",
                meta: [
                    // { hid: 'og:image', property: 'og:image', content: this.page.meta_box._page_hero_image },
                    { hid: 'og:title', property: 'og:title', content: "About Us" },
                    { hid: 'og:url', property: 'og:url', content: this.$store.state.siteUrl + "" + this.$route.path},
                    { hid: 'og:description', property: 'og:description', content: helper.stripTags(helper.decodeHtmlEntity(this.page.excerpt.rendered))},
                    { hid: 'description', name: 'description', content: helper.stripTags(helper.decodeHtmlEntity(this.page.excerpt.rendered)) }
                ],
                script: [

                ]
            }  
        },
        components: {
            appBanner: Banner,
            appFooter: Footer,
            appNav: Nav,
        },
        computed: {            
            page () {
                return this.$store.getters.getPages.filter(el => el.slug == 'about-us' )[0]
            },
            tabs () {
                return this.$store.getters.getPages.filter(el => el.parent == '88' )
            },
            activeTab() {
                // return this.$store.getters['getActiveTab']
            },
        },
        methods: {
            checkActive(i) {
                if (i == this.currentTab) {
                    return true
                } else {
                    return false
                }
            },
            checkNextPrev(i) {
                var count = this.tabs.length;
            }
        }
        
    };
</script>

<style lang="scss">

    @import '~/assets/sass/base.scss';
    @import '~/assets/sass/views/about2.scss';

</style>