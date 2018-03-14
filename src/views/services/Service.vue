<template>
	<div v-if="pageInfo != null">
        <app-banner :page="pageInfo"></app-banner>
        <div class="main-wrapper">
            <div class="main-content standard-center">
                <div v-html="pageInfo.content.rendered"></div>
                <div class="two-column">
                    <div class="two-column__half services-testimonial">
                        <blockquote v-html="pageInfo.meta_box._service_quote_text"></blockquote>
                        <h4 v-html="pageInfo.meta_box._service_quote_source"></h4>
                        <h5 v-html="pageInfo.meta_box._service_quote_source_title"></h5>
                        <p v-if="pageInfo.meta_box._service_quote_caption != ''" v-html="pageInfo.meta_box._service_quote_caption" class="testimonial__caption"></p>
                    </div>
                    <div class="two-column__half services-cta">
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
		margin: 60px -25% 60px -20%;
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
	@media #{$bp-large} {
		padding: 0 70px 25px 0;
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


.services-testimonial {
	blockquote {
		margin: 0;
		font-style: italic;
		font-size: modular-scale(1, 1.5rem);
		line-height: modular-scale(1, 1.6rem);
		font-weight: 400;
		font-family: $p-font;
		font-size: 32px;
		line-height: 34px;
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
		    font-size: 90px;
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
		font-size: 32px;
		line-height: 36px;
	}
	h5 {
		text-align: right;
		margin: 0;
		font-size: 13px;
		line-height: 13px;
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
		margin: 0;
	}
}

#space-uptop {
	padding-top: 15px;
	margin-bottom: 0;
}

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