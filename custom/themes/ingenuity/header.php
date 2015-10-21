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
</head>


<body data-theid="<?php echo get_the_ID(); ?>" data-type="<?php echo get_post_type(); ?>" data-archive="<?php if (is_archive( 'project' )) { echo 'true'; } else { echo 'false'; }?>">
	
	<?php if (is_front_page()) { ?>
		
		<header class="main-header home">
			<div class="main-wrapper">
				<nav class="navigation home-nav">
					<nav class="nav__bottom-links">
						<?php 
						wp_nav_menu(array(
						  'menu' => 'Main Menu', 
						  'container_id' => 'main-menu', 
						  'walker' => new Main_Menu_Walker()
						)); 
						?> 
					</nav>
					<nav class="nav__mobile">
						<?php 
						wp_nav_menu(array(
						  'menu' => 'Mobile Menu', 
						  'container_id' => 'mobile-menu', 
						  'walker' => new Main_Menu_Walker()
						)); 
						?> 
						<div id="trigger-overlay__mobile">
							
						</div>
					</nav>
				</nav>
			</div>
		</header>
		

	<?php } else { ?> 

		<header class="main-header">
			<div class="main-wrapper">
				<div>
					<a href="<?php echo get_home_url(); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/dist/images/nofillyellowlogo.png" alt="Ingenuity"></a>
				</div>
				<nav class="navigation default-nav">
					<nav class="nav__bottom-links">
						<?php 
						wp_nav_menu(array(
						  'menu' => 'Main Menu', 
						  'container_id' => 'main-menu', 
						  'walker' => new Main_Menu_Walker()
						)); 
						?> 
					</nav>
				</nav>
			</div>
		</header>

	<?php } ?>
	
	
	<main> 