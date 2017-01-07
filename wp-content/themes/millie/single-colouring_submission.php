<?php get_header(); ?>
<section id="content" role="main" class="container content-container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>
      <? $pageIndex = $_GET['pageIndex'];
       if ($pageIndex) : ?>
        <span style="float:left;">&laquo;&nbsp;<a href="<?php echo get_post_type_archive_link('colouring_submission'); ?>page/<?= $pageIndex; ?>">Back to submissions</a></span>
      <? else : ?>
      <span style="float:left;">&laquo;&nbsp;<a href="<?php echo get_post_type_archive_link('colouring_submission'); ?>">Back to submissions</a></span>
      <? endif; ?>
      <?php $categories = get_the_terms($post->ID,'colouring_book');
      $category_id = $categories[0]->term_id;
      ?>
      <span style="float:right;"><a href="<?php echo get_term_link($category_id,'colouring_book'); ?>">View all in <?php echo $categories[0]->name; ?></a>&nbsp;&raquo;</span>
    <header class="wrapper work-header">
        <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">by <?php the_field('name'); ?></a>
      </h1>
  </header>
    <section class="entry-content wrapper">
      <?php $materials = get_field('materials');
        if ( !empty($materials) ) : ?>
          <div class="materials">
            <p><em><strong>Materials used:</strong></em> <?php echo $materials; ?></p>
          </div>
        <? endif; ?>
      <?php $millies_comments = get_field('millies_comments');
        if ( !empty($millies_comments) ) : ?>
          <div class="millies_comments">
            <p><strong><em>Millie says:</em></strong> <?php echo $millies_comments; ?></p>
          </div>
        <? endif; ?>
    </section>
      <?php $image = get_field('image');
          if ( !empty($image) ) {
            echo '<figure class="wrapper colouring-image"><img src="' . $image['sizes']['large'] . '" /></figure>';
          }
      ?>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
<footer class="footer">
<?php get_template_part( 'nav', 'below-single' ); ?>
</footer>
</section>
<?php get_footer(); ?>
