<?php get_header(); ?>
<link href="https://unpkg.com/tachyons@4.10.0/css/tachyons.css" rel="stylesheet">
<style type="text/css">
.g2x {
  display: grid;
  grid-template-columns: 1fr 1fr;
}
.g3x {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
}
.gg1 {
  grid-gap: 1rem;
}
.gg2 {
  grid-gap: 2rem;
}

@media screen and (min-width: 40em) and (max-width: 60em) {
  .g2x-m {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
  .g3x-m {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
  }
  .gg1-m {
    grid-gap: 1rem;
  }
  .gg2-m {
    grid-gap: 2rem;
  }
}

@media screen and (min-width: 60em) {
  .g2x-l {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
  .g3x-l {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
  }
  .gg1-l {
    grid-gap: 1rem;
  }
  .gg2-l {
    grid-gap: 2rem;
  }
}
</style>

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
<?php if ( get_post_type() == 'millie_downloads' ) : ?>
  <header class="header all-work-header">
    <h1 class="entry-title">
      Downloads
    </h1>
  </header>
  <section class="entry-content">
    <p>Download stuff here</p>
  </section>
<?php endif; ?>
<?php if ( have_posts() ) : ?>
  <div class="g2x g3x-l gg2">
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="flex flex-column">
      <h4 class="tc pb3 ttu" style="margin-bottom: auto;"><?php the_title() ?></h4>
      <a class="db link grow" href="<?php echo wp_get_attachment_url( $post->ID ); ?>" rel="attachment">
        <img class="w-100 db mb4" src="<?php echo wp_get_attachment_image_src( $post->ID, "large" )[0] ?>" alt="<?php the_title() ?> -<?php $post->post_excerpt; ?>" />
      </a>
      <h4 class="tc pb3 ma0 bb b--silver" style="margin-top: auto;"><?php echo wp_get_attachment_caption() ?></h4>
    </div>
  <?php endwhile; ?>
  </div>
<?php endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_footer(); ?>
