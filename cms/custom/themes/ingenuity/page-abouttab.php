<!-- WARNING THIS IS A DUMMY TEMPLATE FOR HEADLESS CMS PURPOSE ONLY -->
<?php /* Template Name: About Tab */ ?>

<?php get_header(); ?>	

<?php // The loop starts here
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

<?php // Get custom meta values 

// Hero Banner
$banner     = get_post_meta( $post->ID, '_banner_image', true );
$bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
$heading    = wptexturize(get_post_meta( $post->ID, '_banner_heading', true ));
$subheading = get_post_meta( $post->ID, '_banner_subheading', true );

// CTA
$ctatitle 	= get_post_meta($post->ID,'_cta_heading',true);
$ctabtn 		= get_post_meta($post->ID,'_cta_btext',true);
$ctalink 		= get_post_meta($post->ID,'_cta_blink',true);
?>

<div class="default-hero about-header">
    <figure style="background-image: url('<?php echo $bannerurl[0] ?>'); background-size: cover;"></figure>
    <div class="hgroup animated fadeInDown">
        <h1><?php echo $heading; ?></h1>
        <?php if ($subheading) { ?>
        <h2><?php echo $subheading; ?></h2>
        <?php } ?>
    </div>
</div>

<div class="main-wrapper">
    <div class="main-content standard-center about-page"> 

        <?php the_content(); ?>

    </div>
</div>

<?php if ( $ctatitle ) { ?>
<section class="industry-cta">
    <div class="cta-wrapper">
        <h2><?php echo $ctatitle; ?></h2>
        <div class="cta-contact">
            <a href="<?php echo $ctalink;?>">
                <button class="cta-btn">
                    <p><?php echo $ctabtn; ?></p>
                </button>
            </a>
        </div>
    </div>
</section>
<?php } else { } ?>

<?php endwhile; else : ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
