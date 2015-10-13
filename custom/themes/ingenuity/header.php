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
	      kitId: 'vsf1qtm',
	      scriptTimeout: 3000
	    },
	    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	  })(document);
	</script>

	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

	<?php wp_head(); ?> 
</head>
<body>
	<header class="main-header">
		<div class="main-wrapper">
			<!-- <a href="<?php // echo get_home_url(); ?>"><img class="main-logo" src="<?php echo $headerImageUrl[0]; ?>" alt="Main Logo"></a> -->
			<h1><?php bloginfo('name'); ?></h1>
		</div>
	</header>
	
	
	<main> <!-- mainWrapper begins here -->