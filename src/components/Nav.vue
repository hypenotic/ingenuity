<template>
<!-- Why don't I just do a check for home... -->
<div v-if="scrolled == true" id="scrolling" class="nav-background" v-bind:class="{ 'menu-open': showMobileMenu }">
	<div id="mobile-menu-trigger" v-on:click="showMobileMenu = !showMobileMenu">
		<i class="fa fa-bars" aria-hidden="true"></i>
	</div>
	<div class="nav-container">
		<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
			<nav class="uk-navbar light-nav" v-if="$route.path == '/'">
				<div class="uk-navbar-left">
					<router-link v-if="$route.path !== '/'" to="/"><img src="" alt="Ingenuity" class="nav-logo"></router-link>
					<router-link v-else to="/"><img src="" alt="Ingenuity" class="nav-logo"></router-link>
				</div>
				<div class="uk-navbar-right">
					<ul class="uk-navbar-nav" v-if="$route.path == '/'">
						<li v-for="link in menuLinks" v-if="`${link.object_slug}` !== 'cta'" :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<router-link v-if="`${link.object_slug}` == 'contact'" :to="'#contact-info'">
								{{ link.title }}
							</router-link>
							<router-link v-else-if="`${link.object_slug}` !== 'home'" :to="`/${link.object_slug}`">
								{{ link.title }}
							</router-link>
							<router-link v-else to="/">
								{{ link.title }}
							</router-link>
							<span></span>
						</li>
						<li v-else :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<a :href="link.url" target="_blank" class="external-link external-link--hide">
								{{ link.title }}
							</a>
							<span></span>
						</li>

					</ul>
					<ul v-else class="uk-navbar-nav">
						<li v-for="link in menuLinks" v-if="`${link.object_slug}` !== 'cta'" :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<router-link v-if="`${link.object_slug}` == 'contact'" :to="'#contact-info'">
							{{ link.title }}
							</router-link>
							<router-link v-else-if="`${link.object_slug}` == 'home'" to="/">
								{{ link.title }}
							</router-link>
							<router-link v-else :to="`/${link.object_slug}`">
								{{ link.title }}
							</router-link>
							<span></span>
						</li>
						<li v-else :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<a :href="link.url" target="_blank" class="external-link">
								{{ link.title }}
							</a>
							<span></span>
						</li>
					</ul>
				</div>
			</nav>
			<nav v-else class="uk-navbar light-nav">
				<div class="uk-navbar-left">
					<router-link v-if="$route.path !== '/'" to="/"><img src="" alt="Ingenuity" class="nav-logo"></router-link>
					<router-link v-else to="/"><img src="" alt="Ingenuity" class="nav-logo"></router-link>
				</div>
				<div class="uk-navbar-right">
					<ul class="uk-navbar-nav" v-if="$route.path == '/'">
						<li v-for="link in menuLinks" v-if="`${link.object_slug}` !== 'cta'" :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<router-link v-if="`${link.object_slug}` == 'contact'" :to="'#contact-info'">
								{{ link.title }}
							</router-link>
							<router-link v-else-if="`${link.object_slug}` !== 'home'" :to="`/${link.object_slug}`">
								{{ link.title }}
							</router-link>
							<router-link v-else to="/">
								{{ link.title }}
							</router-link>
							<span></span>
						</li>
						<li v-else :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<a :href="link.url" target="_blank" class="external-link external-link--hide">
								{{ link.title }}
							</a>
							<span></span>
						</li>
					</ul>
					<ul v-else class="uk-navbar-nav">
						<li v-for="link in menuLinks" v-if="`${link.object_slug}` !== 'cta'" :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<router-link v-if="`${link.object_slug}` == 'contact'" :to="'#contact-info'">
							{{ link.title }}
							</router-link>
							<router-link v-else-if="`${link.object_slug}` == 'home'" to="/">
								{{ link.title }}
							</router-link>
							<router-link v-else :to="`/${link.object_slug}`">
								{{ link.title }}
							</router-link>
							<span></span>
						</li>
						<li v-else :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<a :href="link.url" target="_blank" class="external-link">
								{{ link.title }}
							</a>
							<span></span>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
