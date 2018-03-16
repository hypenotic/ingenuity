<template>
    <div v-if="pageInfo != null">
        <app-banner :page="pageInfo"></app-banner>

		<div class="leadership-banner">
            <h3>Meet the leadership</h3>
        </div>

        <div class="main-wrapper"> 
            <section class="main-content standard-center" v-html="pageInfo.content.rendered"> 
            </section>
        </div>

        <div class="team__container--leadership">
            <div v-for="member in this.$store.state.teamList" :key="member.id" v-if="member.meta_box._team_section == 'leadership'">
                <figure class="team__single team__single--leadership" style="background-image: url('');background-size: cover;background-position: center center;">
                    <div class="team-overlay"></div>
                    <div class="portrait">
                        <img :src="member._embedded['wp:featuredmedia'][0].source_url" alt="portrait">
                    </div>
                    <div class="hgroup">
                        <h3 class="team__name" v-html="member.title.rendered">
                        </h3>
                        <span class="team__creds" v-html="member.meta_box._team_creds"></span>
                        <h4 class="team__title" v-html="member.meta_box._team_job_title"></h4>
                    </div>
                    <div class="knolling--">
                        <img :src="member.meta_box._team_extra_image" alt="portrait">
                    </div>
                    <!-- <div :style="'background-image: url('+member.meta_box._team_extra_image+');background-size: cover;background-position: center center;'" class="knolling-image"></div> -->
                </figure>
                <div class="drop-down-panel">
                    <div class="push__longbio animated fadeIn">
                    </div>
                    <button class="close-push-panel">CLOSE</button>
                </div>
            </div>
        </div>

        <div class="foundation-banner">
            <h3>Meet the foundation</h3>
        </div>

        <div class="main-wrapper"> 
            <section class="main-content standard-center"> 
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem alias sequi error voluptatum iure possimus facere impedit. Explicabo provident dicta consequuntur tenetur repellat voluptate libero, tempore officia doloremque accusantium error.</p>
            </section>
        </div>

        <div class="team__container--foundation">
            <div v-for="member in this.$store.state.teamList" :key="member.id" v-if="member.meta_box._team_section == 'foundation'">
                <figure class="team__single team__single--leadership" style="background-image: url('');background-size: cover;background-position: center center;">
                    <div class="team-overlay"></div>
                    <div class="portrait">
                        <img :src="member._embedded['wp:featuredmedia'][0].source_url" alt="portrait">
                    </div>
                    <div class="hgroup">
                        <h3 class="team__name" v-html="member.title.rendered">
                        </h3>
                        <p class="team__creds" v-html="member.meta_box._team_creds"></p>
                        <h4 class="team__title" v-html="member.meta_box._team_job_title"></h4>
                    </div>
                </figure>
                <div class="drop-down-panel">
                    <div class="push__longbio animated fadeIn">
                    </div>
                    <button class="close-push-panel">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
// import moment from 'moment';
import { mapState } from 'vuex';
import Banner from '../components/Banner.vue';

function html2text(html) {
    var tag = document.createElement('div');
    tag.innerHTML = html;
    
    return tag.innerText;
}

export default {
    metaInfo () {
      return {
        title: this.pageData.title.rendered,
        meta: [
            { name: 'description', content: html2text(this.pageData.excerpt.rendered) }
        ]
      }
    },
    components: {
        appBanner: Banner
    },
	data() {
		return {
			errors: [],
			fullPath: this.$route.fullPath,
            slug: this.$route.path,
            pageData: null
		}
	},
	filters: {
    },
    computed: {
        pageInfo: function(){
            if (this.$store.state.pageList != null) {
                for (let page of this.$store.state.pageList ) {
                    if (page.slug == 'the-team') {
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
	methods: {
	},
	created() {
	},
};
</script>

<style lang="scss" scoped>
    @import '../sass/variables.scss';
    @import '../sass/views/team.scss';
</style>