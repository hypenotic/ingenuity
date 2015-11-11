<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title><?php bloginfo('name'); ?></title>
	<!-- FONTS -->
	<script>
	  (function(d) {
	    var config = {
	      kitId: 'omn8cmb',
	      scriptTimeout: 3000,
	      async: true
	    },
	    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	  })(document);
	</script>

	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

	<?php wp_head(); ?> 
	<script src="//f.vimeocdn.com/js/froogaloop2.min.js"></script>
</head>


<body class="cbp-spmenu-push" data-theid="<?php echo get_the_ID(); ?>" data-type="<?php echo get_post_type(); ?>" data-archive="<?php if (is_archive( 'project' )) { echo 'true'; } else { echo 'false'; }?>">
	
	<!-- <div id="fullscreen-menu">
		<?php 
		wp_nav_menu(array(
		  'menu' => 'Main Menu', 
		  'container_id' => 'fs-menu', 
		  'walker' => new Main_Menu_Walker()
		)); 
		?> 
	</div> -->

	<nav>
	    <div class="site-width">
	      <a href="http://www.ingenuity.ca" target="_blank">INGENUITY</a>
	      <span class="menu icon" title="Menu (Esc)" tabindex="0"><span class="lines"></span><span id="nav-menu-text">Menu</span></span>
	    </div>


    	<?php 
		    wp_nav_menu(array(
		      'menu' => 'Main Menu',  
		      'container_id' => 'navigation',
		      'walker' => new Main_Menu_Walker()
		    )); 
    	?> 

  	</nav>


	<!-- <button id="toggle-button">
		<p>Menu</p>
		<div id="menu-toggle" type="button" role="button" aria-label="Toggle Navigation" class="lines-button x">
		  <span class="lines"></span>
		</div>
	</button> -->
	
	<main> 