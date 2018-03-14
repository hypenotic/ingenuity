<template>
    <div>
        <div v-if="this.$store.state.pageList != null">
            <app-nav v-bind:menu-links="menuLinks"></app-nav>
            <transition name="fade">
                <router-view :load-check="loading" :key="$route.fullPath"></router-view>
            </transition> 
            <app-footer v-if="this.$route.path != '/'"></app-footer>
        </div> 
        <div v-else>
            <transition name="fade">
                <div class="uk-container uk-container-expand loading-animation">
                      <svg width="80" height="60" viewBox="5 0 80 60"><path class="wave" fill="none" stroke="#000" stroke-width="4" stroke-linecap="round" d="M 0 37.5 c 7.684299348848887 0 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15 s 7.172012725592294 15 15 15 s 7.172012725592294 -15 15 -15" />
                        </svg>
                </div>
            </transition>  
        </div>
    </div>
</template>

<script>
    import es6Promise from 'es6-promise';
    es6Promise.polyfill();
    import 'es6-promise/auto'
    import axios from 'axios';
    import Nav from './components/Nav.vue';
    import Footer from './components/Footer.vue';
    // import WOW from 'wow.js';    
    import { mapState } from 'vuex';
    export default {
        components: {
            appNav: Nav,
            appFooter: Footer
        },
        data: function () {
            return {
                loading: true,
                menuLinks: [],
                menuColor: "",
                pages: [],
                homePage: [],
                aboutPage: []    
            }
        },
        beforeMount() {
            // this.getBrowser();
            // this.getMenu();
            // this.getPages();
        },
        mounted: function() {
            // this.isLoaded();
        },
        created: function() {
            this.$store.dispatch("getMenu", {'type': 'initial-load'});
            this.$store.dispatch("getPages", {'type': 'initial-load'});
            this.$store.dispatch("getProjects", {'type': 'initial-load'});
            this.$store.dispatch("getBlogPosts", {'type': 'initial-load'});
            this.$store.dispatch("getContacts", {'type': 'initial-load'});
            this.$store.dispatch("getServices", {'type': 'initial-load'});
            this.$store.dispatch("getTeam", {'type': 'initial-load'});
        },
        watch: {
            loading: function (newLoading) {
                this.loading = newLoading;
            }
        },
        computed: {
            isLoaded: function() {
                if (this.hasOwnProperty('pages')
                    && this.pages.length > 0) {
                    // console.log('LOADED');
                    return true;
                }
                // console.log('NOT LOADED');
                return false;
            }
        },
        methods: {
            // getMenu: function() {
            //   var app = this
            // axios.get('http://ingenuity.ca/wp-json/wp-api-menus/v2/menus/2')
            //   .then(function (response) {
            //     app.menuLinks = response.data.items;
            //     // console.log(response.data);
            //   })
            //   .catch(function (error) {
            //     console.log(error)
            //   })
            // },
            // getPages: function() {
            //   var app = this
            // axios.get('http://ingenuity.ca/wp-json/wp/v2/pages?_embed')
            //   .then(function (response) {
            //     app.pages = response.data;
            //     for (let page of response.data) {
            //         // console.log(page.slug);
            //         if (page.slug == 'home') {
            //             // console.log('found it');
            //             app.homePage = page;
            //             break;
            //         }
            //     };
            //     setTimeout(function(){ app.loading = false }, 1000);
                
            //     // this.isLoaded();
            //   })
            //   .catch(function (error) {
            //     console.log(error)
            //   })
            // }
        }
    }
</script>

<style lang="scss">
// ===== GLOBAL
@import './sass/variables.scss';
@import './sass/typography.scss';

*, :after, :before {
    box-sizing: border-box;
}

html, body {
    height: 100%;
    // font-family: serif;
    font-family: $body-type;
    font-size: 16px;
    font-weight: 300;
    color: rgba(0,0,0,0.8);
    // line-height: 1.5rem;
    // overflow-x: hidden; //for the menu
    // overflow-y: auto; //for the menu
    font-family: $main-body-font;
    @media #{$medium-and-up} {
        font-size: 24px;
        line-height: 1.5rem;
    }
}

html.no-scroll-html, 
body.no-scroll-body {
    overflow: hidden !important;
}

h1,h2,h3,h4,h5,h6 {
    font-family: $heading-type;
    color: #666;
}

h1 {

}

h2 {
    font-size: 1.3rem;
    line-height: 1.6rem;
}

a {
    color: $main-accent;
    // font-size: 0.6rem !important;
    // line-height: 0.8rem !important;
    &:hover {
        color: lighten($main-accent, 5);
    }
}



