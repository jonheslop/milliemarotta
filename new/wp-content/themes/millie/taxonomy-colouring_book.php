<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
<header class="header work-header">

<h1><?php $currentTaxTerm = get_queried_object()->term_id; ?></h1>
<h1 class="entry-title">Welcome to the Colouring Gallery</h1>
<section class="entry-content">
  <p>Share your work here and browse all the wonderful submissions from others. Whether you&rsquo;re after colour palette inspiration, ideas for interesting techniques or just want to have a gander, peruse at your&nbsp;leisure.</p>
</section>

<?php $categories = get_terms( 'colouring_book', array(
    'orderby' => 'slug',
    'order' => 'ASC',
    'hide_empty' => 0
) ); ?>

<p class="colouring-submit wrapper cf"><strong>Filter by colouring book:</strong>
  <?php $index = 1;
  $categoriesCount = count($categories);
  foreach ($categories as $category ) : ?>
    <?php if ($currentTaxTerm == $category->term_id) : ?>
    <a class="current" href="<?php echo get_term_link($category->slug, 'colouring_book') ?>"><?php echo $category->name; ?></a><?php if ($categoriesCount != $index) {
      echo ', ';
    } ?>
    <?php else : ?>
    <a href="<?php echo get_term_link($category->slug, 'colouring_book') ?>"><?php echo $category->name; ?></a><?php if ($categoriesCount != $index) {
      echo ', ';
    } ?>
    <?php endif; ?>
    <?php $index++; ?>
  <?php endforeach; ?>
  <a class="button button_buy colouring_button" href="<?php echo get_permalink(27); ?>">Submit your colouring here</a></p>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'grid' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_footer(); ?>