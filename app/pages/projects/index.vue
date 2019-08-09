<template>
    <div>
        <app-nav></app-nav>
        <div v-if="page != null">
            <app-banner :page="page"></app-banner>
            <div class="projects__panel-container">
                <router-link :to="'/projects/' + project.slug" v-for="project in projects" :key="project.id" class="projects__panel-link">
                    <div class="projects__panel-wrap">
                        <h2 v-html="project.title.rendered"></h2>
                        <div class="color-overlay">
                        </div>
                        <figure class="projects__panel-img" :style="'background-color: rgba(252, 216, 56, 0.6); background-image: url(' + project.meta_box._banner_image[0].full_url + ');'">
                        </figure>
                    </div>
                </router-link>
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
            await store.dispatch('apiProjects')
            await store.dispatch('apiMenu')
            await store.dispatch('apiBlogs')
        },
        head () {
            return {
                title: "Projects",
                meta: [
                    { hid: 'og:image', property: 'og:image', content: this.page.meta_box._page_hero_image  },
                    { hid: 'og:title', property: 'og:title', content: "Projects"},
                    { hid: 'og:url', property: 'og:url', content: this.$store.state.siteUrl + "" + this.$route.path},
                    { hid: 'og:description', property: 'og:description', content: helper.stripTags(helper.decodeHtmlEntity(this.page.excerpt.rendered))},
                    { hid: 'description', name: 'description', content: helper.stripTags(helper.decodeHtmlEntity(this.page.excerpt.rendered)) }
                ]
            }  
        },
        components: {
            appBanner: Banner,
            appNav: Nav,
            appFooter: Footer,
        },
        data() {
            return {
                menuLinks: [],
                errors: [],
                fullPath: this.$route.fullPath,
                slug: this.$route.path,
                pageData: null
            }
        },
        computed: {
            page () {
                return this.$store.getters.getPages.filter(el => el.slug == 'projects' )[0]
            },
            projects (){
                return this.$store.getters.getProjects
            }
        },
    };
</script>

<style lang="scss">
    @import '~/assets/sass/variables.scss';
    @import '~/assets/sass/typography.scss';
    @import '~/assets/sass/global.scss';
    @import '~/assets/sass/views/projects.scss';
</style>