<template>
    <div class="menu-overlay">
        <ul>
            <li v-for="page in menu.items" :key="page.id"  class="menu-item-has-children">
                <nuxt-link v-if="page.object_slug != 'services' && page.object_slug != 'home'" :to="'/' + page.object_slug"  class="" v-html="page.title">
                </nuxt-link>
                <nuxt-link v-if="page.object_slug == 'home'" to="/"  class="" v-html="page.title">
                </nuxt-link>
                <span v-if="page.object_slug == 'services'" class="dead-link" v-html="page.title">
                </span>
                <ul v-if="page.hasOwnProperty('children')">
                    <li v-for="child in page.children " :key="child.id" >
                        <nuxt-link :to="'/' + page.object_slug + '/' + child.object_slug"  class="" v-html="child.title"> </nuxt-link>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        computed: {
            menu () {
                return this.$store.getters.getMenu;
            }
        }
    }
</script>

<style lang="scss" scoped>
    // @import '~/assets/sass/variables.scss';
    // @import '~/assets/sass/components/menu.scss';
</style>