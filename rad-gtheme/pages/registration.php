<?php
/*
Template Name: Registration
*/
get_header(); ?>

<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo TEMPLATE_DIRECTORY_URI ?>/images/logo-registration.png" alt="RAD"></a></div>
<div class="create-block registration-block">

<?php if(is_user_logged_in()): ?>
    <?php if(!isset($_GET['step'])): ?>

		<h1>Thank you!</h1>
		<p>Please complete your account below to get started:</p>
		<form action="" method="post" class="form">
			<p><input name="fname" required="required" placeholder="First Name" onfocus="this.placeholder=''" onblur="this.placeholder = 'First Name'" type="text" class="form-control"></p>
            <p><input name="lname" required="required" placeholder="Last Name" onfocus="this.placeholder=''" onblur="this.placeholder = 'Last Name'" type="text" class="form-control"></p>
			<p><input name="pass" required="required" placeholder="Choose Password" onfocus="this.placeholder=''" onblur="this.placeholder = 'Choose Password'" type="password" class="form-control"></p>
			<p><input name="rad_signup_2" value="Continue" type="submit" class="btn"></p>
			<?php wp_nonce_field( 'rad_reg_2', 'rad_reg_field_2' ); ?>
		</form>

    <?php elseif(isset($_GET['step']) and $_GET['step'] == 2): ?>

        <h1>Let us understand you better.</h1>
        <p>Provide a few details so we can better serve you.</p>
        <form action="" method="post" class="form">
            <div class="dropdown">
                <p><input name="industry" required="required" placeholder="Industry / Use (check all that apply)" onfocus="this.placeholder=''" onblur="this.placeholder = 'Industry / Use (check all that apply)'" type="text" class="form-control" readonly></p>
                <div class="check-list">
                    <span class="title">CHECK ALL THAT APPLY</span>
                    <?php
                        $industry = explode("\n", get_field('industry', 'option'));
                        if($industry):
                            ?><ul><?php
                            foreach($industry as $item):
                                ?>
                                <li>
                                    <label>
                                        <input type="checkbox" class="hidden-checkbox">
                                        <span class="fake-checkbox"></span>
                                        <span class="fake-label"><?php echo $item; ?></span>
                                    </label>
                                </li>
                                <?php
                            endforeach;
                            ?></ul><?php
                        endif;
                    ?>
                </div>
            </div>
            <div class="dropdown">
                <p><input name="platforms" required="required" placeholder="Platforms (check all that apply)" onfocus="this.placeholder=''" onblur="this.placeholder = 'Platforms (check all that apply)'" type="text" class="form-control" readonly></p>
                <div class="check-list">
                    <span class="title">CHECK ALL THAT APPLY</span>
                    <?php
                        $platforms = explode("\n", get_field('platforms', 'option'));
                        if($platforms):
                            ?><ul><?php
                            foreach($platforms as $item):
                                ?>
                                <li>
                                    <label>
                                        <input type="checkbox" class="hidden-checkbox">
                                        <span class="fake-checkbox"></span>
                                        <span class="fake-label"><?php echo $item; ?></span>
                                    </label>
                                </li>
                                <?php
                            endforeach;
                            ?></ul><?php
                        endif;
                    ?>
                </div>
            </div>
            <div class="dropdown">
                <p><input name="environment" required="required" placeholder="Computing Environment (check all that apply)" onfocus="this.placeholder=''" onblur="this.placeholder = 'Computing Environment (check all that apply)'" type="text" class="form-control" readonly></p>
                <div class="check-list">
                    <span class="title">CHECK ALL THAT APPLY</span>
                    <?php
                        $environment = explode("\n", get_field('environment', 'option'));
                        if($environment):
                            ?><ul><?php
                            foreach($environment as $item):
                                ?>
                                <li>
                                    <label>
                                        <input type="checkbox" class="hidden-checkbox">
                                        <span class="fake-checkbox"></span>
                                        <span class="fake-label"><?php echo $item; ?></span>
                                    </label>
                                </li>
                                <?php
                            endforeach;
                            ?></ul><?php
                        endif;
                    ?>
                </div>
            </div>
            <div class="dropdown">
                <p><input name="affiliation" required="required" placeholder="Affiliation (check all that apply)" onfocus="this.placeholder=''" onblur="this.placeholder = 'Affiliation (check all that apply)'" type="text" class="form-control" readonly></p>
                <div class="check-list">
                    <span class="title">CHECK ALL THAT APPLY</span>
                    <?php
                        $affiliation = explode("\n", get_field('affiliation', 'option'));
                        if($affiliation):
                            ?><ul><?php
                            foreach($affiliation as $item):
                                ?>
                                <li>
                                    <label>
                                        <input type="checkbox" class="hidden-checkbox">
                                        <span class="fake-checkbox"></span>
                                        <span class="fake-label"><?php echo $item; ?></span>
                                    </label>
                                </li>
                                <?php
                            endforeach;
                            ?></ul><?php
                        endif;
                    ?>
                </div>
            </div>
            <p><input name="organization" placeholder="Name of Organization / Team" onfocus="this.placeholder=''" onblur="this.placeholder = 'Name of Organization / Team'" type="text" class="form-control team"></p>
            <p><input name="rad_signup_3" value="Done!" type="submit" class="btn"></p>
            <?php wp_nonce_field( 'rad_reg_3', 'rad_reg_field_3' ); ?>
        </form>

    <?php endif; ?>
<?php endif; ?>

</div>

<?php get_footer(); ?>