<div v-else class="nav-background" v-bind:class="{ 'menu-open': showMobileMenu }">
	<div id="mobile-menu-trigger" v-on:click="showMobileMenu = !showMobileMenu">
		<i class="fa fa-bars" aria-hidden="true"></i>
	</div>
	<div class="nav-container">
		<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
			<nav class="uk-navbar dark-nav" v-if="$route.path == '/news'">
				<div class="uk-navbar-left">
					<router-link v-if="$route.path !== '/news'" to="/"><img src="" alt="Ingenuity" class="nav-logo"></router-link>
					<router-link v-else to="/"><img src="" alt="Ingenuity" class="nav-logo"></router-link>
				</div>
				<div class="uk-navbar-right">
					<ul class="uk-navbar-nav" v-if="$route.path == '/'">
						<li v-for="link in menuLinks" v-if="`${link.object_slug}` !== 'cta'" :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<router-link v-if="`${link.object_slug}` == 'contact'" :to="'#contact-info'" v-on:click.native="gaContactClick('CONTACT')">
							{{ link.title }}
							</router-link>
							<router-link v-else-if="`${link.object_slug}` == 'home'" to="/">
								{{ link.title }}
							</router-link>
							<router-link v-else :to="`/${link.object_slug}`">
								{{ link.title }}
							</router-link>
							<span></span>
						</li>
						<li v-else :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<a :href="link.url" target="_blank" class="external-link external-link--hide">
								{{ link.title }}
							</a>
							<span></span>
						</li>
					</ul>
					<ul v-else class="uk-navbar-nav">
						<li v-for="link in menuLinks" v-if="`${link.object_slug}` !== 'cta'" :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<router-link v-if="`${link.object_slug}` == 'home'" to="/" >
							{{ link.title }}
							</router-link>
							<router-link v-else-if="`${link.object_slug}` == 'contact'" :to="'#contact-info'" v-on:click.native="gaContactClick('CONTACT')">
								{{ link.title }}
							</router-link>
							<router-link v-else :to="`/${link.object_slug}`">
								{{ link.title }}
							</router-link>
							<span></span>
						</li>
						<li v-else :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<a :href="link.url" target="_blank" class="external-link">
								{{ link.title }}
							</a>
							<span></span>
						</li>
					</ul>
				</div>
			</nav>
			<nav v-else class="uk-navbar light-nav">
				<div class="uk-navbar-left">
					<router-link v-if="$route.path !== '/'" to="/"><img src="" alt="Ingenuity" class="nav-logo"></router-link>
					<router-link v-else to="/"><img src="" alt="Ingenuity" class="nav-logo"></router-link>
				</div>
				<div class="uk-navbar-right">
					<ul class="uk-navbar-nav" v-if="$route.path == '/'">
						<li v-for="link in menuLinks" v-if="`${link.object_slug}` !== 'cta'" :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<router-link v-if="`${link.object_slug}` == 'contact'" :to="'#contact-info'" v-on:click.native="gaContactClick('CONTACT')">
							{{ link.title }}
							</router-link>
							<router-link v-else-if="`${link.object_slug}` == 'home'" to="/">
								{{ link.title }}
							</router-link>
							<router-link v-else :to="`/${link.object_slug}`">
								{{ link.title }}
							</router-link>
							<span></span>
						</li>
						<li v-else :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<a :href="link.url" target="_blank" class="external-link external-link--hide">
								{{ link.title }}
							</a>
							<span></span>
						</li>
					</ul>
					<ul v-else class="uk-navbar-nav">
						<li v-for="link in menuLinks" v-if="`${link.object_slug}` !== 'cta'" :key="`menu-item-${link.object_slug}`" v-on:click="showMobileMenu = !showMobileMenu">
							<router-link v-if="`${link.object_slug}` == 'home'" to="/" >
							{{ link.title }}
							</router-link>
							<router-link v-else-if="`${link.object_slug}` == 'contact'" :to="'#contact-info'" v-on:click.native="gaContactClick('CONTACT')">
								{{ link.title }}
							</router-link>
							<router-link v-else :to="`/${link.object_slug}`">
								{{ link.title }}
							</router-link>
							<span></span>
						</li>
						<li v-else :key="`menu-item-${link.object_slug}`">
							<a :href="link.url" target="_blank" class="external-link">
								{{ link.title }}
							</a>
							<span></span>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
