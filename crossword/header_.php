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



<!--<script src="<?php echo get_template_directory_uri(); ?>/js/.js"></script>-->
<script src="<?php echo get_template_directory_uri(); ?>/js/myjquery.js"></script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>-->
   


</head>

<body <?php body_class(); ?>>
<div id="page">
	<header>
    
		<!-- logo--------------->
    	<div id="logo">
    	<a href="/"><img src="<?php bloginfo('template_url'); ?>/img/logo_sinevo.png" alt="Борьба Умов"></a>
        </div>
        <!-- end logo----------->
        
        <div id="zero">
        
        <?php // get rating from mysql
		//$user_id_sinevo = get_current_user_id();
 		//$key = 'custom_field_7';
  		//$single = true;
  		//$user_rating = get_user_meta( $user_id_sinevo, $key, $single ); 
		
  		//echo '<p>The '. $key . ' value for user id ' . $user_id_sinevo . ' is: ' . $user_rating . '</p>'; 
		?> 
        
        <?php
		   global $wpdb;
            
            $key = 'custom_field_7';
        
            $user_id_sinevo = get_current_user_id();
            $user_info = get_userdata($user_id_sinevo);

            echo 'Username: ' . $user_info->user_login . '<br>';
            echo 'User ID: ' . $user_info->ID . '<br>';
            
            $table = $wpdb->prefix."affp_referrals";

            //update_user_meta($user_id_sinevo, 'cross', 50);
            echo 'cross= '. $user_info->cross. '<br>';
// ref_1 ----------------------------
            $ref_count = $wpdb->get_var("SELECT COUNT(*) FROM $table WHERE affp_referral = '$user_info->user_login'");
            if($ref_count){ 
                echo 'Ref_1: ' .$ref_count. '<br>';
                 $ref_rating = $ref_count*5;

                $result = $wpdb->get_results("SELECT * FROM  $table WHERE affp_referral = '$user_info->user_login'");
                echo 'у пользователя '. $user_info->user_login. '<br>';
                $i=0; $cross_r1_all=0; $cross_r2_all=0; $cross_r3_all=0;
                    foreach($result as $ref_1)
                    {
                    $user_info_ref = get_userdata($ref_1->affp_id ); 
                    echo $user_info_ref->user_login . ' -->' . $ref_1->affp_id . '<br>';
    // cross_1 ---- 

                    if( isset ($user_info_ref->cross)) { 
                                            
                                            $cross_r1 = $user_info_ref->cross /2;
                                            
                                            $i++;
                                             update_user_meta($user_id_sinevo, 'cross_r1_'.$i , $cross_r1);
                                             $cross_r1_all=get_user_meta($user_id_sinevo, cross_r1_.$i, true )+$cross_r1_all;
                                             //echo 'all= '.$cross_r1_all. '<br>';
           
                                            } 
                                            //echo 'rating_ref_1_all= '.$cross_r1_all. '<br>';
    // cross_1 ----


// ref_1 ----------------------------
// ref_2 ----------------------------
                    $result_2 = $wpdb->get_results("SELECT * FROM  $table WHERE affp_referral = '$user_info_ref->user_login'");
                    $ii=0; 
                         foreach($result_2 as $ref_2)
                        {
                        $user_info_ref_2 = get_userdata($ref_2->affp_id ); 
                        echo 'ref_2= '. $user_info_ref_2->user_login . ' -->' . $ref_2->affp_id . '<br>';

    // cross_2 ---- 

                    if( isset ($user_info_ref_2->cross)) { 
                                            
                                            $cross_r2 = $user_info_ref_2->cross ;

                                            if ($cross_r2==50 ) {$cross_r2=15;} elseif ($cross_r2==100 )
                                            {$cross_r2=30;} elseif ($cross_r2==150 ) {$cross_r2=45;}

                                            $ii++;
                                             update_user_meta($user_id_sinevo, 'cross_r2_'.$ii , $cross_r2);
                                             $cross_r2_all=get_user_meta($user_id_sinevo, cross_r2_.$ii, true )+$cross_r2_all;
                                             //echo 'all= '.$cross_r1_all. '<br>';
           
                                            } 
                                            //echo 'rating_ref_1_all= '.$cross_r1_all. '<br>';
                                            //echo 'rating_ref_2_all= '.$cross_r2_all. '<br>';
    // cross_2 ----
 // ref_2 ----------------------------
 // ref_3 ----------------------------  
                        $result_3 = $wpdb->get_results("SELECT * FROM  $table WHERE affp_referral = '$user_info_ref_2->user_login'");
                        $iii=0; 
                            foreach($result_3 as $ref_3)
                            {
                            $user_info_ref_3 = get_userdata($ref_3->affp_id ); 
                            echo 'ref_3= '. $user_info_ref_3->user_login . ' -->' . $ref_3->affp_id . '<br>';

    // cross_3 ---- 

                                            if( isset ($user_info_ref_3->cross)) { 
                                            
                                            $cross_r3 = $user_info_ref_3->cross /10;

                                            

                                            $iii++;
                                             update_user_meta($user_id_sinevo, 'cross_r3_'.$iii , $cross_r3);
                                             $cross_r3_all=get_user_meta($user_id_sinevo, cross_r3_.$iii, true )+$cross_r3_all;
                                             //echo 'all= '.$cross_r1_all. '<br>';
           
                                            } 
                                            //echo 'rating_ref_1_all= '.$cross_r1_all. '<br>';
                                            //echo 'rating_ref_2_all= '.$cross_r2_all. '<br>';
    // cross_3 ----


                            }

                         }



                    }

            

                

            }else{ 
                 echo 'Reff count: --- <br>';
                 }

            echo 'rating_ref_1_all= '.$cross_r1_all. '<br>';
            echo 'rating_ref_2_all= '.$cross_r2_all. '<br>';
            echo 'rating_ref_3_all= '.$cross_r3_all. '<br>';

            $user_rating = get_user_meta( $user_id_sinevo, $key, true ); 
            echo 'reg_rating: ' . $user_rating. '<br>'; 
            //$all_rating = $user_rating+$ref_rating;

            $word=0;
            $minus=0;

            $all_rating = $user_rating + $ref_rating + $cross_r1_all + $cross_r2_all + $cross_r3_all + $word - $minus;
            update_user_meta($user_id_sinevo, 'all_rating', $all_rating);
            echo 'всего  балов: ' . $all_rating. '<br>'; 

            



            


