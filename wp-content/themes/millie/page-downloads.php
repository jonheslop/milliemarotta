<?php get_header(); ?>
<section id="content" role="main" class="container content-container">

<?php $allDownloadsArgs = array(
    'post_type' => array('millie_work'),
    'posts_per_page' => -1,
    'category_name' => 'downloads',
  );
  $allDownloads = new WP_Query( $allDownloadsArgs ); 
  if ( $allDownloads->have_posts() ) : ?>

<?php if ( $allDownloads->have_posts() ) : while ( $allDownloads->have_posts() ) : $allDownloads->the_post(); ?>
<?php // get_template_part( 'grid' ); ?>
<?php endwhile; endif; ?>
<?php // get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_footer(); ?>