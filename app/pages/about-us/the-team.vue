<template>
  <div class="team-panels">
    <app-banner :page="page" id="content-start"></app-banner>
    <div class="leadership-banner">
      <h3>Meet the leadership</h3>
    </div>

    <div class="main-wrapper">
      <section class="main-content standard-center" v-html="page.content.rendered">
      </section>
    </div>

    <div class="team__container--leadership team__container">
      <div
        v-for="member in team.filter(m=>m.meta_box._team_section=='leadership').sort((a,b)=>a.menu_order - b.menu_order)"
        :key="member.id">
        <div @click="toggleOpenMember(member.id)" :id="'member-'+member.id">
          <nuxt-link :to="{route: route, hash: '#member-'+member.id}" class="team__single team__single--leadership"
            :class="{'team__single--open': openMember == member.id}">
            <div class="team__image" :style="'background-image: url('+member.meta_box._team_styled_image +');'"></div>
            <div class="team-overlay"></div>
            <div class="hgroup">
              <h3 class="team__name" v-html="member.title.rendered"></h3>
              <span class="team__creds" v-html="member.meta_box._team_creds"></span>
              <h4 class="team__title" v-html="member.meta_box._team_job_title"></h4>
            </div>
          </nuxt-link>
        </div>
        <div v-if="openMember == member.id" class="drop-down-panel drop-down-panel--leader" :id="member.id">
          <img :src="member.meta_box._team_extra_image" alt="Knolling picture" class="knolling-pic">
          <div class="push__longbio animated fadeIn">
            <div class="split">
              <div class="split--content" v-html="member.content.rendered"></div>
              <div class="split--image">
                <video v-if="member.meta_box._team_movie" class="team-vid" :id="'member-vid-'+member.id" loop muted autoplay>
                  <source :src="member.meta_box._team_movie" type="video/mp4" />
                </video>
                <img v-else :src="member.meta_box._team_still" :alt="`Picture of ${member.title.rendered}`" class="team-vid" :id="'member-still-'+member.id">
              </div>
            </div>
          </div>
          <div class="button__container" @click="openMember = null">
            <nuxt-link :to="{hash: '#member-'+member.id}" class="close-push-panel">CLOSE</nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="foundation-banner">
      <h3>Meet the foundation</h3>
    </div>
    <div class="team__container team__container--foundation">
      <div
        v-for="member in team.filter(m=>m.meta_box._team_section=='foundation').sort((a,b)=>a.menu_order - b.menu_order)"
        :key="member.id">
        <div @click="toggleOpenMember(member.id)" :id="'member-'+member.id">
          <nuxt-link :to="{route: route, hash: '#member-'+member.id}" class="team__single team__single--foundation"
            :class="{'team__single--open': openMember == member.id}">
            <div class="team__image" :style="'background-image: url('+member.meta_box._team_styled_image +');'"></div>
            <div class="team-overlay"></div>
            <div class="hgroup">
              <h3 class="team__name" v-html="member.title.rendered"></h3>
              <span class="team__creds" v-html="member.meta_box._team_creds"></span>
              <h4 class="team__title" v-html="member.meta_box._team_job_title"></h4>
            </div>
          </nuxt-link>
        </div>
        <div v-if="openMember == member.id" class="drop-down-panel drop-down-panel--foundation" :id="member.id">
          <!-- <img :src="member.meta_box._team_extra_image" alt="Knolling picture" class="knolling-pic"> -->
          <div class="push__longbio animated fadeIn">
            <div class="split">
              <div class="split--content" v-html="member.content.rendered"></div>
              <div class="split--image">
                <video class="team-vid" :id="'member-vid-'+member.id" loop muted autoplay>
                  <source :src="member.meta_box._team_movie" type="video/mp4" />
                </video>
              </div>
            </div>
          </div>
          <div class="button__container" @click="openMember = null">
            <nuxt-link :to="{hash: '#member-'+member.id}" class="close-push-panel">CLOSE</nuxt-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import {
    helper
  } from '~/plugins/helper.js';

  import Nav from '~/components/Nav.vue';
  import Banner from '~/components/Banner.vue';
  import Footer from '~/components/Footer.vue';
  import TeamMemberBanner from '~/components/TeamMemberBanner.vue';
  import TeamMemberSection from '~/components/TeamMemberSection.vue';

  export default {
    async fetch({
      store
    }) {
      await store.dispatch('apiPages')
      await store.dispatch('apiTeam')
      await store.dispatch('apiMenu')
      await store.dispatch('apiBlogs')
    },
    layout: 'withfooter',
    head() {
      return {
        title: "The Team",
        meta: [{
            hid: 'og:image',
            property: 'og:image',
            content: this.page.meta_box._page_hero_image
          },
          {
            hid: 'og:title',
            property: 'og:title',
            content: "The Team"
          },
          {
            hid: 'og:url',
            property: 'og:url',
            content: this.$store.state.siteUrl + "" + this.$route.path
          },
          {
            hid: 'og:description',
            property: 'og:description',
            content: helper.stripTags(helper.decodeHtmlEntity(this.page.excerpt.rendered))
          },
          {
            hid: 'description',
            name: 'description',
            content: helper.stripTags(helper.decodeHtmlEntity(this.page.excerpt.rendered))
          }
        ]
      }
    },
    components: {
      appBanner: Banner,
      appFooter: Footer,
      appNav: Nav,
      tmBanner: TeamMemberBanner,
      tmSection: TeamMemberSection,
    },
    data() {
      return {
        menuLinks: [],
        openMember: null,
        errors: [],
        fullPath: this.$route.fullPath,
        slug: this.$route.path,
        pageData: null
      }
    },
    computed: {
      page() {
        return this.$store.getters.getPages.filter(el => el.slug == 'the-team')[0]
      },
      team() {
        return this.$store.getters.getTeam
      },
      route() {
        return this.$route.path
      }
    },
    methods: {
      toggleOpenMember: function (id) {
        if (this.openMember == id) {
          this.openMember = null;
        } else {
          this.openMember = id;
        }
      },
      scrollTo: function (element, to, duration) {
        var start = element.getBoundingClientRect().top,
          change = to - start,
          currentTime = 0,
          increment = 20;

        Math.easeInOutQuad = function (t, b, c, d) {
          //t = current time
          //b = start value
          //c = change in value
          //d = duration
          t /= d / 2;
          if (t < 1) return c / 2 * t * t + b;
          t--;
          return -c / 2 * (t * (t - 2) - 1) + b;
        };

        var animateScroll = function () {
          currentTime += increment;
          var val = Math.easeInOutQuad(currentTime, start, change, duration);
          element.scrollTop = val;
          if (currentTime < duration) {
            setTimeout(animateScroll, increment);
          }
        };
        animateScroll();
      },
      closeAll: function (ID) {
        var slides = document.getElementsByClassName("drop-down-panel");
        for (var i = 0; i < slides.length; i++) {
          slides[i].classList.remove("open-dropdown");
        }
        let select = document.getElementById(ID);
        // this.scrollTo(document.documentElement, select.offsetTop+300, 500)
      },

      dropDown: function (ID) {
        let select = document.getElementById(ID);
        if (select.classList.contains('open-dropdown')) {
          console.log('already open');
          this.closeAll(ID);
        } else {
          var slides = document.getElementsByClassName("drop-down-panel--leader");
          for (var i = 0; i < slides.length; i++) {
            slides[i].classList.remove("open-dropdown");
          }

          console.log('not open');
          select.classList.add("open-dropdown");

          // this.scrollTo(document.documentElement, select.getBoundingClientRect().top+(document.documentElement.clientHeight), 500)
        }
      },
    },
  };
