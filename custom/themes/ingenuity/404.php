<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>


	<div class="default-hero not-found">
	    <figure style="background-image: url('<?php echo get_template_directory_uri(); ?>/dist/images/site.jpg'); background-size: cover;"></figure>
	    <hgroup id="fade-in-item" class="animated fadeInDown">
	    	<h1>Oops! The page you've requested is not available.</h1>
	    	<h2>
	    		We can offer you an espresso as consolation!
	    	</h2>
	    	<a href="tel:+1-905-569-2624"><button id="we-owe-you">We owe you one - call us.</button></a>
	    	<h2>Try a search?</h2>
	    	<div class="search-error-page">
				<form role="search" method="get" class="search-form-error" action="<?php echo home_url( '/' ); ?>">
					<label>
						<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
					</label>
					<input type="submit" class="error-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
				</form>
	    	</div>
			<p>Or take a look at our <span id="error-menu">menu</span>.</p>
	    </hgroup>
	</div>

<?php get_footer(); ?>