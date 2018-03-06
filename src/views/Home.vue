<template>
    <div class="home-hero" id="header-check">
		<div class="video-overlay">
		</div>
		<video playsinline autoplay muted loop poster="http://data.ingenuity.ca/custom/uploads/2018/02/poster.jpg"  id="bgvid">
			<source media="(max-width: 450px)" src="src/assets/video/ingenuity_home.mp4" type="video/mp4">
			<source media="(min-width: 450px)" src="src/assets/video/ingenuity_fast.mp4" type="video/mp4">			
		</video>
 		<div class="hgroup rw-wrapper">
			<h2 class="rw-sentence">
				A <router-link :to="'services'+'/'+'design-build'" class="sentence-link">Design Build</router-link> & <router-link :to="'services/general-contracting/'" class="sentence-link">General Contracting</router-link> <router-link :to="'about-us/the-team'" class="sentence-link">team</router-link> that <router-link :to="'about-us/'" class="sentence-link">believes</router-link> in
				<div class="rw-words rw-words-1">
					<router-link :to="'projects/'" class="rotator-link"><span class="rotator">happiness <span class="sq-ft">/sq ft.</span></span></router-link>
					<router-link :to="'projects/'" class="rotator-link"><span class="rotator">craft <span class="sq-ft">/sq ft.</span></span></router-link>
					<router-link :to="'projects/'" class="rotator-link"><span class="rotator">productivity <span class="sq-ft">/sq ft.</span></span></router-link>
					<router-link :to="'projects/'" class="rotator-link"><span class="rotator">detail <span class="sq-ft">/sq ft.</span></span></router-link>
					<router-link :to="'projects/'" class="rotator-link"><span class="rotator">creativity <span class="sq-ft">/sq ft.</span></span></router-link>
				</div>
				<span id="move-over">/sq ft.</span>
			</h2>
		</div>
	</div>
</template>

<script>
	import { mapState } from 'vuex';
    export default {
        components: {
        },
        data: function () {
            return {
                selected: [],
                featImage:"",
                browserV: false
            }
        },
        props: ['pageList', 'loadCheck'],
        beforeCreate: function() {
            // this.noScrollBody();
        },
        beforeDestroy: function() {
            this.scrollBody();
        },
        created: function() {
            console.log('home');
            // this.getPage(this.pageList);
			this.noScrollBody();
		},
		computed: {
			pageInfo: function(){
				if (this.$store.state.pageList != null) {
					for (let page of this.$store.state.pageList ) {
						if (page.slug == 'home') {
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
        watch: {
            selected: function ( newVal ) {
                this.selected = newVal;
            }
        },
        methods: {
            // getPage(pages) {
            //     for (let page of pages) {
            //         // console.log(page.slug);
            //         if (page.slug == 'home') {
            //             // console.log('found it');
            //             console.log(page);
            //             this.selected = page;
            //             break;
            //         }
            //     }
            // },
            noScrollBody() {
                var className = 'no-scroll-body';
				document.body.classList.add(className);
				var root = document.getElementsByTagName( 'html' )[0];
				root.setAttribute( 'class', 'no-scroll-html' );
            },
            scrollBody() {
                var className = 'no-scroll-body';
				document.body.classList.remove(className);
				var root = document.getElementsByTagName( 'html' )[0];
				root.removeAttribute( 'class', 'no-scroll-html' );
            }
        },
        computed: {
        }
    }
</script>

<style lang="scss" scoped>

@import '../sass/variables.scss';

.home-hero {
	h1 {
        text-transform: uppercase;
		@media #{$bp-large} {
		    font-size: 101px; //32px
		    line-height: 114px;
		    margin: 20px 100px;
		    text-shadow: 3px 3px 3px rgba(0,0,0,0.2);
		}
	}
}

.home-hero,
.default-hero {
	h2 {
		color: $white;
		text-align: center;
		margin: 20px 125px;
		@media #{$bp-large} {
		    font-size: modular-scale(5); 
			line-height: modular-scale(5); 
		}
	}
}


.home-hero {
	h2 {
		text-align: left;
	}
}

.main-header.home {
	background-color: rgba(0,0,0,0.0);
	height: 70px;
	.main-wrapper {
        display: flex;
        align-items: center;
        justify-content: flex-end;
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
		width: 100%;
        display: flex;
        flex-direction: column;
	}
}

.home-hero {
	min-height: 100vh;
	.hgroup {
		margin-top: 150px; //newnav!
		@media #{$bp-small} {
			margin-top: 5%;
		}
		@media #{$bp-xsmall} {
			margin-top: 20%;
		}
		@media #{$mobile-landscape} {
			margin-top: 5%;
		}
		img {
			width: 200px;
			height: auto;
			margin-bottom: 25px;
		}
	}
}


