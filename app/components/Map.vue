<template>
    <div id="map">
    </div>
</template>

<script>

    export default {
        components: {

        },
        data(){
            return {
                map: null,
                markers: [],
                infoWindows: [],
                contentString: "",

            }
        },
        mounted() {
            console.log("hello");
            this.map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(43.526, -79.711384),
                zoom: 15,
                styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#a68d29"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#2d2d2d"},{"lightness":9},{"visibility":"simplified"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.station.airport","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"water","elementType":"geometry","stylers":[{"saturation":-83},{"lightness":-51}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]}],
                disableDefaultUI: true,
                zoomControl: true,
                scaleControl: true,
                // InfoWindow({map})
            });
            this.markers.push(
                new google.maps.Marker(
                    {
                        position: new google.maps.LatLng(43.523291, -79.711384),
                        map: this.map,
                        title: 'Hello World!'
                    }
                ),
            ),
            this.contentString = '<a class="fuck" href="https://www.google.com/maps/place/Ingenuity/@43.52439,-79.7128884,17.15z/data=!4m5!3m4!1s0x882b425bf05c7f17:0x390b5b52408b8c40!8m2!3d43.5232912!4d-79.7113842" target="_blank" @click="open">3800-A Laird Rd Unit 1, Mississauga, ON L5L 0B2</a>'
            this.infoWindows.push(
                new google.maps.InfoWindow({
                    content: this.contentString
                })
            )
            this.infoWindows[0].open(this.map, this.markers[0])
            // this.markers.addListener('click', function() {
            //    this.infoWindows[0].open(this.map, this.markers[0]);
            // });
        },
        methods: {
            open(){
                console.log("WHAT")
                // this.infoWindows[0].open(this.map, this.markers[0]);
            }
        }
    }
    
</script>

<style lang="scss" scoped>
    #map {
        height: 70vh;
    }
    .fuck {
        color: red;
    }
</style>