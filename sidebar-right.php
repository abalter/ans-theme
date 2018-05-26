<h1>sidebar-right.php</h1>
<?php if (is_active_sidebar('sidebar-right')) { echo('sidebar-right active');?> 
					<?php do_action('before_sidebar'); ?> 
          do sidebar
				<div class="sidebar" id="sidebar-right">
					<?php dynamic_sidebar('sidebar-right'); ?> 
				</div>
<?php } else {echo('no right sidebar');}?>