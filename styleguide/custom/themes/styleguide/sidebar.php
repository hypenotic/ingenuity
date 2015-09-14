<?php

			$query = new WP_Query( array( 'post_type' => 'styleguide', 'posts_per_page' => 1 ) );

			if ( $query->have_posts() ) :

			    while ( $query->have_posts() ) : $query->the_post(); ?>

	<!-- Get custom meta values -->
	<?php 
		// $maincolor = get_post_meta($post->ID,'_sgbasics_maincolor',true);
		$picker = get_post_meta($post->ID,'_sgbasics_name_color',true);
	?>


	<aside id="left"> <!-- SIDEBAR begins here -->
			<nav id="submenu" class="sidebar__nav">
			<h3>Table of Contents</h3>
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
			<h3>Need help? Situation not covered?</h3>
			<a href="<?php echo site_url(); ?>">
			<?php if ($picker): 
			   echo '<button class="sidebar__button" style="background-color: ' . $picker . ';">'; 
			endif ?>
				<!-- <button class="sidebar__button"> -->
					<h3>Get in touch!</h3>
				</button>
			</a>
	</aside>

<?php endwhile; endif; ?>
