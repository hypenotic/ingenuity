<template>
    <div>  
        <app-nav></app-nav>
        <app-banner :page="project"></app-banner>
        <div class="diagonal-wrapper diagonal-svg__wrapper">
            <svg class="diagonal-svg">
                <line id="the-line" x1="100%" y1="110%" x2="30%" y2="-10%"/>
            </svg>
            <div class="main-wrapper blog-wrapper">
                <aside id="left"> 
                    <p>
                        <span class="stats_label">Client</span>:<br>
                        <span v-html="project.meta_box._stats_client"></span>
                    </p>
                    <p>
                        <span class="stats_label">SF</span>:<br>
                        <span v-html="project.meta_box._stats_sf"></span>
                    </p>
                    <p>
                        <span class="stats_label">Duration</span>:<br>
                        <span v-html="project.meta_box._stats_duration"></span>
                    </p>
                    <p>
                        <span class="stats_label">Location</span>:<br>
                        <span v-html="project.meta_box._stats_location"></span>
                    </p>
                </aside>
                <section v-html="project.content.rendered" class="blog-entry"> </section>
            </div>
            <!-- <section class="project__video">
            </section> -->
            <section v-if="project.meta_box._project__quote != ''" class="project__testimonial">
                <blockquote class="testimonial__quotation" v-html="project.meta_box._project__quote"></blockquote>
                <div class="testimonial__creds">
                    <h4 v-html="project.meta_box._project__quote_name"></h4>
                    <h5 v-html="project.meta_box._project__quote_title"></h5>
                </div>  
            </section>
            <div class="main-wrapper">
                
                <section class="project__gallery" v-if="gallery">
                    <div class="gallery__single" v-for="(single, i) in gallery['_slide']" :key="'single'+gallery.id+i">
                        <div class="gallery__single-half gallery-image" data-aos="zoom-out" data-aos-delay="200">
                            <img :src="single.image" :alt="single.caption">
                        </div>
                        <div v-if="single.caption != ''" class="gallery__single-half gallery-caption">
                            <p v-html="single.caption"></p>
                        </div>
                        <div v-else class="gallery__single-half gallery-caption gallery-caption-clear">
                           
                        </div>
                    </div>
                </section>

                <div class="project-nav">
                    <nuxt-link :to="prev.slug" v-if="prev.slug != null">
                        <div class="project-nav__arrow project-nav__arrow--prev">
                            <p v-html="'&lt; ' + prev.title.rendered"></p>
                        </div>
                    </nuxt-link>
                    <nuxt-link :to="next.slug" v-if="next.slug != null">
                        <div class="project-nav__arrow project-nav__arrow--next">
                            <p v-html="next.title.rendered+' &gt;'"></p>
                        </div>
                    </nuxt-link>
                </div>
            </div>
        </div>
        <app-footer></app-footer>
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
            await store.dispatch('apiProjects')
            await store.dispatch('apiGalleries')  
            await store.dispatch('apiMenu')    
        },
        head () {
            console.log(this.project.meta_box._banner_image[0].full_url);
            return {
                title: helper.decodeHtmlEntity(this.project.title.rendered),
                meta: [
                    { hid: 'og:image', property: 'og:image', content: this.project.meta_box._banner_image[0].full_url },
                    { hid: 'og:title', property: 'og:title', content: helper.decodeHtmlEntity(this.project.title.rendered) },
                    { hid: 'og:url', property: 'og:url', content: this.$store.state.siteUrl + "" + this.$route.path},
                    { hid: 'og:description', property: 'og:description', content: helper.stripTags(helper.decodeHtmlEntity(this.project.excerpt.rendered))},
                    { hid: 'description', name: 'description', content: helper.stripTags(helper.decodeHtmlEntity(this.project.excerpt.rendered)) }
                ]
            }  
        },
        components: {
            appBanner: Banner,
            appNav: Nav,
            appFooter: Footer,
        },
        computed: {
            projects(){
                return this.$store.getters.getProjects
            },
            id(){
                return this.projects.findIndex(p => p.slug == this.$route.params.slug)
            },
            gallery(){
                let g = this.project.meta_box._slide_select;
                let selected = this.galleries.filter(gal => gal.id == g);
                if (selected && selected.length > 0) {
                    return selected[0]
                } else { return false }
            },
            galleries(){
                return this.$store.getters.getGalleries
            },
            project(){
                return this.projects[this.id]
            },
            prev() {
                if(this.id == 0){
                    return this.projects[this.projects.length - 1]
                }else{
                    return this.projects[this.id - 1]
                }
            },
            next() {
                if(this.id == this.projects.length - 1){
                    return this.projects[0]
                }else{
                    return this.projects[this.id + 1]
                }
            },
        },
    };
</script>

<style lang="scss">
    @import '~/assets/sass/views/projects.scss';
</style>
