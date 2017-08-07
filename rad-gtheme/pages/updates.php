<?php
/*
Template Name: Updates
*/
get_header(); ?>
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
            <?php
                $args = array( 'posts_per_page'    => -1 );

                if(isset($_GET['cat'])){
                    $args['cat'] = absint($_GET['cat']);
                }

                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) :
                    $date = '';
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                        $cur_date = get_the_time('F Y');
                        if($cur_date != $date){
                            ?>
                                <div class="date-wrap">
                                    <h2><?php echo $cur_date ?></h2>
                                </div>
                            <?php
                            $date = $cur_date;
                        }

                        $update_theme_tag = '';
                        if(function_exists('get_field')){
                            $update_theme_tag = get_field('update_theme_tag');
                            $excerpt = get_field('excerpt');
                        }
                    ?>
                        <div class="post">
                            <span class="tag <?php echo sanitize_title($update_theme_tag) ?>"><?php echo $update_theme_tag; ?></span>
                            <?php echo $excerpt; ?>
                        </div>
                    <?php
                    endwhile;
                endif;
                wp_reset_postdata();
            ?>
        </div>

    </div>
     <?php get_template_part('blocks/footnotes'); ?>
</div>
<?php get_footer(); ?>