</template>

<script>
    // import axios from 'axios';
    // import VueAxios from 'vue-axios';
    export default {
    	props: ['menuLinks','menuColor'],
        data: function () {
            return {
				// menuLinks: [] 
				scrolled: false,
				showMobileMenu: false
            }
		},
        methods: {
			handleScroll: function (event) {
				if (window.addEventListener){
					// console.log('A');
					// console.log(pageYOffset);
					if (window.pageYOffset > 20) {
						this.scrolled = true;
					} else {
						this.scrolled = false;	
					}
				} else if (window.attachEvent){
					// console.log('B');
					if (window.scrollY > 20) {
						this.scrolled = true;
					} else {
						this.scrolled = false;	
					}
				} else {
					if (window.pageYOffset > 20) {
						// console.log('C');
						this.scrolled = true;
					} else {
						this.scrolled = false;	
					}
				}
			},
			gaContactClick(clickName) {
                this.$ga.event('Contact Button', 'click', clickName, 1);
                // console.log(clickName);
            }
		},
		created: function () {
			// window.addEventListener('scroll', this.handleScroll);
			if (window.addEventListener){
				// console.log('Option 1');
				window.addEventListener('scroll', this.handleScroll);
			} else if (window.attachEvent){
				// console.log('Option 2');
				window.attachEvent('scroll', this.handleScroll);
			} else {
				// console.log('Option 3');
				jQuery(window).on('scroll', this.handleScroll);
				// console.log('IE');
			}
		},
		destroyed: function () {
			// window.removeEventListener('scroll', this.handleScroll);
			if (window.addEventListener){
				window.removeEventListener('scroll', this.handleScroll);
			} else if (window.attachEvent){
				window.detachEvent('scroll', this.handleScroll);
			} else {
				window.removeEventListener('scroll', this.handleScroll);
			}
		},
		computed: {
			contactCheck: function (slug) {
				// this.menuLinks
				if (slug !== 'home' || slug == 'contact') {
					return true;
				}
			}
		}
    }
</script>

<style lang="scss" scoped>
@import '../sass/variables.scss';

nav {
	width: 100%;
	a {
		color: $main-accent;
		font-size: 0.6rem !important;
		// line-height: 0.8rem !important;
		&:hover {
			color: lighten($main-accent, 5);
		}
	}
}

.uk-navbar {
	@media #{$xlarge-and-up} {
		// width: 60% !important;
		// width: 960px !important;
		width: 888px !important;
		// margin: 0% !important;
		// padding-left: 50px;
		margin: 0 auto;
    }
}

.uk-sticky-fixed {
	@media #{$xlarge-and-up} {
		// width: 60% !important;
		width: 960px !important;
		margin: 0% !important;
    }
}

#mobile-menu-trigger {
	display: none;
	&:hover {
		cursor: pointer;
	}
	i {
		color: $white;
		font-size: 30px;
	}
	@media #{$small-and-down} {
		display: block;
		position: fixed; 
		right: 30px;
		top: 15px;
		z-index: 5000000;
    }
	
}

.nav-background {
	transition: all 0.5s ease;
	background: transparent;
	@media #{$small-and-down} {
		height: 0;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 400000;
    }
}

.nav-background#scrolling {
	background: $white;
	background: $main-accent;
	// display: fixed;
	width: 100%;
	height: 60px;
	// position: absolute;
	// height: 40px;
	position: fixed;
	z-index: 4000;
	@media #{$small-and-down} {
        height: 60px;
    }
}

