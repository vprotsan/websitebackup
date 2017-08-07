<?php
/*
Template Name: Projects
*/
get_header();
if(is_user_logged_in()):
	$current_user = wp_get_current_user();
?>

<div id="content">
	<div class="main-content">
		<?php while ( have_posts() ) : the_post(); ?>
	    	<?php the_title( '<div class="heading"><h1>', '</h1></div>' ); ?>
	        <div class="description-block">
	            <?php the_content(); ?>
	        </div>
		<?php endwhile; ?>

		<div class="main-content">
			 <div class="index-table">
                 <?php
                    $args = array(
                        'post_type' 		=>  'scene',
                        'author'    		=>  $current_user->ID,
                        'post_parent'   	=> 0,
						'posts_per_page'	=> -1
                    );
                    $the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ):
				?>
					<table class="table">
					 	<tr>
                            <th>Project Name</th>
                            <th>Scans</th>
                            <th>Created</th>
                            <th>Last Modified</th>
                            <th>Total Playtime</th>
                            <th></th>
                        </tr>

						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<tr>
								<td class="p-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></td>
								<td>
									<?php
										$args = array(
											'post_parent' => get_the_ID(),
											'post_type'   => 'scene',
											'numberposts' => -1,
											'post_status' => 'publish'
										);
										echo count(get_children( $args ));
									?>
								</td>
								<td><?php the_time('j M Y'); ?></td>
								<td><?php the_modified_date('d M Y'); ?></td>
								<td>14:11 (mm:ss)</td>
							</tr>
            			<?php endwhile; ?>

					</table>
				<?php endif; ?>
			 </div>
		</div>
	</div>
	 <?php get_template_part('blocks/footnotes'); ?>
</div>

<?php endif;
get_footer(); ?>
