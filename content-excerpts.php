<h1>content-excerpt.php</h1>
<div class="excerpts">
  <?php $the_query = new WP_Query( 'posts_per_page=5&offset=1' ); ?>

  <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

  <div class="blog-post">
    <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p class="blog-post-meta">
      <?php the_date(); ?> &bull;
      <a href="<?php comments_link(); ?>">
        <?php
        printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( get_comments_number() ) ); ?>
      </a>
    </p>

    <?php if ( has_post_thumbnail() ) {?>
      <div class= "thumbnail">
        <?php	the_post_thumbnail('sidebar-excerpts'); ?>
      </div>
    <?php }?>

    <div class="excerpt-body">
          <?php the_excerpt(); ?>
    </div> <!-- /excerpt-body -->

  </div> <!-- /blog-post -->

  <?php 
  endwhile;
  wp_reset_postdata();
  ?>
</div> <!-- /excerpts -->