<?php
 

// custom_background
//add_custom_background();

//enable post thumbnails
add_theme_support('post-thumbnails');

// Register our sidebars and widgetized areas
function dgamoni_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Timer text', 'twentyeleven' ),
		'id' => 'timer_text',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}

add_action( 'widgets_init', 'dgamoni_widgets_init' );



function dgamoni_widgets_init2() {
	register_sidebar( array(
		'name' => __( 'Footer info', 'twentyeleven' ),
		'id' => 'footer_inf',
		'before_widget' => '<span class="prompt">',
		'after_widget' => '</span>',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'dgamoni_widgets_init2' );

function dgamoni_widgets_init3() {
	register_sidebar( array(
		'name' => __( 'Footer tel', 'twentyeleven' ),
		'id' => 'footer_tel',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}

add_action( 'widgets_init', 'dgamoni_widgets_init3' );

function dgamoni_widgets_init4() {
	register_sidebar( array(
		'name' => __( 'Left Menu (auto child header_menu)', 'twentyeleven' ),
		'id' => 'sidebar-left',
		'before_widget' => '<aside id="%1$s" class="swidget %2$s">',
		'after_widget' => "</aside><div class='clearfix'></div>",
		'before_title' => '<span class="social_title">',
		'after_title' => '</span>',
	) );
}

add_action( 'widgets_init', 'dgamoni_widgets_init4' );

function dgamoni_widgets_init5() {
	register_sidebar( array(
		'name' => __( 'Btn konsult (only podbor-personala)', 'twentyeleven' ),
		'id' => 'konsult',
		'before_widget' => '<div id="konsult"><div id="konsult_wrap">',
		'after_widget' => "</div></div>",
		'before_title' => '<span class="social_title">',
		'after_title' => '</span>',
	) );
}

add_action( 'widgets_init', 'dgamoni_widgets_init5' );

function dgamoni_widgets_init6() {
	register_sidebar( array(
		'name' => __( 'Btn Send resume (only soiskatelyam)', 'twentyeleven' ),
		'id' => 'resume',
		'before_widget' => '<div id="resume"><div id="resume_wrap">',
		'after_widget' => "</div></div>",
		'before_title' => '',
		'after_title' => '',
	) );
}

add_action( 'widgets_init', 'dgamoni_widgets_init6' );

function dgamoni_widgets_init7() {
	register_sidebar( array(
		'name' => __( '3nd level menu-> soiskatelyam', 'twentyeleven' ),
		'id' => 'soisk_menu_3_level',
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => '',
	) );
}

add_action( 'widgets_init', 'dgamoni_widgets_init7' );

function dgamoni_widgets_init8() {
	register_sidebar( array(
		'name' => __( '3nd level menu-> podbor-personala', 'twentyeleven' ),
		'id' => 'rabota_menu_3_level',
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => '',
	) );
}

add_action( 'widgets_init', 'dgamoni_widgets_init8' );

function dgamoni_widgets_init9() {
	register_sidebar( array(
		'name' => __( '3nd level menu-> about', 'twentyeleven' ),
		'id' => 'company_menu_3_level',
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => '',
	) );
}

add_action( 'widgets_init', 'dgamoni_widgets_init9' );
// end register widget



// Menu wp3
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
	'primary' => __( 'Top Navigation Menu' ),
	//'bottom' => __( 'Bottom Navigation Menu - one level' ),
	));
	add_theme_support( 'menus' ); // new nav menus for wp 3.0
}


// end  Menu



// set time picker for advance custom field plugin
if(function_exists("register_field")) {
  register_field('acf_time_picker', dirname(__FILE__) . '\library\main.php');
}

// add options page to admin menu
if(function_exists("register_options_page"))
{
    register_options_page('Run Crossword');
	register_options_page('User Statistic');
	register_options_page('Report');
	register_options_page('Help');
}

//  reffer user hook
