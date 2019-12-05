<template>
    <div>
        <div v-if="service != null">
            <app-banner :page="service" id="content-start"></app-banner>
            <div class="main-wrapper">
                <div class="main-content standard-center">
                    <div v-if="service.content.rendered" v-html="service.content.rendered"></div>
                    <div class="services-approach"  v-if="service.meta_box._service_components_deats.length > 0">
                        <h3 v-html="service.meta_box._service__components_heading"></h3>
                        <div class="two-column">
                            <div class="two-column__half" v-for="comp in service.meta_box._service_components_deats" :key="comp.text">
                                <h4 v-html="comp.text"></h4>
                                <p v-html="comp.description"></p>
                            </div>
                        </div>
                    </div>
                    <div class="two-column">
                        <div class="two-column__half services-testimonial" data-aos="fade-left" data-aos-delay="200">
                            <blockquote v-html="service.meta_box._service_quote_text"></blockquote>
                            <h4 v-html="service.meta_box._service_quote_source"></h4>
                            <h5 v-html="service.meta_box._service_quote_source_title"></h5>
                            <p v-if="service.meta_box._service_quote_caption != ''" v-html="service.meta_box._service_quote_caption" class="testimonial__caption"></p>
                        </div>
                        <div class="two-column__half services-cta" data-aos="fade-right" data-aos-delay="200">
                            <div v-html="service.meta_box._service_cta_copy"></div>
                            <a class="services-cta__btn" :href="service.meta_box._service_cta_link">
                                <span v-html="service.meta_box._service_cta_text"></span>
                            </a>
                        </div>
                    </div>

                    <div class="other-services" data-aos="fade-up" data-aos-delay="200">
                        <h3>Check out our other services:</h3>
                        <router-link :to="'/services/' + s.slug" v-for="s in services.filter(s=>s.slug != service.slug)" :key="s.id" class="other-service-btn services-cta__btn">
                            <span v-if="s.title.rendered" v-html="s.title.rendered"></span>
                        </router-link>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { helper } from '~/plugins/helper.js';

    import Nav from '~/components/Nav';
    import Banner from '~/components/Banner.vue';
    import Footer from '~/components/Footer.vue';

    export default {
        async fetch ({store}){
            await store.dispatch('apiMenu')
            await store.dispatch('apiServices')
            await store.dispatch('apiBlogs')
        },
        head () {
            return {
                title: helper.decodeHtmlEntity(this.service.title.rendered),
                meta: [
                    { hid: 'og:image', property: 'og:image', content: this.service.meta_box._service__banner_image },
                    { hid: 'og:title', property: 'og:title', content: helper.decodeHtmlEntity(this.service.title.rendered) },
                    { hid: 'og:url', property: 'og:url', content: this.$store.state.siteUrl + "" + this.$route.path},
                    { hid: 'og:description', property: 'og:description', content: helper.stripTags(helper.decodeHtmlEntity(this.service.excerpt.rendered))},
                    { hid: 'description', name: 'description', content: helper.stripTags(helper.decodeHtmlEntity(this.service.excerpt.rendered)) }
                ]
            }  
        },
        components: {
            appBanner: Banner,
            appNav: Nav,
            appFooter: Footer,
        },
        computed: {
            services () {
                return this.$store.getters.getServices
            },
            service () {
                return this.$store.getters.getServices.filter(p => p.slug == this.$route.params.slug)[0];
            },
        },
    };
</script>

<style lang="scss">
    @import '~/assets/sass/base.scss';
    @import '~/assets/sass/views/services.scss';
</style>