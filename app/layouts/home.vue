<template>
   <div>
      <nuxt-link :to="{hash: '#content-start'}" class="skip-to-content">Skip to content</nuxt-link>
      <navigation></navigation>
      <nuxt/>
   </div>
</template>

<script>

import navigation from '~/components/NavStatic.vue';

export default {
   components:{
      navigation,
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

</style>

