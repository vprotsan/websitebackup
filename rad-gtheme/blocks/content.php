<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
<?php
	if(is_single()){
		the_content();
	} else {
		the_excerpt();
	}
?>
