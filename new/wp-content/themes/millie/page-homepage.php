<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <ul class="home-gallery wrapper">
    <?php $featuredPosts = get_field('gallery_item'); ?>
    <?php foreach ($featuredPosts as $featuredPost) : ?>
    <li>
      <a href="<?php echo get_permalink($featuredPost->ID); ?>">
        <figure>
          <?php echo get_the_post_thumbnail($featuredPost->ID,'large'); ?>
        </figure>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
  <blockquote class="wrapper quote quote_big quote-home-new"><?php the_content(); ?></blockquote>
</section>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>