</script>

<style lang="scss">
  @import '~/assets/sass/base.scss';
  

.team__image{
  height: 100%;
  position: absolute;
  right: 0;
  width: 100%;
  z-index: 10;
  background-position: top right;
  background-size: auto 150%;
  background-repeat: no-repeat;
  mix-blend-mode: multiply;
  // background-image: url(~assets/images/omar.jpg);
}


.leadership-banner,
.foundation-banner {
    background: $yellow;
    background: #ffd200;
	text-align: center;
	padding: 24px 0;
	position: relative;
    h3 {
        margin: 0;
    }
    &:after {
		content:'';
		position: absolute;
		top: 100%;
		left: 50%;
		margin-left: -30px;
		width: 0;
		height: 0;
		border-top: solid 30px #ffd200;
		border-left: solid 30px transparent;
		border-right: solid 30px transparent;
    }
}

.foundation-banner {
    background: $white;
    position: relative;
    z-index: 30;
    &:after {
		border-top: solid 30px $white;
		border-left: solid 30px transparent;
		border-right: solid 30px transparent;
    }
}

.leadership-banner {
    margin-bottom: 30px;
    &:after {
		content:'';
		position: absolute;
		top: 100%;
		left: 50%;
		margin-left: -30px;
		width: 0;
		height: 0;
		border-top: solid 30px #ffd200;
		border-left: solid 30px transparent;
		border-right: solid 30px transparent;
    }
}

