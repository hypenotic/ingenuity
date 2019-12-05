<template>
    <div>
        <app-nav></app-nav>
        <div v-if="page != null">
            <app-banner :page="page" id="content-start"></app-banner>
            <div class="main-wrapper"> 
                <section class="main-content standard-center"> 
                    <div class="blog-single-post wow fadeIn" v-for="post in blogs" :key="post.id">
                        <nuxt-link :to="'/news/' + post.id + '/' + post.slug + '/'" >
                            <h3 class="blog-single__title" v-html="post.title.rendered"></h3>
                            <img :src="post.meta_box._post_hero_image" :alt="post.title.rendered">
                        </nuxt-link>
                        <div v-html="post.excerpt.rendered"></div>
                        <nuxt-link :to="'/news/' + post.id + '/' + post.slug + '/'" class="single-post__read-more">Read more...</nuxt-link>
                    </div>
                </section>
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
            await store.dispatch('apiBlogs')
            await store.dispatch('apiMenu')
        },
        head () {
            // console.log(this.page.meta_box._page_hero_image);
            return {
                title:"News",
                meta: [
                    { hid: 'og:image', property: 'og:image', content: this.page.meta_box._page_hero_image },
                    { hid: 'og:title', property: 'og:title', content: "News" },
                    { hid: 'og:url', property: 'og:url', content: this.$store.state.siteUrl + "" + this.$route.path},
                    { hid: 'og:description', property: 'og:description', content: helper.stripTags(helper.decodeHtmlEntity(this.page.excerpt.rendered))},
                    { hid: 'description', name: 'description', content: helper.stripTags(helper.decodeHtmlEntity(this.page.excerpt.rendered)) }
                ]
            }  
        },
        components: {
            appBanner: Banner,
            appFooter: Footer,
            appNav: Nav,
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
                return this.$store.getters.getPages.filter(el => el.slug == 'news' )[0]
            },
            blogs (){
                return this.$store.getters.getBlogs
            }
        },
    };
</script>

<style lang="scss">

    @import '~/assets/sass/variables.scss';
    @import '~/assets/sass/typography.scss';
    @import '~/assets/sass/global.scss';
    @import '~/assets/sass/views/news.scss';


</style>