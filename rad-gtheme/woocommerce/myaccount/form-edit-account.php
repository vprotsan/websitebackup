<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<div class="title">
		<h3>Personal details</h3>
	</div>
	<div class="account-block-content">
		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
			<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">required</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
			<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">required</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
		</p>
		<div class="clear"></div>

		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">required</span></label>
			<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
		</p>
	</div>
	<div class="clear"></div>
	<div class="title">
		<h3>User details</h3>
	</div>
	<div class="account-block-content">

		<?php
			$current_user = wp_get_current_user();

			$industry = array();
			$industry_buf = get_field('industry', 'user_'.$current_user->ID);
			foreach($industry_buf as $item){
				$industry[] = $item['item'];
			}
			$industry = array_map('prepare_option_items', $industry);

			$platforms = array();
			$platforms_buf = get_field('platforms', 'user_'.$current_user->ID);
			foreach($platforms_buf as $item){
				$platforms[] = $item['item'];
			}
			$platforms = array_map('prepare_option_items', $platforms);

			$environment = array();
			$environment_buf = get_field('environment', 'user_'.$current_user->ID);
			foreach($environment_buf as $item){
				$environment[] = $item['item'];
			}
			$environment = array_map('prepare_option_items', $environment);

			$affiliation = array();
			$affiliation_buf = get_field('affiliation', 'user_'.$current_user->ID);
			foreach($affiliation_buf as $item){
				$affiliation[] = $item['item'];
			}
			$affiliation = array_map('prepare_option_items', $affiliation);
		?>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide addl-inf">
			<label>Industry <span class="required">required</span></label>
			<div class="dropdown">
				<p><input name="industry" value="<?php echo implode(', ', $industry) ?>" required="required" placeholder="Industry / Use (check all that apply)" onfocus="this.placeholder=''" onblur="this.placeholder = 'Industry / Use (check all that apply)'" type="text" class="form-control" readonly></p>
				<div class="check-list">
					<span class="title">CHECK ALL THAT APPLY</span>
					<ul>
						<?php
							$industry_glob = array_map( 'prepare_option_items', explode("\n", get_field('industry', 'option')) );
							foreach($industry_glob as $item):
								?>
								<li>
									<label>
										<input type="checkbox" class="hidden-checkbox"<?php if(in_array($item, $industry)): ?> checked="checked"<?php endif; ?>>
										<span class="fake-checkbox"></span>
										<span class="fake-label"><?php echo $item; ?></span>
									</label>
								</li>
								<?php
							endforeach;
						?>
					</ul>
				</div>
			</div>
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide addl-inf">
			<label>Platforms <span class="required">required</span></label>
			<div class="dropdown">
				<p><input name="platforms" value="<?php echo implode(', ', $platforms) ?>" required="required" placeholder="Platforms (check all that apply)" type="text" onfocus="this.placeholder=''" onblur="this.placeholder = 'Platforms (check all that apply)'" class="form-control" readonly></p>
				<div class="check-list">
					<span class="title">CHECK ALL THAT APPLY</span>
					<ul>
						<?php
							$platforms_glob = array_map( 'prepare_option_items', explode("\n", get_field('platforms', 'option')) );
							foreach($platforms_glob as $item):
								?>
								<li>
									<label>
										<input type="checkbox" class="hidden-checkbox"<?php if(in_array($item, $platforms)): ?> checked="checked"<?php endif; ?>>
										<span class="fake-checkbox"></span>
										<span class="fake-label"><?php echo $item; ?></span>
									</label>
								</li>
								<?php
							endforeach;
						?>
					</ul>
				</div>
			</div>
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide addl-inf">
			<label>Computing Environment <span class="required">required</span></label>
			<div class="dropdown">
				<p><input name="environment" value="<?php echo implode(', ', $environment) ?>" required="required" placeholder="Computing Environment (check all that apply)" onfocus="this.placeholder=''" onblur="this.placeholder = 'Computing Environment (check all that apply)'" type="text" class="form-control" readonly></p>
				<div class="check-list">
					<span class="title">CHECK ALL THAT APPLY</span>
					<ul>
						<?php
							$environment_glob = array_map( 'prepare_option_items', explode("\n", get_field('environment', 'option')) );
							foreach($environment_glob as $item):
								?>
								<li>
									<label>
										<input type="checkbox" class="hidden-checkbox"<?php if(in_array($item, $environment)): ?> checked="checked"<?php endif; ?>>
										<span class="fake-checkbox"></span>
										<span class="fake-label"><?php echo $item; ?></span>
									</label>
								</li>
								<?php
							endforeach;
						?>
					</ul>
				</div>
			</div>
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide addl-inf">
			<label>Affiliation <span class="required">required</span></label>
			<div class="dropdown">
				<p><input name="affiliation" value="<?php echo implode(', ', $affiliation) ?>" required="required" placeholder="Affiliation (check all that apply)" onfocus="this.placeholder=''" onblur="this.placeholder = 'Affiliation (check all that apply)'" type="text" class="form-control" readonly></p>
				<div class="check-list">
					<span class="title">CHECK ALL THAT APPLY</span>
					<ul>
						<?php
							$affiliation_glob = array_map( 'prepare_option_items', explode("\n", get_field('affiliation', 'option')) );
							foreach($affiliation_glob as $item):
								?>
								<li>
									<label>
										<input type="checkbox" class="hidden-checkbox"<?php if(in_array($item, $affiliation)): ?> checked="checked"<?php endif; ?>>
										<span class="fake-checkbox"></span>
										<span class="fake-label"><?php echo $item; ?></span>
									</label>
								</li>
								<?php
							endforeach;
						?>
					</ul>
				</div>
			</div>
		</p>
	</div>
	<div class="clear"></div>
	<div class="title">
		<h3>Password</h3>
	</div>
	<div class="account-block-content">
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="password_current"><?php _e( 'Current password', 'woocommerce' ); ?></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" />
			<span class="foget-pass-link"><a href="<?php echo add_query_arg(array('makelogout' => 1)); ?>">Lost Password?</a></span>
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="password_1"><?php _e( 'New password', 'woocommerce' ); ?> <span class="required">required</span></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="password_2"><?php _e( 'Confirm new password', 'woocommerce' ); ?> <span class="required">required</span></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" />
		</p>
	</div>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_account_details' ); ?>
		<input type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
