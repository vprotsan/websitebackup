<?php
/*
Template Name: Project-single
*/
get_header();
if(is_user_logged_in()):
?>

<div id="content">
<?php while ( have_posts() ) : the_post(); ?>
    	<?php the_title( '<div class="heading"><h1>', ': Jazz Dance</h1></div>' ); ?>
        <div class="description-block">
            <?php the_content(); ?>
        </div>
	<div class="main-content">
		 <div class="responsive-table projects-list">


		<!--  <table>
		 	<tr class="projects-table-header">
		 		<th >scan</th>
		 		<th>created</th>
		 		<th>playtime</th>
		 		<th>scene</th>
		 		<th>notes</th>
		 	</tr>

		 	<tr class="project-details scan-details">
		 		<td class="scan-name project-name"><a href="#tothescan">scan 6</a></td>
		 		<td>11 Feb 2017</td>
		 		<td>00:14(mm:ss)</td>
		 		<td>Brooklyn Academy of Music</td>
		 		<td>Day 2 / Take 3</td>
		 	</tr>

		 	<tr class="project-details scan-details">
		 		<td class="scan-name project-name"><a href="#tothescan">scan 5</a></td>
		 		<td>11 Feb 2017</td>
		 		<td>00:14(mm:ss)</td>
		 		<td>Brooklyn Academy of Music</td>
		 		<td>Day 2 / Take 3</td>
		 	</tr>

		 	<tr class="project-details scan-details">
		 		<td class="scan-name project-name"><a href="#tothescan">scan 4</a></td>
		 		<td>11 Feb 2017</td>
		 		<td>00:14(mm:ss)</td>
		 		<td>Brooklyn Academy of Music</td>
		 		<td>Day 2 / Take 3</td>
		 	</tr>

		 </table> -->


		  <div class="responsive-table projects-list usage-table">


		 		<!-- table repeats for each scan-->
                    <table class="usage-info-table">
                        <tr>
                            <td><a href="#toaprojectpage">scan 6</a></td>
                            <td>11 Feb 2017</td>
                            <td>00:14(mm:ss)</td>
                            <td>Brooklyn Academy of Music</td>
                            <td>Day 2 / Take 3</td>                                         
                        </tr>
                         <tr>
                            <th>scan</th>
                            <th>created</th>
                            <th>playtime</th>
                            <th>scene</th>
                            <th>notes</th>
                                             
                        </tr>
                    </table>
                    <!-- end-->


                   <!-- table repeats for each scan-->
                    <table class="usage-info-table">
                        <tr>
                            <td><a href="#toaprojectpage">scan 5</a></td>
                            <td>11 Feb 2017</td>
                            <td>00:14(mm:ss)</td>
                            <td>Brooklyn Academy of Music</td>
                            <td>Day 2 / Take 3</td>                                         
                        </tr>
                         <tr>
                            <th>scan</th>
                            <th>created</th>
                            <th>playtime</th>
                            <th>scene</th>
                            <th>notes</th>
                                             
                        </tr>
                    </table>
                    <!-- end-->


                    <!-- table repeats for each scan-->
                    <table class="usage-info-table">
                        <tr>
                            <td><a href="#toaprojectpage">scan 4</a></td>
                            <td>11 Feb 2017</td>
                            <td>00:14(mm:ss)</td>
                            <td>Brooklyn Academy of Music</td>
                            <td>Day 2 / Take 3</td>                                         
                        </tr>
                         <tr>
                            <th>scan</th>
                            <th>created</th>
                            <th>playtime</th>
                            <th>scene</th>
                            <th>notes</th>
                                             
                        </tr>
                    </table>
                    <!-- end-->

		 	
		 </div>


		 	
		 </div>
	</div>
	 <?php endwhile; ?>
      <?php get_template_part('blocks/footnotes'); ?>
</div>

<?php
endif;
get_footer();
?>
