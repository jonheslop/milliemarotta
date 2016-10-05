<article id="post-<?php the_ID(); ?>" <?php post_class('wrapper work-grid-item'); ?>>
  <figure>
      <? if ( get_post_type() == 'colouring_submission' ) : ?>
        <a class="entry-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
      <?php else : ?>
        <a class="entry-link" href="<?php the_permalink(); ?>" title="<?php the_field('name'); ?>" rel="bookmark">
      <?php endif; ?>
      <?php if ( has_post_thumbnail() && get_post_type() == 'millie_creature' ) {
        the_post_thumbnail('smaller-crop');
      } elseif ( has_post_thumbnail() ) {
        the_post_thumbnail('small-crop');
      } elseif ( get_post_type() == 'colouring_submission' ) {
        $image = get_field('image');
        if ( !empty($image) ) {
          echo '<img class="submission" src="' . $image['sizes']['smaller-crop'] . '" />';
        }
      } ?>
    </a>
    <figcaption class="work-grid-item-title-wrap">
      <header>
      <? if ( get_post_type() == 'colouring_submission' ) : ?>
        <a class="entry-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
      <?php else : ?>
        <a class="entry-link" href="<?php the_permalink(); ?>" title="<?php the_field('name'); ?>" rel="bookmark">
      <?php endif; ?>
      <?php if ( get_post_type() != 'colouring_submission' ) : ?>
      <?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?><?php echo get_the_title(); ?><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
      <?php endif; ?>
      <? if ( get_post_type() == 'colouring_submission' ) : ?>
       <h2 class="entry-title">by <?php the_field('name'); ?></h2>
      <? endif; ?>
      <? if ( get_post_type() == 'millie_creature' ) : ?>
        <p class="scientific_name"><em><? the_field('scientific_name'); ?></em></p>
      <? endif; ?>
        </a>
      </header>
    </figcaption>
  </figure>
</article>