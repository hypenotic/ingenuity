<template>
  <figure class="team__single" :style="'background-image: url('+tm.meta_box._team_styled_image +');'" :id="'member-'+tm.id">
    <div class="team-overlay"></div>
    <div class="hgroup">
      <h3 class="team__name" v-html="tm.title.rendered"></h3>
      <span class="team__creds" v-html="tm.meta_box._team_creds"></span>
      <h4 class="team__title" v-html="tm.meta_box._team_job_title"></h4>
    </div>
  </figure>
</template>

<script>
  export default{
    props: ['tm'],
  }
</script>

<style lang="scss">
  @import '~/assets/sass/base.scss';
  figure{
    background-position: top right;
    background-size: auto 500px;
    background-repeat:no-repeat;
  }
</style>