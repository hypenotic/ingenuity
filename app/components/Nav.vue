<template>
    <nav :class="{scrolled: scrolled, small: small}">
        <div :class="{open: open}">
            <nuxt-link to="/" class="logo">
                <img src="~/assets/images/logo.svg" alt="Ingenuity">
                <span v-if="scrolled || small" class="logo-text">Ingenuity</span>
            </nuxt-link>
        </div>
        <button @click.prevent="open = !open" class="button">
            <div :class="{open: open, button: true}">
                <div class="hamburger hamburger--emphatic" :class="{'is-active': open}">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
                {{(open) ? 'Close' : 'Menu'}}
            </div>
        </button>
        <div id="menu">
            <transition name="expand">
                <div v-if="menu && open" class="menu-overlay">
                    <ul>
                        <li v-for="page in menu.items" :key="page.id"  class="menu-item-has-children">
                            <div @click="open = !open">
                                <nuxt-link v-if="page.object_slug != 'services' && page.object_slug != 'home'" :to="'/' + page.object_slug + '/'"  class="" v-html="page.title">
                                </nuxt-link>
                            </div>
                            <div>
                                <nuxt-link @click="open = !open" v-if="page.object_slug == 'home'" to="/"  class="" v-html="page.title">
                                </nuxt-link>
                            </div>
                            <span v-if="page.object_slug == 'services'" class="dead-link" v-html="page.title">
                            </span>
                            <ul v-if="page.hasOwnProperty('children')">
                                <li v-for="child in page.children " @click="open = !open" :key="child.id" >
                                    <nuxt-link :to="'/' + page.object_slug + '/' + child.object_slug + '/'"  class="" v-html="child.title"> </nuxt-link>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </transition>
        </div>
    </nav>
</template>

<script>
    import Menu from '~/components/Menu.vue'
    export default {
    	props: ['menuLinks','menuColor', 'small'],
        data: function () {
            return {
                scrolled: false,
                open: false,
            }
        },
        components: {
            appMenu: Menu,
        },
        computed: {
            menu () {
                return this.$store.getters.getMenu;
            }
        },
        methods: {
            handleScroll: function (event) {
                if(process.browser){
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
                }
            },
        },
        created: function () {
            if(process.browser){
                window.addEventListener('scroll', this.handleScroll);
                if (window.addEventListener){
                    window.addEventListener('scroll', this.handleScroll);
                } else if (window.attachEvent){
                    window.attachEvent('scroll', this.handleScroll);
                } else {
                    jQuery(window).on('scroll', this.handleScroll);
                    // console.log('IE');
                }
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
        watch: {
            '$route' () {
                // this.open = false
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '~/assets/sass/variables.scss';
    // @import '~/assets/sass/components/nav.scss';
    @import '~/node_modules/hamburgers/_sass/hamburgers/hamburgers.scss';

    .button{
        user-select: none;
        z-index: 100;
    }

    .hamburger{
        &:hover{
            opacity: 1;
        }
    }

    .logo{
        color: $yellow;
    }
</style>
