<template>
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
            
            </div>
        </div>
    </div>
    <div v-else></div>
</template>

<script>
import axios from 'axios';
// import moment from 'moment';
import { mapState } from 'vuex';
import Banner from '../../components/Banner.vue';
export default {
    components: {
        appBanner: Banner
    },
	data() {
		return {
			errors: [],
			fullPath: this.$route.fullPath,
			post: null,
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
            } else {
				console.log('Maintenance');
                pageSlug = 'maintenance';
			}

            if (this.$store.state.serviceList != null) {
                for (let page of this.$store.state.serviceList ) {
                    console.log('X:', pageSlug);
                    if (page.slug == pageSlug) {
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
	created() {

	},
};
</script>

<style lang="scss" scoped>
	@import '../../sass/variables.scss';
	@import '../../sass/views/services.scss';
</style>