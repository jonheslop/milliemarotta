<?php get_header(); ?>
<link href="https://unpkg.com/tachyons@4.10.0/css/tachyons.css" rel="stylesheet">
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
	<section class="entry-content">
    <? endif; ?>
		<?php the_content(); ?>
	</section>
</article>
<?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>
