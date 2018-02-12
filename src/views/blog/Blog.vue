<template>
<div class="view view--blog view--padding-top">
    <div>
        <div v-if="blogLoad==false">
            <transition name="fade">
                <div>
                    <div class="post-container" v-if="posts && posts.length > 0">
                        
                    </div>
                </div>
            </transition> 
        </div>
        <div v-else>
            <transition name="fade">
                <div class="uk-container uk-container-expand loading-animation loading-animation--page">
                      <svg width="80" height="60" viewBox="5 0 80 60"><path class="wave" fill="none" stroke="#000" stroke-width="4" stroke-linecap="round" d="M 0 37.5 c 7.684299348848887 0 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15" />
                        </svg>
                </div>
            </transition>  
        </div>
    </div>
    <app-footer></app-footer>
</div>
</template>

<script>
    import es6Promise from 'es6-promise';
    es6Promise.polyfill();
    import 'es6-promise/auto'
    import axios from 'axios';
    import Footer from '../../components/Footer.vue';
    export default {
        components: {
            // theContent: Content,
            appFooter: Footer,
        },
        props: ['pageList'],
        data: function () {
            return {
                selected: [],
                posts: [],
                errors: [],
                blogLoad: true
            }
        },
        watch: {
            blogLoad: function (newStatus) {
                this.blogLoad = newStatus;
            }
        },
        beforeMount() {
            this.getPosts();
        },
        methods: {
            getPage(pages) {
                for (let page of pages) {
                    console.log(page.slug);
                    if (page.slug == 'news') {
                        console.log('found it');
                        console.log(page);
                        this.selected = page;
                        break;
                    }
                }
            },
            getPosts() {
                var app = this;
                if (app.posts.length > 0) {
                    // setTimeout(function(){ app.blogLoad = false }, 1000);
                } else {
                    console.log('news - loading');
                    this.getPage(this.pageList);
                    axios.get('http://ingenuity.ca/wp-json/wp/v2/posts?_embed')
                    .then(function (response) {
                        console.log(response.data);
                        app.posts = response.data;
                        app.blogLoad = false;
                        // setTimeout(function(){ app.blogLoad = false }, 1000);
                    })
                    .catch(function (error) {
                    console.log(error)
                    })
                } 
            }
        },
        computed: {
        }
    }
</script>

<style lang="scss" scoped>
@import '../../sass/variables.scss';

.single-post {
    background: $main-accent;
    position:relative;
    &:hover {
        background: darken($main-accent,10);
    }
    h3 {
        margin-bottom: 0;
        font-size: 1.1rem;
        line-height: 1.5rem;
    }
    a span:nth-child(2) {
        font-size: 1.1rem;
        line-height: 1.1rem;
        color: $white;
        // display: block;
    }
    a span:nth-child(1) {
        display: block;
        color: rgba(255,255,255,0.5);
        margin-bottom: 16px;
        letter-spacing: 0.7px;
    }
    a {
        display: block;
        padding: 40px;
        &:hover {
            text-decoration: none;
        }
    }
}

.single-post:nth-child(even) {
    background: darken($main-accent, 5);
    &:hover {
        background: darken($main-accent,10);
    }
}

.post-container {
    max-width: 1300px;
    margin: 0 auto;
    @media #{$large-and-up} {
        margin-top: 32px;
        display: flex;
        flex-wrap: wrap;
        .single-post {
            width: 33.33%;
            >div {
                
            }
        }
    }
    @media #{$xlarge-and-up} {
        .single-post {
            width: 25%;
        }
    }
    .post-type {
        font-size: 0.8rem;
    }
}

</style>
