//GENERATE SIDEBAR MENU FROM MAIN H2 ELEMENT VALUES ================================

// find all the elements with the class of menu-heading
	//specifically applied to all main h2 elements to be a part of main nav
var menuheadings = document.getElementsByClassName('sidebar-link');
// specify ul or ol into which the <li>s will be appended
var mainmenu = document.getElementById('mainmenu');

console.log(menuheadings);

//for each items in the menuheadings array do the following:
for (var i = 0; i < menuheadings.length; i++) {
	// grab the value of h2 - stored in 'headingvalue'
		var headingvalue = menuheadings[i].innerHTML;
	// remove special characters and spaces, and replace them with an underscore
		var plainvalue = headingvalue.replace(/[^A-Z0-9]+/ig, "_"); 
	// convert all uppercase characters to lowercase
		var lowercase = plainvalue.toLowerCase();

	// create a link (<a>)
	var menuLink = document.createElement("A");
		// give said link an href of # + 'lowercase'
        menuLink.setAttribute("href", "#" + lowercase);
        // menuLink.setAttribute("href", "#scroll-nav_" + i);

        menuLink.className = "sidebar-anchor";
        // menuLink.setAttribute("id", "sidebar-anchor_" + i);

        // append the text value of 'headingvalue' into the created <a> element
        menuLink.appendChild(document.createTextNode(headingvalue));

    // create a <li> element
    var listItem = document.createElement("LI");
    	// append 'menulink' (which is an <a>) into the created <li> element
        listItem.appendChild(menuLink);

        // append 'listItem' (which is a <li>) into 'mainmenu' (which is an <ul>)
        mainmenu.appendChild(listItem);
};


var links = mainmenu.children;
console.log(links);

var clickFn = function() {
  var hash = links[i].firstChild.hash;
  console.log(hash);
}


// for (var i = 0; i < links.length; i++) {
//   // links.item(i).firstChild.onclick = clickFn;
//    console.log(links[i].firstChild.hash);
// }


// links.addEventListener('click', function() {
//   console.log('hey!'); 
// }, false);

// FIND A WAY TO DYNAMICALLY CREATE THE CONTAINER ID


// CHANGE SIDEBAR LINK CSS WHEN DIV IS IN VIEW


// when you click on an sidebar <a> tag, scroll to section

// var el = document.getElementsByClassName('sidebar-anchor');

// var clickerFn = function() {
// 		var linkhash = this.hash;
//     console.log(linkhash);
// };

// for (var i=0; i < el.length; i++) {
//     // Here we have the same onclick
//     el.item(i).onclick = clickerFn;
// }

// set everything outside the onscroll event (less work per scroll)
// var left      = document.getElementById("left"),
//     // -60 so it won't be jumpy
//     stop      = left.offsetTop - 60,
//     docBody   = document.documentElement || document.body.parentNode || document.body,
//     hasOffset = window.pageYOffset !== undefined,
//     scrollTop;

// window.onscroll = function (e) {
//   // cross-browser compatible scrollTop.
//   scrollTop = hasOffset ? window.pageYOffset : docBody.scrollTop;

//   // if user scrolls to 60px from the top of the left div
//   if (scrollTop >= stop) {
//     // stick the div
//     left.className = 'stick';
//   } else {
//     // release the div
//     left.className = 'unstick'; 
//   }
// }




// STICKY SIDEBAR ======================================
// var left = document.getElementById("left");
// var stop = (left.offsetTop - 100);

// window.onscroll = function (e) {
//     var scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
//     console.log(scrollTop, left.offsetTop);
//     // left.offsetTop;

//     if (scrollTop >= stop) {
//         left.className = 'stick';
//     } else {
//         left.className = '';
//     }

// };


