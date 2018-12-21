<template>
    <div v-if="page" class="about-page">
        <app-nav></app-nav>
        <div>
            <app-banner :page="page"></app-banner>
            <section class="intro content-wrapper">
                <!-- <div v-html="page.content.rendered"></div> -->
                <p>Imagine you could start a Design Build & General Contracting business from scratch. In THIS era.</p>

                <p>You’d marry experience, bleeding-edge standards, and passion for the craft with today’s service experience expectations. You’d factor in society’s growing awareness of how built and natural environments influence individuals, enterprise, and communities.</p>

                <p>We did.</p>

                <p>We built Ingenuity from the ground up to:</p>

                <ul>
                    <li>Afford attention to detail.</li>
                    <li>Celebrate care for craft.</li>
                    <li>
                        Rely on process to drive quality outcomes.
                    </li>
                    <li>Offer personalized, lean service with no bureaucracy.</li>
                    <li>Put people first (Clients, Communities, Tenants and Trades).</li>
                </ul>

                <p>Twelve years in, we’ve got an experienced, dedicated, and passionate team equally comfortable helping you envision a new room, building, or business park.</p>
            </section>
            <div class="tabs-wrapper">
                <ul role="tablist" class="_tabs tablist">
                    <li :role="tab.title.rendered" v-for="(tab, i) in tabs" @click="currentTab = i" :key="'about-tab-'+i" @keyup.enter="currentTab = i" :class="{ active: checkActive(i)}" tab-index="0">
                        <span :id="tab.slug+'-tab'" :href="'#'+tab.slug" role="tab" :aria-controls="tab.slug" aria-selected="true" v-html="tab.title.rendered"></span>
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
        <app-footer></app-footer>    
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
        },
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