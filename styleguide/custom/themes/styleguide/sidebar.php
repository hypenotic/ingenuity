<?php

			$query = new WP_Query( array( 'post_type' => 'styleguide', 'posts_per_page' => 1 ) );

			if ( $query->have_posts() ) :

			    while ( $query->have_posts() ) : $query->the_post(); ?>

	<!-- Get custom meta values -->
	<?php 
		// $maincolor = get_post_meta($post->ID,'_sgbasics_maincolor',true);
		$maintitle = get_post_meta($post->ID,'_sgheader_title',true);
		$picker = get_post_meta($post->ID,'_sgbasics_name_color',true);
		$headerImageId = get_post_meta($post->ID, '_sgheader_logo', true);
	    $headerImageUrl = wp_get_attachment_image_src($headerImageId,'sgheader', true);
	?>


	<aside id="left"> <!-- SIDEBAR begins here -->
			<!-- <div class="logo__holder">
				<img class="logo" src="<?php //echo $headerImageUrl[0]; ?>" alt="Main Logo">
			</div> -->
			<nav id="submenu" class="sidebar__nav">
				<ul id="mainmenu">
					<!-- <li><a href="<?php echo site_url(); ?>/overview">Overview</a></li>
					<li><a href="<?php echo site_url(); ?>/logo">Logo</a></li>
					<li><a href="<?php echo site_url(); ?>/colour">Colour</a></li>
					<li><a href="<?php echo site_url(); ?>/typography">Typography</a></li>
					<li><a href="<?php echo site_url(); ?>/photography">Photography</a></li>
					<li><a href="<?php echo site_url(); ?>/tone">Tone</a></li>
					<li><a href="<?php echo site_url(); ?>/templates">Templates</a></li> -->
				</ul>

				<ul class="mainNavMobile">
					<li class="navLinkPhone"><a href="#main">main</a></li>
					<li class="navLinkPhone"><a href="#causes">causes</a></li>
					<li class="navLinkPhone"><a href="#events">events</a></li>
					<li class="navLinkPhone"><a href="#blog">blog</a></li>
					<li class="navLinkPhone"><a href="#pages">pages</a></li>
					<li class="navLinkPhone"><a href="#contact">contact</a></li>
				</ul>
			</nav>
			<div class="get-in-touch">
				<p>Need help?</p>
				<p>Situation not covered?</p>
				<a href="mailto:s3c2e8i7q1z8n5i6@hypenotic.slack.com">
				<?php if ($picker): 
				   echo '<button class="sidebar__button" style="background-color: ' . $picker . ';">'; 
				endif ?>
					<!-- <button class="sidebar__button"> -->
						<h3>Bat Phone</h3>
					</button>
				</a>
			</div>
	</aside>

<?php endwhile; endif; ?>
