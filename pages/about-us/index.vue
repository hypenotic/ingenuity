<template>
    <div>
        <app-nav v-bind:menu-links="menuLinks"></app-nav>
        <div v-if="pageInfo != null">
            <app-banner :page="pageInfo"></app-banner>
            <div class="main-wrapper">
                <div class="main-content standard-center">
                    <div v-html="pageInfo.content.rendered"></div>
                </div>
            </div>
        </div>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import axios from 'axios';
    // import moment from 'moment';
    import { mapState } from 'vuex';
    import Nav from '~/components/Nav.vue';
    import Banner from '~/components/Banner.vue';
    import Footer from '~/components/Footer.vue';
    export default {
        fetch ({store}){
            return store.dispatch('dummy');
        },
        head () {
            console.log(this.pageInfo.meta_box._page_hero_image);
            return {
                meta: [
                    { hid: 'og:image', property: 'og:image', content: this.pageInfo.meta_box._page_hero_image },
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
                errors: [],
                menuLinks: [],
                fullPath: this.$route.fullPath,
                slug: this.$route.path
            }
        },
        computed: {
            pageInfo: function(){
                if (this.$store.state.pageList != null) {
                    for (let page of this.$store.state.pageList ) {
                        if (page.slug == 'about-us') {
                            console.log(page);
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

    .two-column {
        margin: 60px -25% 60px -20%;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
        @media #{$bp-small} {
            margin: 40px -5%;
        }
        @media #{$bp-med} {
            margin: 40px -5%;
        }
        @media #{$mobile-landscape} {
            margin: 40px -5%;
        }
        @media #{$bp-large} {
            flex-direction: row;
        }
    }

    .two-column__half {
        @media #{$bp-large} {
            width: 50%;
        }
        @media #{$bp-small} {
        }
    }

    .services-testimonial {
        padding: 0 70px 25px 0;
        @media #{$bp-small} {
            padding: 25px 15px 50px;
        }
        @media #{$bp-med} {
            padding: 25px;
        }
        @media #{$mobile-landscape} {
            padding: 0 15px 25px;
        }
        @media #{$bp-large} {
            width: 60%;
        }
    }

    .services-cta {
        background: $yellow;
        padding: 40px;
        @media #{$bp-small} {
            padding: 30px;
        }
        @media #{$bp-large} {
            width: 40%;
        }
        @media #{$mobile-landscape} {
            padding: 30px;
        }
    }


    /*
    .services-testimonial {
    blockquote {
    margin: 0;
    font-style: italic;
    font-size: modular-scale(1, 1.5rem);
    line-height: modular-scale(1, 1.6rem);
    font-weight: 400;
    font-family: $p-font;
    p {
    font-style: italic;
    font-size: modular-scale(1, 1.5rem);
    line-height: modular-scale(1, 1.6rem);
    font-weight: 400;
    font-family: $p-font;
    text-transform: none;
    }
    @media #{$bp-small} {
    font-size: modular-scale(1, 1.1rem);
    line-height: modular-scale(1, 1.1rem);
    }
    &:before {
    content: '“';
    position: absolute;
    margin-left: -.4em;
    font-size: modular-scale(4, 1.6rem);
    font-family: $main-headings;
    color: rgba(0,0,0,0.2);
    }

    &:after {
    content: '”';
    font-family: $main-headings;
    color: rgba(0,0,0,0.2);
    }
    }
    h4 {
    margin: 0;
    margin-top: 25px;
    text-align: right;
    text-transform: uppercase;
    }
    h5 {
    text-align: right;
    margin: 0;
    }
    p.testimonial__caption {
    font-family: $lite-headings;
    padding-top: 5px;
    padding-left: 100px;
    text-align: right;
    text-transform: uppercase;
    font-size: modular-scale(0, 0.9rem);
    line-height: modular-scale(0, 1rem);
    font-size: 14px;
    line-height: 16px;
    }
    }
    */

    #space-uptop {
        padding-top: 15px;
        margin-bottom: 0;
    }

    /*
    .services-cta {
    p {
    font-family: $lite-headings;
    font-size: modular-scale(2, 1.3rem);
    line-height: modular-scale(2, 1.3rem);
    @media #{$bp-small} {
    font-size: modular-scale(1, 1.3rem);
    line-height: modular-scale(1, 1.3rem);
    }
    @media #{$mobile-landscape} {
    font-size: modular-scale(1, 1.3rem);
    line-height: modular-scale(1, 1.3rem);
    }
    }
    }
    */

    .services-cta__btn {
        font-family: $lite-headings;
        text-transform: uppercase;
        background-color: $black;
        color: $white;
        border: none;
        font-weight: bold;
        padding: 15px 30px;
        height: 60px;
        font-size: modular-scale(0, 1.1rem);
        line-height: modular-scale(0, 1.1rem);
        border: 1px solid $black;
        // transition: all 0.2s;
        // letter-spacing: 1px;
        &:hover {
            border: 2px solid $black;
            color: $black;
            background-color: $white;
            // font-weight: 400;
        }
    }

</style>