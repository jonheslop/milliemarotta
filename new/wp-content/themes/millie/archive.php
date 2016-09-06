<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
<!-- <header class="header">
<h1 class="entry-title"><?php 
if ( is_day() ) { printf( __( 'Daily Archives: %s', 'blankslate' ), get_the_time( get_option( 'date_format' ) ) ); }
elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'blankslate' ), get_the_time( 'F Y' ) ); }
elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'blankslate' ), get_the_time( 'Y' ) ); }
else { _e( 'Archives', 'blankslate' ); }
?></h1>
</header>
 -->
<?php if ( get_post_type() == 'millie_creature' ) : ?>
  <header class="header all-work-header">
    <h1 class="entry-title">
      Creature Curiosities
    </h1>
  </header>
  <section class="entry-content">
    <p>Discover more about the animals you’ll find in Curious Creatures and why I find them so intriguing.</p>
  </section>
<?php endif; ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'grid' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_footer(); ?>