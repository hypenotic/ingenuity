<template>
   <div>
    <navigation></navigation>
    <div class="home-hero" id="header-check">
      <div class="video-overlay">
      </div>
      <div class="video">
          <video playsinline autoplay muted loop poster="https://ingenuity.ca/cms/custom/uploads/2018/02/poster.jpg" id="bgvid" type='video/mp4'>
              <source src="~/assets/videos/ingenuity_fast.mp4" type="video/mp4">
          </video>
      </div>
      <div class="hgroup rw-wrapper" id="content-start">
        <h2 class="rw-sentence">
          {{error.statusCode}}
        </h2>
        <h2 class="rw-sentence">
          <span v-if="error.statusCode === 404">Page not found</span>
          <span v-else>An error occurred.</span>
        </h2>
        <h3 class="rw-sentence">
          <nuxt-link to="/">Home page</nuxt-link>
        </h3>
      </div>
    </div>
      <!-- <app-footer></app-footer> -->
   </div>
</template>

<script>

import navigation from '~/components/Nav.vue';
import appFooter from '~/components/Footer.vue';

export default {
  props: ['error'],
  components:{
    navigation,
    appFooter
  },
  head(){
    return{
      htmlAttrs: {
        lang: 'en'
      },
    }
  },
}
</script>


<style lang="scss">

   @import '~/assets/sass/variables.scss';
   @import '~/assets/sass/global.scss';
   @import '~/assets/sass/typography.scss';
   @import '~/assets/sass/components/nav.scss';
   @import '~/assets/sass/components/menu.scss';
   @import '~/assets/sass/components/footer.scss';
   @import '~/assets/sass/components/skip-to-content.scss';
   @import '~/assets/sass/views/home.scss';

</style>

