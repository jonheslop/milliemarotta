<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
  <header class="header all-work-header">
    <h1 class="entry-title">
      Creature Curiosities
    </h1>
  </header>
<?php $creatureArgs = array(
    'post_type' => array('millie_creature'),
    'posts_per_page' => -1,
  );
  $creature = new WP_Query( $creatureArgs ); ?>
<?php if ( $creature->have_posts() ) : while ( $creature->have_posts() ) : $creature->the_post(); ?>
<?php get_template_part( 'grid' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_footer(); ?>