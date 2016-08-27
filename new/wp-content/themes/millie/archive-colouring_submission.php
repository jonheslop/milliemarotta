<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
<header class="header">
<h1 class="entry-title"><?php 
if ( is_day() ) { printf( __( 'Daily Archives: %s', 'blankslate' ), get_the_time( get_option( 'date_format' ) ) ); }
elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'blankslate' ), get_the_time( 'F Y' ) ); }
elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'blankslate' ), get_the_time( 'Y' ) ); }
?></h1>

<?php $categories = get_terms( 'colouring_book', array(
    'order' => 'asc',
    'hide_empty' => 0
) ); ?>

<p class="colouring-submit"><strong>Filter by colouring book:</strong>
  <?php $index = 1;
  $categoriesCount = count($categories);
  foreach ($categories as $category ) : ?>
    <a href="<?php echo get_term_link($category->slug, 'colouring_book') ?>"><?php echo $category->name; ?></a><?php if ($categoriesCount != $index) {
      echo ', ';
    } ?>
    <?php $index++; ?>
  <?php endforeach; ?>
</p>
<p class="colouring-submit"><em><a href="<?php echo get_the_permalink(27); ?>">Submit your colouring here</a></em></p>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'grid' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_footer(); ?>