<template>
<div v-if="scrolled == true" id="scrolling" class="nav-background" v-bind:class="{ 'menu-open': showMobileMenu }">
	<div id="mobile-menu-trigger" v-on:click="showMobileMenu = !showMobileMenu">
		<i class="fa fa-bars" aria-hidden="true"></i>
	</div>
	<div class="menu-overlay" v-bind:class="{ 'menu-open': showMobileMenu }">
		<button id="close-menu-overlay" v-on:click="showMobileMenu = !showMobileMenu"><i class="fas fa-times"></i> Close</button>
		<ul>
			<li v-if="page.hasOwnProperty('children') && page.title=='Services'" v-for="page in this.$store.state.menuList.items" :key="page.id"  class="menu-item-has-children" v-on:click="showMobileMenu = !showMobileMenu">
				<span class="dead-link" v-html="page.title">
				</span>
				<ul>
					<li v-for="child in page.children " :key="child.id" >
						<router-link :to="'/services/' + child.object_slug"  class="" v-html="child.title"> </router-link>
					</li>
				</ul>
			</li>
			<li v-else-if="page.hasOwnProperty('children')" :key="page.id" class="menu-item-has-children" v-on:click="showMobileMenu = !showMobileMenu">
				<router-link :to="'/' + page.object_slug"  class="" v-html="page.title">
				</router-link>
				<ul>
					<li v-for="child in page.children " :key="child.id" >
						<router-link :to="'/about-us/' + child.object_slug"  class="" v-html="child.title"> </router-link>
					</li>
				</ul>
			</li>
			<li v-else class="menu-item-no-children" v-on:click="showMobileMenu = !showMobileMenu">
				<router-link v-if="page.object_slug != 'home'" :to="'/' + page.object_slug"  class="" v-html="page.title">
				</router-link>
				<router-link v-else :to="'/'"  class="" v-html="page.title">
				</router-link>
			</li>
		</ul>
	</div>
	<div class="nav-container">
		<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
			<nav class="uk-navbar light-nav">
				<div class="uk-navbar-left">
					<router-link v-if="$route.path !== '/'" to="/"><img src="https://data.ingenuity.ca/custom/themes/ingenuity/dist/images/yellow-logo.png" alt="Ingenuity" class="nav-logo"><span class="logo-text">INGENUITY</span></router-link>
					<router-link v-else to="/"><img src="https://data.ingenuity.ca/custom/themes/ingenuity/dist/images/yellow-logo.png" alt="Ingenuity" class="nav-logo"><span class="logo-text">INGENUITY</span></router-link>
				</div>
				<div class="uk-navbar-right">
					<button v-on:click="showMobileMenu = !showMobileMenu"><i class="fas fa-bars"></i><span id="nav-menu-text">Menu</span></button>
				</div>
			</nav>
		</div>
	</div>
