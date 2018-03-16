<template>		
	<div v-if="pageInfo != null">
        <app-banner :page="pageInfo"></app-banner>
        <div class="projects__panel-container">
                <router-link :to="'/projects/' + project.slug" v-for="project in this.$store.state.projectList" :key="project.id" class="projects__panel-link">
					<div class="projects__panel-wrap">
						<h2 v-html="project.title.rendered"></h2>
						<div class="color-overlay">
						</div>
						<figure class="projects__panel-img" :style="'background-color: rgba(252, 216, 56, 0.6); background-image: url(' + project.meta_box._banner_image[0].full_url + ');'">
						</figure>
					</div>
                </router-link>
		</div>
    </div>
    <div v-else></div>
</template>

<script>
import axios from 'axios';
import { mapState } from 'vuex'
import Banner from '../../components/Banner.vue';

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
                    if (page.slug == 'projects') {
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

@import '../../sass/variables.scss';


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