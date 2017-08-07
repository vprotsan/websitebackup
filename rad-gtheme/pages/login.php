<?php
/*
Template Name: Login
*/

if(is_user_logged_in()){
    wp_safe_redirect(get_field('redirect_after_login', 'option'));
    die();
}

get_header(); ?>

<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo TEMPLATE_DIRECTORY_URI ?>/images/logo-registration.png" alt="RAD"></a></div>
<div class="create-block registration-block">
    <h1>Welcome back!</h1>
    <p>SIGN IN</p>

    <?php if(isset($_GET['fail'])): ?>
        <p class="error"><b>Login errors were found.</b></p>
    <?php endif; ?>

    <form class="woocomerce-form woocommerce-form-login login form" method="post">

        <?php do_action( 'woocommerce_login_form_start' ); ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <input placeholder="Email" required="required" type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
        </p>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <input placeholder="Password" required="required" class="form-control woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
        </p>

        <?php do_action( 'woocommerce_login_form' ); ?>

        <p class="form-row">
            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline check-remember">
                <input class="woocommerce-form__input woocommerce-form__input-checkbox hidden-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                <span class="fake-checkbox"></span>
                <?php _e( 'Remember me', 'woocommerce' ); ?>
            </label>
        </p>

        <p><input type="submit" class="woocommerce-Button button btn" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" /></p>

        <?php do_action( 'woocommerce_login_form_end' ); ?>

    </form>

    <span class="text">Don't have an account? <a href="#sign-popup" class="lightbox">Sign up</a></span>
    <span class="text">Forget your password? <a href="<?php the_field('lost_password', 'option'); ?>">Retrieve it</a></span>

</div>

<?php get_footer(); ?>
