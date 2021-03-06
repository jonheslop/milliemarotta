<?php acf_form_head(); ?>
<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
  </header>
  <section class="entry-content">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
    <?php the_content(); ?>
  </section>

  <?php

  acf_form(array(
    'post_id' => 'new_post',
    'honeypot' => true,
    'post_title' => true,
    'featured_image' => true,
    'new_post' => array(
      'post_type' => 'colouring_submission',
      'post_status' => 'pending'
    ),
    'fields' => array(13,1041,14,15,251),
    'submit_value' => __('Submit', 'acf'),
    'updated_message' => __('<strong>Thanks!</strong><br/>Your submission will be reviewed before it is published. Please check back again later to see it in the gallery.', 'acf')
  ));

  acf_enqueue_uploader();
  ?>
</article>
</section>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
