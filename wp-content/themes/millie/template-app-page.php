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
        <section class="entry-content cf">
            <video class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="720" height="540" poster="http://milliemarotta.co.uk/wp-content/uploads/2017/06/mmca-poster.jpg" data-setup="{}">
              <source src="http://milliemarotta.co.uk/wp-content/uploads/2017/06/mmca.mp4" type='video/mp4'>
              <source src="http://milliemarotta.co.uk/wp-content/uploads/2017/06/mmca.webm" type='video/webm'>
              <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a web browser that
                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
              </p>
            </video>
        </section>
        <section class="entry-content">
            <?php the_content(); ?>
            <div class="cf app-button-wrap">
                <a href="https://itunes.apple.com/us/app/id1064432319" title="Download Millie Marotta's Coloring Adventures"><img class="app-button" src="<?php echo get_template_directory_uri(); ?>/img/app-store-badge.svg" alt="Millie Marotta's Coloring Adventures"></a>
            </div>
        </section>
        <?php if ( has_post_thumbnail() ) : ?>
            <section class="entry-content cf">
                <figure class="wrapper page-image">
                    <?php the_post_thumbnail('large'); ?>
                </figure>
            </section>
        <? endif; ?>
        <?php
        $images = get_attached_media('image', $post->ID);
        foreach($images as $image) { ?>
            <section class="entry-content cf">
                <figure class="wrapper page-image">
                    <img src="<?php echo wp_get_attachment_image_src($image->ID,'large')[0]; ?>" />
                </figure>
            </section>
        <?php } ?>
    </article>
</section>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
