<?php
/*
Template Name: Guide
*/
get_header(); ?>
<div id="content">
    <?php while ( have_posts() ) : the_post(); ?>
    	<?php the_title( '<div class="heading"><h1>', '</h1></div>' ); ?>
        <div class="description-block">
            <?php the_content(); ?>
        </div>

       
            <div class="main-content">

                <div class="embed-container">
                 <?php
                    $videoHolder = get_field('image_placeholder');
                    if($videoHolder):
                 ?>
                    <a href="#video-lightbox" class="lightbox"><img src="<?php echo $videoHolder['url']; ?>" alt="<?php echo $videoHolder['title']; ?>"></a>
                <?php endif; ?>
               
                </div>

             <?php
                $guide = get_field('guide');
                if($guide):
             ?>
                
                <div class="usage-columns columns">

                         <?php foreach($guide as $item): ?>

                        <div class="column <?php echo $item['color']; ?>">
                            <div class="image-holder">
                                <?php
                                    if($item['image']):
                                        echo wp_get_attachment_image( $item['image'], 'thumbnail_128x128' );
                                    endif;

                                    if($item['use_second_image']):
                                        echo wp_get_attachment_image( $item['second_image'], 'thumbnail_128x128' );
                                    else:
                                        ?><span class="info-text"><?php echo $item['image_description']; ?></span><?php
                                    endif;
                                ?>
                            </div>
                            <div class="total-info">
                                <span class="image-title"><?php echo $item['title'] ?></span>
                                <span class="sub-title"><?php echo $item['sub_title'] ?></span>
                                <?php echo $item['content'] ?>
                            </div>
                        </div>

                    <?php endforeach; ?> 


                </div>

                </div>
                <?php get_template_part('blocks/footnotes'); ?>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
<!-- </div> -->
<?php get_footer(); ?>
