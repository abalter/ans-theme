<h1>front-page.php</h1>
<div class="full-page">
  <?php get_header(); ?>

  <div class="page-body">
    <div class="sidebar" id="sidebar-left">
      <?php get_template_part( 'content-excerpts'); ?>
      <?php //dynamic_sidebar('sidebar-left'); ?> 
    </div>

    <div class="main-content">
      <?php $the_query = new WP_Query( 'posts_per_page=1' ); ?>

      <?php 
      if ($the_query -> have_posts()) : $the_query -> the_post();
        get_template_part( 'content-single', get_post_format() );
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
      endif; 
      ?>
    </div>	<!-- /.main-content -->

    <div class="sidebar" id="sidebar-right">
      <?php dynamic_sidebar('sidebar-right'); ?> 
    </div>
  </div> <!-- /page-body -->

  <?php get_footer(); ?>

</div> <!-- /full-page -->

