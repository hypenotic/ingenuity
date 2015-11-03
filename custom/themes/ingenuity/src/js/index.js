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

// Menu Toggle 

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



