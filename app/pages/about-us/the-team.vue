<template>
    <div class="team-panels">
        <app-banner :page="page"></app-banner>
        <div class="leadership-banner">
            <h3>Meet the leadership</h3>
        </div>
        
        <div class="main-wrapper"> 
            <section class="main-content standard-center" v-html="page.content.rendered"> 
            </section>
        </div>
        
        <div class="team__container--leadership team__container">
            <div v-for="member in team.filter(m=>m.meta_box._team_section=='leadership').sort((a,b)=>a.menu_order - b.menu_order)" :key="member.id">
                <!-- <tm-banner :tm="member" @click="dropDown(member.id)"></tm-banner>
                <tm-section :tm="member"></tm-section> -->
                <a
                :href="'ingenuity' + route + '#member-'+member.id"
                class="team__single team__single--leadership"
                :class="{'team__single--open': openMember == member.id}"
                :style="'background-image: url('+member.meta_box._team_styled_image +');'"
                @click="toggleOpenMember(member.id)"
                :id="'member-'+member.id">
                    <div class="team-overlay"></div>
                    <div class="hgroup">
                        <h3 class="team__name" v-html="member.title.rendered"></h3>
                        <span class="team__creds" v-html="member.meta_box._team_creds"></span>
                        <h4 class="team__title" v-html="member.meta_box._team_job_title"></h4>
                    </div>
                </a>
                <!-- <a v-if="openMember == member.id" :href="'#member-'+member.id" class="closebar" @click="openMember = null">
                    <div class="hgroup">
                        <h3 class="team__name" v-html="member.title.rendered"></h3>
                        <span class="team__creds" v-html="member.meta_box._team_creds"></span>
                    </div>
                </a> -->
                <div v-if="openMember == member.id" class="drop-down-panel drop-down-panel--leader" :id="member.id">
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
                    <div class="button__container"><a :href="'#member-'+member.id" class="close-push-panel" @click="openMember = null">CLOSE</a></div>
                </div>
            </div>
        </div>
        
        <div class="foundation-banner">
            <h3>Meet the foundation</h3>
        </div>
        <div class="team__container team__container--foundation">
            <div v-for="member in team.filter(m=>m.meta_box._team_section=='foundation').sort((a,b)=>a.menu_order - b.menu_order)" :key="member.id">
                <a
                :href="'ingenuity' + route + '#member-'+member.id"
                class="team__single team__single--foundation"
                :class="{'team__single--open': openMember == member.id}"
                :style="'background-image: url('+member.meta_box._team_styled_image +');'"
                @click="toggleOpenMember(member.id)"
                :id="'member-'+member.id">
                    <div class="team-overlay"></div>
                    <div class="hgroup">
                        <h3 class="team__name" v-html="member.title.rendered"></h3>
                        <span class="team__creds" v-html="member.meta_box._team_creds"></span>
                        <h4 class="team__title" v-html="member.meta_box._team_job_title"></h4>
                    </div>
                </a>
                <div v-if="openMember == member.id" class="drop-down-panel drop-down-panel--foundation" :id="member.id">
                    <!-- <img :src="member.meta_box._team_extra_image" alt="" class="knolling-pic"> -->
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
                    <div class="button__container"><a :href="'#member-'+member.id" class="close-push-panel" @click="openMember = null">CLOSE</a></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { helper } from '~/plugins/helper.js';

    import Nav from '~/components/Nav.vue';
    import Banner from '~/components/Banner.vue';
    import Footer from '~/components/Footer.vue';
    import TeamMemberBanner from '~/components/TeamMemberBanner.vue';
    import TeamMemberSection from '~/components/TeamMemberSection.vue';

    export default {
        async fetch ({store}) {
            await store.dispatch('apiPages')
            await store.dispatch('apiTeam')
            await store.dispatch('apiMenu')
            await store.dispatch('apiBlogs')
        },
        head () {
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
            tmBanner: TeamMemberBanner,
            tmSection: TeamMemberSection,
        },
        data() {
            return {
                menuLinks: [],
                openMember: null,
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
            },
            route(){
                return this.$route.path
            }
        },
        methods: {
            toggleOpenMember: function(id){
                if(this.openMember == id){
                    this.openMember = null;
                }else{
                    this.openMember = id;
                }
            },
            scrollTo: function(element, to, duration) {
                var start = element.getBoundingClientRect().top,
                    change = to - start,
                    currentTime = 0,
                    increment = 20;

                Math.easeInOutQuad = function (t, b, c, d) {
                    //t = current time
                    //b = start value
                    //c = change in value
                    //d = duration
                    t /= d/2;
                    if (t < 1) return c/2*t*t + b;
                    t--;
                    return -c/2 * (t*(t-2) - 1) + b;
                };

                var animateScroll = function(){        
                    currentTime += increment;
                    var val = Math.easeInOutQuad(currentTime, start, change, duration);
                    element.scrollTop = val;
                    if(currentTime < duration) {
                        setTimeout(animateScroll, increment);
                    }
                };
                animateScroll();
            },
            closeAll: function(ID) {
                var slides = document.getElementsByClassName("drop-down-panel");
                for(var i = 0; i < slides.length; i++) {
                    slides[i].classList.remove("open-dropdown");
                }
                let select = document.getElementById(ID);
                // this.scrollTo(document.documentElement, select.offsetTop+300, 500)
            },
            
            dropDown: function(ID) {
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

                    // this.scrollTo(document.documentElement, select.getBoundingClientRect().top+(document.documentElement.clientHeight), 500)
                }
            },
        },
    };
</script>

<style lang="scss">
    @import '~/assets/sass/base.scss';
    @import '~/assets/sass/views/team.scss';
</style>