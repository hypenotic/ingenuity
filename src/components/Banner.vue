<template>
    <div class="default-hero">
        <figure v-if="page.type == 'page'" :style="'background-image: url('+page.meta_box._page_hero_image+'); background-size: cover;'"></figure>
        <div v-if="page.type == 'page'" class="hgroup animated fadeInDown">
            <h1 v-if="page.meta_box._page_hero_heading != ''" v-html="page.meta_box._page_hero_heading"></h1>
            <h1 v-else v-html="pageInfo.title.rendered"></h1>
            <h2 v-if="page.meta_box._page_hero_subheading != ''" v-html="page.meta_box._page_hero_subheading"></h2>
        </div>

        <figure v-if="page.type == 'project'" :style="'background-image: url('+page.meta_box._banner_image[0].full_url+'); background-size: cover;'"></figure>
        <div v-if="page.type == 'project'" class="hgroup animated fadeInDown">
            <h1 v-if="page.meta_box._banner_heading != ''" v-html="page.meta_box._banner_heading"></h1>
            <h1 v-else v-html="pageInfo.title.rendered"></h1>
            <h2 v-if="page.meta_box._banner_subheading != ''" v-html="page.meta_box._banner_subheading"></h2>
        </div>

        <figure v-if="page.type == 'service'" :style="'background-image: url('+page.meta_box._service__banner_image+'); background-size: cover;'"></figure>
        <div v-if="page.type == 'service'" class="hgroup animated fadeInDown">
            <h1 v-if="page.meta_box._service__banner_heading != ''" v-html="page.meta_box._service__banner_heading"></h1>
            <h1 v-else v-html="pageInfo.title.rendered"></h1>
            <h2 v-if="page.meta_box._service__banner_subheading != ''" v-html="page.meta_box._service__banner_subheading"></h2>
        </div>

        <figure v-if="page.type == 'post'" :style="'background-image: url('+page.meta_box._post_hero_image+'); background-size: cover;'"></figure>
        <div v-if="page.type == 'post'" class="hgroup animated fadeInDown">
            <h1 v-if="page.meta_box._post_hero_heading != ''" v-html="page.meta_box._post_hero_heading"></h1>
            <h1 v-else v-html="pageInfo.title.rendered"></h1>
            <h2 v-if="page.meta_box._post_hero_subheading != ''" v-html="page.meta_box._post_hero_subheading"></h2>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['page'],
        data() {
            return {
            };
        },
        components: {
        },
        created() {
            console.log('Banner');
        }
    }
</script>

<style lang="scss" scoped>

// Import Variables
@import '../sass/variables.scss';

h2 {
    color: $white;
    text-transform: uppercase;
    font-family: $lite-headings;
    font-weight: 300;
}


</style>