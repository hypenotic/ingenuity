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
    });
});


