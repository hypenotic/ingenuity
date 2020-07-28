<template>
    <nav :class="{small: small}">
        <div :class="{open: open}">
            <nuxt-link to="/" class="logo">
                <img src="~/assets/images/logo.svg" alt="Ingenuity">
                <span v-if="small" class="logo-text">Ingenuity</span>
            </nuxt-link>
        </div>
        <button @click="open = !open" class="button">
            <div :class="{open: open, button: true}">
                <div class="hamburger hamburger--emphatic" :class="{'is-active': open}">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
                {{(open) ? 'Close' : 'Menu'}}
            </div>
        </button>
        <div :class="[open ? 'open' : 'closed']" id="menu">
            <div class="menu-overlay">
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
        </div>
    </nav>
</template>

<script>
    import Menu from '~/components/Menu.vue'
    export default {
    	props: ['menuLinks','menuColor', 'small'],
        data: function () {
            return {
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
    }
</script>

<style lang="scss" scoped>
    @import '~/assets/sass/variables.scss';
    // @import '~/assets/sass/components/nav.scss';
    @import '~/node_modules/hamburgers/_sass/hamburgers/hamburgers.scss';

    .button{
        user-select: none;
        z-index: 10000;
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
