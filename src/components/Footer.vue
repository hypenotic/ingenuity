<template>
    <footer id="contact-info" class="">
        <div class="footer-outer-container">
            
        </div>
        <div class="footer-credits">
           <div class="footer-credits-wrapper"> <p>Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="http://hypenotic.com" target="_blank">Hypenotic</a></p></div>
        </div>
    </footer>
</template>

<script>
    import es6Promise from 'es6-promise';
    es6Promise.polyfill();
    import 'es6-promise/auto';
    import axios from 'axios';
    export default {
        props: ['pageList', 'loadCheck'],
        data: function () {
            return {
                footerContent: [],
                twitterClick: 'Twitter',
                fbClick: 'FB',
                liClick: 'LinkedIn'
            }
        },
        created: function() {
            console.log('FOOTER LOADED');
        },
        methods: {
            getFooter() {
                var app = this;
                if (app.footerContent.length > 0) {
                    // setTimeout(function(){ app.blogLoad = false }, 1000);
                } else {
                    console.log('footer - loading');
                    axios.get('')
                    .then(function (response) {
                        console.log(response.data);
                        app.footerContent = response.data;
                        // setTimeout(function(){ app.blogLoad = false }, 1000);
                    })
                    .catch(function (error) {
                    console.log(error)
                    })
                } 
            },
            gaSocialClick(clickName) {
                this.$ga.event('Social Link', 'click', clickName, 1);
                console.log(clickName);
            }
        },
        beforeMount() {
            this.getFooter();
        },
        computed: {
        }
    }
</script>

<style lang="scss">
@import '../sass/variables.scss';

footer {
    background: $black !important;
    color: $white;
    padding: 50px 0 0;
    a {
        // font-size: 1rem !important;
    }
    h1,h2,h3,h4,h5,h6 {
        color: $white;
    }
    h5 {
        font-size: 1.5rem;
        text-transform: uppercase;
    }
    h6 {
        font-size: 1.1rem;
    }
    p,a {
        font-size: 0.8rem !important;
        line-height: 1.2rem !important;
    }
}

.contact-block {
    h6 {
        margin-bottom: 5px;
    }
    p {
        margin-top: 0;
    }
}

.footer-outer-container {
    max-width: 1150px;
    margin: 0 auto;
    @media #{$small-and-down} {
        padding: 0 30px;
    }
}

.footer-container {
    @media #{$large-and-up} {
        display: flex;
        justify-content: space-between;
        >div {
            width: 28%;
        }
    }
}

.footer-social-share {
    list-style-type: none;
    margin: 0;
    padding: 0;
    li {
        i {
            margin-right: 10px;
        }
        a {
            &:hover {
                text-decoration: none;
            }
        }
    }
}

.footer-credits {
    background: $black !important;
    p {
        color: $white;
        text-align: right;
        margin: 0;
        font-family: $heading-type;
        opacity: 0.5;
        font-size: 0.6rem !important;
        text-transform: uppercase;
    }
    a {
        font-size: 0.6rem !important;
    }
    .footer-credits-wrapper {
        max-width: 960px;
        margin: 0 auto;
        padding: 32px 0 16px;
    }
}
</style>