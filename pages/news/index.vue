<template>
    <div>
        <app-nav v-bind:menu-links="menuLinks"></app-nav>
        <div v-if="pageInfo != null">
            <app-banner :page="pageInfo"></app-banner>
            <div class="main-wrapper"> 
                <section class="main-content standard-center"> 
                    <div class="blog-single-post wow fadeIn" v-for="post in this.$store.state.blogList" :key="post.id">
                        <router-link :to="'/news/' + post.id + '/' + post.slug" >
                            <h3 class="blog-single__title" v-html="post.title.rendered"></h3>
                        </router-link>
                        <img :src="post.meta_box._post_hero_image" :alt="post.title.rendered">
                        <div v-html="post.excerpt.rendered"></div>
                        <nuxt-link :to="'/news/' + post.id + '/' + post.slug" class="single-post__read-more">Read more...</nuxt-link>
                    </div>
                    <!-- <p class="pagination-links">pagination links</p> -->
                </section> <!-- ARTICLE WRAP ends here -->
            </div> <!-- contentWrapper ends here -->
        </div>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import { helper } from '~/plugins/helper.js';
    import axios from 'axios';
    import { mapState } from 'vuex';
    import Nav from '~/components/Nav.vue';
    import Banner from '~/components/Banner.vue';
    import Footer from '~/components/Footer.vue';
    function html2text(html) {
        var tag = document.createElement('div');
        tag.innerHTML = html;

        return tag.innerText;
    }
    export default {
        fetch ({store}){
            return store.dispatch('dummy');
        },
        head () {
            console.log(this.pageInfo.meta_box._page_hero_image);
            return {
                title:"News",
                meta: [
                    { hid: 'og:image', property: 'og:image', content: this.pageInfo.meta_box._page_hero_image },
                    { hid: 'og:title', property: 'og:title', content: "News" },
                    { hid: 'og:url', property: 'og:url', content: this.$store.state.siteUrl + "" + this.$route.path},
                    { hid: 'og:description', property: 'og:description', content: helper.stripTags(helper.decodeHtmlEntity(this.pageInfo.excerpt.rendered))},
                    { hid: 'description', name: 'description', content: helper.stripTags(helper.decodeHtmlEntity(this.pageInfo.excerpt.rendered)) }
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
        filters: {
        },
        computed: {
            pageInfo: function(){
                if (this.$store.state.pageList != null) {
                    for (let page of this.$store.state.pageList ) {
                        if (page.slug == 'news') {
                            console.log(page);
                            this.pageData = page;
                            return page;
                            break;
                        }
                    }
                } else {
                    return null;
                }
            }
        },
        methods: {
        },
        created() {
        },
    };
</script>

<style lang="scss">

    @import '~/assets/sass/variables.scss';
    @import '~/assets/sass/animate.scss';
    @import '~/assets/sass/typography.scss';
    @import '~/assets/sass/global.scss';
    @import '~/assets/sass/views/news.scss';


</style>