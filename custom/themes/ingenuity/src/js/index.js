$ = jQuery;

$('.gallery').flickity({

});

$(function() {

	
    var iframe = $('#vimeo_player')[0],
        player = $f(iframe),
        status = $('.status');

    // When the player is ready MUTE
    player.addEvent('ready', function() {
        player.api('setVolume', 0);
        player.api('seekTo',8);
    });
});

// Menu Toggle ============================================

var anchor = document.getElementById('toggle-button');
var anchorBtn = document.getElementById('menu-toggle');

    
var open = false;
anchor.onclick = function(event){
	event.preventDefault();
	if(!open){
	  anchorBtn.classList.add('close');
	  open = true;
	  $( "#fullscreen-menu" ).toggle( "slide" );
	}
	else{
	  anchorBtn.classList.remove('close');
	  $( "#fullscreen-menu" ).toggle( "slide" );
	  open = false;
	}
};

// GOOGLE MAPS ============================================

// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);

function init() {

  // Basic options for a simple Google Map
 // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
 var mapOptions = {
     // How zoomed in you want the map to start at (always required)
     zoom: 15,

     // The latitude and longitude to center the map (always required)
     center: new google.maps.LatLng(43.5238744, -79.7086458), // New York

     // How you would like to style the map. 
     // This is where you would paste any style found on Snazzy Maps.
     styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#a68d29"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#2d2d2d"},{"lightness":9},{"visibility":"simplified"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.station.airport","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"water","elementType":"geometry","stylers":[{"saturation":-83},{"lightness":-51}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]}]
 };

 // Get the HTML DOM element that will contain your map 
 // We are using a div with id="map" seen below in the <body>
 var mapElement = document.getElementById('footer-map');

 // Create the Google Map using our element and options defined above
 var map = new google.maps.Map(mapElement, mapOptions);

 // Let's also add a marker while we're at it
 var marker = new google.maps.Marker({
     position: new google.maps.LatLng(43.5238744, -79.7086458),
     map: map,
     title: 'Ingenuity'
 });

}

// PUSH PANEL FOR TEAM PAGE ============================================

var menuRight = document.getElementById( 'push-panel' ),
	// showRightPush = document.getElementById( 'showRightPush' ),
	closepanel = document.getElementById( 'close-push-panel' ),
	body = document.body;

// showRightPush.onclick = function() {
// 	classie.toggle( this, 'active' );
// 	classie.toggle( body, 'cbp-spmenu-push-toleft' );
// 	classie.toggle( menuRight, 'cbp-spmenu-open' );
// };


// Grab the data attribute info, and print them into the overlay
function printTeamMemberInfo($single) {
	$('#push__name').append($single.data('name'));
	$('#push__longbio').html($single.data('longbio'))
};


$( ".trigger-push-panel" ).click(function() {
	$('#push__name').empty();
	$('#push__longbio').empty();

	$('html, body').animate({
		'scrollTop': $('#push-panel').offset().top - 120
	}, 'fast');

	printTeamMemberInfo($(this));

	classie.toggle( this, 'active' );
	classie.toggle( body, 'cbp-spmenu-push-toleft' );
	classie.toggle( menuRight, 'cbp-spmenu-open' );
});

closepanel.onclick = function() {
	$(body).removeClass("cbp-spmenu-push-toleft");
	$(menuRight).removeClass("cbp-spmenu-open");
}