body {
    margin: 0;
}

body.noscroll {
    overflow: none;
}

// blockquote {
//     padding-left: 24px;
//     margin-left: 24px;
//     border-left: 1px solid #e3e3e3;
//     color: #666;
// }

.main-wrapper {
	// overflow-x: hidden;
	// @include outer-container;
	@media #{$bp-small} {
		padding: 0 30px;
    }
    @media #{$bp-med} {
		padding: 0 40px;
    }
}

.content-wrapper {
	padding-top: 120px;
	z-index: 998;
}

.main-content,
.blog-entry {
	position: relative;
	background-color: none;
    padding: 50px 0;
    margin: 0 auto;
	@media #{$bp-large} {
		max-width: 675px;
    }
    img {
    	position: relative;
    	width: 100%;
		height: auto;
    }
}

// TYPE
.main-banner-content {
    color: white;
    position: relative;
    z-index: 500;
    display: inline-block;
    max-width: 960px;
    margin: 0 auto;
    // text-align: center;
    @media #{$large-and-up} {
        max-width: 1000px;
        width: 1000px;
        padding-left: 100px; 
        // display: block;
        // width: 1200px;
        // margin: 0 auto;
    }
    @media #{$xlarge-and-up} {
        display: block;
        width: 960px;
        margin: 0 auto;
    }
    h1, h2 {
        color: white;
    }
    h1 {
        /* position: relative; */
        font-size: 10vw;
        line-height: 11vw;
        padding-top: 130px;
        text-transform: uppercase;
        @media #{$medium-and-up} {
            font-size: 6vw;
            line-height: 6vw;
            padding-top: 160px;
        }
        @media #{$xlarge-and-up} {
            font-size: 64px;
            line-height: 64px;
        }
    }
    h2 {
        margin-top: 10px;
        width: 80%;
        font-weight: 300;
        line-height: 130%;
        font-family: $body-type;
        font-weight: 200;
        @media #{$small-and-down} {
            width: 95%;
            font-size: 5.5vw;
            line-height: 7vw;
        }
    }
    h2 p {
        margin-top: 10px;
        font-weight: 300;
        line-height: 130%;
        font-family: $body-type;
        font-weight: 200;
        @media #{$small-and-down} {
            width: 95%;
            font-size: 5.5vw;
            line-height: 7vw;
        }
    }
    .contentItalic,
    em {
        color: $white;
    }
}

.contentItalic,
em {
    color: #666;
}

.overview,
.overview p {    
    @media #{$medium-and-up} {
        font-size: 32px;
        line-height: 40px;
	}
}

// LAYOUT

.view {
    position: relative;
    z-index: 400;
}

.view--padding-top {
    padding-top: 100px;
}

.nav-container {
    z-index: 500;
    position: fixed;
    width: 95%;
    margin: 0 2.5%;
    @media #{$large-and-up} {
        position: absolute;
        width: 92%;
        margin: 0 4%;
    }
    @media #{$xlarge-and-up} {
        width: 92%;
        // display: flex;
        // justify-content: space-between;
        // position: absolute;
        // width: 70% !important;
        margin: 0;
        // position: relative;
    }
}

.non-home-container {
    margin-top: 40px !important;
}

// TRANSITIONS
.fade-enter-active, .fade-leave-active {
  transition-property: opacity;
  transition-duration: .25s;
}

.fade-enter-active {
  transition-delay: .2s;
}

.fade-enter, .fade-leave-active {
  opacity: 0
}

// LOADING ANIMATION
.loading-animation {
    background: $yellow;
    text-align: center;
    padding-top: 45vh; 
    min-height: 100vh;
}

.loading-animation.loading-animation--page {
    min-height: 70vh;
    padding-top: 10%; 
    background: $white;
}

.wave {
  animation: moveTheWave 2400ms linear infinite;
  stroke-dasharray: 0 16 101 16;
}

@keyframes moveTheWave {
  0% {
    stroke-dashoffset: 0;
    transform: translate3d(0, 0, 0);
  }
  100% {
    stroke-dashoffset: -133;
    transform: translate3d(-90px, 0, 0);
  }
}

// Third Party Component
.social-share-buttons {
    span {
        margin-left: 16px;
        display: inline-block;
        padding-top: 5px;
        @media #{$small-and-down} {
            margin-right: 16px;
            margin-left: 3px;
        }
        i {
             display: inline-block;
             margin-right: 3px;
        }
        &:hover {
            color: $main-accent;
            cursor: pointer;
        }
    }
}

// Header

figure {
    margin: 0;
}

