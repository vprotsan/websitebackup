<?php get_header(); ?>
<div id="content">
    <div class="main-content">
		<?php
			while ( have_posts() ) : the_post();
				the_title( '<div class="heading"><h1>', '</h1></div>' );
				the_content();
			endwhile;
		?>
	</div>
</div>
<?php get_footer(); ?>