// апдейт user meta

//$website = 'http://wordpress.org';
//update_user_meta($user_id_sinevo, 'ref', $website);

// добавление нового поля в user meta
//add_user_meta( $user_id_sinevo, 'ref_2', $user_info_ref->user_login);


		?>
        
        
        
        </div>
        
        <!-- timer widget ------>
        <div id="timer">
        
        	<div id="timer_data">
            
            <p class="prompt">до завершения задания № <?php echo get_field( 'crossword' , 'option' ); ?></p>
            
            <?php // убираем пробелы из таймера
			 $str = get_field( 'timer' , 'option' );$n_str = str_replace(" ","",$str);
			 ?>
             <!-- запускаем таймер ------> 
        	<p><?php echo do_shortcode('[countdown date='.$n_str.' offset=2][dhmtimer][after]конкурс закончен[/countdown]'); ?></p>
            
            </div>
            
            <div id="timer_text">
        	 <?php if ( ! dynamic_sidebar( 'timer_text' ) ) : ?>
			 <?php endif; // end  widget area ?>
        	</div>
        
        </div>
        <!-- end timer widget -->
        
        <!-- user widget ------>    
        <div id="user">
        
        	<div id="user_reg">
        	 <?php echo do_shortcode('[wppb-login]'); ?>
        	</div>
            
        	<?php if ( is_user_logged_in() ) : // Already logged in ?>
            
            <div id="user_reff">
            	
                <div id="button_reff">
            	<a href="#">Пригласить коллегу</a>
                </div> 
                <p class="prompt">+10 баллов пригласившему</p>
                <p class="prompt">+5 баллов приглашённому</p>
        	 
        	</div>
            
            <?php else : // Not logged in ?>
            
            <div id="user_reff">
            	
                <div id="button_reff">
            	<a href="<?php echo get_site_url(); ?>/registration">Регистрация</a>
                </div> 
                
        	 
        	</div>
            
            <?php endif; ?>
			 
            
        
        
        </div>
        <!-- end user widget ------>  

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