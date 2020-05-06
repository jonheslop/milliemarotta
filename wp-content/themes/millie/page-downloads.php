<?php get_header(); ?>
<link href="https://unpkg.com/tachyons@4.10.0/css/tachyons.css" rel="stylesheet">

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
      <h1 class="entry-title">Downloads</h1>
    </header>
    <div class="cf">
    <?php while ( $allDownloads->have_posts() ) : $allDownloads->the_post(); ?>
      <div class="fl w-100 w-50-m w-25-l">
        <img class="w-100 db mb4" src="<?php echo wp_get_attachment_image_src( $post->ID, "grande" )[0] ?>" alt="<?php the_title() ?> -<?php $post->post_excerpt; ?>" />
        <h4><?php the_title() ?></h4>
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
