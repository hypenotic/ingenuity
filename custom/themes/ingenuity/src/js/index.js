// ====================== BLOG INDEX PAGE

var displayBlogIndex = { };

// use the API to grab the post info
displayBlogIndex.getcontent = function(){
  $.ajax( {
      url: '/wp-json/posts/', 
      success: function ( res ) {
        console.log(res);
        displayBlogIndex.printInfo(res);
      },
      cache: false
    } );
};


// print a post in the proper container
displayBlogIndex.printInfo = function(theposts) {
    $.each(theposts, function(i, item) {

            console.log(item);
            var $title      = $('<h2>').html(item.title);
            var $content    = $('<div>').addClass('the-post').html(item.content);

            var $fullpost = $('<div>').append($title, $content);

            $('.main-content').append($fullpost);
        });
};

// ====================== DISPLAY SINGLE BLOG POST

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
    // displayBlogPost.grabid();
    displayBlogIndex.getcontent();
});