</div>
<div v-else class="nav-background" v-bind:class="{ 'menu-open': showMobileMenu }">
	<div id="mobile-menu-trigger" v-on:click="showMobileMenu = !showMobileMenu">
		<i class="fa fa-bars" aria-hidden="true"></i>
	</div>
	<div class="menu-overlay" v-bind:class="{ 'menu-open': showMobileMenu }">
		<button id="close-menu-overlay" v-on:click="showMobileMenu = !showMobileMenu"><i class="fas fa-times"></i> Close</button>
		<ul>
			<li v-if="page.hasOwnProperty('children') && page.title=='Services'" v-for="page in this.$store.state.menuList.items" :key="page.id"  class="menu-item-has-children" v-on:click="showMobileMenu = !showMobileMenu">
				<span class="dead-link" v-html="page.title">
				</span>
				<ul>
					<li v-for="child in page.children " :key="child.id" >
						<router-link :to="'/services/' + child.object_slug"  class="" v-html="child.title"> </router-link>
					</li>
				</ul>
			</li>
			<li v-else-if="page.hasOwnProperty('children')" :key="page.id" class="menu-item-has-children" v-on:click="showMobileMenu = !showMobileMenu">
				<router-link :to="'/' + page.object_slug"  class="" v-html="page.title">
				</router-link>
				<ul>
					<li v-for="child in page.children " :key="child.id" >
						<router-link :to="'/about-us/' + child.object_slug"  class="" v-html="child.title"> </router-link>
					</li>
				</ul>
			</li>
			<li v-else class="menu-item-no-children" v-on:click="showMobileMenu = !showMobileMenu">
				<router-link v-if="page.object_slug != 'home'" :to="'/' + page.object_slug"  class="" v-html="page.title">
				</router-link>
				<router-link v-else :to="'/'"  class="" v-html="page.title">
				</router-link>
			</li>
		</ul>
	</div>
	<div class="nav-container">
		<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
			<nav class="uk-navbar dark-nav" v-if="$route.path == '/news'">
				<div class="uk-navbar-left">
					<router-link v-if="$route.path !== '/news'" to="/"><img src="https://data.ingenuity.ca/custom/themes/ingenuity/dist/images/yellow-logo.png" alt="Ingenuity" class="nav-logo"></router-link>
					<router-link v-else to="/"><img src="https://data.ingenuity.ca/custom/themes/ingenuity/dist/images/yellow-logo.png" alt="Ingenuity" class="nav-logo"></router-link>
				</div>
				<div class="uk-navbar-right">
					<button v-on:click="showMobileMenu = !showMobileMenu"><i class="fas fa-bars"></i><span id="nav-menu-text">Menu</span></button>
				</div>
			</nav>
			<nav v-else class="uk-navbar light-nav">
				<div class="uk-navbar-left">
					<router-link v-if="$route.path !== '/'" to="/"><img src="https://data.ingenuity.ca/custom/themes/ingenuity/dist/images/yellow-logo.png" alt="Ingenuity" class="nav-logo"></router-link>
					<router-link v-else to="/"><img src="https://data.ingenuity.ca/custom/themes/ingenuity/dist/images/yellow-logo.png" alt="Ingenuity" class="nav-logo"></router-link>
				</div>
				<div class="uk-navbar-right">
					<button v-on:click="showMobileMenu = !showMobileMenu"><i class="fas fa-bars"></i><span id="nav-menu-text">Menu</span></button>
				</div>
			</nav>
		</div>
	</div>
</div>
</template>

<script>
    export default {
    	props: ['menuLinks','menuColor'],
        data: function () {
            return {
				// menuLinks: [] 
				scrolled: false,
				showMobileMenu: false,
				menuCheck: false
            }
		},
        methods: {
			handleScroll: function (event) {
				console.log(window.pageYOffset);
				if (window.addEventListener){
					if (window.pageYOffset > 20) {
						this.scrolled = true;
					} else {
						this.scrolled = false;	
					}
				} else if (window.attachEvent){
					if (window.scrollY > 20) {
						this.scrolled = true;
					} else {
						this.scrolled = false;	
					}
				} else {
					if (window.pageYOffset > 20) {
						this.scrolled = true;
					} else {
						this.scrolled = false;	
					}
				}
			},
			gaContactClick(clickName) {
                this.$ga.event('Contact Button', 'click', clickName, 1);
                // console.log(clickName);
			},
			menuStatus() {

			}
		},
		created: function () {
			window.addEventListener('scroll', this.handleScroll);
			if (window.addEventListener){
				console.log('Option 1');
				window.addEventListener('scroll', this.handleScroll);
			} else if (window.attachEvent){
				console.log('Option 2');
				window.attachEvent('scroll', this.handleScroll);
			} else {
				console.log('Option 3');
				jQuery(window).on('scroll', this.handleScroll);
				// console.log('IE');
			}
		},
		destroyed: function () {
			window.removeEventListener('scroll', this.handleScroll);
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
				if (slug !== 'home' || slug == 'contact') {
					return true;
				}
			}
		}
    }
</script>

<style lang="scss" scoped>
	@import '../sass/variables.scss';
	@import '../sass/components/nav.scss';
</style>
