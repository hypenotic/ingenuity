<template>
    <div>  
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

            <section class="project__testimonial">
                <blockquote class="testimonial__quotation">
                    <?php echo $quotation; ?>
                </blockquote>
                <div class="testimonial__creds">
                <h4><?php echo $src; ?></h4>
                <h5><?php echo $srctitle; ?></h5>
                </div>  
            </section>
      
            
            <div class="main-wrapper">
                
                <section class="project__gallery">
                </section> 
                
                
                <div class="project-nav">
                
                    <?php
                    $prev_post = get_previous_post();
                    if (!empty( $prev_post )): ?>
                        <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                        <div class="project-nav__arrow project-nav__arrow--prev">
                            <p>&lt; <?php echo $prev_post->post_title; ?></p>
                        </div>
                        </a>
                    <?php endif; ?>
                    <?php
                    $next_post = get_next_post();
                    if (!empty( $next_post )): ?>
                        <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                        <div class="project-nav__arrow project-nav__arrow--next">
                            <p><?php echo $next_post->post_title; ?> &gt;</p>
                        </div>
                        </a>
                    <?php endif; ?>
                    
                </div>
                
            </div>

        </div>

    </div>
</template>

<script>
import axios from 'axios';
// import moment from 'moment';
import { mapState } from 'vuex'
import Banner from '../../../components/Banner.vue';
export default {
    components: {
        appBanner: Banner
    },
	data() {
		return {
			errors: [],
			fullPath: this.$route.fullPath,
			slug: this.$route.params.slug
		}
	},
	filters: {
    },
    computed: {
        projectInfo: function(){
            if (this.$store.state.projectList != null) {
                for (let page of this.$store.state.projectList ) {
                    if (page.slug == this.slug) {
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

@import '../../../sass/variables.scss';

aside {
	@media #{$bp-small} {
		padding-top: 50px;
		padding-bottom: 25px;
		display: block;
		border-right: none;
		border-bottom: 4px solid rgba(0, 0, 0, 0.9);
    }
	@media #{$bp-med} {
		padding-top: 50px;
		padding-bottom: 25px;
		display: block;
		border-right: none;
		border-bottom: 4px solid rgba(0, 0, 0, 0.9);
    }
    @media #{$bp-large} {
		// @include span-columns(2);
		// @include shift(0);
		height: 100%;
		margin-top: 50px;
		padding-top: 5px;
		padding-right: 30px;
		text-align: right;
		border-right: 4px solid rgba(0, 0, 0, 0.8);
		border-bottom: none;
    }
}

.main-wrapper {
    aside { 
        width: 15%;
        display: inline-block;
    }
    .blog-entry {
        display: inline-block;
        width: 80%;
        vertical-align: top;
    }
}

</style>
