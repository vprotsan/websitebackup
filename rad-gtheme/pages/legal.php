<?php
/*
Template Name: Legal
*/
get_header('home');    
?>
<main class="container-fluid">
	<div class="legal">
			<div class="header">
				<?php $legalTitle = get_field('header_for_legal_section'); ?>
				<h1><?php echo $legalTitle; ?></h1>
		     	<?php if( has_nav_menu( 'legal' ) ): ?>
					<div class="legal">
						 <?php
				            if( has_nav_menu( 'legal' ) )
				                wp_nav_menu( array(
				                        'container'		 => false,
				                        'theme_location' => 'legal',
				                        'menu_class'     => 'nav',
				                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				                        'walker'         => new Dash_Walker_Nav_Menu
				                    )
				                );
				        ?>
					</div>
				<?php endif; ?>

			</div>
			<div class="content">
				 <?php while ( have_posts() ) : the_post(); ?>
				 	 <?php the_title( '<h2 class="text-uppercase">', '</h2>' ); ?>
				 	 <?php the_content(); ?>
				 <?php endwhile; ?>
			</div>

	</div>

</main>