.textwidget {
	@media #{$bp-small} {
		display: none;
	}
}

.fullscreen-bg {
	position: fixed;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	overflow: hidden;
	z-index: -100;
	filter: grayscale(80%) brightness(0.8) opacity(1);
	@media #{$mobile-landscape} {
		display: none;
	}
	@media #{$bp-small} {
		display: none;
	}
}

.fullscreen-bg.default-vidheader {
	position: absolute;
	.fullscreen-bg_video {
		
	}
}

.fullscreen-bg__video {
	position: absolute;
	top: 0;
	left: 0;
	width: 115%;
	height: 115%;
	@media #{$bp-med} {
		top: -300px;
		left: -300px;
		width: 200%;
		height: 200%;
	}
	@media #{$bp-large} {
		top: -160px;
		left: -160px;
		width: 150%;
		height: 150%;
	}
	@media #{$bp-xlarge} {
		top: -200px;
		left: -200px;
		width: 140%;
		height: 140%;
	}
	@media #{$bp-xxlarge} {
		top: -200px;
		left: -200px;
		width: 135%;
		height: 135%;
	}
}

body.no-scroll-home {
	overflow: hidden !important;
}

.video-overlay {
	&:before {
		content:"";
		display: block;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		background-color: rgba(0,0,0,.4);
	}
	
}

video#bgvid { 
	overflow: hidden;
    position: absolute;
    top: -120%;
    left: -50%;
    // min-width: 100%;
    // min-height: 100%;
    width: 350%;
    height: 350%;
    z-index: -100;
    // -ms-transform: translateX(-50%) translateY(-50%);
    // -moz-transform: translateX(-50%) translateY(-50%);
    // -webkit-transform: translateX(-50%) translateY(-50%);
    // transform: translateX(-50%) translateY(-50%);
    // background: url('../../src/video/poster.jpg') no-repeat;
	background-size: cover; 
	@media #{$bp-med} {
		top: -300px;
		left: -300px;
		width: 200%;
		height: 200%;
	}
	@media #{$bp-large} {
		top: -160px;
		left: -160px;
		width: 150%;
		height: 150%;
	}
	@media #{$bp-xlarge} {
		top: -200px;
		left: -200px;
		width: 140%;
		height: 140%;
	}
	@media #{$bp-xxlarge} {
		top: -200px;
		left: -200px;
		width: 135%;
		height: 135%;
	}
}

// @media (min-aspect-ratio: 16/9) {
//   .fullscreen-bg__video {
//     height: 300%;
//     top: -100%;
//   }
// }

// @media (max-aspect-ratio: 16/9) {
//   .fullscreen-bg__video {
//     width: 300%;
//     left: -100%;
//   }
// }

// ROTATING WORDS + SENTENCE
// 	keeping type styles in here 

