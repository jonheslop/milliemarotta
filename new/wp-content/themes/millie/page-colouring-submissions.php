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
    'post_title' => true,
    'featured_image' => true,
    'new_post' => array(
      'post_type' => 'colouring_submission',
      'post_status' => 'pending'
    ),
    'fields' => array(33,26,27),
    'submit_value' => __('Submit', 'acf'),

  ));
  
  ?>
</article>
</section>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>