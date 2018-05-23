<div class="blog-post">
	<h2 class="blog-post-title"><?php the_title(); ?></h2>
	<p class="blog-post-meta"><?php the_date(); ?> &bull;
      <a href="<?php comments_link(); ?>">
        <?php
        printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( get_comments_number() ) ); ?>
      </a>
  </p>
	<?php if ( has_post_thumbnail() ) {
		the_post_thumbnail('post-featured');
	} ?>
	<?php the_content(); ?>

</div><!-- /.blog-post -->