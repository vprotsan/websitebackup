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
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        ?>
                            <div class="date-wrap">
                                <h2><?php the_time('F Y') ?></h2>
                            </div>
                        <?php

                        $update_theme_tag = '';
                        if(function_exists('get_field')){
                            $update_theme_tag = get_field('update_theme_tag');
                        }
                    ?>
                        <div class="post">
                            <span class="tag <?php echo sanitize_title($update_theme_tag) ?>"><?php echo $update_theme_tag; ?></span>
                            <?php the_content(); ?>
                        </div>
                    <?php
                    endwhile;
                endif;
            ?>
        </div>

    </div>
     <?php get_template_part('blocks/footnotes'); ?>
</div>

<?php get_footer(); ?>
