<?php
/*
Template Name: Create
*/
get_header();
if(is_user_logged_in()):
    $current_user = wp_get_current_user();

    if( !isset($_GET['step']) ):
?>

    <div id="content" class="create-popup">
        <div class="main-content">
            <div class="create-block">
                <h1>CREATE A PROJECT</h1>
                <p class="info-banner">... or select an existing Project...<span class="info">&#x00456;<span class="tooltiptext">If you select an existing Project from the dropdown menu, this scan will be added to that existing Project in chronological order.</span></span></p>
                <form action="" class="form" method="post" id="create-prj-form">
                    <div class="projects-dropdown">
                        <p>
                            <input type="text" class="form-control awesomplete" id="input-autocomplete" placeholder="Project Name" onfocus="this.placeholder=''" onblur="this.placeholder = 'Project Name'" required name="proj-title">
                        </p>

                        <?php
                            $args = array(
                    			'post_type'	=>	'scene',
                    			'author'	=>	$current_user->ID,
                                'post_parent'   => 0
                    		);
                    		$the_query = new WP_Query( $args );
                    		if ( $the_query->have_posts() ){
                            ?>
                                <ul class="projects-list" id="mylist" >
                                    <?php while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
                                        <li><a href="#"><?php the_title(); ?></a></li>
                                    <?php } ?>
                                </ul>
                        <?php } ?>

                    </div>
                    <p><input type="text" class="form-control" placeholder="Scene (Optional)" onfocus="this.placeholder=''" onblur="this.placeholder = 'Scene (Optional)'" name="scene"></p>
                    <p><input type="text" class="form-control" placeholder="Notes (Optional)" onfocus="this.placeholder=''" onblur="this.placeholder = 'Notes (Optional)'" name="notes"></p>
                    <p id="file-opton-fields">
                        <input id="create-form-sbt" type="submit" class="btn green" value="CONTINUE">
                        <input type="hidden" name="create-prj">
                    </p>
                    <?php wp_nonce_field( 'create_prj_action', 'create_prj_action_field' ); ?>
                </form>
            </div>
        </div>
    </div>

<?php elseif( isset($_GET['step']) ): ?>

    <?php
        $post_ID = $_GET['step'];
        $new_post = get_post($post_ID);
        if($new_post->post_author == $current_user->ID):

            // get scene data by RAD API
            $radapi = new RADAPI;
            $scene_rad_api_data = $radapi->get_scene($post_ID);
    ?>

    <div id="content">
        <div class="heading">
            <h1><?php echo get_the_title($new_post->post_parent); ?></h1>
        </div>
        <div class="responsive-table">
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
                    <td><?php echo get_the_time('d M Y', $post_ID); ?></td>
                    <td>00:00 (mm:ss)</td>
                    <td><?php echo $new_post->post_excerpt; ?></td>
                    <td><?php echo $new_post->post_content; ?></td>
                    <td>
                        <a href="#" class="edit-btn-notes"><img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/edit.svg" alt="edit"></a>
                    </td>
                </tr>
            </table>
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
        <?php get_template_part('blocks/footnotes'); ?>

    </div>

    <?php
        endif;
    endif;
endif;
get_footer();
?>
