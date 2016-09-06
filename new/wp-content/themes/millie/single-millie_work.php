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
      <p class="entry-categories"><? the_category(', '); ?></p>
    </header>
    <?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
  <? $images = get_field('gallery');

  if( $images ): ?>
    <ul class="wrapper work-gallery">
      <?php foreach( $images as $image ): ?>
        <li>
          <figure>
            <img
              srcset="<?php echo $image['sizes']['small']; ?> 200w,
                <?php echo $image['sizes']['medium']; ?> 600w,
                <?php echo $image['sizes']['grande']; ?> 1000w,
                <?php echo $image['sizes']['large']; ?> 1280w"
              src="<?php echo $image['sizes']['large']; ?>"
              sizes="(max-width: 1280px) 100vw, 1280px"
              alt="<?php echo $image['alt']; ?>"
            />
          </figure>
          <p class="work-image-caption"><?php echo $image['caption']; ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

<section class="cf all-work">
<?php $allWorkArgs = array(
    'post_type' => array('millie_work'),
    'posts_per_page' => -1,
    'post__not_in' => array($current_post_id),
    'category__in' => array($current_post_category[0]->term_id)
  );
  $allWork = new WP_Query( $allWorkArgs ); 
  if ( $allWork->have_posts() ) : ?>
    <header class="header all-work-header">
      <h1 class="entry-title">More <?php echo $current_post_category[0]->name; ?></h1>
    </header>
      <?php while ( $allWork->have_posts() ) : $allWork->the_post(); ?>
        <?php get_template_part( 'grid' ); ?>
  <?php endwhile; endif; ?>

</section>

<footer class="footer">
<!-- <?php get_template_part( 'nav', 'below-single' ); ?> -->
</footer>
</section>
<?php get_footer(); ?>