.rw-wrapper{
	// width: 80%;
	// position: relative;
	margin: 110px auto 0 auto;
	font-family: $main-headings;
	padding: 10px;
	z-index: 100;
	width: 100%; //added because of IE
	@media #{$bp-small} {
		margin-top: 20px;
		width: 100%;
	}
	@media #{$bp-med} {
		margin-top: 50px;
	}
	@media #{$bp-large} {
		margin-top: 50px;
		position: relative;
	}
	a.sentence-link {
		color: rgba(255,255,255, 1);
		border-bottom: 1px solid rgba(255,255,255, 0.3);
		@media #{$bp-small} {
			border-bottom: 1px solid rgba(255,255,255, 0.8);
		}
		&:hover {
			color: $black;
			background-color: $yellow;
			border-bottom: 1px solid $yellow;
		}
	}
	a.rotator-link {
		color: $yellow;
	}
}

h2.rw-sentence{
	position: relative;
	margin: 0;
	text-align: left;
	z-index: 100;
    font-weight: 600;
    text-transform: uppercase;
    a {
        text-decoration: none;
    }
	// width: 100%;
	@media #{$bp-small} {
		margin: 0 0 0 5px;
		font-size: modular-scale(3, 1.1rem); 
        line-height: modular-scale(3, 1.6rem); 
        font-size: 42px;
		line-height: 61px;
	}
	@media #{$bp-med} {
		text-align: left;
		margin: 0 8%;
		font-size: modular-scale(3); 
		line-height: modular-scale(3, 1.75rem); 
	}
	@media #{$bp-large} {
		margin: 0 8%;
		text-align: left;
	    font-size: 101px; //32px
		    line-height: 114px;
	}	
	@media #{$bp-xlarge} {
		margin: 0 8%;
		text-align: left;
	    font-size: modular-scale(5, 1.6rem); 
		line-height: modular-scale(5, 1.8rem);
	}
	@media #{$bp-xxlarge} {
		margin: 0 8%;
		text-align: left;
	    font-size: modular-scale(6); 
		line-height: modular-scale(6, 1.75rem);
	}
	@media #{$mobile-landscape} {
		margin: 0 10%;
		font-size: modular-scale(2, 1.3rem); 
		line-height: modular-scale(2, 1.4rem); 
	}
	@media #{$bp-xsmall} {
		margin: 0 0 0 5px;
		font-size: modular-scale(2, 1.2rem); 
		line-height: modular-scale(2, 1.5rem); 
	}
	@media screen and (min-width: 1900px) {
	    font-size: modular-scale(6, 1.4rem); 
	    line-height: modular-scale(6, 1.6rem); 
	}
}

.rw-sentence a span {
	// color: ;
	font-size: 100%;
	font-weight: 600;
	text-align: center;
}

#move-over {
	padding-left: 630px;
	font-size: 100%;
	font-size: modular-scale(3, 1.3rem); 
	line-height: modular-scale(3, 1.6rem); 
	@media #{$bp-small} {
		display: none;
	}
	@media #{$bp-med} {
		padding-left: 360px;
		font-size: modular-scale(2, 1.3rem); 
		line-height: modular-scale(2, 1.6rem); 
	}
	@media #{$bp-large} {
		padding-left: 610px;
	}
	@media #{$bp-xlarge} {
		padding-left: 670px;
	}
	@media #{$bp-xxlarge} {
		padding-left: 810px;
	}
	@media #{$mobile-landscape} {
		padding-left: 230px;
		font-size: modular-scale(0, 1.3rem); 
		line-height: modular-scale(0, 1.6rem); 
	}
	@media screen and (min-width: 1900px) {
	    font-size: modular-scale(2, 1.2rem); 
	    line-height: modular-scale(2, 1.2rem); 
	    padding-left: 770px;
	}
}

.rw-words{
	display: inline-block;
	// text-indent: 10px;
	&:hover a.rotator-link {
		color: $black;
		span {
			color: $black;
			background-color: $yellow;
		}

	}
}

div.rw-words.rw-words-1 {
	// border-bottom: 4px solid $white;
}

