<template>
  <div class="drop-down-panel" :id="tm.id">
    <img :src="tm.meta_box._team_extra_image" alt="" class="knolling-pic" v-if="tm.meta_box._team_section == 'leadership'">
    <div class="push__longbio animated fadeIn">
      <div class="split">
        <div class="split--content" v-html="tm.content.rendered"></div>
        <div class="split--image">
          <video class="team-vid" :id="'tm.vid-'+tm.id" loop muted autoplay>
            <source :src="tm.meta_box._team_movie" type="video/mp4" />
          </video>
        </div>
      </div>
    </div>
    <!-- <div class="button__container"><button class="close-push-panel" @click="close()">CLOSE</button></div> -->
  </div>
</template>

<script>
  export default{
    props: ['tm'],
  }
</script>