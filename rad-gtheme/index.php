<?php get_header(); ?>
<div id="content">
    <div class="main-content">

		<div class="updates-filter">
            <div class="updates-categories">
                <ul>
    				<?php
                        $cats = get_categories();
                        foreach($cats as $item){
                            echo '<li><a href="'. add_query_arg(array('cat' => $item->term_id), get_permalink()) .'">'. $item->name .'</a></li>';
                        }
    					if( has_nav_menu( 'updates' ) )
    						wp_nav_menu( array(
    							'container'		 => false,
    							'theme_location' => 'updates',
    							'items_wrap'     => '%3$s'
    						)
    					);
    				?>
                </ul>
            </div>
        </div>

		<div class="update-posts">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="post">
                        <?php
                        	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        	the_content( sprintf( wp_kses(__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_s' ), array('span' => array('class' => array())) ), get_the_title() ) );
                        ?>
					</div>
				<?php endwhile; ?>
                <div class="navigation">
                    <?php if(trim(get_previous_posts_link())): ?>
                		<div class="next alignleft"><?php echo previous_posts_link( '&laquo; Older Entries' ) ?></div>
                	<?php endif; ?>
                	<?php if(trim(get_next_posts_link())): ?>
                		<div class="prev alignright"><?php echo next_posts_link( 'Newer Entries &raquo;' ) ?></div>
                	<?php endif; ?>
                </div>

			<?php else : ?>
				<?php get_template_part( 'blocks/not_found' ); ?>
			<?php endif; ?>
		</div>

	</div>
</div>
<?php get_footer(); ?>
