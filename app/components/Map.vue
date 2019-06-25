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
                markers: []
            }
        },
        mounted() {
            console.log("hello");
            this.map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(43.523291, -79.711384),
                zoom: 15,
                styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#a68d29"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#2d2d2d"},{"lightness":9},{"visibility":"simplified"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.station.airport","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"water","elementType":"geometry","stylers":[{"saturation":-83},{"lightness":-51}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]}],
                disableDefaultUI: true,
                zoomControl: true,
                scaleControl: true
            });
            this.markers.push(
                new google.maps.Marker(
                    {
                        position: new google.maps.LatLng(43.523291, -79.711384),
                        map: this.map,
                        title: 'Hello World!'
                    }
                )
            )
        },

    }
</script>

<style lang="scss" scoped>
    #map {
        height: 70vh;
    }
</style>