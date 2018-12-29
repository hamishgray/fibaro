<?php
/**
 * alexandria functions and definitions
 *
 * @package alexandria
 */
 
/* 
 * Loads the Options Panel
 */
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
require_once dirname( __FILE__ ) . '/admin/options-framework.php';

if ( ! function_exists( 'alexandria_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function alexandria_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 900; /* pixels */
	}
	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on alexandria, use a find and replace
	 * to change 'alexandria' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'alexandria', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'alexandriathumb', 450, 300, true );
  	add_image_size( 'alexandriasingle', 1200, 500, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'alexandria' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	 
	  if ( of_get_option('skin_style') && of_get_option('skin_style') !== 'child' ) {
		$custombgargsskin = of_get_option('skin_style');
	  }else {
		$custombgargsskin = 'alexandria';
	  }
	  
	  if ( get_stylesheet_directory() == get_template_directory() ) {
		  $custombgargs = array(
			'default-color' => 'ebeef1',
			'default-image' => get_template_directory_uri() . '/skins/images/'.$custombgargsskin.'/page_bg.png',
			);
			
	  }else {
		  $custombgargs = array(
			'default-image' => get_stylesheet_directory_uri() . '/images/page_bg.png',
			);	  
	  }
	  add_theme_support( 'custom-background', $custombgargs );	 
	  add_editor_style();
}
endif; // alexandria_setup
add_action( 'after_setup_theme', 'alexandria_setup' );

if ( ! function_exists( 'alexandria_widgets_init' ) ) :
/**
 * Register widgetized area and update sidebar with default widgets
 */