.default-hero {
	h1 {
		font-size: modular-scale(3, 1.3rem);
		line-height:modular-scale(3, 1.3rem);
		margin: 0 10%;
        padding-bottom: 0;
        text-transform: uppercase;
		color: $white;
		text-align: left;
		@media #{$bp-small} {
			font-size: modular-scale(3, 1rem);
			line-height:modular-scale(3, 1.2rem);
		}
		@media #{$bp-xsmall} {
			font-size: modular-scale(2, 1.4rem);
			line-height:modular-scale(2, 1.4rem);
		}
		@media #{$bp-med} {
			font-size: modular-scale(4, 1.3rem);
			line-height:modular-scale(4, 1.3rem);
		}
		@media #{$mobile-landscape} {
			font-size: modular-scale(2, 1.3rem);
			line-height:modular-scale(2, 1.3rem);
		}
		@media #{$bp-large} {
			font-size: modular-scale(5, 1.2rem);
            line-height:modular-scale(5, 1.2rem);
            font-size: 81px;
            line-height: 81px;
		}
		@media #{$bp-xlarge} {
			font-size: modular-scale(6, 1.2rem);
			line-height:modular-scale(6, 1.2rem);
		}
	}
	h2,
	h2 p {
		font-family: $lite-headings;
		font-weight: 300;
		font-size: modular-scale(2, 1rem);
		line-height:modular-scale(2, 1rem);
		letter-spacing: 1px;
		text-align: left;
		margin: 0 20% 0 10%;
		@media #{$bp-small} {
			font-size: modular-scale(1, 0.9rem);
			line-height:modular-scale(1, 0.9rem);
	    }
	}
	h2 p {
		margin: 0;
	}
}

.home-hero,
.default-hero {
	width: 100%;
	background-position: center center;
	background-size: cover;
	display: flex;
    align-items: center;
    justify-content: center;
	.hgroup {
		// width: 90vw;
        // display: flex;
        // flex-direction: column;
	}
}

.default-hero {
	width: 100%;
	min-height: 50vh;
    position: relative;
    @media #{$bp-med} {
		min-height: 100vh;
	}
	@media #{$bp-xxlarge} {
		min-height: 80vh;
	}
	figure {
		position: absolute;
		top: 0;
		left: 0;
		background-position: center center;
		width: 100%;
		height: 100%; // or 100%?
		filter: grayscale(80%) brightness(0.6) opacity(1);
		z-index: 50;
	}
	.hgroup {
		position: relative;
		z-index: 51;
		margin-top: 150px;
		@media #{$bp-small} {
			margin-top: 10%;
		}
		@media #{$mobile-landscape} {
			margin-top: 10%;
		}
	}
}

.default-hero.no-banner {
	min-height: 50vh;
}

.default-hero.blog-index,
.default-hero.project-index {
	min-height: 80vh;
	@media #{$bp-small} {
		min-height: 50vh;
	}
}

.default-hero.project-index {
	.hgroup {
		margin: 50px auto 0;
		h1,
		h2 {
			text-align: center;
		}
		h2 {
			margin: 0 auto;
		}
	}
}

// LINE
.diagonal-svg__wrapper {
	position: relative;
	.diagonal-svg {
		position: absolute;
		height: 100%;
		width: 100%;
		z-index: -1;
		@media #{$bp-small} {
			// 
		}
		#the-line {
			stroke: rgba(252, 216, 56, 1);
			stroke-width: 350;
			@media #{$bp-small} {
				stroke-width: 200;
				transform: rotate(-20deg);
			}
		}
	}
}

.blog-entry {
    p:first-child {
        margin-top: 0;
    }
	@media #{$bp-large} {
		padding: 50px 25px;
		// padding-right: 50px;
    }
}

// CONTACT
#info-window-content {
	@media #{$bp-xxlarge} {
		padding: 20px;
	}
}

#info-window-content {
	// background-color: $yellow;
	h3 {
		color: $black;
        font-size: 28px;
        font-weight: normal;
		margin: 0;
		@media #{$bp-small} {
			font-size: modular-scale(1, 1rem);
			line-height: modular-scale(1, 1rem);
		}
	}
	p,a {
		font-family: $main-headings;
		font-size: 21px;
		line-height: 1.3;
        margin-bottom: 0;
        font-weight: normal;
		@media #{$bp-small} {
			font-size: modular-scale(0, 1rem);
			line-height: modular-scale(0, 1.3rem);
		}
    }
    p {
        margin: 0;
    }
    a {
        color: #979797;
        text-decoration: none;
    }
}

// FORM


</style>
