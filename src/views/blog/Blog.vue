<template>		
	<div v-if="pageInfo != null">
        <app-banner :page="pageInfo"></app-banner>
		<div class="main-wrapper"> 
			<section class="main-content standard-center"> 
				<div class="blog-single-post wow fadeIn" v-for="post in this.$store.state.blogList" :key="post.id">
					<router-link :to="'/news/' + post.id + '/' + post.slug" >
						<h3 class="blog-single__title" v-html="post.title.rendered"></h3>
					</router-link>
					<img :src="post.meta_box._post_hero_image" :alt="post.title.rendered">
					<p v-html="post.excerpt.rendered"></p>
					<router-link :to="'/news/' + post.id + '/' + post.slug" class="single-post__read-more">Read more...</router-link>
				</div>
				<!-- <p class="pagination-links">pagination links</p> -->
			</section> <!-- ARTICLE WRAP ends here -->
		</div> <!-- contentWrapper ends here -->
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
        title: 'Ingenuity | News',
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
                    if (page.slug == 'news') {
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
@import '../../sass/views/news.scss';


</style>