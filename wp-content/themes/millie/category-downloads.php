<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
<header class="header all-work-header downloads">
  <h1 class="entry-title"><?php single_cat_title(); ?></h1>
  <?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<p class="archive-meta">' . category_description() . '</p>' ); ?>
  <?php 
    the_archive_description( '<p class="taxonomy-description">', '</p>' ); 
  ?>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'grid' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_footer(); ?>
