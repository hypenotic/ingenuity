<template>
    <nav :class="{scrolled: scrolled, small: small}">
        <div :class="{open: open}">
            <nuxt-link to="/" class="logo">
                <img src="~/assets/images/logo.svg" alt="Ingenuity">
                <span v-if="scrolled || small" class="logo-text">Ingenuity</span>
            </nuxt-link>
        </div>
        <div id="menu">
            <transition name="expand">
                <app-menu v-if="menu && open"></app-menu>
            </transition>
        </div>
        <a :class="{open: open, button: true}" @click="open = !open" href="#menu">
            <div class="hamburger hamburger--emphatic" :class="{'is-active': open}">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
            {{(open) ? 'Close' : 'Menu'}}
        </a>
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
