<template>
    <div class="single-blog-view">
        <app-banner :page="post" id="content-start"></app-banner>
        <!-- <section class="blog-single-intro">
        </section> -->
        <div class="main-wrapper blog-wrapper">
            <aside id="left" v-if="post.meta_box._post_authors"> 
                <span class="bolded-text">Author(s):</span><br><span v-html="post.meta_box._post_authors" class="post-authors"></span><br>
            </aside>
            <section class="blog-entry blog-page" v-html="post.content.rendered">
            </section>
        </div>
        <div class="prev-next-links">
            <nuxt-link :to="'/news/'+ next.id + '/' + next.slug + '/'" v-if="next != null" class="prev">
                <div class="blog-nav__arrow blog-nav__arrow--next">
                    <p class="top">&larr; Previous Post</p>
                    <p v-html="next.title.rendered"></p>
                </div>
            </nuxt-link>
            <nuxt-link :to="'/news/'+ prev.id + '/' + prev.slug + '/'" v-if="prev != null && prev != next" class="next">
                <div class="blog-nav__arrow blog-nav__arrow--prev">
                    <p class="top">Next Post &rarr;</p>
                    <p v-html="prev.title.rendered"></p>
                </div>
            </nuxt-link>
        </div>
    </div>
</template>

<script>
    import { helper } from '~/plugins/helper.js';

    import Banner from '~/components/Banner.vue';
    import Nav from '~/components/Nav.vue';
    import Footer from '~/components/Footer.vue';

    export default {
        async fetch ({store}) {
            await store.dispatch('apiPages')
            await store.dispatch('apiBlogs')
            await store.dispatch('apiMenu')
        },
        head () {
            return {
                title: helper.decodeHtmlEntity(this.post.title.rendered),
                meta: [
                    { hid: 'og:image', property: 'og:image', content: this.post.meta_box._post_hero_image },
                    { hid: 'og:title', property: 'og:title', content: helper.decodeHtmlEntity(this.post.title.rendered) },
                    { hid: 'og:url', property: 'og:url', content: this.$store.state.siteUrl + "" + this.$route.path},
                    { hid: 'og:description', property: 'og:description', content: helper.stripTags(helper.decodeHtmlEntity(this.post.excerpt.rendered))},
                    { hid: 'description', name: 'description', content: helper.stripTags(helper.decodeHtmlEntity(this.post.excerpt.rendered)) }
                ]
            }  
        },
        components: {
            appBanner: Banner,
            appNav: Nav,
            appFooter: Footer,
        },
        
        computed: {
            blogs(){
                return this.$store.getters.getBlogs
            },
            id(){
                return this.blogs.findIndex(p => p.slug == this.$route.params.slug)
            },
            post(){
                return this.blogs[this.id]
            },
            prev() {
                if(this.id == 0){
                    return this.blogs[this.blogs.length - 1]
                }else{
                    return this.blogs[this.id - 1]
                }
            },
            next() {
                if(this.id == this.blogs.length - 1){
                    return this.blogs[0]
                }else{
                    return this.blogs[this.id + 1]
                }
            },
        },
    };
</script>

<style lang="scss">
    @import '~/assets/sass/variables.scss';
    @import '~/assets/sass/typography.scss';
    @import '~/assets/sass/global.scss';
    @import '~/assets/sass/views/news.scss';
</style>