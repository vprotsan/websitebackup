<?php
/*
Template Name: Lost Pass
*/
get_header(); ?>

<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo TEMPLATE_DIRECTORY_URI ?>/images/logo-registration.png" alt="RAD"></a></div>
<div class="create-block registration-block">
    <h1>Lost your password?</h1>
    <p>Please enter your email address. You will receive a link to create a new password via email.</p>

    <?php if(isset($_GET['reset-link-sent'])): ?>
        <p class="error"><b>Email was sent.</b></p>
    <?php else: ?>
        <form method="post" class="woocommerce-ResetPassword lost_reset_password form">

        	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
        		<input required="required" placeholder="Email" class="woocommerce-Input woocommerce-Input--text input-text form-control" type="email" name="user_login" id="user_login" />
        	</p>

        	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

        	<p class="woocommerce-form-row form-row">
        		<input type="hidden" name="wc_reset_password" value="true" />
        		<input type="submit" class="woocommerce-Button button btn" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>" />
        	</p>

        	<?php wp_nonce_field( 'lost_password' ); ?>

        </form>
    <?php endif; ?>

    <span class="text">Don't have an account? <a href="#sign-popup" class="lightbox">Sign up</a></span>
    <span class="text">Already have an account? <a href="<?php the_field('login_page', 'option') ?>">Log in</a></span>

</div>

<?php get_footer(); ?>
