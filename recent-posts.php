<h1>recent-items.php</h1>
<div class="recent-items">
  <?php 
  if ( have_posts() ) : while ( have_posts() ) : the_post();
  get_template_part( 'content', get_post_format() );
  endwhile; ?>

  <?php endif; ?>
</div>	<!-- /recent-items -->