<section class="entry-content wrapper cf">
  <figure class="wrapper creature-crop">
    <?php if ( has_post_thumbnail() && get_post_type() != 'millie_work' ) { the_post_thumbnail('large'); } ?>
  </figure>
  <?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>