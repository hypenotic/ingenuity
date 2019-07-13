<template>
    <no-ssr>
    <footer class="main-footer">
        <div class="footer__blog footer__third">
            <h3><a href="<?php echo get_home_url(); ?>/news">Recent Posts</a></h3>
            <p v-for="post in this.$store.state.blogList" :key="post.id">
                    <nuxt-link :to="'/news/' + post.id + '/' + post.slug"  v-html="post.title.rendered">
                </nuxt-link>
            </p>
        </div>
        <div class="footer__news footer__third footer__third--align">
            <div id="mc_embed_signup">
            <form action="https://ingenuity.us18.list-manage.com/subscribe/post?u=b6b1849cf5d43546d8e96bcc9&amp;id=a3ff15cdbd" method="post" class="footer-newsletter validate" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                <h4>Get Ingenuity in your mailbox!</h4>
                
                <span class="input input--ingenuity">
                    <input type="email" value="" name="EMAIL" class="email input__field input__field--ingenuity" id="mce-EMAIL" placeholder="email address" required>
                    <label class="input__label input__label--ingenuity" for="mce-EMAIL">
                        <span class="input__label-content input__label-content--ingenuity">Email</span>
                    </label>
                </span>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;"><input type="text" name="b_b6b1849cf5d43546d8e96bcc9_a3ff15cdbd" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </form>
            </div>

            <!--End mc_embed_signup-->
        </div>
        <div class="footer__cta footer__third footer__third--align">
            <h4>​Great buildings begin with a conversation.</h4>
			<nuxt-link to="/contact-us">
				<a><button class="button-down">Let's talk over an espresso!</button></a>
			</nuxt-link>
            
        </div>
    </footer>
    </no-ssr>
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
            }
        },
        created: function() {
            console.log('FOOTER LOADED');
        },
        methods: {
            
        },
        beforeMount() {
        },
        computed: {
        }
    }
</script>

<style lang="scss" scoped>

@import '~/assets/sass/variables.scss';
@import '~/assets/sass/components/footer.scss';

</style>