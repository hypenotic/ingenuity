<template>
    <div>
        <app-nav v-if="this.$store.state.pageList != null" v-bind:menu-links="menuLinks"></app-nav>
        <div v-if="pageInfo != null">
            <app-banner :page="pageInfo"></app-banner>
            <div class="main-wrapper">
                <div class="main-content standard-center">
                    <div v-html="pageInfo.content.rendered"></div>
                    <div class="services-approach"  v-if="pageInfo.meta_box._service_components_deats.length > 0">
                        <h3 v-html="pageInfo.meta_box._service__components_heading"></h3>
                        <div class="two-column">
                            <div class="two-column__half" v-for="comp in pageInfo.meta_box._service_components_deats" :key="comp.text">
                                <h4 v-html="comp.text"></h4>
                                <p v-html="comp.description"></p>
                            </div>
                        </div>
                    </div>
                    <div class="two-column">
                        <div class="two-column__half services-testimonial wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.3s">
                            <blockquote v-html="pageInfo.meta_box._service_quote_text"></blockquote>
                            <h4 v-html="pageInfo.meta_box._service_quote_source"></h4>
                            <h5 v-html="pageInfo.meta_box._service_quote_source_title"></h5>
                            <p v-if="pageInfo.meta_box._service_quote_caption != ''" v-html="pageInfo.meta_box._service_quote_caption" class="testimonial__caption"></p>
                        </div>
                        <div class="two-column__half services-cta wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.7s">
                            <div v-html="pageInfo.meta_box._service_cta_copy"></div>
                            <a :href="pageInfo.meta_box._service_cta_link">
                                <button class="services-cta__btn" v-html="pageInfo.meta_box._service_cta_text"></button>
                            </a>
                        </div>
                    </div>

                    <div class="other-services">
                        <h3>Check out our other services:</h3>
                        <router-link :to="'/services/' + service.slug" v-if="slug != service.slug" v-for="service in this.$store.state.serviceList" :key="service.id" class="other-service-btn services-cta__btn">
                            <span v-html="service.title.rendered"></span>
                        </router-link>
                    </div>

                </div>
            </div>
            <app-footer v-if="this.$route.path != '/'"></app-footer>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import { mapState } from 'vuex';
    import Nav from '~/components/Nav';
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
            console.log(this.pageInfo.meta_box._service__banner_image);
            return {
                meta: [
                    { hid: 'og:image', property: 'og:image', content: this.pageInfo.meta_box._service__banner_image },
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
                pageData: null,
                slug: this.$route.params.slug
            }
        },
        filters: {
        },
        methods: {
        },
        computed: {
            pageInfo: function(){

                let pageSlug = '';
                if (this.slug == 'design-build') {
                    console.log('DB');
                    pageSlug = 'design-build';
                } else if (this.slug == 'general-contracting') {
                    console.log('GC');
                    pageSlug = 'general-contracting';
                } else if (this.slug == 'maintenance'){
                    console.log('Maintenance');
                    pageSlug = 'maintenance';
                } else {
                    console.log('Pro Services');
                    pageSlug = 'professional-services';
                }

                if (this.$store.state.serviceList != null) {
                    for (let page of this.$store.state.serviceList ) {
                        console.log('X:', pageSlug);
                        if (page.slug == pageSlug) {
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
        created() {

        },
    };
</script>

<style lang="scss">
    @import '~/assets/sass/views/services.scss';
</style>