<template>
    <div class="view view--contact view--padding-top">
        <div class="uk-container uk-container-expand non-home-container">
            <h1>The Contact Page</h1>
            <hr>
            <!-- <div v-html="selected.content.rendered"></div> -->
            <p>Testing rendering of Contact page</p>
        </div>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import Footer from '../components/Footer.vue';
    export default {
        components: {
            // theContent: Content,
            appFooter: Footer,
        },
        data: function () {
            return {
                selected: []
            }
        },
        props: ['pageList'],
        mounted: function() {
            this.getPage(this.pageList);
        },
        methods: {
            getPage(pages) {
                for (let page of pages) {
                    console.log(page.slug);
                    if (page.slug == 'contact') {
                        console.log('found it');
                        console.log(page);
                        this.selected = page;
                        break;
                    }
                }
            }
        }
    }
</script>