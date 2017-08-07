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


  <?php wp_footer(); ?>
</body>
</html>

