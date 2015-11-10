

	<aside id="left"> 
		<p><span class="bolded-text">Author:</span> <?php the_author(); ?> </p>
		<p><span class="bolded-text">Date:</span> <?php the_time( 'F j, Y' ); ?> </p>
		<p><span class="bolded-text">Category:</span> <?php echo get_the_category_list(); ?></p>
		<p><span class="bolded-text">Tags:</span>
			<?php if (has_tag()) { 
				the_tags(); } else { echo 'none';}  ?>
		</p>

	</aside>

