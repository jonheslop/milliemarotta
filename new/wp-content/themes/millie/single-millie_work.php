<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
  $current_post = get_the_ID();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>
    <header class="wrapper work-header">
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
      </h1>
      <p class="entry-categories"><? the_category(', '); ?></p>
    </header>
    <?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
  <? $images = get_field('gallery');

  if( $images ): ?>
    <ul class="wrapper work-gallery">
      <?php foreach( $images as $image ): ?>
        <li>
          <figure><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" /></figure>
          <p class="work-image-caption"><?php echo $image['caption']; ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

<section class="cf all-work">
  <header class="header">
    <h1 class="entry-title">More Work</h1>
  </header>
<?php $allWorkArgs = array(
    'post_type' => array('millie_work'),
    'posts_per_page' => -1,
    'exclude' => $current_post
  );
  $allWork = new WP_Query( $allWorkArgs ); 
  if ( $allWork->have_posts() ) : ?>
      <section class="browse_survey" id="goMasonry">
      <?php while ( $allWork->have_posts() ) : $allWork->the_post(); ?>
        <?php get_template_part( 'grid' ); ?>
  <?php endwhile; endif; ?>

</section>

<footer class="footer">
<!-- <?php get_template_part( 'nav', 'below-single' ); ?> -->
</footer>
</section>
<?php get_footer(); ?>