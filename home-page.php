<h1>home-page.php</h1>
<div class="full-page">

  <?php get_header(); ?>

  <div class="page-body">

    <div class="sidebar" id="sidebar-left">

      <ul>
        <?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>

        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

        <div class="blog-post">
          <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p class="blog-post-meta">
            <?php the_date(); ?> by
            <a href="#">
              <?php the_author(); ?>
            </a> &bull;
            <a href="<?php comments_link(); ?>">
              <?php
              printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( 						get_comments_number() ) ); ?>
            </a>
          </p>

          <?php if ( has_post_thumbnail() ) {?>
          <div class="">
            <div class= "thumbnail">
              There is a thumbnail
              <?php	the_post_thumbnail('thumbnail'); ?>
            </div>
            <div class="excerpt">
              <?php the_excerpt(); ?>
            </div>
          </div>
          <?php } else { ?>
          there is no thumbnail
          <?php the_excerpt(); ?>
          <?php } ?>


        </div>

        <?php 
        endwhile;
        wp_reset_postdata();
        ?>
      </ul>



      <?php dynamic_sidebar('sidebar-left'); ?> 
    </div>

    <div class="main-content">
      <?php 
      if ( have_posts() ) : while ( have_posts() ) : the_post();
      get_template_part( 'content', get_post_format() );
      endwhile; ?>
      <?php endif; ?>
    </div>	<!-- /.main-content -->

    <div class="sidebar" id="sidebar-right">
      <?php dynamic_sidebar('sidebar-right'); ?> 
    </div>

  </div> <!-- /page-body -->

  <?php get_footer(); ?>

</div> <!-- /full-page -->