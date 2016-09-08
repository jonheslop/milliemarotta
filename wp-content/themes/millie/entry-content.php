<section class="entry-content wrapper cf">
  <?php if ( has_post_thumbnail() && get_post_type() != 'millie_work' ) : ?>
  <figure class="wrapper creature-crop">
     <?php the_post_thumbnail('large'); ?>
  </figure>
  <? endif; ?>
  <?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>