<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title><?php echo the_title(); ?></title>
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

	<!-- CSS -->
<!-- 	 <link rel='stylesheet' href='<?php bloginfo('template_directory'); ?>/style.css' async='async' type='text/css' media='all' /> -->
	<?php wp_head(); ?> 
</head>
<body>

	<!-- Loop starts -->
	<?php

			$query = new WP_Query( array( 'post_type' => 'styleguide', 'posts_per_page' => 1 ) );

			if ( $query->have_posts() ) :

			    while ( $query->have_posts() ) : $query->the_post(); ?>

	<!-- Get custom meta values -->
	<?php 
		$maincolor = get_post_meta($post->ID,'_sgbasics_maincolor',true);
	    $maintitle = get_post_meta($post->ID,'_sgheader_title',true);
	    $headerImageId = get_post_meta($post->ID, '_sgheader_logo', true);
	    $headerImageUrl = wp_get_attachment_image_src($headerImageId,'sgheader', true);
	?>

	<main> <!-- mainWrapper begins here -->
		<header id="mainheader">
			<h1 class="title">
			
				<?php if ($maintitle) { ?>
				    <?php echo $maintitle; ?>
				<?php } else { ?>
				    <p><?php echo the_title(); ?></p>
				<?php  } ?> 
				
			</h1>
			<div class="logo__holder">
				<img class="logo" src="<?php echo $headerImageUrl[0]; ?>" alt="Main Logo">
			</div>
		</header>

	<?php endwhile; endif; ?>