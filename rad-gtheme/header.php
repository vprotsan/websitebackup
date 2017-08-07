<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<!-- hidden while trying three.js-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<!-- added to try three.js-->
	<!--
	<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	-->

	<?php wp_head(); ?>

	<?php
		if(is_user_logged_in()):
			$mbs = '';
			if(function_exists('wcs_user_has_subscription') and wcs_user_has_subscription( '', '', 'active' )){
				$mbs = get_field('subscribers_mbs', 'option');
			} else {
				$mbs = get_field('free_mbs', 'option');
			}
	?>
		<script type="text/javascript" src="https://static.filestackapi.com/v3/filestack.js"></script>
		<script>
			jQuery(function(){
				//https://www.filestack.com/docs/javascript-api/pick-v3
				var client = filestack.init('A8mpacA2BQNiEeDlrvDtBz');

				jQuery('#create-form-sbt').click(function(e){
					client.pick({
						minFiles: 1,
						maxFiles: 1,
						accept: ['.mpeg', '.mp4', '.mov', '.avi'],
						uploadInBackground: false,
						fromSources: ['local_file_system', 'facebook', 'googledrive', 'dropbox', 'url'],
						maxSize: 1024*1024*<?php echo $mbs; ?>,
						onFileUploadFinished: function(file) {
							console.log(file);

							var html = '';
							for (var key in file) {
								html += '<input id="file-data-'+ key +'" type="hidden" value="'+ file[key] +'" name="file-data['+ key +']">';
							}

							jQuery('#file-opton-fields').append( html );

							var timer_create = setInterval(function() {
								console.log('#file-data-' + key);

								if( jQuery('#create-prj-form').find('#file-data-' + key).length ){
									jQuery('#create-prj-form').submit();
									clearInterval(timer_create);
								}
							}, 500);
						}
					}).then(function(result) {
						console.log(JSON.stringify(result.filesUploaded));
					});
					e.preventDefault();
					return false;
				});
			});
		</script>
	<?php endif; ?>

</head>
<body <?php body_class(); ?>>
	<div id="wrapper">

		<?php if( !is_page_template( 'pages/registration.php' ) and !is_page_template( 'pages/login.php' ) and !is_page_template('pages/lostpass.php') ): ?>

			<header class="top-bar">
				<a href="#" class="opener"><span>menu</span></a>
				<div class="drop-holder">

					<?php if(!is_user_logged_in()): ?>

						<a href="<?php the_field('login_page', 'option') ?>" class="btn inverse">Log in</a>
						<a href="#sign-popup" class="lightbox btn">Sign up</a>

					<?php else: ?>

						<?php $current_user = wp_get_current_user(); ?>
						<?php //$current_user->data->display_name; ?>
						<span class="opener-holder"><span><?php echo $current_user->user_firstname; ?></span> <a href="#" class="drop-opener">
						<img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/profile.svg" alt="profile-icon">
						<!--<?php echo substr($current_user->data->display_name, 0, 2) ?>-->


						</a></span>

						<?php if( has_nav_menu( 'userdrop' ) ): ?>
							<div class="drop">
								<?php
									wp_nav_menu( array(
											'container'		 => false,
											'theme_location' => 'userdrop',
											'items_wrap'     => '<ul>%3$s</ul>',
											'walker'         => new Drop_Walker_Nav_Menu
										)
									);
								?>
							</div>
						<?php endif; ?>

					<?php endif; ?>

				</div>
			</header>

		<?php endif; ?>
