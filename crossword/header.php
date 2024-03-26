<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.qtip.css" />
<!--<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/.css" />-->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lte IE 7]>
<style type="text/css">

</style>
<![endif]-->

<!--[if lte IE 8]>
<style type="text/css">
.field { padding-top: 5px;}
</style>
<![endif]-->

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>

<![endif]-->

<!--[if lte IE 9]>
<style type="text/css">
#user_reg input[type="submit"] {
  margin-left: 20px !important;
}
.prompt{ letter-spacing: 1px;}
.invit_left2 input { width: 190px;}
</style>
<![endif]-->


<!-- include jquery 1.6 for crossword script MyJ = jQuery 1.6 , standart  jQuery = jQuery 1.8 -->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script> 
<script type="text/javascript">
var MyJ = jQuery;
</script>
<!-- include jquery 1.6 for crossword script  -->

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	
	wp_enqueue_script('jquery');
	 
	wp_head();
?>

<!--<script type="text/javascript" src="https://getfirebug.com/firebug-lite.js"></script>-->



<!--<script src="<?php echo get_template_directory_uri(); ?>/js/myjquery.js"></script>-->

<!--<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.crossword.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.blockUI.js"></script>-->

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.qtip.js"></script>
 
<script src="<?php echo get_template_directory_uri(); ?>/js/new.js"></script> 
 


</head>

<body <?php body_class(); ?>>
<div id="page">
	<header>
    
		
    	<div id="logo">
    	<a href="/"><img src="<?php bloginfo('template_url'); ?>/img/logo_sinevo.png" alt="Игры Разума"></a>
        </div>
        
        
        <div id="zero">
        <?php //crossword_rating();
			 // echo '<pre>' . crossword_rating(). '</pre>';
			 // echo '<pre>' .my_action_callback(). '</pre>';
		 ?>
        </div>
        
        <!-- timer widget  -->
        <div id="timer">
        
        	<div id="timer_data">
            
            <p class="prompt">до завершения задания № <?php echo get_field( 'crossword' , 'option' ); ?></p>
            
            <?php // убираем пробелы из таймера
			 $str = get_field( 'timer' , 'option' );$n_str = str_replace(" ","",$str);
			 //echo $str;
			 ?>
             <!-- запускаем таймер  --> 
        	<p><?php echo do_shortcode('[countdown date='.$n_str.' offset=3][dhmtimer][after]конкурс закончен[/countdown]'); ?></p>
            
           
            
            </div>
            
            <div id="timer_text">
        	 <?php if ( ! dynamic_sidebar( 'timer_text' ) ) : ?>
			 <?php endif; // end  widget area ?>
        	</div>
        
        </div>
        <!-- end timer widget -->
        
        <!-- user widget    -->    
        <div id="user">
        
        	<div id="user_reg">
        	 <?php echo do_shortcode('[wppb-login]'); ?>
        	</div>
            
        	<?php if ( is_user_logged_in() ) : // Already logged in ?>
            
            
            
            <div class="user_reff_1">
            	
                <div id="button_reff">
                <?php echo do_shortcode('[formlightbox_call title="Пригласить коллегу" class="4"]Пригласить коллегу[/formlightbox_call]'); ?>
            	
                </div> 
                <!--<p class="prompt">+10 баллов пригласившему</p>-->
            	<p class="prompt invit">Получайте бонусы за каждого приглашенного</p>
        	 
        	</div>
            
            <?php else : // Not logged in ?>
            
            <!--disable crossword input   -->
            <script src="<?php echo get_template_directory_uri(); ?>/js/nondisable.js"></script>
            
            <div id="user_reff">
            	
                <div id="button_reff">
            	<a href="<?php echo get_site_url(); ?>/registration">Регистрация</a>
                </div> 
                
        	 
        	</div>
            
            <?php endif; ?>
			 
            
        
        
        </div>
        <!-- end user widget  -->  

		<div class="clearfix"></div>
        
		<nav>
			<!-- top menu -->
              <div id="myslidemenu" class="jqueryslidemenu">
              <?php if ( function_exists( 'wp_nav_menu' ) ) { // Added in 3.0 ?>
                 <?php wp_nav_menu( array(
                    'theme_location' => 'primary', 
                    'menu_id' => 'myslidemenu', 
                    'container' => '', 
                    'container_id' => '', 
                    'fallback_cb' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'depth' => '0',
                  )); ?>  
              <?php  } ?>
           
           	</div><!-- end top menu -->
  
		</nav><!-- end nav -->

		

	</header><!-- end header -->


	<div id="main">