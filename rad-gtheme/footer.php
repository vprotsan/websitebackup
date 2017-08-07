		<?php get_sidebar('dash'); ?>
	</div>

	<div id="sign-popup" class="popup">
		<div class="holder">
			<h1>Let’s Get Started!</h1>
			<form action="" method="post">
				<p><input type="email" name="email" required="required" placeholder="name@company.com" class="form-control"/></p>
				<p><input type="submit" name="rad_signup" value="sign up for free" class="btn green" /></p>
				<?php wp_nonce_field( 'rad_reg', 'rad_reg_field' ); ?>
			</form>
			<span class="text">Already have an account? <a href="<?php the_field('login_page', 'option') ?>">Log in.</a></span>
			<a href="#" class="close"></a>
		</div>
		<span class="overlay"></span>
	</div>

	<div id="welcome-popup" class="popup">
		<div class="holder">
			<div class="heading">
				<h1>Welcome to RAD!</h1>
			</div>
			<p>We’re pumped to get you going.</p>
			<?php
				$check_out_sample_results = get_field('check_out_sample_results', 'option');
				$create_a_project = get_field('create_a_project', 'option');
				$check_out_the_guide = get_field('check_out_the_guide', 'option');
			?>
			<div class="container">

				<?php if($check_out_sample_results): ?>
					<a href="<?php echo $check_out_sample_results; ?>" class="link">SEE SAMPLE RESULTS</a>
					<span class="or">- OR - </span>
				<?php endif; ?>
				<a href="<?php echo $create_a_project; ?>" class="link green">CREATE A PROJECT</a>
				<span class="or">- OR - </span>
				<a href="<?php echo $check_out_the_guide; ?>" class="link">CHECK OUT THE GUIDE</a>
			</div>
			<a href="#" class="close"></a>
		</div>
		<span class="overlay"></span>
	</div>

	<div class="popup" id="upgrade-popup">
		<div class="holder">
			<div class="title">
				<h1>Upgrade Your RAD Plan</h1>
			</div>

			<?php
				$products = get_field('products', 'option');
				if($products):
			?>
			<div class="container">
				<div class="responsive-table">
					<table class="plans">

						<tr id="producllist">
							<th></th>
							<?php $i = 0; foreach($products as $item): ?>
								<th>
									<label>
										<?php
											global $woocommerce;
											$radio_value = add_query_arg(array( 'add-to-cart' => $item), $woocommerce->cart->get_cart_url() );
										?>
										<input name="prod" type="radio" value="<?php echo $radio_value; ?>" class="hidden-radio"<?php if($i == 1): ?> checked="checked"<?php endif; ?>>
										<span class="fake-radio"></span>
									</label>
								</th>
							<?php $i++; endforeach; ?>
						</tr>

						<tr>
							<td>Price:</td>
							<?php
								foreach($products as $item):
									$_product = wc_get_product( $item );
									?><td><strong><?php echo $_product->get_price_html(); ?></strong></td><?php
								endforeach;
							?>
						</tr>

						<?php
							$acf_keys = array(
								array(
									'acf_key' => 'credits',
									'title' => 'Credits:'
								),
								array(
									'acf_key' => 'playtime',
									'title' => 'Playtime:'
								),
								array(
									'acf_key' => 'gpu',
									'title' => 'GPU:'
								),
								array(
									'acf_key' => 'processing_time',
									'title' => 'Processing time:'
								),
								array(
									'acf_key' => 'automated_cleanup',
									'title' => 'Automated cleanup:'
								),
								array(
									'acf_key' => 'fbx_file',
									'title' => 'FBX file:'
								),
								array(
									'acf_key' => 'customer_support',
									'title' => 'Customer support:'
								)
							);
							for($i = 0; $i < count($acf_keys); $i++):
								?><tr><td><?php echo $acf_keys[$i]['title'] ?></td><?php
								foreach($products as $item):
									?><td>
										<?php
											if( in_array( $acf_keys[$i]['acf_key'], array('automated_cleanup', 'fbx_file') ) ) {
												if( get_field($acf_keys[$i]['acf_key'], $item) ){
													?><img src="<?php echo TEMPLATE_DIRECTORY_URI ?>/images/ico-checkmark.png" alt="checkmark"><?php
												}
											} else {
												the_field($acf_keys[$i]['acf_key'], $item);
											}
										?>
									</td><?php
								endforeach;
								?></tr><?php
							endfor;
						?>

					</table>
				</div>
				<div class="btn-holder">
					<a href="" class="btn green" id="upgradeplan-popup">UPGRADE</a><p>Need something else? <br> Call us: <a href="tel:19172666244"> +1 917 226 6244</a></p>
				</div>
				<div class="small-print">
					<p class="star">Assumes an average 30 FPS.  Higher FPS may result in lower playtime.</p>
                    <p class="pound">Estimated. Does not include upload time. FPS above 30 may result in longer processing times.</p>
				</div>
			</div>
			<?php endif; ?>

			<a href="#" class="close"></a>
		</div>
		<span class="overlay"></span>
	</div>

	<div id="dang-popup" class="popup">
		<div class="holder">
			<div class="wrap">
				<h1>Dang</h1>
				<p>Your account doesn’t have enough credits.</p>

				<p>	Don’t worry, we are still processing your content.</p>

				<p>	You can access your results after<br>
				you have added at least {NUMBER} additional credits.</p>
				
			</div>

			<div class="btn-holder">
				<a href="#upgrade-popup" class="btn green" id="addcredit-popup">add credit</a>
				
			</div>
			<a href="#" class="close"></a>
		</div>
		<span class="overlay"></span>
	</div>


	<div id="goodtogo-popup" class="popup">
		<div class="holder">
			<div class="wrap">
				<h1>YOU’RE GOOD TO GO!</h1>
				<p>Your scan will be available on the Projects page.</p>

				<p>	If the scan hasn’t completed processing yet, we’ll continue working <br>in the background and deliver results as soon as<br> we’re ready. </p>

				<img src="<?php echo TEMPLATE_DIRECTORY_URI ?>/images/menu-item_03.jpg" alt="menu-item-projects">
				

				<div class="dont-show-holder">
					

					<label>
						<input id="dont-show-again" name="dont-show-again" type="checkbox" value="">
					    <span class="fake-radio"></span>				
										
					</label>


					<span>Got it. Don’t show this message again.</span>
									
				</div>
			</div>

			<div class="btn-holder">
				<a href="#" class="btn green">continue</a>
				<a href="#" class="btn delete">cancel</a>
				
			</div>
			<a href="#" class="close"></a>
		</div>
		<span class="overlay"></span>
	</div>

	<div id="video-instructions" class="popup">
		<div class="holder">
			<div class="wrap">
				<div class="title">
					<h1>Please watch quick instructions</h1>
				</div>
				<p>This video will always be available on the Guide page.</p>

				<div class="video-container">
	                <?php  $iframe = get_field('video_instructions'); ?>

	                <video width="380" height="300" controls>
					  	<source src="<?php echo $iframe; ?>" type="video/mp4">
						Your browser does not support the video tag.
					</video>
                </div>			

				<div class="dont-show-holder">
					

					<label>
						<input id="dont-show-again" name="dont-show-again" type="checkbox" value="">
					    <span class="fake-radio"></span>				
										
					</label>


					<span>Got it. Don’t show this message again.</span>
									
				</div>
			</div>

			<div class="btn-holder">
				<a href="#" class="btn green">Got it</a>	
			</div>
			<a href="#" class="close"></a>
		</div>
		<span class="overlay"></span>
	</div>

	<div id="video-lightbox" class="popup">
		<div class="holder">
				<div class="video-container">
	                <?php  $iframe = get_field('video_instructions'); ?>

	                <video width="780" height="500" controls>
					  	<source src="<?php echo $iframe; ?>" type="video/mp4">
						Your browser does not support the video tag.
					</video>
                </div>			

			<a href="#" class="close"></a>
		</div>
		<span class="overlay"></span>
	</div>


	<?php wp_footer(); ?>
</body>
</html>
