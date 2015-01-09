<?php get_header(); ?>
  <?php if (have_posts()) : ?>
	<div id="content">
       <?php while (have_posts()) : the_post();
			 the_content(); ?>
       <?php endwhile; ?>
     </div>
  <?php endif; ?>
<?php get_footer(); ?>