.portrait {
    img {
        width: 80%;
        height: auto;
        display: block;
        margin: 0 auto;
    }
}

.team__name,
.team__creds {
    display: inline-block;
    margin: 0;
}

.team__creds {
    font-size: 12px;
    font-family: $main-headings;
    line-height: 1;
}

.portrait {
    position: relative;
}

.team__container.team__container--leadership,
.team__container.team__container--foundation {
	position: relative;
	padding: 0;
    display:flex;
    align-items: flex-start;
    justify-content: center;
    flex-direction: column;
    >div {
        width: 100%;
    }
	.team__single {
        text-decoration: none;
        background-color: $yellow;
        background-color: #ffd200;
        background-position: top right;
        background-repeat:no-repeat;
        transition: none;
		position: relative;
		min-height: 150px;
		width: 100%;
		// margin-bottom: 25px;
		transition: all 0.5s;
		border-bottom: 2px solid $black;
		display:flex;
        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
        
        &.team__single--open{
            min-height: 150px;
            height: 150px;
            background-position: top 0 right -400px;
            // background-image: none !important;
            h4{
                display: none;
            }
            h3 {
                font-size: 35px;
                line-height: 35px;
                margin: 0;
                @media #{$medium-and-up} {
                    font-size: 35px;
                    line-height: 35px;
                }
                @media #{$large-and-up} {
                    font-size: 35px;
                    line-height: 35px;
                }
                @media #{$xlarge-and-up} {
                    font-size: 35px;
                    line-height: 35px;
                    margin: 0;
                }
            }
        }
        @media #{$medium-and-up} {
			min-height: 250px;
			border-bottom: 0;
		}
		@media #{$large-and-up} {
			min-height: 300px;
			border-bottom: 0;
		}
		&:hover {
			cursor: pointer;
            background-color: $black;
            background-color: #ffd200;
			.hgroup h3,
			.hgroup h4,
			.team__creds {
				color: $yellow;
			}
			@media #{$bp-small} {
				background-color: $yellow;
				.hgroup h3,
				.hgroup h4,
				.team__creds {
					color: $black;
				}
			}
		}
		figure {
			position: absolute;
			top: 0;
			left: 0;
			background-position: center center;
			background-size: cover;
			width: 100%;
			height: 100%;
			filter: grayscale(100%) brightness(0.9);
			z-index: 3;
		}
		.hgroup {
			position: relative;
			padding: 0 25px;
			z-index: 4;
			// transition: all 0.5s;
		}
	}
}

.team__single--leadership,
.team__single--foundation {
    position: realative;
    &:hover {
        .team-overlay {
            background: rgba(0,0,0,0.5);
        }
        h3, h4, .team__creds {
            color: $yellow;
        }
    }
    .team-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.7);

        background: transparent;
        // transition: all 0.5s ease;
    }
    h3, h4, .team__creds {
        color: $yellow;
        color: $black;
    }
    h3 {
        font-size: 20px;
        line-height: 20px;
        margin: 0;
        @media #{$medium-and-up} {
			font-size: 70px;
            line-height: 70px;
        }
        @media #{$large-and-up} {
			font-size: 135px;
            line-height: 135px;
        }
        @media #{$xlarge-and-up} {
			font-size: 130px;
            line-height: 130px;
            margin: 0;
		}
    }
    h4 {
        font-size: 16px;
        line-height: 16px;
        margin: 0;
        @media #{$small-and-down} {
            font-family: 'Audimat3000-Leger';
        }
        @media #{$medium-and-up} {
			font-size: 32px;
            line-height: 32px;
            margin: 0;
        }
    }
    .team__creds {
        font-size: 14px;
        line-height: 14px; 
        @media #{$small-and-down} {
            margin-bottom: 4px;
        }
        @media #{$medium-and-down} {
            display: block;
            // margin-bottom: 10px;
        }
        @media #{$medium-and-up} {
			font-size: 24px;
            line-height: 24px; 
            margin: 0;
        }
    }
}

