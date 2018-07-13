<template>
    <div>
        <app-nav v-bind:menu-links="menuLinks"></app-nav>
        <div v-if="pageInfo != null">
            <app-banner :page="pageInfo"></app-banner>
            <div class="projects__panel-container">
                <router-link :to="'/projects/' + project.slug" v-for="project in this.$store.state.projectList" :key="project.id" class="projects__panel-link">
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
            return {
                meta: [
                    { hid: 'og:image', property: 'og:image', content: this.pageInfo.meta_box._page_hero_image  },
                    { hid: 'og:url', property: 'og:url', content: this.$store.state.siteUrl + "" + this.$route.path},
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
            pageInfo: function(){
                if (this.$store.state.pageList != null) {
                    for (let page of this.$store.state.pageList ) {
                        if (page.slug == 'projects') {
                            //console.log(page);
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
    };
</script>

<style lang="scss">
    @import '~/assets/sass/variables.scss';
    @import '~/assets/sass/animate.scss';
    @import '~/assets/sass/typography.scss';
    @import '~/assets/sass/global.scss';
    @import '~/assets/sass/views/projects.scss';
</style>