function alexandria_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'alexandria' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Left Sidebar', 'alexandria' ),
		'id'            => 'footer-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	if( !of_get_option('footer_layout') || of_get_option('footer_layout') == 'one' ) {
	register_sidebar( array(
		'name'          => __( 'Footer Center Sidebar', 'alexandria' ),
		'id'            => 'footer-center',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	}
	register_sidebar( array(
		'name'          => __( 'Footer Right Sidebar', 'alexandria' ),
		'id'            => 'footer-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );		
}
endif; // alexandria_widgets_init
add_action( 'widgets_init', 'alexandria_widgets_init' );

if ( ! function_exists( 'alexandria_scripts' ) ) :
/**
 * Enqueue scripts and styles
 */
function alexandria_scripts() {
	
	if ( get_stylesheet_directory() != get_template_directory() ) {
		wp_enqueue_style( 'alexandria-parent-style', get_template_directory_uri().'/style.css' );
	}
	
	wp_enqueue_style( 'alexandria-style', get_stylesheet_uri() );	
	
	if( of_get_option('skin_style') == 'radi' ) {
		wp_enqueue_style( 'alexandria-radi-style', get_template_directory_uri().'/skins/radi.css' );
	}
	
	if( of_get_option('skin_style') == 'green' ) {
		wp_enqueue_style( 'alexandria-green-style', get_template_directory_uri().'/skins/green.css' );
	}	
	
	if( of_get_option('skin_style') == 'purple' ) {
		wp_enqueue_style( 'alexandria-purple-style', get_template_directory_uri().'/skins/purple.css' );
	}
	
	if( of_get_option('skin_style') == 'brown' ) {
		wp_enqueue_style( 'alexandria-brown-style', get_template_directory_uri().'/skins/brown.css' );
	}
	
	if( of_get_option('skin_style') == 'orange' ) {
		wp_enqueue_style( 'alexandria-brown-style', get_template_directory_uri().'/skins/orange.css' );
	}
	
	if( of_get_option('skin_style') == 'yellow' ) {
		wp_enqueue_style( 'alexandria-yellow-style', get_template_directory_uri().'/skins/yellow.css' );
	}	
	
	if( of_get_option('skin_style') == 'aqua' ) {
		wp_enqueue_style( 'alexandria-aqua-style', get_template_directory_uri().'/skins/aqua.css' );
	}	
	
	if( of_get_option('skin_style') == 'grunge' ) {
		wp_enqueue_style( 'alexandria-maroon-style', get_template_directory_uri().'/skins/grunge.css' );
	}				

	if( of_get_option('skin_style') == 'pink' ) {
		wp_enqueue_style( 'alexandria-pink-style', get_template_directory_uri().'/skins/pink.css' );
	}
	
	if( of_get_option('skin_style') == 'ggrun' ) {
		wp_enqueue_style( 'alexandria-ggrun-style', get_template_directory_uri().'/skins/ggrun.css' );
	}
	
	if( of_get_option('skin_style') == 'oran' ) {
		wp_enqueue_style( 'alexandria-oran-style', get_template_directory_uri().'/skins/oran.css' );
	}
	
	if( of_get_option('skin_style') == 'ggren' ) {
		wp_enqueue_style( 'alexandria-oran-style', get_template_directory_uri().'/skins/ggren.css' );
	}
	
	if( of_get_option('skin_style') == 'margo' ) {
		wp_enqueue_style( 'alexandria-oran-style', get_template_directory_uri().'/skins/margo.css' );
	}
	
	if( of_get_option('skin_style') == 'marbo' ) {
		wp_enqueue_style( 'alexandria-marbo-style', get_template_directory_uri().'/skins/marbo.css' );
	}	
	
	if( of_get_option('skin_style') == 'ggrey' ) {
		wp_enqueue_style( 'alexandria-ggrey-style', get_template_directory_uri().'/skins/ggrey.css' );
	}	
	
	if( of_get_option('skin_style') == 'grebr' ) {
		wp_enqueue_style( 'alexandria-ggrey-style', get_template_directory_uri().'/skins/grebr.css' );
	}
	
	if( of_get_option('skin_style') == 'brne' ) {
		wp_enqueue_style( 'alexandria-brne-style', get_template_directory_uri().'/skins/brne.css' );
	}
	
	if( of_get_option('skin_style') == 'alge' ) {
		wp_enqueue_style( 'alexandria-alge-style', get_template_directory_uri().'/skins/alge.css' );
	}
	
	global $wp_styles;
	$wp_styles->add('alexandria_ie9', get_template_directory_uri().'/fixed.css');
	$wp_styles->add_data('alexandria_ie9', 'conditional', 'lt IE 9');
	$wp_styles->add('alexandria_ie8', get_template_directory_uri().'/ie.css');
	$wp_styles->add_data('alexandria_ie8', 'conditional', 'lt IE 8');	
	$wp_styles->enqueue(array('alexandria_ie9', 'alexandria_ie8'));			
		
	wp_enqueue_script( 'alexandria-tinynav', get_template_directory_uri() . '/js/tinynav.min.js', array('jquery'), false, false );
	
	wp_enqueue_script( 'alexandria-general', get_template_directory_uri() . '/js/general.js', array(), false, true );

	wp_enqueue_script( 'alexandria-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'alexandria-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
endif; // alexandria_scripts
add_action( 'wp_enqueue_scripts', 'alexandria_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

if ( ! function_exists( 'alexandria_backupmenu' ) ) :
/**
 * Backup menu incase menu isn't set.
 */
function alexandria_backupmenu() {
	 	if ( current_user_can('edit_theme_options') ) {
				echo '<ul id="main-nav" class="menu">
							<li class="menu-item current-menu-item current_page_item menu-item-home">
								<a href="'.get_admin_url().'nav-menus.php">'.__("Select a Menu to appear here in Dashboard->Appearance->Menus ", "alexandria").'</a>
							</li>
		
						</ul>	';
		} else {
				echo '<ul id="main-nav" class="menu">
							<li class="menu-item current-menu-item current_page_item menu-item-home">
								<a href="'.esc_url( get_home_url() ).'">'.__("Home", "alexandria").'</a>
							</li>
		
						</ul>	';			
		}
}
endif; // alexandria_backupmenu

function my_loginlogo() {
  echo '<style type="text/css">
    h1 a {
      background-image: url(' . get_template_directory_uri() . '/images/FIBARO_small.png) !important;
    }
  </style>';
}
add_action('login_head', 'my_loginlogo');

/*Pole nadawania przez admina uprawnien do tlumaczenia*/
add_action( 'edit_user_profile', 'translation_rights' );
function translation_rights( $user ) { ?>
<h3>Translation rights</h3>
<select id="lang_rights" name="lang_rights" >
	<option value="00" <?php selected( '00', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>Brak</option>
	<option value="us" <?php selected( 'us', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>English_US</option>
	<option value="pl" <?php selected( 'pl', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>Polski </option>
	<option value="de" <?php selected( 'de', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>Niemiecki </option>
	<option value="fr" <?php selected( 'fr', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>Francuski</option>
	<option value="el" <?php selected( 'el', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>Grecki</option>
	<option value="es" <?php selected( 'es', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>Hiszpański</option>
	<option value="nl" <?php selected( 'nl', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>Holenderski</option>
	<option value="tr" <?php selected( 'tr', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>Turecki</option>
	<option value="pt" <?php selected( 'pt', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>Portugalski</option>
	<option value="sv" <?php selected( 'sv', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>Szwedzki</option>
	<option value="et" <?php selected( 'et', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>Estoński</option>
	<option value="it" <?php selected( 'it', get_the_author_meta( 'lang_rights', $user->ID ) ); ?>>Włoski</option>
</select>
<?php }

add_action( 'edit_user_profile_update', 'update_translation_rights' );

function update_translation_rights( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_usermeta( $user_id, 'lang_rights', $_POST['lang_rights'] );
}

/*Ukrycie pol akceptacji regulaminow dla zwykłych uzytkownikow*/
add_action( 'show_user_profile', 'hide_fields' );

function hide_fields( $user_id ) {

	if ( current_user_can( 'edit_user', $user_id ) )
		return false;

echo "\n"
 . '<script type="text/javascript">jQuery(document).ready(function($) { 

$(\'table.form-table:eq(4) tr:eq(7)\').hide();
$(\'table.form-table:eq(4) tr:eq(8)\').hide();
$(\'form#your-profile\').show(); }); </script>' . "\n"; }

/*Dodanie pola czasu ostatniego logowania*/


function get_last_login($user_login, $user) {
update_usermeta( $user->ID, 'last_login', current_time('mysql', 1) );
}
add_action('wp_login', 'get_last_login', 10, 2);


add_action( 'edit_user_profile', 'show_last_login' );
function show_last_login($user) {
   $last_login = get_user_meta($user->ID, 'last_login', true);
 
   $date_format = get_option('date_format') . ' ' . get_option('time_format');
 
   $the_last_login = mysql2date($date_format, $last_login, false);
?>
<h3>Last login</h3>
<?php
echo "$the_last_login GMT";
}
add_action( 'edit_user_profile', 'show_last_login' );


/*Dodadanie metadanej rangi uzytkownika*/
add_action( 'edit_user_profile', 'user_grades' );
function user_grades( $user ) { ?>
<h3>User Grade</h3>
<select id="user_grade" name="user_grade" >
	<option value="none" <?php selected( 'none', get_the_author_meta( 'user_grade', $user->ID ) ); ?>>None</option>
	<option value="bronze" <?php selected( 'bronze', get_the_author_meta( 'user_grade', $user->ID ) ); ?>>Bronze </option>
	<option value="silver" <?php selected( 'silver', get_the_author_meta( 'user_grade', $user->ID ) ); ?>>Silver </option>
	<option value="gold" <?php selected( 'gold', get_the_author_meta( 'user_grade', $user->ID ) ); ?>>Gold</option>
	<option value="platinum" <?php selected( 'platinum', get_the_author_meta( 'user_grade', $user->ID ) ); ?>>Platinum</option>
</select>
<?php }

add_action( 'edit_user_profile_update', 'update_user_grades' );

function update_user_grades( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_usermeta( $user_id, 'user_grade', $_POST['user_grade'] );
}
function ava_fb_px_conversion(){
    if ( is_page('szkolenia-instalatorzy')) {
	?>
	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '123380761680038');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=123380761680038&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
	<?php
    }
}
add_action('wp_head', 'ava_fb_px_conversion');