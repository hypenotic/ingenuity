<template>		
	<div v-if="postInfo != null" class="single-blog-view">
        <app-banner :page="postInfo"></app-banner>
        
        <section class="blog-single-intro">

        </section>

        <div class="main-wrapper blog-wrapper">
            <aside id="left"> 
                    <span class="bolded-text">Author(s):</span><br><span v-html="postInfo.meta_box._post_authors" class="post-authors"></span><br>
            </aside>

            <section class="blog-entry blog-page" v-html="postInfo.content.rendered">
            </section>
            
        </div>

        <div class="prev-next-links">
            <router-link :to="'/news/'+ prev + '/' + previousPost" v-if="previousPost != null && prev != next">
            <div class="blog-nav__arrow blog-nav__arrow--prev">
                <p>&lt; Previous Post</p>
            </div>
            </router-link>
            <router-link :to="'/news/'+ next + '/' + nextPost" v-if="nextPost != null">
            <div class="blog-nav__arrow blog-nav__arrow--next">
                <p>Next Post &gt;</p>
            </div>
            </router-link>
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
            postID: this.$route.params.id,
            blogNum: null,
            pageData: null,
            prev: null,
            next: null
		}
	},
	filters: {
    },
    computed: {
        postInfo: function(){
            if (this.$store.state.blogList != null) {
                let counter = 0;
                for (let post of this.$store.state.blogList ) {
                    counter++;
                    this.blogNum = counter;
                    if (post.id == this.postID) {
                        console.log(post);
                        this.pageData = post;
                        return post;
                        break;
                    }
                }
            } else {
                return null;
            }
        },
        previousPost: function() {
            const current = this.blogNum;
            const max = this.$store.state.blogList.length;
            if (current == 1) {
                let list = this.$store.state.blogList;
                console.log(list, max);
                let item = list[max-1];
                console.log('hey', item);
                this.prev = item.id;
                return item.slug;
            } else {
                let previous = current - 1;
                let indexNum = previous - 1;
                let list = this.$store.state.blogList;
                let item = list[indexNum];
                console.log('hiya', item);
                this.prev = item.id;
                return item.slug;
            }
        },
        nextPost: function() {
            const current = this.blogNum;
            const max = this.$store.state.blogList.length;
            if (current == max) {
                let list = this.$store.state.blogList;
                // console.log(list, max);
                let item = list[0];
                this.next = item.id;
                return item.slug;
                // return null;
            } else {
                let next = current + 1;
                let indexNum = next - 1;
                let list = this.$store.state.blogList;
                let item = list[indexNum];
                // console.log(item);
                this.next = item.id;
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

<style lang="scss" scoped>
    @import '../../../sass/variables.scss';
    @import '../../../sass/views/news.scss';
</style>