<?php
/*
Template Name: Updates
*/
get_header(); ?>
<div id="content">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_title( '<div class="heading"><h1>', '</h1></div>' ); ?>
        <div class="description-block">
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>


    <div class="main-content">
        <?php
            $terms = get_terms('question-categories');
            if(!is_wp_error($terms) and $terms):
            ?>
                <div class="question-themes">
                    <ul id="q-themes" class="nav nav-tabs list-group" role="tablist">
                        <?php
                            $tab_counter = 1;
                            foreach($terms as $item):
                        ?>
                            <li role="presentation"<?php if($tab_counter == 1): ?> class="active"<?php endif; ?>><a href="#<?php echo $tab_counter; ?>" role="tab" data-toggle="tab"><?php echo $item->name ?></a></li>
                        <?php
                                $tab_counter++;
                            endforeach;
                        ?>
                    </ul>
                </div>

                <div class="question-answers">
                    <div class="tab-content">

                        <?php
                            $tab_counter = 1;
                            foreach($terms as $item):
                        ?>
                                <div role="tabpanel" class="tab-pane fade in<?php if($tab_counter == 1): ?> active<?php endif; ?>" id="<?php echo $tab_counter; ?>">
                                    <div class="questions">

                                        <?php
                                            $args = array(
                                            	'post_type' => 'questions',
                                                'posts_per_page' => -1,
                                            	'tax_query' => array(
                                            		array(
                                            			'taxonomy' => 'question-categories',
                                            			'field'    => 'slug',
                                            			'terms'    => $item->slug,
                                            		),
                                            	),
                                            );
                                            $the_query = new WP_Query( $args );
                                            if ( $the_query->have_posts() ) :
                                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                                ?>
                                                    <div class="question">
                                                       <div class="q-title"><?php the_title(); ?><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                                                       <div class="q-answer"><?php the_content(); ?></div>
                                                   </div>
                                                <?php
                                                endwhile;
                                            endif;
                                            wp_reset_postdata();
                                        ?>

                                    </div>
                                </div>
                        <?php
                                $tab_counter++;
                            endforeach;
                        ?>

                    </div>
                </div>
            <?php
            endif;
        ?>
    </div>
<?php get_template_part('blocks/footnotes'); ?>

<?php /*

<hr />



        <div class="main-content">


                 <?php
                 $cat_questions = get_categories(array(
                        'taxonomy' => 'question-categories'
                        ));
                 //var_dump($cat_questions);
                        ?>

                <div class="question-themes">
                    <ul id="q-themes" class="nav nav-tabs list-group" role="tablist">

                  <?php $tab_counter = 1;
                        foreach($cat_questions as $cat):
                             $term_slug = $cat->slug;
                             $cat_num = $cat->cat_ID;
                             $query = new WP_Query(array('post_type'        => 'questions',
                                                         'cat'              =>  $cat_num,
                                                         'tax_query' => array(

                                                                        'taxonomy' => 'question-categories',
                                                                        'field'    => 'slug',
                                                                        'terms'    => $term_slug,
                                                                       ),

                                                         ));

                             echo '<li role="presentation"><a href="#'.$tab_counter.'" role="tab" data-toggle="tab">'.$cat->name.'</a></li>';

                        $tab_counter++;
                        endforeach; ?>
                    </ul>
                </div>


        <div class="question-answers">
        <?php //var_dump( $query); ?>
            <div class="tab-content">
                    <?php $tab_counter = 1;
                        foreach($cat_questions as $cat):
                    ?>

                    <div role="tabpanel" class="tab-pane fade in" id="<?php echo $tab_counter; ?>">
                        <div class="questions">
                            <?php if ( $query->have_posts() ): ?>

                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                     <div class="question">
                                        <div class="q-title"><?php the_title(); ?><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                                        <div class="q-answer"><?php the_content(); ?></div>
                                    </div>
                            <?php endwhile; ?>


                            <?php endif; ?>
                       </div><!--end questions-->
                    </div><!--end tabpanel-->
                        <?php
                            $tab_counter++;
                        endforeach; ?>
                 </div><!--end tab-content-->



        </div>  <!-- end question-answers-->
    </div><!--end main-content-->
*/ ?>
 
</div><!--end main-content-->
<?php get_footer(); ?>
