<template>
    <div class="home-hero" id="header-check">
		<div class="video-overlay">
		</div>
		<video playsinline autoplay muted loop poster="https://data.ingenuity.ca/custom/uploads/2018/02/poster.jpg"  id="bgvid">
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
			</h2>.
		</div>
	</div>
</template>

<script>
	import { mapState } from 'vuex';
    export default {
        metaInfo: {
			title: 'Ingenuity | Design Build & General Contracting',
			meta: [
			{ name: 'description', content: "A Design Build & General Contracting business that marries experience, bleeding-edge standards, and passion for the craft with today's service experience expectations." }
			]
		},
        data: function () {
            return {
                featImage:"",
                browserV: false
            }
        },
        props: ['pageList', 'loadCheck'],
        beforeDestroy: function() {
            this.scrollBody();
        },
        created: function() {
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
        methods: {
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
	@import '../sass/views/home.scss';
</style>