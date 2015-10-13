// ====================== DISPLAY BLOG POST

var displayBlogPost = { };

// grab the id from the data attribute and pass it on
displayBlogPost.grabid = function($thepost) {

  var $theid = $('.blog-entry').data('postid');

  displayBlogPost.getcontent($theid);
};


// use the API to grab the post info
displayBlogPost.getcontent = function($theid){
  $.ajax( {
      url: '/wp-json/posts/' + $theid, 
      //this needs to be '/apron-strings/wp-json/posts/' on hypelabs
      success: function ( res ) {
        console.log(res);
        displayBlogPost.printInfo(res);
      },
      cache: false
    } );
};


// print a post in the proper container
displayBlogPost.printInfo = function(thepost) {
    var $header     = $('.default-hero').css('background-image', 'url(' + thepost.featured_image.guid + ')');

    var $title      = $('<h2>').html(thepost.title);
    var $thedate    = $('<p>'). html(thepost.date);
    var $content    = $('<div>').addClass('the-post').html(thepost.content); 

    $('.blog-entry').append($content);
    $('.default-hero hgroup h2').append($title);
};


// initialize displayBlogPost events
// displayBlogPost.init = function() {
//   displayBlogPost.grabid();
//   console.log('hey');
// };

$(function() {
    console.log( "ready!" );
    displayBlogPost.grabid();
});