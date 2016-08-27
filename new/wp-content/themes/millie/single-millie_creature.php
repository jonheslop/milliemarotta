<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
  $current_post_id = get_the_ID();
  $current_post_category = get_the_category();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>
    <header class="wrapper work-header">
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
      </h1>
      <?php if ( get_post_type() == 'millie_creature' ) : ?>
        <p class="scientific_name"><em><? the_field('scientific_name'); ?></em></p>
      <?php endif; ?>
    </header>
    <?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

<footer class="footer">
<!-- <?php get_template_part( 'nav', 'below-single' ); ?> -->
</footer>
</section>
<?php get_footer(); ?>