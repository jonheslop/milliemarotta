<?php
/*
Template Name: Contents Page
Template Post Type: page
*/
get_header(); ?>
<section id="content" role="main" class="container content-container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <section class="entry-content">
            <?php the_content(); ?>
        </section>
    </article>
</section>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
