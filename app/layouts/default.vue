<template>
   <div>
      <nuxt/>
   </div>
</template>

<script>

import appnav from '~/components/Nav.vue';

export default {
   components:{
      appnav
   }   
}
</script>


<style lang="scss">

   @import '~/assets/sass/variables.scss';
   @import '~/assets/sass/global.scss';
   @import '~/assets/sass/animate.scss';
   @import '~/assets/sass/typography.scss';
   @import '~/assets/sass/components/nav.scss';
   @import '~/assets/sass/components/menu.scss';
   @import '~/assets/sass/components/footer.scss';
   
</style>

