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
                    <div :style="'background-image: url('+member.meta_box._team_extra_image+');background-size: cover;background-position: center center;'" class="knolling-image"></div>
                    <div class="hgroup">
                        <h3 class="team__name" v-html="member.title.rendered">
                        </h3>
                        <span class="team__creds" v-html="member.meta_box._team_creds"></span>
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
export default {
    components: {
        appBanner: Banner
    },
	data() {
		return {
			errors: [],
			fullPath: this.$route.fullPath,
			slug: this.$route.path
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

.leadership-banner,
.foundation-banner {
	background: $yellow;
	text-align: center;
	padding: 24px 0;
	position: relative;
	margin-bottom: 30px;
	&:after {
		content:'';
		position: absolute;
		top: 100%;
		left: 50%;
		margin-left: -30px;
		width: 0;
		height: 0;
		border-top: solid 30px $yellow;
		border-left: solid 30px transparent;
		border-right: solid 30px transparent;
    }
    h3 {
        margin: 0;
    }
}

.team__container--leadership {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    >div {
        width: 33.33%;
        .knolling-image {
            width: 100%;
            height: 300px;
        }
    }
    h3,h4 {
        margin: 0;
    }
    h3 {
        font-size: 40px;
    }
}

.team__container--foundation {
    h3,h4 {
        margin: 0;
    }
}

.team__name,
.team__creds {
    display: inline-block;
}

.team__creds {
    font-size: 12px;
    font-family: $main-headings;
}

</style>