<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package alexandria
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="google-site-verification" content="XeBD1Uzi6Zb0pBKyW50kk5GFrHfmJNtr_3-qgJVJZW0" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<![endif]-->
<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-23034710-7', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?> onload="handleEverything()">
<div id="wrapper-one">
<div id="wrapper-two">
<div id="wrapper-three">
<div id="page" class="hfeed site">
	<?php do_action( 'alexandria_before' ); ?>
    <div class="header-social">

       <div class="responsive-container">


       </div>

    </div>

	<header id="masthead" class="site-header" role="banner">


        <?php if( !of_get_option('logo_layout_style') || of_get_option('logo_layout_style') == 'sbys' ) : ?>

        	<div class="site-header-half-width-logo">
                <div class="site-branding">



                	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="https://training.fibaro.com.au/wp-content/uploads/2018/09/FIBARO_HOME_INTELLIGENCE_black.png" /></a>

<!--
                    <?php if( of_get_option('logo_image') ) : ?>
                    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo of_get_option('logo_image'); ?>" /></a>
                    <?php else : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    <?php endif; ?>
-->
                </div>
            </div>
              <div class="site-header-half-width-nav">
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'alexandria' ); ?>"><?php _e( 'Skip to content', 'alexandria' ); ?></a></div>

                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'main-nav', 'fallback_cb' => 'alexandria_backupmenu'  ) ); ?>

                </nav><!-- #site-navigation -->

		<?php

		/* Widget Transposh z flagami*/

		echo do_shortcode( '[tp widget="flags/tpw_flags.php"]' );

		if( current_user_can( 'manage_options' )){
			if(function_exists("transposh_widget")) { transposh_widget(array(), array('widget_file' =>'default2/tpw_default.php')); };
		}
		else {
			if(transposh_get_current_language()==get_user_meta(get_current_user_id( ), 'lang_rights', true))
			{
				if(function_exists("transposh_widget")) { transposh_widget(array(), array('widget_file' =>'default2/tpw_default.php')); };
			};
		}; ?>


            </div>

        <?php else : ?>

            <div class="site-branding">

            	<?php if( of_get_option('logo_image') ) : ?>
                	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo of_get_option('logo_image'); ?>" /></a>
                <?php else : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                <?php endif; ?>

            </div>



            <nav id="site-navigation" class="main-navigation nav-border-top" role="navigation">
                    <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'alexandria' ); ?>"><?php _e( 'Skip to content', 'alexandria' ); ?></a></div>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'main-nav', 'fallback_cb' => 'alexandria_backupmenu'  ) ); ?>
            </nav><!-- #site-navigation -->


        <?php endif; ?>

    	</div><!-- #Responsive-Container -->

	</header><!-- #masthead -->


    <div id="feature" class="site-slider">

    	<div class="responsive-container">

        	<div class="site-slider-slider-one">

          	<div class="site-slider-slider-one-image">
    					<img class="" src="https://training.fibaro.com.au/wp-content/themes/Fibaro_Training/images/fetimg.png">
            </div><!-- .site-slider-slider-one-image -->

						<div class="thrv_wrapper thrv_text_element" data-css="tve-u-1660e2f3396">
            	<h1 class="site-slider-slider-one-text-heading">
                <p data-css="tve-u-1660e293c6c" style="text-align: center;">
                  <?php
                    if ( is_front_page() ) {
                    	echo 'Welcome to the A/NZ<br>
                      <strong>FIBARO </strong>
                      <span data-css="tve-u-1660e2ed8d2" style="color: rgb(28, 126, 199);">Knowledge Platform</span><br>
                      for authorised resellers';
                    }else{
                      echo the_title();
                    }
                  ?>
                </p>
              </h1>
            </div>

        </div>
        <!-- .site-slider-slider-one -->

    	</div><!-- #Responsive-Container -->

    </div>





	<div id="main" class="site-main">

    	<div class="responsive-container">

    		<div class="content-container">