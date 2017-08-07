<?php
/*
Template Name: Usage
*/
get_header();
if(is_user_logged_in())
    
?>

<div id="content">
    <?php while ( have_posts() ) : the_post(); ?>
    	<?php the_title( '<div class="heading"><h1>', '</h1></div>' ); ?>
        <div class="description-block">
            <?php the_content(); ?>
        </div>

        <?php
            $usage = get_field('usage');
            if($usage):
        ?>
            <div class="main-content">

                <div class="current-balance">
                    <div class="balance">62</div>
                </div>


                <div class="stats-wrapper">
                    <div class="projects-holder">
                        <div class="border-wrapper">
                        <div>
                            <p class="title">Projects</p>
                            <span class="number-of-projects">35</span>
                        </div>
                        </div>
                    </div>

                    <div class="scans-holder">
                    <div class="border-wrapper">
                        <div>
                            <p class="title">Scans</p>
                            <span class="total-scans">733</span>
                        </div>
                        </div>
                    </div>

                    <div class="playtime-holder">
                    <div class="border-wrapper">
                        <div>
                            <p class="title">Playtime</p>
                            <span class="total-playtime">72:10</span>
                        </div>
                        </div>
                    </div>
                </div>
              

                <div>
                    <h2>Usage history</h2>
                   
                    <?php
                        $args = array(
                            'post_type'     =>  'scene',
                            'author'        =>  $current_user->ID,
                            //Getting all child posts only
                            'post_parent__not_in' => array( 0 ), 
                            'orderby'       => 'date'
                        );
                        $the_query = new WP_Query( $args );
                        if ( $the_query->have_posts() ){
                        ?>
                        <div class="index-table">

                            <table class="table">
                              
                                 <tr>
                                    <th>Project Name</th>
                                    <th>Scan #</th>
                                    <th>Date</th>
                                    <th>Playtime</th>
                                    <th>Author</th>
                                    <th>Credits Used</th>
                                </tr>
                               

                                <?php while ( $the_query->have_posts() ) { 
                                    $the_query->the_post();

                                        $fname = get_the_author_meta('first_name');
                                        $lname = get_the_author_meta('last_name');
                                        $full_name = '';

                                        if( empty($fname)){
                                            $full_name = $lname;
                                        } elseif( empty( $lname )){
                                            $full_name = $fname;
                                        } else {
                                            //both first name and last name are present
                                            $full_name = "{$fname} {$lname}";
                                        }
                                ?>

                                    <tr>
                                        <td class="p-title"><a href="<?php echo get_permalink( $post->post_parent );?>"><?php echo get_the_title( $post->post_parent ); ?></a></td>
                                        <td><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></td>
                                        <td><?php the_time('j F Y'); ?></td>
                                        <td>03:52</td>
                                        <td><?php echo $full_name; ?></td>
                                        <td>6</td> 
                                    </tr>
                                <?php } ?>

                            </table>
                        </div>
                    <?php } ?>
                </div>

            </div><!--main content end-->
            <?php get_template_part('blocks/footnotes'); ?>
        <?php endif; ?>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>