.team__single--foundation {
    .team-overlay {
        background: transparent;
    }
    h3, h4, .team__creds {
        color: $black;
    } 
}


.drop-down-panel {
    position: relative;
    width: 100%;
    // height: 0;
    overflow: hidden;
    color: $black;
    // transition: all 0.5s ease;
    .knolling-pic {
        max-width: 100%;
        height: auto;
        @media #{$large-and-up} {
			// max-width: 1300px;
            margin: 0 auto 0px;
            display: block;
        }
    }
    .push__longbio {
        padding: 24px 40px;
        @media #{$medium-and-up} {
			padding: 50px;
        }
        @media #{$xlarge-and-up} {
            padding: 50px;
            max-width: 1200px;
            margin: 0 auto;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    }
    .split {
        @media #{$medium-and-up} {
            display: flex;
            width: 100%;
            flex-wrap: wrap;
            justify-content: space-between;
			.split--image {
                width: 35%;
            }
            .split--content {
                width: 60%;
            }
		}
    }
    .button__container {
        text-align: right;
    }
	a.close-push-panel {
		// display: none;
		color: $yellow;
		background-color: $black;
        border: none;
        top: 50%;
        right: 0;
		padding: 16px;
		margin-top: 0px;
		font-family: $lite-headings;
        font-size: 18px;
        position: fixed;
        text-decoration: none;
        z-index: 1000;
		&:hover {
            background-color: darken($yellow, 10%); 
            color: $black;
            cursor: pointer;
		}
		@media #{$bp-small} {
			display: block;
			padding: 10px 15px;

		}
	}
}

#video1,
.team-vid {
    // position: absolute;
    top: 0;
    left: 0%;
    width: 100%;
    height: auto;
    opacity: 0;
    opacity: 1;
    // z-index: 1000000000;
    transition: all 0.5s ease;
}

.split--image {
    position: relative;
    &:hover {
        #video1,
        .team-vid {
            opacity: 1;
        }
    }
}

.drop-down-panel--leader.open-dropdown,
.drop-down-panel--foundation.open-dropdown {
    position: relative;
    width: 100%;
    height: 100%;
    // overflow: hi;
    color: $black;
}

.base-image {
    position: relative;
    img {
        max-height: 470px;
    }
}

.pulse {
    // margin:100px;
    position: absolute;
    right: 15px;
    top: 20px;
    z-index: 10000;
    display: block;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: #ffd200;;
    cursor: pointer;
    box-shadow: 0 0 0 #ffd200;
    animation: pulse 1.5s infinite;
    i {
        font-size: 12px;
    }
    display: flex;
    align-items: center;
    justify-content: center;
    svg {
        width: 8px;
        height: 8px;
        opacity: 0.6;
    }
  }
  .pulse:hover {
    animation: none;
  }
  
  @-webkit-keyframes pulse {
    0% {
      -webkit-box-shadow: 0 0 0 0 rgba(204,169,44, 0.4);
    }
    70% {
        -webkit-box-shadow: 0 0 0 10px rgba(204,169,44, 0);
    }
    100% {
        -webkit-box-shadow: 0 0 0 0 rgba(204,169,44, 0);
    }
  }
  @keyframes pulse {
    0% {
      -moz-box-shadow: 0 0 0 0 rgba(204,169,44, 0.4);
      box-shadow: 0 0 0 0 rgba(204,169,44, 0.4);
    }
    70% {
        -moz-box-shadow: 0 0 0 10px rgba(204,169,44, 0);
        box-shadow: 0 0 0 10px rgba(204,169,44, 0);
    }
    100% {
        -moz-box-shadow: 0 0 0 0 rgba(204,169,44, 0);
        box-shadow: 0 0 0 0 rgba(204,169,44, 0);
    }
  }

  .team__single--foundation,
  .team__single--leadership {
    background-size: 60%;
    @media #{$medium-and-up} {
		background-size: auto 500px;
    }
    @media #{$xlarge-and-up} {
		background-size: auto 500px;
	}
}



</style>