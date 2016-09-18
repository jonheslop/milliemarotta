<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
<header class="header work-header cf">
<h1 class="entry-title"><?php 
if ( is_day() ) { printf( __( 'Daily Archives: %s', 'blankslate' ), get_the_time( get_option( 'date_format' ) ) ); }
elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'blankslate' ), get_the_time( 'F Y' ) ); }
elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'blankslate' ), get_the_time( 'Y' ) ); }
?></h1>

<h1 class="entry-title">Welcome to the Colouring Gallery</h1>
<section class="entry-content">
  <p>Share your work here and browse all the wonderful submissions from others. Whether you&rsquo;re after colour palette inspiration, ideas for interesting techniques or just want to have a gander, peruse at your&nbsp;leisure.</p>
</section>

<?php $categories = get_terms( 'colouring_book', array(
    'orderby' => 'slug',
    'order' => 'ASC',
    'hide_empty' => 0
) ); ?>

  <div class="cf">
    <p class="colouring-submit wrapper cf"><strong>Filter by colouring book:</strong>
        <a href="/" class="current">All</a>,
      <?php $index = 1;
      $categoriesCount = count($categories);
      foreach ($categories as $category ) : ?>
        <a href="<?php echo get_term_link($category->slug, 'colouring_book') ?>"><?php echo $category->name; ?></a><?php if ($categoriesCount != $index) {
          echo ', ';
        } ?>
        <?php $index++; ?>
      <?php endforeach; ?>
    </p>
    <div class="wrapper colouring_button_wrap">
      <a class="button button_buy colouring_button" href="<?php echo get_permalink(27); ?>">Submit your colouring here</a></p>
    </div>
  </div>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'grid' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_footer(); ?>