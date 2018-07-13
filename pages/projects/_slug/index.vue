<template>
    <div>  
        <app-nav></app-nav>
        <app-banner :page="projectInfo"></app-banner>
        <div class="diagonal-wrapper diagonal-svg__wrapper">
            <svg class="diagonal-svg">
                <line id="the-line" x1="100%" y1="110%" x2="30%" y2="-10%"/>
            </svg>
            <div class="main-wrapper blog-wrapper">
                <aside id="left"> 
                    <p>
                        <span class="stats_label">Client</span>:<br>
                        <span v-html="projectInfo.meta_box._stats_client"></span>
                    </p>
                    <p>
                        <span class="stats_label">SF</span>:<br>
                        <span v-html="projectInfo.meta_box._stats_sf"></span>
                    </p>
                    <p>
                        <span class="stats_label">Duration</span>:<br>
                        <span v-html="projectInfo.meta_box._stats_duration"></span>
                    </p>
                    <p>
                        <span class="stats_label">Location</span>:<br>
                        <span v-html="projectInfo.meta_box._stats_location"></span>
                    </p>
                </aside>
                <section v-html="projectInfo.content.rendered" class="blog-entry"> </section>
            </div>
            <section class="project__video">
            </section>
            <section v-if="projectInfo.meta_box._project__quote != ''" class="project__testimonial">
                <blockquote class="testimonial__quotation" v-html="projectInfo.meta_box._project__quote"></blockquote>
                <div class="testimonial__creds">
                    <h4 v-html="projectInfo.meta_box._project__quote_name"></h4>
                    <h5 v-html="projectInfo.meta_box._project__quote_title"></h5>
                </div>  
            </section>
            <div class="main-wrapper">
                <section class="project__gallery">
                </section> 
                <div class="project-nav">
                    <router-link :to="previousProject" v-if="previousProject != null">
                        <div class="project-nav__arrow project-nav__arrow--prev">
                            <p v-html="'&lt; ' + this.prev"></p>
                        </div>
                    </router-link>
                    <router-link :to="nextProject" v-if="nextProject != null">
                        <div class="project-nav__arrow project-nav__arrow--next">
                            <p v-html="this.next+' &gt;'"></p>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
        <app-footer></app-footer>
    </div>
</template>

<script>
import axios from 'axios';
// import moment from 'moment';
import { mapState } from 'vuex'
import Banner from '~/components/Banner.vue';
import Nav from '~/components/Nav.vue';
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
        console.log(this.projectInfo.meta_box._banner_image[0].full_url);
        return {
            meta: [
                { hid: 'og:image', property: 'og:image', content: this.projectInfo.meta_box._banner_image[0].full_url },
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
            errors: [],
            fullPath: this.$route.fullPath,
            slug: this.$route.params.slug,
            data: null,
            projectNum: null,
            prev: '',
            next: '',
            pageData: null
        }
    },
    filters: {
    },
    computed: {
        projectInfo: function(){
            if (this.$store.state.projectList != null) {
                let counter = 0;
                for (let page of this.$store.state.projectList ) {
                    counter++;
                    this.projectNum = counter;
                    if (page.slug == this.slug) {
                        console.log(page);
                        // this.data = page;
                        this.pageData = page;
                        return page;
                        break;
                    }
                }
            } else {
                return null;
            }
        },
        previousProject: function() {
            const current = this.projectNum;
            const max = this.$store.state.projectList.length;
            if (current == 1) {
                let list = this.$store.state.projectList;
                // console.log(list, max);
                let item = list[max-1];
                // console.log('hey', item)
                this.prev = item.title.rendered;
                return item.slug;
            } else {
                let previous = current - 1;
                let indexNum = previous - 1;
                let list = this.$store.state.projectList;
                let item = list[indexNum];
                // console.log(item);
                this.prev = item.title.rendered;
                return item.slug;
            }
        },
        nextProject: function() {
            const current = this.projectNum;
            const max = this.$store.state.projectList.length;
            if (current == max) {
                let list = this.$store.state.projectList;
                // console.log(list, max);
                let item = list[0];
                this.next = item.title.rendered;
                return item.slug;
                // return null;
            } else {
                let next = current + 1;
                let indexNum = next - 1;
                let list = this.$store.state.projectList;
                let item = list[indexNum];
                // console.log(item);
                this.next = item.title.rendered;
                return item.slug;
            }
        },
    },
	methods: {
	},
	created() {
	},
};
</script>

<style lang="scss">
    @import '~/assets/sass/views/projects.scss';
</style>
