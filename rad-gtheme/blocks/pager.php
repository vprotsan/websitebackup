<?php
	if(function_exists('wp_pagenavi') and function_exists('theme_wp_pagenavi')):
		theme_wp_pagenavi();
	elseif(function_exists('wp_pagenavi')):
		wp_pagenavi();
	else:
		?>
		<div class="navigation">
			<div class="prev alignleft"><?php next_posts_link( __( '&laquo; Older Entries' ) ) ?></div>
			<div class="next alignright"><?php previous_posts_link( __( 'Newer Entries &raquo;' ) ) ?></div>	
		</div>
		<?php
	endif;
?>
