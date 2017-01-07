<? $pageIndex = $_GET['pageIndex']; ?>
<nav id="nav-below" class="navigation pagination" role="navigation">
<? if ($pageIndex) : ?>
  <div class="nav-previous wrapper"><?php next_post_link( '%link' . ?pageIndex=<?= $pageIndex; ?>, '<span class="meta-nav">&larr;</span> %title' ); ?></div>
 <? else : ?>
  <div class="nav-previous wrapper"><?php next_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ); ?></div>
 <? endif; ?>
 <? if ($pageIndex) : ?>
 <div class="nav-next wrapper"><?php previous_post_link( '%link' . ?pageIndex=<?= $pageIndex; ?>, '%title <span class="meta-nav">&rarr;</span>' ); ?></div>
<? else : ?>
 <div class="nav-next wrapper"><?php previous_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ); ?></div>
<? endif; ?>
</nav>
