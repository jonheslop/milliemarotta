<article id="post-<?php the_ID(); ?>" <?php post_class('wrapper work-grid-item'); ?>>
  <figure>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
      <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail('small-crop');
      } elseif ( get_post_type() == 'colouring_submission' ) {
        $image = get_field('image');
        if ( !empty($image) ) {
          echo '<img src="' . $image['sizes']['small-crop'] . '" />';
        }
      } ?>
    </a>
    <figcaption class="work-grid-item-title-wrap">
      <header>
      <?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php echo widont(get_the_title()); ?></a><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
      <? if ( get_post_type() == 'colouring_submission' ) : ?>
        <p class="entry-categories">by <?php the_field('name'); ?></p>
      <? endif; ?>
      </header>
    </figcaption>
  </figure>
</article>