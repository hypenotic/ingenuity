<template>		
	<div v-if="postInfo != null">
        <app-banner :page="postInfo"></app-banner>
        
        <section class="blog-single-intro">

        </section>

        <div class="main-wrapper blog-wrapper">
            <aside id="left"> 
                <p>

                    <span class="bolded-text">Author(s):</span><br>
                    <?php if ($authors) { ?>
                        <?php coauthors_posts_links(', ',', '); ?>, <?php echo $authors; ?>
                    <?php } else { ?>
                        <?php coauthors_posts_links(', '); ?>
                    <?php } ?>
                    
                </p>
                <!-- <p><span class="bolded-text">Date:</span><br><?php //the_time( 'M j, Y' ); ?> </p> -->
                <p class="sidebar-cats"><span class="bolded-text">Category:</span><?php echo get_the_category_list(); ?></p>
                <?php if (has_tag()) { ?>
                    <p class="sidebar-tags"><span class="bolded-text">Tags:</span><br><?php the_tags(); ?> </p>
                <?php }  else {} ?>
            </aside>


            <section class="blog-entry blog-page">
                <?php the_content(); ?>
            </section>
            
            <div class="prev-next-links">
            <?php
            $prev_post = get_previous_post();
            if (!empty( $prev_post )): ?>
                <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                <div class="blog-nav__arrow blog-nav__arrow--prev">
                    <p>Previous Post</p>
                </div>
                </a>
            <?php endif; ?>
            <?php
            $next_post = get_next_post();
            if (!empty( $next_post )): ?>
                <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                <div class="blog-nav__arrow blog-nav__arrow--next">
                    <p>Next Post</p>
                </div>
                </a>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <div v-else></div>
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
            slug: this.$route.path,
            postID: this.$route.params.id
		}
	},
	filters: {
    },
    computed: {
        postInfo: function(){
            if (this.$store.state.blogList != null) {
                for (let post of this.$store.state.blogList ) {
                    if (post.id == this.postID) {
                        console.log(post);
                        return post;
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


// PROJECTs Landing Page
.projects__panel-container {
	width: 100%;
	// margin-top: 50px;
	position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
	flex-direction: column;	
}

.projects__panel-link {
	width: 100%;
	// transition: all 0.2s;
	&:hover .projects__panel-wrap {
		.color-overlay {
			opacity: 0;		
		}
		.projects__panel-img { 
			filter: grayscale(0.8);
			background-blend-mode: normal;
			filter: brightness(0.7);
		}
	}
}

.projects__panel-wrap {
	h2 {
		z-index: 35;
	}
	position: relative;
	height: 300px;
	@media #{$bp-small} {
	    height: 150px;
	}
	@media #{$bp-med} {
	    height: 200px;
	}
	@media #{$bp-large} {
	    height: 300px;
	}
	.color-overlay {
		width: 100%;
		height: 100%;
		background-color: rgba(252, 216, 56, 0.7);
		filter: brightness(70%);
		position: relative;
		top: 0;
		left: 0;
		// transition: all 0.2s;
		z-index: 30;
	}
	.projects__panel-img {
	width: 100%;
	height: 100%;
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center center;
	position: absolute;
	top: 0;
	left: 0;
	// transition: all 0.2s;
	padding: 25px;
	filter: brightness(80%);
	filter: grayscale(80%);
	background-blend-mode: hard-light;
    display: flex;
    align-items: center;
    justify-content: center;
	z-index: 29;
	}
}

</style>