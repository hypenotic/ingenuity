<template>
    <div class="view view--home">
        <h1>Home</h1>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import Content from '../components/content.vue';
    import Footer from '../components/Footer.vue';
    export default {
        components: {
            theContent: Content,
            appFooter: Footer,
        },
        data: function () {
            return {
                selected: [],
                featImage:"",
                browserV: false
            }
        },
        props: ['pageList', 'loadCheck'],
        created: function() {
            console.log('home');
            this.getBrowser();
            this.getPage(this.pageList);
        },
        watch: {
            selected: function ( newVal ) {
                this.selected = newVal;
            }
        },
        methods: {
            getBrowser: function() {
                var ua = window.navigator.userAgent;

                var msie = ua.indexOf('MSIE ');
                if (msie > 0) {
                    // IE 10 or older => return version number
                    // return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
                    // console.log('IE10 LESS');
                    this.browserV = true;
                }

                var trident = ua.indexOf('Trident/');
                if (trident > 0) {
                    // IE 11 => return version number
                    var rv = ua.indexOf('rv:');
                    // return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
                    // console.log('IE11');
                    this.browserV = true;
                }

                var edge = ua.indexOf('Edge/');
                if (edge > 0) {
                    // Edge (IE 12+) => return version number
                    // return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
                    // console.log('EDGE');
                    this.browserV = false;
                }

                // other browser
                // return false;
                // console.log('OTHER');
                this.browserV = false;
            },
            getPage(pages) {
                for (let page of pages) {
                    // console.log(page.slug);
                    if (page.slug == 'home') {
                        // console.log('found it');
                        console.log(page);
                        this.selected = page;
                        break;
                    }
                }
            }
        },
        computed: {
        }
    }
</script>

<style lang="scss" scoped>
@import '../sass/variables.scss';

.overlay::before {
    content:"";
    display: block;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 300;
    background-color: rgba(0, 0, 0, 0.5);
}

</style>