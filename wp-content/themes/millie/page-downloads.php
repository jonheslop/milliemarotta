<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
<header class="header all-work-header downloads">
  <h1 class="entry-title"><?php single_cat_title(); ?></h1>
  <?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="entry-content">' . category_description() . '</div>' ); ?>
</header>

<?php $allDownloadsArgs = array(
    'posts_per_page'   => -1,
    'post_type'        => 'attachment',
    'category_name'        => 'downloads',
  );
  $allDownloads = new WP_Query( $allDownloadsArgs ); 
  if ( $allDownloads->have_posts() ) : ?>

<?php if ( $allDownloads->have_posts() ) : while ( $allDownloads->have_posts() ) : $allDownloads->the_post(); ?>
<?php get_template_part( 'grid' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_footer(); ?>
