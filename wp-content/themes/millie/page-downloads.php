<?php get_header(); ?>
<section id="content" role="main" class="container content-container">

<?php $allDownloadsArgs = array(
    'post_type' => 'attachment',
    'posts_per_page' => -1,
    'cat' => 20,
  );
  $allDownloads = new WP_Query( $allDownloadsArgs ); 
  if ( $allDownloads->have_posts() ) : ?>
    <header class="header all-work-header">
      <h1 class="entry-title">More <?php echo $current_post_category[0]->name; ?></h1>
    </header>
    <?php while ( $allDownloads->have_posts() ) : $allDownloads->the_post(); ?>
      <?php if ( wp_attachment_is_image( $allWork->ID ) ) : $att_image = wp_get_attachment_image_src( $allWork->ID, "large" ); ?>
        <p class="attachment"><a href="<?php echo wp_get_attachment_url( $allWork->ID ); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0]; ?>" width="<?php echo $att_image[1]; ?>" height="<?php echo $att_image[2]; ?>" class="attachment-medium" alt="<?php $allWork->post_excerpt; ?>" /></a></p>
      <?php else : ?>
        <a href="<?php echo wp_get_attachment_url( $allWork->ID ); ?>" title="<?php echo esc_html( get_the_title( $allWork->ID ), 1 ); ?>" rel="attachment"><?php echo basename( $allWork->guid ); ?></a>
      <?php endif; ?>
    <?php endwhile; ?>
    <?php else : ?>
      No downloads
  <?php endif; ?>

<?php // get_template_part( 'grid' ); ?>
<?php // get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_footer(); ?>
