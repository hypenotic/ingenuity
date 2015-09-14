 var topRange      = 200,  // measure from the top of the viewport to X pixels down
     edgeMargin    = 500,   // margin above the top or margin from the end of the page
     animationTime = 500, // time in milliseconds
     contentTop = [];

$(document).ready(function(){ 

// Stop animated scroll if the user does something
// doesn't necesarily do anything for thefunctioning of the script...
//  $('html,body').bind('scroll mousedown DOMMouseScroll mousewheel keyup', function(e){
//  if ( e.which > 0 || e.type == 'mousedown' || e.type == 'mousewheel' ){
//   $('html,body').stop();
//  }
// })

 // Set up content an array of locations
 // $('#mainmenu').find('a').each(function(){
 //  contentTop.push( $( $(this).attr('href') ).offset().top );
 // })

 // Animate menu scroll to content
 //  $('#mainmenu').find('a').click(function(){
 //   var sel = this,
 //       newTop = Math.min( contentTop[ $('#mainmenu a').index( $(this) ) ], $(document).height() - $(window).height() ); // get content top or top position if at the document bottom
 //   $('html,body').stop().animate({ 'scrollTop' : newTop - 50 }, animationTime, function(){
 //    window.location.hash = $(sel).attr('href');
 //   }); // the '- 50' leaves a bit of room above the section you scroll to
 //   return false;
 // })
 
 // adjust side menu
 $(window).scroll(function(){
  var winTop = $(window).scrollTop(),
      bodyHt = $(document).height(),
      vpHt = $(window).height() + edgeMargin;  // viewport height + margin
  $.each( contentTop, function(i,loc){
   if ( ( loc > winTop - edgeMargin && ( loc < winTop + topRange || ( winTop + vpHt ) >= bodyHt ) ) ){
    $('#mainmenu li')
     .removeClass('selected')
     .eq(i).addClass('selected');
   }
  })
 })
  
});