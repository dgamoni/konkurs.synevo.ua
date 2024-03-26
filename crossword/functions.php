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


//  функция для вычисления рефералов и подсчитывания рейтинга 
// ***********************************************************

function crossword_rating()
{
            global $wpdb;
            // custom_field_7 - рейтинг за регитсрацию
            $key = 'custom_field_7';
        	// текущий id пользователя
            $user_id_sinevo = get_current_user_id();
            // массив всех данных пользователя
            $user_info = get_userdata($user_id_sinevo);
            //таблица рефералов
            $table = $wpdb->prefix."affp_referrals";
            // балы за разгадывания контрольного слова
            $word=0;
            // баллы потраченые на подсказки
            $minus=0;

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

            // вычисляем баллы за разгаданые кроссворды
            $cross_rating=$user_info->cross;   
            //вычисляем рейтинг при регистрации
			$user_rating = get_user_meta( $user_id_sinevo, $key, true ); 
            //вычисляем рейтин за приглашение реферов первой линии
            $ref_rating = $ref_count*5; 
            // вычисляем общий рейтинг
            $all_rating = $cross_rating + $user_rating + $ref_rating + $cross_r1_all + $cross_r2_all + $cross_r3_all + $word - $minus;
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
            //echo 'баллы за кроссворд = '. $user_info->cross. '<br>';
            // балы за разгаданые кроссворды первой линии рефералов
            //echo 'rating_ref_1_all= '.$cross_r1_all. '<br>';
            // балы за разгаданые кроссворды второй линии рефералов
            //echo 'rating_ref_2_all= '.$cross_r2_all. '<br>';
            // балы за разгаданые кроссворды третей линии рефералов
            //echo 'rating_ref_3_all= '.$cross_r3_all. '<br>';
            //итоговый рейтинг
            //echo 'всего  балов: ' . $all_rating. '<br>'; 

return $all_rating;           
}

// ***********************************************************