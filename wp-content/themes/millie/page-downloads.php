<?php get_header(); ?>
<link href="https://unpkg.com/tachyons@4.10.0/css/tachyons.css" rel="stylesheet">
<style type="text/css">
.g2x {
  display: grid;
  grid-template-columns: 1fr 1fr;
}
.g4x {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
}
.gg1 {
  grid-gap: 1rem;
}
.gg2 {
  grid-gap: 2rem;
}

@media screen and (min-width: 40em) and (max-width: 60em) {
  .g2x-m {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
  .g4x-m {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
  }
  .gg1-m {
    grid-gap: 1rem;
  }
  .gg2-m {
    grid-gap: 2rem;
  }
}

@media screen and (min-width: 60em) {
  .g2x-l {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
  .g4x-l {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
  }
  .gg1-l {
    grid-gap: 1rem;
  }
  .gg2-l {
    grid-gap: 2rem;
  }
}
</style>

<section id="content" role="main" class="container content-container">

<?php $allDownloadsArgs = array(
    'post_type' => 'attachment',
    'posts_per_page' => -1,
    'post_status' => 'any',
    'post_parent' => null,
    'cat' => 20,
  );
  $allDownloads = new WP_Query( $allDownloadsArgs ); 
  if ( $allDownloads->have_posts() ) : ?>
    <header class="header all-work-header">
      <h1 class="f3">Downloads</h1>
      <div>
        <?php echo category_description(); ?>
      </div>
    </header>
    <div class="g2x g4x-l gg2">
    <?php while ( $allDownloads->have_posts() ) : $allDownloads->the_post(); ?>
      <div class="flex flex-column">
        <h4 class="tc pb3" style="margin-bottom: auto;"><?php the_title() ?></h4>
        <a class="db link grow" href="<?php echo wp_get_attachment_url( $post->ID ); ?>" rel="attachment">
          <img class="w-100 db mb4" src="<?php echo wp_get_attachment_image_src( $post->ID, "grande" )[0] ?>" alt="<?php the_title() ?> -<?php $post->post_excerpt; ?>" />
        </a>
      </div>
    <?php endwhile; ?>
    </div>
    <?php else : ?>
      No downloads
  <?php endif; ?>

<?php // get_template_part( 'grid' ); ?>
<?php // get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_footer(); ?>
