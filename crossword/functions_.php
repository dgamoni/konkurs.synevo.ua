<?php

//include(TEMPLATEPATH . '/script.php'); 



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
	//register_options_page('User Statistic');
	//register_options_page('Report');
	//register_options_page('Help');
}


//  функция для вычисления рефералов и подсчитывания рейтинга 
// ***********************************************************

function crossword_rating()
{
            global $wpdb;
			//global $all_rating;
            // custom_field_7 - рейтинг за регитсрацию
            $key = 'custom_field_7';
        	// текущий id пользователя
            $user_id_sinevo = get_current_user_id();
            // массив всех данных пользователя
            $user_info = get_userdata($user_id_sinevo);
            //таблица рефералов
            $table = $wpdb->prefix."affp_referrals";
            // балы за разгадывания контрольного слова
            //$word=0;
            // баллы потраченые на подсказки
            $minus=0;
			// вычисляем баллы за разгаданые кроссворды
            $cross_rating1 = $user_info->cross_1;
			$cross_rating2 = $user_info->cross_2; 
			$cross_rating3 = $user_info->cross_3; 
			$cross_rating = $cross_rating1 + $cross_rating2 + $cross_rating3;
			//сохраняем весь рейтинг за кроссворды в таблицу  cross
			update_user_meta($user_id_sinevo, 'cross', $cross_rating); 

            // эмултруем разгадывание кроссворда
            //update_user_meta($user_id_sinevo, 'cross', 50);
            
// ref_1 -- находим реферов первой линии ----------------------------------------------
            // считаем реферов
            $ref_count = $wpdb->get_var("SELECT COUNT(*) FROM $table WHERE affp_referral = '$user_info->user_login'");
            // если реферы есть 
            if($ref_count){ 
                //echo 'Ref_1: ' .$ref_count. '<br>';
                $result = $wpdb->get_results("SELECT * FROM  $table WHERE affp_referral = '$user_info->user_login'");
                
                $i=0;
                $cross_r1_all=0;
                $cross_r2_all=0;
                $cross_r3_all=0;

                    foreach($result as $ref_1)
                    {
                    $user_info_ref = get_userdata($ref_1->affp_id );
                    //список рефрево первой линии
                    //echo 'логин: '.$user_info_ref->user_login . ' --> id: ' . $ref_1->affp_id . '<br>';

//cross_1-- считаем балы кроссвордов реферов ---------------
                    if( isset ($user_info_ref->cross)) { 
                                            $cross_r1 = $user_info_ref->cross /2;
                                            $i++;
                                             update_user_meta($user_id_sinevo, 'cross_r1_'.$i , $cross_r1);
                                             $cross_r1_all=get_user_meta($user_id_sinevo, cross_r1_.$i, true )+$cross_r1_all;
                                            } 
// end cross_1 -------------------------------------------------

// end ref_1 --------------------------------------------------------------------------------

// ref_2 ----- внутри цикла ищем реферов второй линии для каждого рефера первой линии -------

                    $result_2 = $wpdb->get_results("SELECT * FROM  $table WHERE affp_referral = '$user_info_ref->user_login'");
                    $ii=0; 
                         foreach($result_2 as $ref_2)
                        {
                        $user_info_ref_2 = get_userdata($ref_2->affp_id );
                        //список рефрево второй линии 
                        //echo '_'.'ref_2 = логин:'. $user_info_ref_2->user_login . ' --> id:' . $ref_2->affp_id . '<br>';

// cross_2 ---- считаем балы кроссвордов реферов 2--------------

                    if( isset ($user_info_ref_2->cross)) { 
                                            $cross_r2 = $user_info_ref_2->cross ;
                                            if ($cross_r2==50 ) {$cross_r2=15;} elseif ($cross_r2==100 )
                                            {$cross_r2=30;} elseif ($cross_r2==150 ) {$cross_r2=45;}
                                            $ii++;
                                            update_user_meta($user_id_sinevo, 'cross_r2_'.$ii , $cross_r2);
                                            $cross_r2_all=get_user_meta($user_id_sinevo, cross_r2_.$ii, true )+$cross_r2_all;
                                            } 
 // end cross_2 ---- --------------------------------------------
 // end ref_2 ------------------------------------------------------------------------------

 // ref_3 -----внутри цикла ищем реферов третей линии для каждого рефера второй линии -------
                        $result_3 = $wpdb->get_results("SELECT * FROM  $table WHERE affp_referral = '$user_info_ref_2->user_login'");
                        $iii=0; 
                            foreach($result_3 as $ref_3)
                            {
                            $user_info_ref_3 = get_userdata($ref_3->affp_id );
                            //список рефрево третей линии  
                            //echo 'ref_3= логин: '. $user_info_ref_3->user_login . ' --> id:' . $ref_3->affp_id . '<br>';

// cross_3 ---- считаем балы кроссвордов реферов 3--------------

                                            if( isset ($user_info_ref_3->cross)) { 
                                                  $cross_r3 = $user_info_ref_3->cross /10;
                                            	  $iii++;
                                             		update_user_meta($user_id_sinevo, 'cross_r3_'.$iii , $cross_r3);
                                             		$cross_r3_all=get_user_meta($user_id_sinevo, cross_r3_.$iii, true )+$cross_r3_all;
                                              } 
                                            
// cross_3 ----------------------------------------------------
                            } // конец цикла для реферов 3
                         } // конец цикла для реферов 2
                    } // конец цикла для реферов 1
            }else{
            	// если нет ниодног реферала 
                 //echo 'Reff count: --- <br>';
                 }
			
			// баллы за контрольное слово
			$word1 = get_user_meta( $user_id_sinevo, 'word_rating_1', true );
			$word2 = get_user_meta( $user_id_sinevo, 'word_rating_2', true ); 
			$word3 = get_user_meta( $user_id_sinevo, 'word_rating_3', true ); 
			
			//вычисляем потраченные баллы 
            $minus1 = get_user_meta( $user_id_sinevo, 'minus_1', true );
			$minus = get_user_meta( $user_id_sinevo, 'minus', true );
			
			$minus = $minus + $minus1 + $minus2 + $minus3;
			update_user_meta($user_id_sinevo, 'minus_1', 0);
			update_user_meta($user_id_sinevo, 'minus', $minus);
			//----------------			
			
			
			
			
            //вычисляем рейтинг при регистрации
			$user_rating = get_user_meta( $user_id_sinevo, $key, true ); 
            //вычисляем рейтин за приглашение реферов первой линии
            $ref_rating = $ref_count*5; 
            // вычисляем общий рейтинг
            $all_rating = $cross_rating + $user_rating + $ref_rating + $cross_r1_all + $cross_r2_all + $cross_r3_all + $word1 + $word2 + $word3 - $minus;
            //запоминаем его в базе
            update_user_meta($user_id_sinevo, 'all_rating', $all_rating);

            //тестовый просмотр всех переменных 

            //имя - логин пользователя
            //echo 'Username: ' . $user_info->user_login . '<br>';
            //id пользователя
            //echo 'User ID: ' . $user_info->ID . '<br>';
            // баллы за регистрацию
            //echo 'баллы за регистрацию: ' . $user_rating. '<br>';
            // балы за приглашение - реферов первой линии
            //echo 'балы за приглашение: ' . $ref_rating. '<br>'; 
            //баллы за разгаданые кроссворды
            //echo 'баллы за кроссворд1 = '. $user_info->cross_1. '<br>';
            // балы за разгаданые кроссворды первой линии рефералов
            //echo 'rating_ref_1_all= '.$cross_r1_all. '<br>';
            // балы за разгаданые кроссворды второй линии рефералов
            //echo 'rating_ref_2_all= '.$cross_r2_all. '<br>';
            // балы за разгаданые кроссворды третей линии рефералов
            //echo 'rating_ref_3_all= '.$cross_r3_all. '<br>';
			//баллы за разгадsdfybz контрольного слова
            //echo 'баллы за слово 1= '. $word1. '<br>';
            //итоговый рейтинг
            //echo 'всего  балов: ' . $all_rating. '<br>'; 
			

return $all_rating;           
}

