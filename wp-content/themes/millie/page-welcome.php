<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
<style type="text/css">
  .entry-content {
    text-align: center;
  }

.entry-content a {
    display: block;
    padding: 1rem;
    border: 1px dashed;
  }
</style>

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
	</section>
</article>
<?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>
