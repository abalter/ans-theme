<h1>sidebar-left.php</h1>
<?php if (is_active_sidebar('sidebar-left')) { echo('sidebar-left active');?> 
				<?php do_action('before_sidebar'); ?> 
				<div class="sidebar" id="sidebar-left">
					<?php dynamic_sidebar('sidebar-left'); ?> 
				</div>
<?php } else {echo('no left sidebar');}?> 