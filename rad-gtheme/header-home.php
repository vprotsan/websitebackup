<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- hidden while trying three.js-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?> id="marketing">
		<header>
	      <nav class="navbar navbar-fixed-top">
	        <div class="container-fluid top-menu">
	          <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="/">
	               <img class="img-responsive" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/logo-rad.png" alt="Rad logo">
	            </a>
	          </div>
	          <div id="navbar" role="navigation" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
	            
	            <ul class="nav navbar-nav center-block text-uppercase">
	              
	               <li><a href="<?php if(is_page_template('pages/legal.php')){   	
	               						echo get_home_url() . '/#features' ;
	               					  }else{ 
	               					  	echo '#features';
	               					  }
	               	 			?>">Features</a></li>
	               <li><a href="<?php if(is_page_template('pages/legal.php')){   	
	               						echo get_home_url() . '/#how-it-works' ;
	               					  }else{ 
	               					  	echo '#how-it-works';
	               					  }
	               	 			?>">How it works</a></li>
	               <li><a href="<?php if(is_page_template('pages/legal.php')){   	
	               						echo get_home_url() . '/#the-right-package' ;
	               					  }else{ 
	               					  	echo '#the-right-package';
	               					  }
	               	 			?>">Pricing</a></li>
	               <li><a href="<?php if(is_page_template('pages/legal.php')){   	
	               						echo get_home_url() . '/#testimonials' ;
	               					  }else{ 
	               					  	echo '#testimonials';
	               					  }
	               	 			?>">Testimonials</a></li>
	               <li><a href="<?php if(is_page_template('pages/legal.php')){   	
	               						echo get_home_url() . '/#our-mission' ;
	               					  }else{ 
	               					  	echo '#our-mission';
	               					  }
	               	 			?>">About us</a></li>
	               <li><a class="btn btn-lg login navbar-btn" href="<?php the_field('login_page', 'option') ?>">Log in</a></li>
	               <li><a class="lightbox btn btn-lg signup navbar-btn" href="#sign-popup">Sign up</a></li>
	            </ul>

	          </div><!--/.nav-collapse -->
	        </div><!--/.container-fluid -->
	      </nav>
	    </header>

	