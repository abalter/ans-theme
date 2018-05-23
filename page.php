<div class="full-page">

  <?php get_header(); ?>

  <div class="page-body">

    <div class="sidebar" id="sidebar-left">
      <?php get_template_part( 'content-excerpts'); ?>
      <?php //dynamic_sidebar('sidebar-left'); ?> 
    </div>

    <div class="main-content">
			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();

					get_template_part( 'content-single', get_post_format() );

				endwhile; endif; 
			?>
    </div>	<!-- /.main-content -->

    <div class="sidebar" id="sidebar-right">
      <?php dynamic_sidebar('sidebar-right'); ?> 
    </div>

  </div> <!-- /page-body -->

  <?php get_footer(); ?>

</div> <!-- /full-page -->