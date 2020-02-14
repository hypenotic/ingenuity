<template>
    <div id="map">
    </div>
</template>

<script>

    export default {
        mounted() {
            const map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(43.526, -79.711384),
                zoom: 15,
                styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#a68d29"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#2d2d2d"},{"lightness":9},{"visibility":"simplified"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.station.airport","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"water","elementType":"geometry","stylers":[{"saturation":-83},{"lightness":-51}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]}],
                disableDefaultUI: true,
                zoomControl: true,
                scaleControl: true,
            });
            
            const contentString = 
            `<div class='infowindow'>
                <p class='info'>Let's talk over an espresso!</p>
                <p><a class='info' href="tel:9055692624">(905) 569-2624</a></p>
                <p><a class='info' href='https://goo.gl/maps/bPmFvSrNnWRhfJ9V8' target='_blank'>3800-A Laird Rd Unit 1, Mississauga, ON L5L 0B2</a></p>
            </div>`
            const infowindow = new google.maps.InfoWindow({
                content: contentString
            })

            const marker = new google.maps.Marker(
                {
                    position: new google.maps.LatLng(43.523291, -79.711384),
                    map: map,
                    title: 'Hello World!',
                    icon: "/homemap.png"
                }
            )


            marker.addListener('click', function() {
                infowindow.open(map, marker)
                console.log('wow click');
            });

            infowindow.open(map, marker)


        },
    }
    
</script>

<style>

    #map a.info{
        text-decoration: none;
    }

</style>

<style lang="scss" scoped>
    #map {
        height: 70vh;
    }
</style>