.rw-words-1 a span.rotator {
	position: absolute;
	opacity: 0;
	overflow: hidden;
	color: $yellow;
	-webkit-animation: rotateWord 18s linear infinite 0s;
	-ms-animation: rotateWord 18s linear infinite 0s;
	animation: rotateWord 18s linear infinite 0s;
	margin-left: 20px;
	padding-right: 8px;
	border-bottom: 1px solid rgba(252, 216, 56, 0.3);
	@media #{$bp-small} {
		left: 0;
		margin: 0;
		bottom: -65px;
		padding: 0;
		border-bottom: 1px solid rgba(252, 216, 56, 0.8);
	}
	@media #{$bp-xsmall} {
		bottom: -45px;
	}
	@media #{$bp-med} {
		left: -20px;
	}
	@media #{$bp-large} {
		bottom: -100px;
		bottom: 8px;
		left: -20px; 
		line-height: modular-scale(5, 1.5rem); 
	}
	@media #{$bp-xlarge} {
		line-height: modular-scale(5, 1.5rem); 
	}
	@media #{$bp-xxlarge} {
		left: 0;
		margin: 0;
		bottom: 0;
		overflow: initial;
		line-height: modular-scale(6, 1.5rem);
	}
	// @media #{$bmobile-landscape} {
	// 	left: 175px;
	// }
	@media screen and (min-width: 1900px) {
	    bottom: 3px;
	    left: 650px;
	}
}

.rw-words a span.sq-ft {
	display: inline;
	font-size: modular-scale(2, 1.3rem); 
	line-height: modular-scale(2, 1.6rem); 
	color: $white;
	display: none;
	@media #{$bp-small} {
		display: inline;
		font-size: modular-scale(0, 0.9rem);
		line-height: modular-scale(0, 0.9rem);
		z-index: 150;
	}
}

.rw-words-1 a:nth-child(2) span { 
    -webkit-animation-delay: 4s; 
	-ms-animation-delay: 4s; 
	animation-delay: 4s; 
	// color: $yellow;
}
.rw-words-1 a:nth-child(3) span  { 
    -webkit-animation-delay: 7s; 
	-ms-animation-delay: 7s; 
	animation-delay: 7s; 
	// color: $yellow;	
}
.rw-words-1 a:nth-child(4) span { 
    -webkit-animation-delay: 10s; 
	-ms-animation-delay: 10s; 
	animation-delay: 10s; 
	// color: $yellow;
}
.rw-words-1 a:nth-child(5) span { 
    -webkit-animation-delay: 13s;
	-ms-animation-delay: 13s; 
	animation-delay: 13s; 
	// color: $yellow;
}
.rw-words-1 a:nth-child(6) span { 
    -webkit-animation-delay: 15s; 
	-ms-animation-delay: 15s; 
	animation-delay: 15s; 
	// color: $yellow;
}
@-webkit-keyframes rotateWord {
    0% { opacity: 0; }
    2% { opacity: 0; -webkit-transform: translateY(-30px); }
	5% { opacity: 1; -webkit-transform: translateY(0px);}
    17% { opacity: 1; -webkit-transform: translateY(0px); }
	20% { opacity: 0; -webkit-transform: translateY(30px); }
	80% { opacity: 0; }
    100% { opacity: 0; }
}
@-ms-keyframes rotateWord {
    0% { opacity: 0; }
    2% { opacity: 0; -ms-transform: translateY(-30px); }
	5% { opacity: 1; -ms-transform: translateY(0px);}
    17% { opacity: 1; -ms-transform: translateY(0px); }
	20% { opacity: 0; -ms-transform: translateY(30px); }
	80% { opacity: 0; }
    100% { opacity: 0; }
}
@keyframes rotateWord {
    0% { opacity: 0; }
    2% { opacity: 0; -webkit-transform: translateY(-30px); transform: translateY(-30px); }
	5% { opacity: 1; -webkit-transform: translateY(0px); transform: translateY(0px);}
    17% { opacity: 1; -webkit-transform: translateY(0px); transform: translateY(0px); }
	20% { opacity: 0; -webkit-transform: translateY(30px); transform: translateY(30px); }
	80% { opacity: 0; }
    100% { opacity: 0; }
}

</style>