.nav-background.menu-open,
.nav-background.menu-open#scrolling {
	@media #{$small-and-down} {
		height: 100vh;
		width: 100%;
		background: $main-accent;
    }
}

.uk-navbar-left .nav-logo {
	transition: all 0.3s ease;
	max-height: 80px;
	width: auto;
	display: block;
	margin-top: 20px;
	// opacity: 0.7;
	@media #{$small-and-down} {
		max-height: 50px;
		margin-left: 5px;
    }
}

.uk-navbar-nav>li>a {
	transition: all 0.5s ease;
}

#scrolling {
	.uk-navbar-left .nav-logo {
		max-height: 30px;
		margin-top: 5px;
		@media #{$small-and-down} {
			max-height: 30px;
			margin-top: 12px;
		}
	}
	.uk-navbar.light-nav {
		a {
			color: rgba(0,0,0,0.2);
			color: rgba(255,255,255,1);
			&:hover {
				color: rgba(0,0,0,0.2);
				color: rgba(255,255,255,1);
			}
		}
	}
	.uk-navbar-nav>li>a {
		height: 40px;
		margin-top: 10px;
	}
	.uk-navbar-right li span {
		bottom: 6px;
	}
}

a.external-link {
	// color: red !important;
	border: 1px solid rgba(255,255,255,0.3);
	height: 50%;
	// vertical-align: middle;
	@media #{$small-and-down} {
		padding: 10px 0;
    }
	@media #{$medium-and-up} {
		margin-top: 15.5%;
    }
	&:hover {
		border: 1px solid $main-accent;
		background: $main-accent;
		color: $white;
	}
}

.external-link.external-link--hide {
	@media #{$medium-and-up} {
		transition: all 0.2s ease;
		position: absolute;
		right: -1000vw;
    }
}

#scrolling a.external-link {
	position: relative;
	right: auto;
	&:hover {
		border: 1px solid $main-accent;
		background: $white;
		color: $main-accent !important;
	}
}

.uk-navbar.light-nav {
	a {
		color: $white;
		&:hover {
			color: $white;
		}
	}
}


.uk-navbar-right {
	li {
		text-decoration: none;
		position: relative;
		text-align: center;
		&:hover {
			a:not(.external-link) + span {
				visibility: visible;
				-webkit-transform: scaleX(1);
				transform: scaleX(1);
			}
		}
		a {
			font-family: $heading-type;
			letter-spacing: 0.7px;
		}
		a.router-link-exact-active + span {
			visibility: visible;
			-webkit-transform: scaleX(1);
			transform: scaleX(1);
		}
		span {
			$thetransition: all .3s cubic-bezier(1,.25,0,.75) 0s;
			position: absolute;
			width: 80%;
			height: 1px;
			bottom: 25px;
			left: 10%;
			background-color: $white;
			visibility: hidden;
			-webkit-transform: scaleX(0);
			transform: scaleX(0);
			-webkit-transition: $thetransition;
			transition: $thetransition;
		}
		
	}
	@media #{$small-and-down} {
		display: none;
    }
}



.uk-navbar {
	@media #{$small-and-down} {
		display: block;
	}
	// @media #{$large-and-up} {
	// 	width: 1060px !important;
	// 	margin: 0 auto;
    // }
}

.uk-sticky {
	@media #{$xlarge-and-up} {
        width: 100% !important;
		display: block;
    }
}

.menu-open {
	.uk-navbar-right {
		@media #{$small-and-down} {
			display: block;
			margin: 50px auto 0;;
			ul {
				display: block;
			}
			li a {
				font-size: 32px !important;
			}
		}
	}
}

.uk-navbar.dark-nav{
	.uk-navbar-right {
		li span {
			background-color: rgba(0,0,0,0.3);
		}
	}
	a.external-link {
		// color: red !important;
		border: 1px solid rgba(0,0,0,0.2);
	}
}

</style>
