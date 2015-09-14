<?php

  $query = new WP_Query( array( 'post_type' => 'logo', 'posts_per_page' => 1 ) );

  if ( $query->have_posts() ) :

      while ( $query->have_posts() ) : $query->the_post(); ?>

          <!-- Get custom meta values -->
          <?php 
            $label = get_post_meta($post->ID,'_logo_label',true);
            $labelcolor = get_post_meta($post->ID,'_logo_labelc',true);
            $link = get_post_meta($post->ID,'_logo_upload',true);
            $plogoId = get_post_meta($post->ID, '_logo_logo_1', true);
            $plogoUrl = wp_get_attachment_image_src($plogoId,'logo', true);
            $slogoId = get_post_meta($post->ID, '_logo_logo_2', true);
            $slogoUrl = wp_get_attachment_image_src($slogoId,'logo', true);
          ?>

          <article id="logo">
              <h2 class="sidebar-link">Logo</h2>

      <div class="logo__content"><?php the_content(); ?></div>

      <figure class="logopackage">
          <div class="logopackage__logocontainer">
              <img src="<?php echo $plogoUrl[0]; ?>" alt="">
              <img src="<?php echo $slogoUrl[0]; ?>" alt="">
          </div>
  
          <?php if ($labelcolor): 
             echo '<figcaption style="background-color: ' . $labelcolor . ';">'; 
          endif ?>
              <a href="<?php echo $link; ?>">
                  <h3 class="logopackage__caption"><?php echo $label; ?></h3>
              </a>
              <img src="<?php bloginfo('template_directory'); ?>/src/images/download-white.png" alt="">
          </figcaption>
      </figure>
     </article>

      <?php endwhile;

  endif;

?>