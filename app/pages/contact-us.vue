<template>
    <div>
        <app-map></app-map>
        <div class="contact-container" id="content-start">
            <div class="contact__single wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.5s" v-for="contact in contacts" :key="contact.id">
                <div class="contact__single__copy">
                    <h4 v-html="contact.title.rendered"></h4>
                    <div v-html="contact.content.rendered"></div>
                </div>
                <div class="contact__single__buttons">
                    <a :href="'tel:'+contact.meta_box._contact_phone">
                        <button v-html="contact.meta_box._contact_phone_btn"></button>
                    </a>
                    <a :href="'mailto:'+contact.meta_box._contact_email">
                        <h3><span class="contact-border" v-html="contact.meta_box._contact_email_btn"></span></h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { helper } from '~/plugins/helper.js';
    
    import Map from '~/components/Map.vue'
    import Footer from '~/components/Footer.vue';
    import Nav from '~/components/Nav.vue';
        
    export default {
        async fetch ({store}) {
            await store.dispatch('apiMenu')
            await store.dispatch('apiContacts')
            await store.dispatch('apiBlogs')
        },
        head () {
            return {
                title: "Contact Us",
                meta: [
                    { hid: 'og:title', property: 'og:title', content: "Contact Us"},
                    { hid: 'og:url', property: 'og:url', content: this.$store.state.siteUrl + "" + this.$route.path},
                    { hid: 'og:description', property: 'og:description', content: 'A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot.' },
                    { hid: 'description', name: 'description', content: 'A Design Build & General Contracting team that believes in happiness, craft, productivity, detail, and creativity in each square foot.' }
                ]
            }  
        },
        components: {
            appMap: Map,
            appFooter: Footer,
            appNav: Nav,
        },
        computed: {
            contacts(){
                return this.$store.getters.getContacts
            }
        }
    }
</script>

<style lang="scss">

    @import '~/assets/sass/base.scss';
    @import '~/assets/sass/views/contact.scss';

</style>