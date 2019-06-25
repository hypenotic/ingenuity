<template>
    <div>
        <app-nav :menu-links="menuLinks"></app-nav>
        <div v-if="page != null" class="team-panels">
            <app-banner :page="page"></app-banner>
            <div class="leadership-banner">
                <h3>Meet the leadership</h3>
            </div>
            
            <div class="main-wrapper"> 
                <section class="main-content standard-center" v-html="page.content.rendered"> 
                </section>
            </div>
            
            <div class="team__container--leadership team__container">
                <div v-for="member in team" :key="member.id" v-if="member.meta_box._team_section == 'leadership'">
                    <figure class="team__single team__single--leadership" :style="'background-image: url('+member.meta_box._team_styled_image +');background-position: top right;background-repeat:no-repeat;'" v-on:click="dropDownLeader(member.id)" :id="'member-'+member.id">
                        <div class="team-overlay"></div>
                        <div class="hgroup">
                            <h3 class="team__name" v-html="member.title.rendered"></h3>
                            <span class="team__creds" v-html="member.meta_box._team_creds"></span>
                            <h4 class="team__title" v-html="member.meta_box._team_job_title"></h4>
                        </div>
                    </figure>
                    <div class="drop-down-panel drop-down-panel--leader" :id="member.id">
                        <img :src="member.meta_box._team_extra_image" alt="" class="knolling-pic">
                        <div class="push__longbio animated fadeIn">
                            <div class="split">
                                <div class="split--content" v-html="member.content.rendered"></div>
                                <div class="split--image">
                                    <video class="team-vid" :id="'member-vid-'+member.id" loop muted autoplay>
                                        <source :src="member.meta_box._team_movie" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="button__container"><button class="close-push-panel" v-on:click="closeAll(member.id)">CLOSE</button></div>
                    </div>
                </div>
            </div>
            <div class="foundation-banner">
                <h3>Meet the foundation</h3>
            </div>
            <div class="team__container team__container--foundation">
                <div v-for="member in team" :key="member.id" v-if="member.meta_box._team_section == 'foundation'">
                    <figure class="team__single team__single--foundation" :style="'background-image: url('+member.meta_box._team_styled_image +');background-position: top right;background-repeat:no-repeat;'" v-on:click="dropDownFoundation(member.id)" :id="'member-'+member.id">
                        <div class="team-overlay"></div>
                        <div class="hgroup">
                            <h3 class="team__name" v-html="member.title.rendered">
                            </h3>
                            <span class="team__creds" v-html="member.meta_box._team_creds"></span>
                            <h4 class="team__title" v-html="member.meta_box._team_job_title"></h4>
                        </div>
                        <!-- member.meta_box._team_extra_image -->
                        <!-- member._embedded['wp:featuredmedia'][0].source_url -->
                    </figure>
                    <div class="drop-down-panel drop-down-panel--foundation" :id="member.id">
                        <div class="push__longbio animated fadeIn">
                            <div class="split">
                                <div class="split--content" v-html="member.content.rendered"></div>
                                <div class="split--image">
                                    <video id="video1" autoplay loop muted>
                                        <source :src="member.meta_box._team_movie" type="video/mp4" />
                                    </video>
                                    <div class="base-image">
                                        <img :src="member._embedded['wp:featuredmedia'][0].source_url" alt="">
                                        <span class="pulse" v-if="member.meta_box._team_movie !=''">
                                            <i class="fas fa-play"></i>
                                        </span>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="button__container"><button class="close-push-panel" v-on:click="closeAllFoundation(member.id)">CLOSE</button></div>
                    </div>
                </div>
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
            await store.dispatch('apiTeam')
            await store.dispatch('apiMenu')
        },
        head () {
            console.log(this.page.meta_box._page_hero_image);
            return {
                title: "The Team",
                meta: [
                    { hid: 'og:image', property: 'og:image', content: this.page.meta_box._page_hero_image },
                    { hid: 'og:title', property: 'og:title', content: "The Team" },
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
                return this.$store.getters.getPages.filter(el => el.slug == 'the-team' )[0]
            },
            team () {
                return this.$store.getters.getTeam
            }
        },
        methods: {
            closeAll: function(ID) {
                function scrollTo(element, to, duration) {
                    var start = element.scrollTop,
                        change = to - start,
                        currentTime = 0,
                        increment = 20;

                    var animateScroll = function(){        
                        currentTime += increment;
                        var val = Math.easeInOutQuad(currentTime, start, change, duration);
                        element.scrollTop = val;
                        if(currentTime < duration) {
                            setTimeout(animateScroll, increment);
                        }
                    };
                    animateScroll();
                }

                //t = current time
                //b = start value
                //c = change in value
                //d = duration
                Math.easeInOutQuad = function (t, b, c, d) {
                    t /= d/2;
                    if (t < 1) return c/2*t*t + b;
                    t--;
                    return -c/2 * (t*(t-2) - 1) + b;
                };

                var slides = document.getElementsByClassName("drop-down-panel");
                for(var i = 0; i < slides.length; i++) {
                    slides[i].classList.remove("open-dropdown");
                }
                let select = document.getElementById(ID);
                scrollTo(document.documentElement, select.offsetTop+300, 500)
            },
            closeAllFoundation: function(ID) {
                function scrollTo(element, to, duration) {
                    var start = element.scrollTop,
                        change = to - start,
                        currentTime = 0,
                        increment = 20;

                    var animateScroll = function(){        
                        currentTime += increment;
                        var val = Math.easeInOutQuad(currentTime, start, change, duration);
                        element.scrollTop = val;
                        if(currentTime < duration) {
                            setTimeout(animateScroll, increment);
                        }
                    };
                    animateScroll();
                }

                //t = current time
                //b = start value
                //c = change in value
                //d = duration
                Math.easeInOutQuad = function (t, b, c, d) {
                    t /= d/2;
                    if (t < 1) return c/2*t*t + b;
                    t--;
                    return -c/2 * (t*(t-2) - 1) + b;
                };

                var slides = document.getElementsByClassName("drop-down-panel");
                for(var i = 0; i < slides.length; i++) {
                    slides[i].classList.remove("open-dropdown");
                }
                let select = document.getElementById(ID);
                scrollTo(document.documentElement, select.offsetTop+(document.documentElement.clientHeight*2.5), 500)
            },
            dropDownLeader: function(ID) {

                function scrollTo(element, to, duration) {
                    var start = element.scrollTop,
                        change = to - start,
                        currentTime = 0,
                        increment = 20;

                    var animateScroll = function(){        
                        currentTime += increment;
                        var val = Math.easeInOutQuad(currentTime, start, change, duration);
                        element.scrollTop = val;
                        if(currentTime < duration) {
                            setTimeout(animateScroll, increment);
                        }
                    };
                    animateScroll();
                }

                //t = current time
                //b = start value
                //c = change in value
                //d = duration
                Math.easeInOutQuad = function (t, b, c, d) {
                    t /= d/2;
                    if (t < 1) return c/2*t*t + b;
                    t--;
                    return -c/2 * (t*(t-2) - 1) + b;
                };

                let select = document.getElementById(ID);
                if (select.classList.contains('open-dropdown')) {
                    console.log('already open');
                    this.closeAll(ID);
                } else {
                    var slides = document.getElementsByClassName("drop-down-panel--leader");
                    for(var i = 0; i < slides.length; i++) {
                        slides[i].classList.remove("open-dropdown");
                    }

                    console.log('not open');
                    select.classList.add("open-dropdown");   

                    scrollTo(document.documentElement, select.offsetTop+(document.documentElement.clientHeight), 500)
                }


            },
            dropDownFoundation: function(ID) {

                function scrollTo(element, to, duration) {
                    var start = element.scrollTop,
                        change = to - start,
                        currentTime = 0,
                        increment = 20;

                    var animateScroll = function(){        
                        currentTime += increment;
                        var val = Math.easeInOutQuad(currentTime, start, change, duration);
                        element.scrollTop = val;
                        if(currentTime < duration) {
                            setTimeout(animateScroll, increment);
                        }
                    };
                    animateScroll();
                }

                //t = current time
                //b = start value
                //c = change in value
                //d = duration
                Math.easeInOutQuad = function (t, b, c, d) {
                    t /= d/2;
                    if (t < 1) return c/2*t*t + b;
                    t--;
                    return -c/2 * (t*(t-2) - 1) + b;
                };


                let select = document.getElementById(ID);
                if (select.classList.contains('open-dropdown')) {
                    console.log('already open');
                    this.closeAllFoundation(ID);
                } else {
                    var slides = document.getElementsByClassName("drop-down-panel");
                    for(var i = 0; i < slides.length; i++) {
                        slides[i].classList.remove("open-dropdown");
                    }
                    select.classList.add("open-dropdown");
                    scrollTo(document.documentElement, select.offsetTop+(document.documentElement.clientHeight*2.5), 500)
                }


            }
        },
    };
</script>

<style lang="scss">
    @import 'assets/sass/variables.scss';
    @import 'assets/sass/animate.scss';
    @import 'assets/sass/typography.scss';
    @import 'assets/sass/global.scss';
    @import 'assets/sass/views/team.scss';
</style>