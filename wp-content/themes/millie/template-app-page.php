<?php
/*
Template Name: App Page
Template Post Type: page
*/
get_header(); ?>
<section id="content" role="main" class="container content-container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <?php if ( has_post_thumbnail() ) : ?>
            <section class="entry-content cf">
                <figure class="wrapper page-image">
                    <?php the_post_thumbnail('large'); ?>
                </figure>
            </section>
        <? endif; ?>
        <section class="entry-content">
            <?php the_content(); ?>
            <a href="https://itunes.apple.com/us/app/id1064432319" title="Download Millie Marotta's Coloring Adventures"><img src="<?php echo get_template_directory_uri(); ?>/img/app-store-badge.svg" alt="Millie Marotta's Coloring Adventures"></a>
        </section>
    </article>
</section>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
