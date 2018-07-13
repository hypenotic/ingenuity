<template>
    <div>
        <section class="google-map" id="contact-map"></section>
        <div class="contact-container">
            <div class="contact__single wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.5s" v-for="contact in this.$store.state.contactList" :key="contact.id">
                <div class="contact__single__copy">
                    <h4 v-html="contact.title.rendered"></h4>
                    <div v-html="contact.content.rendered"></div>
                </div>
                <div class="contact__single__buttons">
                    <a :href="'tel:'+contact.meta_box._contact_phone">
                        <button v-html="contact.meta_box._contact_phone_btn"></button>
                    </a>
                    <a :href="'mailto:'+contact.meta_box._contact_email">
                        <h3><span class="contact-border" v-html="contact.meta_box._contact_email_btn"></span></h3>
                    </a>
                </div>
            </div>
        </div>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import Footer from '~/components/Footer.vue';
    import Nav from '~/components/Nav.vue';
    export default {
        fetch ({store}){
            return store.dispatch('dummy');
        },
        head () {
            console.log(this.pageInfo.meta_box._page_hero_image);
            return {
                meta: [
                    { hid: 'og:image', property: 'og:image', content: this.pageInfo.meta_box._page_hero_image },
                ]
            }  
        },
        components: {
            // theContent: Content,
            appFooter: Footer,
            appNav: Nav,
        },
        props: ['name'],
        data() {
            return {
                mapName: "contact-map",
                markerCoordinates: [],
                map: null,
                bounds: null,
                markers: [],
                posts: [],
                lat: '',
                lng: ''
            }
        },
        mounted() {
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                var isDraggable = false;
            } else {
                var isDraggable = true;
            }
            this.markerCoordinates.push(
                {latitude: 43.52385109999999, longitude: -79.71254299999998},
            );
            this.bounds     = new google.maps.LatLngBounds();
            const element   = document.getElementById(this.mapName)
            const mapCentre = this.markerCoordinates[0]
            const options   = {
                // How zoomed in you want the map to start at (always required)
                zoom: 16,

                scrollwheel:  false,
                draggable: isDraggable,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(43.523291, -79.711384), 

                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#a68d29"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#2d2d2d"},{"lightness":9},{"visibility":"simplified"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.station.airport","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"water","elementType":"geometry","stylers":[{"saturation":-83},{"lightness":-51}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]}]
            }
            this.map = new google.maps.Map(element, options);
            this.markerCoordinates.forEach((coord) => {
                const position  = new google.maps.LatLng(coord.latitude, coord.longitude);
                const theicon = 'https://data.ingenuity.ca/custom/uploads/2018/04/homemap.png'
                const marker = new google.maps.Marker({
                    position: new google.maps.LatLng(43.523291, -79.711384),
                    map: this.map,
                    icon: theicon
                });
                this.markers.push(marker)

                const contentString = '<div id="info-window-content">'+
                '<h3 id="firstHeading" class="firstHeading">Drop by for an espresso!</h3>'+
                '<a href="https://www.google.com/maps/place/Ingenuity/@43.523322,-79.7135727,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x390b5b52408b8c40!8m2!3d43.523322!4d-79.711384?hl=en" target="_blank"><p>3800A Laird Rd. - Unit 1 </p>'+
                '<p>Mississauga, ON L5L 0B2</p></a>'+
                '<a href="tel:+1-905-569-2624" target="_blank"><p>(905) 569-2624</p></a>'+
                '</div>';

                const infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(this.map,marker);
                });

                infowindow.open(this.map,marker);

                // this.map.fitBounds(this.bounds.extend(position))
            });
            this.map.panBy(0, -120);

        },
        methods: {

        },
        computed: {
            pageInfo: function(){
                if (this.$store.state.pageList != null) {
                    for (let page of this.$store.state.pageList ) {
                        if (page.slug == 'contact-us') {
                            console.log(page);
                            return page;
                            break;
                        }
                    }
                } else {
                    return null;
                }
            }
        },
    }
</script>

<style lang="scss">

@import '~/assets/sass/variables.scss';
@import '~/assets/sass/views/contact.scss';

</style>