// ***********************************************************
function select_crossword() {
	
	if (get_field('crossword', 'option')==1){ $crossword_opt = 1; return $crossword_opt;}
	elseif (get_field('crossword', 'option')==2) {$crossword_opt = 2; return $crossword_opt;}
	elseif (get_field('crossword', 'option')==3) {$crossword_opt = 3; return $crossword_opt;}
}

//------------------------------------

// include crossword script + передаем переменные в js
function my_scripts_method() {
	
		if ((select_crossword()== 1)) {
		wp_enqueue_script('jquery_crossword', get_template_directory_uri() . '/js/jquery.crossword.js', __FILE__ );
		wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', __FILE__ );
		}
		//$user_id_sinevo = get_current_user_id();
		//$all_rating_minus = get_user_meta( $user_id_sinevo, 'all_rating', true );
		
		$translation_array = array('all_minus' => crossword_rating(), 'opt' => select_crossword(), 'ajaxurl' => admin_url( 'admin-ajax.php' ));
		
		wp_localize_script( 'jquery_crossword', 'object_crossword', $translation_array );
}

//------------------------------------

 

//add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

//-------------------------------------------------------



// получаем и обрабатываем данные из скрипта - ajax

add_action('wp_ajax_my_action', 'my_action_callback');
//add_action('wp_ajax_my_action', 'my_action1_callback');
//add_action('wp_ajax_nopriv_my_action', 'my_action_callback');



