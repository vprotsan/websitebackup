<?php
/*
Template Name: Project-single
*/
get_header();
if(is_user_logged_in()):
?>

<div id="content">
    <div class="main-content">

        <?php
            while ( have_posts() ) : the_post();
                $cur_post_ID = get_the_ID();

                $new_post = get_post($cur_post_ID);
                $current_user = wp_get_current_user();

                if($new_post->post_author == $current_user->ID):
            ?>
                <?php
                    $parent_ID = wp_get_post_parent_id( $cur_post_ID );
                    if($parent_ID == 0):    // When project
                ?>
                	<?php the_title( '<div class="heading"><h1>', '</h1></div>' ); ?>
                    <div class="description-block">
                        <?php the_content(); ?>
                    </div>

                    <div class="index-table">


                        <?php
                            $args = array(
                                'post_type' => 'scene',
                                'posts_per_page' => -1,
                                'post_parent' => $cur_post_ID,
                                'order' => 'ASC'
                            );
                            $the_query = new WP_Query( $args );
                            if ( $the_query->have_posts() ) :

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
                                <table class="table">
                                        <tr>
                                            <th>Scan</th>
                                            <th>Created</th>
                                            <th>Playtime</th>
                                            <th>Author</th>
                                            <th>Scene</th>
                                            <th>Notes</th>
                                        </tr>

                                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                        <tr>
                                            <td class="s-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
                                            <td><?php the_time('j M Y'); ?></td>
                                            <td>00:14 (mm:ss)</td>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php the_excerpt() ?></td>
                                            <td><?php the_content() ?></td>
                                        </tr>
                                    <?php endwhile; ?>

                                </table>
                                <?php
                            endif;
                            wp_reset_postdata();
                        ?>

                	</div>

                <?php else: // When scene ?>

                    <?php
                        // get scene data by RAD API
                        $radapi = new RADAPI;
                        $scene_rad_api_data = $radapi->get_scene($cur_post_ID);
                    ?>

                    <div class="heading">
                        <h1><?php echo get_the_title($new_post->post_parent); ?></h1>
                    </div>
                    <div class="responsive-table">

                        <form id="scene-edit-form">
                            <table class="info-table">
                                <tr>
                                    <th>SCAN</th>
                                    <th>CREATED</th>
                                    <th>PLAYTIME</th>
                                    <th>SCENE</th>
                                    <th>NOTES</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><?php echo $new_post->post_title; ?></td>
                                    <td><?php echo get_the_time('d M Y', $cur_post_ID); ?></td>
                                    <td>00:00 (mm:ss)</td>
                                    <td class="editable">
                                        <label for="edit-scene-text" class="edit-text-lbl"><?php echo $new_post->post_excerpt; ?></label>
                                        <input id="edit-scene-text" class="edit-text-inpt" type="text" name="scene-text" value="<?php echo esc_attr($new_post->post_excerpt); ?>" style="display: none" />
                                    </td>
                                    <td class="editable">
                                        <label for="edit-notes-text" class="edit-text-lbl"><?php echo $new_post->post_content; ?></label>
                                        <input id="edit-notes-text" class="edit-text-inpt" type="text" name="notes-text" value="<?php echo esc_attr($new_post->post_content); ?>" style="display: none" />
                                    </td>
                                    <td class="edit-actions">
                                        <a id="edit-scene" href="#" class="edit-btn-notes"><img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/edit.svg" alt="edit"></a>
                                        <a id="save-scene" href="#" class="save-btn-notes" style="display: none;"><img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/save1.svg" alt="save"></a>
                                        <input type="hidden" value="<?php echo $new_post->ID; ?>" name="postid" />
                                        <?php wp_nonce_field( 'edit_sceme_action', 'edit_sceme_field' ); ?>
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </div>
                    <div class="main-content" class="main-content-create">
                        <div class="twocolumns has-credits">
                            <aside class="left-column">
                                <h2>Upload</h2>
                                <div class="upload-info">
                                    <div class="data-holder">
                                        <button class="upgrade btn button green">upgrade</button>
                                        <img class="dummy-holder" src="http://marketingland.com/wp-content/ml-loads/2014/08/video-tv2-ss-1920.jpg" alt="#">
                                    </div>
                                </div>
                                <div class="video-data">
                                    <div class="col data-1">
                                        <div>
                                            <p class="fps">FPS: <span class="fps-value">120</span></p>
                                        </div>
                                        <div>
                                            <p class="resolution">Resolution: <span class="reolution-value">1080</span>px</p>
                                        </div>
                                    </div>
                                    <div class="col data-2">
                                        <div>
                                            <p class="frames">Frames: <span class="frames-value">16,80</span></p>
                                        </div>
                                        <div>
                                            <p class="compression">Compression: <span class="compression-value">...</span>px</p>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <div class="right-column">
                                <h2>Results</h2>
                                <div class="columns-holder">

                                <!--by Valeriya on 6/14
                                    <div class="column">
                                        <h3>Raw Data</h3>
                                        <div class="progress-holder incomplete">
                                            <div class="progress-box">
                                                <span class="percent-text">0%</span>
                                            </div>
                                        </div>
                                        <div class="btn-holder">
                                            <a href="#" class="btn">DOWNLOAD FBX</a>
                                        </div>
                                    </div>
                                -->
                                    <div class="column">
                                       <!-- by Valeriya on 6/14
                                        <h3>Clean Data</h3>
                                        -->
                                        <div class="output-info">
                                            <div class="data-holder">
                                                <button class="upgrade btn button green">upgrade</button>
                                                <img class="dummy-holder" src="http://marketingland.com/wp-content/ml-loads/2014/08/video-tv2-ss-1920.jpg" alt="#">
                                            </div>
                                        </div>

                                        <div class="btn-holder">
                                             <div class="download-box">
                                                <button href="#" class="btn green">DOWNLOAD</button>
                                                <!-- removed from select :onChange="download(this.value)" -->

                                                <select name="download" class="select">
                                                    <option data-display="Select" value="FBX">FBX (*.fbx)</option>
                                                    <option value="DXF">DXF (*.dxf)</option>
                                                    <option value="OBJ">OBJ (*.obj)</option>
                                                    <option value="DAE">DAE (*.dae)</option>
                                                    <option value="BVH">BVH (*.bvh)</option>
                                                    <option value="HTR">HTR (*.htr)</option>
                                                    <option value="TRC">TRC (*.trc)</option>
                                                    <option value="ASF">ASF (*.asf)</option>
                                                    <option value="AMC">AMC (*.amc)</option>
                                                </select>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

            <?php endif; ?>
        <?php endwhile; ?>

     </div>
     <?php get_template_part('blocks/footnotes'); ?>

</div>

<?php
endif;
get_footer();
?>
