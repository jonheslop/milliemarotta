<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<section class="entry-content">
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
		<?php the_content(); ?>
	</section>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>