//--------------------- callback for word and crossword
function my_action_callback() {
	$user_id_sinevo = get_current_user_id();
	$all_rating = get_user_meta( $user_id_sinevo, 'all_rating', true );
	$word_rating1 = get_user_meta( $user_id_sinevo, 'word_rating_1', true );
	$word_rating2 = get_user_meta( $user_id_sinevo, 'word_rating_2', true );
	$word_rating3 = get_user_meta( $user_id_sinevo, 'word_rating_3', true );
	$cross_rating1 = get_user_meta( $user_id_sinevo, 'cross_1', true );
	$cross_rating2 = get_user_meta( $user_id_sinevo, 'cross_2', true );
	$cross_rating3 = get_user_meta( $user_id_sinevo, 'cross_3', true );
	 $minus1 = get_user_meta( $user_id_sinevo, 'minus_1', true );
	
	global $wpdb;
	$whatever = intval($_POST['reyting']) ;
	$whatever_c = intval($_POST['reyting_c']) ;
	$z = intval($_POST['z']) ;


	 
	
//crossword	and word
	if ((select_crossword()== 1) && ($cross_rating1 != 50) && ( $whatever_c != 0)) {
		  update_user_meta($user_id_sinevo, 'cross_1', 50);
		  if ( $word_rating1 != 20 ) {
			    update_user_meta($user_id_sinevo, 'word_rating_1', 20);
				$word_rating1 = 20;
		  		echo $all_rating + 50 + 20;
		  } else {
			  $all_rating = get_user_meta( $user_id_sinevo, 'all_rating', true );
			    echo $all_rating + 20 + 50;
		  }
		
	}
// only word first 
	elseif
		 ( (select_crossword()== 1) && ( $word_rating1 != 20)  && ( $whatever == 20) && ($cross_rating1 != 50))
		 {
		 update_user_meta($user_id_sinevo, 'word_rating_1', 20);
		 $min1 = get_user_meta( $user_id_sinevo, 'minus_1', true );
		 $word_rating1 = 20;
		 crossword_rating();
		  
		 
		 
		 echo $all_rating + 20 - $min1;
		 }
	else
			
		// minus 	 
	 if ((select_crossword()== 1) && ( $z != 0)  ) {
	 	  $zz =  get_user_meta( $user_id_sinevo, 'minus_1', true );
		  if ($zz == 0) { 
		 				update_user_meta($user_id_sinevo, 'minus_1', 5);
						$i =  get_user_meta( $user_id_sinevo, 'all_rating', true );
		 				$result = $i - 5;
		 		        echo $result;
		                exit();
		 				
		 			  } else
		 				$i =  get_user_meta( $user_id_sinevo, 'all_rating', true );
						$p = 5 + $zz;
		 				update_user_meta($user_id_sinevo, 'minus_1', $p);
		 				$result = $i-$p;
						echo $result;
		 				exit();
					 } 
	 
		 else {
			 $all_rating = get_user_meta( $user_id_sinevo, 'all_rating', true );
		 echo $all_rating;
		 }

	die();
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

//------------------------------------------------------

// победители . сортируем по балам и печатаем первых пяти, отмечаем в базе users что он победитель  
function winners() {



function cmp( $a, $b )
{ 
  if(  $a->all_rating ==  $b->all_rating ){ return 0 ; } 
  return ($a->all_rating > $b->all_rating ) ? -1 : 1;
} 

$args = array(
'meta_key' => 'all_rating'
);

$blogusers = get_users($args);
usort($blogusers ,'cmp');

echo '<ul id="win">';
$i = 0;
foreach ($blogusers as $user) {
	$i++;
	if($i <= 5)
	{
	echo '<li class="ul_winner"><h4>' . $user->display_name . ' ' . $user->nickname . '</h4></li>';
	echo '<li id="win1"> <span class="prompt"><strong>' . get_user_meta($user->ID, 'custom_field_1', true). ', '. get_user_meta($user->ID, 'custom_field_5', true) . '</strong></span></li>';
    echo '<li> <span class="prompt">баллов: ' . get_user_meta($user->ID, 'all_rating', true). '</span></li>';
	}
}
 
echo '</ul>';
}

// победители 2ого места . сортируем по отмеченому вручную полю prize_2 
function winners_2() {



function cmp_2( $a, $b )
{ 
  if(  $a->priz_2 ==  $b->priz_2 ){ return 0 ; } 
  return ($a->priz_2 > $b->priz_2 ) ? -1 : 1;
} 

$args = array(
'meta_key' => 'priz_2'
);

$blogusers = get_users($args);
usort($blogusers ,'cmp_2');

echo '<ul id="win">';
$i = 0;
foreach ($blogusers as $user) {
	$i++;
	if(($i <= 5) && ($user->priz_2 == 1))
	{
	echo '<li class="ul_winner"><h4>' . $user->display_name . ' ' . $user->nickname . '</h4></li>';
	echo '<li id="win1"> <span class="prompt"><strong>' . get_user_meta($user->ID, 'custom_field_1', true). ', '. get_user_meta($user->ID, 'custom_field_5', true) . '</strong></span></li>';
    //echo '<li> <span class="prompt">баллов: ' . get_user_meta($user->ID, 'all_rating', true). '</span></li>';
	}
}
 
echo '</ul>';
}

//---------admin menu edit
//---------------------------------------------------------------------------------------

function edit_admin_menus() {
	global $menu;
	global $submenu;
	
	
	remove_menu_page('index.php'); // Remove the Tools Menu 
	remove_menu_page('edit.php'); // Remove the Tools Menu 
	remove_menu_page('upload.php'); // Remove the Tools Menu 
	remove_menu_page('edit-comments.php'); // Remove the Tools Menu 
	
	//remove_menu_page('admin.php?page=wpcf7'); // Remove the Tools Menu 
	
	remove_menu_page('plugins.php'); // Remove the Tools Menu 
	remove_menu_page('tools.php'); // Remove the Tools Menu 
	remove_menu_page('options-general.php'); // Remove the Tools Menu 
	
	
	
	remove_submenu_page('edit.php?post_type=page', 'post-new.php?post_type=page');
	remove_submenu_page('themes.php', 'themes.php'); 
	remove_submenu_page('themes.php', 'widgets.php');
	
	//remove_submenu_page('themes.php', 'theme-editor.php'); 
	
	remove_submenu_page('users.php', 'user-new.php');
	remove_submenu_page('users.php', 'profile.php');
	
	//remove_submenu_page('users.php', 'profile.php');
	
	//remove_submenu_page('admin.php?page=inic_faq', 'admin.php?page=inic_faq_settings');
	
	//remove_submenu_page( 'admin.php?page=wpcf7', 'admin.php?page=wpcf7' );
	
	remove_menu_page('edit.php?post_type=acf'); 
	
	
}

add_action( 'admin_menu', 'edit_admin_menus', 999 );

//-------------
function my_custom_admin_head(){
	echo '<style> .toplevel_page_wpcf7 {display: none !important;}
				  #nonbut {display: none !important;}
		</style>';
}
add_action('admin_head', 'my_custom_admin_head');

//----------

add_action('admin_init', 'my_remove_menu_elements', 102);

function my_remove_menu_elements()
{
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	//remove_submenu_page('users.php?page=ProfileBuilderOptionsAndSettings', 'users.php?page=ProfileBuilderOptionsAndSettings');
}
//------------------------------
function remove_admin_bar_links() {
    global $wp_admin_bar;
    //$wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('updates');
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('new-content');
	$wp_admin_bar->remove_menu('view');
}

add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

//---------------------------------- страница руководства

//add_action('admin_menu', 'register_custom_menu_page_help');

function register_custom_menu_page_help() {
 add_menu_page('custom menu title', 'Руководство', 'add_users', 'custompage', 'custom_menu_page_help' );
}

 

function custom_menu_page_help(){
   echo "<h2>Руководство по сайту Игры Разума </h2>";	
}
//-----------------------------------