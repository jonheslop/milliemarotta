<?php get_header(); ?>
<section id="content" role="main" class="container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>
    <header class="wrapper work-header">
    <?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
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
<footer class="footer">
<?php get_template_part( 'nav', 'below-single' ); ?>
</footer>
</section>
<?php get_footer(); ?>