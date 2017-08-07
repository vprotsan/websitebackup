<?php if( !is_page_template( 'pages/registration.php' ) and is_user_logged_in()): ?>

    <aside id="sidebar">
        <div class="logo">
            <a href="<?php echo home_url() ?>">
                <img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/rad-logo2x.png" alt="rad">
                <?php if(function_exists('wcs_user_has_subscription') and wcs_user_has_subscription( '', '', 'active' )): ?>
                    <span class="slogan">advanced</span>
                <?php else: ?>
                    <span class="slogan">free</span>
                <?php endif; ?>
            </a>
        </div>

        <?php
            if( has_nav_menu( 'dash' ) )
                wp_nav_menu( array(
                        'container'		 => false,
                        'theme_location' => 'dash',
                        'menu_class'     => 'nav',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'walker'         => new Dash_Walker_Nav_Menu
                    )
                );
        ?>

        <a href="#upgrade-popup" class="btn white lightbox">Upgrade</a>
    </aside>

<?php endif; ?>
