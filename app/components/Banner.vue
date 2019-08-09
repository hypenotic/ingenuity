<template>
    <div class="default-hero">
        <figure v-if="page.type == 'page'" :style="'background-image: url('+page.meta_box._page_hero_image+'); background-size: cover;'"></figure>
        <div v-if="page.type == 'page'" class="hgroup center-hgroup" data-aos="fade-down" data-aos-delay="500">
            <h1 v-if="page.meta_box._page_hero_heading != ''" v-html="page.meta_box._page_hero_heading"></h1>
            <h1 v-else v-html="pageInfo.title.rendered"></h1>
            <h2 v-if="page.meta_box._page_hero_subheading != ''" v-html="page.meta_box._page_hero_subheading"></h2>
        </div>

        <figure v-if="page.type == 'project'" :style="'background-image: url('+page.meta_box._banner_image[0].full_url+'); background-size: cover;'"></figure>
        <div v-if="page.type == 'project'" class="hgroup" data-aos="fade-down" data-aos-delay="500">
            <h1 v-if="page.meta_box._banner_heading != ''" v-html="page.meta_box._banner_heading"></h1>
            <h1 v-else v-html="pageInfo.title.rendered"></h1>
            <h2 v-if="page.meta_box._banner_subheading != ''" v-html="page.meta_box._banner_subheading"></h2>
        </div>

        <figure v-if="page.type == 'service'" :style="'background-image: url('+page.meta_box._service__banner_image+'); background-size: cover;'"></figure>
        <div v-if="page.type == 'service'" class="hgroup service-hgroup" data-aos="fade-down" data-aos-delay="500">
            <p v-html="page.title.rendered" class="service-banner__title"></p>
            <h1 v-if="page.meta_box._service__banner_heading != ''" v-html="page.meta_box._service__banner_heading"></h1>
            <h1 v-else v-html="pageInfo.title.rendered"></h1>
            <h2 v-if="page.meta_box._service__banner_subheading != ''" v-html="page.meta_box._service__banner_subheading"></h2>
        </div>

        <figure v-if="page.type == 'post'" :style="'background-image: url('+page.meta_box._post_hero_image+'); background-size: cover;'"></figure>
        <div v-if="page.type == 'post'" class="hgroup" data-aos="fade-down" data-aos-delay="500">
            <h1 v-if="page.title.rendered != ''" v-html="page.title.rendered"></h1>
            <h1 v-else v-html="pageInfo.title.rendered"></h1>
            <h2 v-if="page.meta_box._post_hero_heading != ''" v-html="page.meta_box._post_hero_heading"></h2>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['page'],
        data() {
            return {
                theData: this.page
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


</style>