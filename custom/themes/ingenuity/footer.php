	<?php if ( is_front_page() || is_home() ) { ?>

	<?php } else { ?>
		<footer class="main-footer">
			<div class="footer__blog">
				<h3><a href="<?php echo get_home_url(); ?>/news">Recent Posts</a></h3>
				
				<?php 

				$args = $args   = array(
						'post_type' 		=> 'post',
						'post__not_in' 		=> get_option( 'sticky_posts' ),
						'posts_per_page' 	=> 4,
						'order'          	=> 'DESC'
				);

				$the_query = new WP_Query($args); 

				?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
					<a href="<?php the_permalink(); ?>">
						<p><?php the_title(); ?></p>
					</a>
				<?php endwhile; ?>
				
			</div>
			<div class="footer__news">
				<h3></h3>
				
			</div>
			<div class="footer__map">
			</div>
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpGPGQX8oq7dF3OTm4OV-UiAKX_nr4_2w"></script>
		</footer>
	<?php } ?>
	

	</main> <!-- mainWrapper ends here -->
	<?php wp_footer(); ?>

</body>
</html>

