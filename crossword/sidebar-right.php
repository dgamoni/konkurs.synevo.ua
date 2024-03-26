<!-- sidebar right only for main crossword script -->
	<div id="secondary-right">

       <div id="puzzle-wrapper"><!-- crossword puzzle appended here -->
       
       
       		
            
       </div>
       
       <?php // автозаполнение 
	    function mb_str_split( $string ) { 
   		return preg_split('/(?<!^)(?!$)/u', $string ); 
		} 
	
	   global $wpdb;
	   $user_id_sinevo = get_current_user_id();
	   for ($j = 0; $j <= 19; $j++) {
		    $pos = 0;
	   		$pos = get_user_meta( $user_id_sinevo, 'pos_'.$j , true );
	   		$charlist = mb_str_split( $pos );
	   		$count =  count($charlist);
	   		//print_r($charlist); 
	   		//echo count($charlist);
			//echo $pos;
	    if ($count != 1 ) {
	   		for ($i = 0; $i <= $count; $i++) {
	   		?>
       		<script>
	   		jQuery(document).ready(function($){
		   
	   		$('.position-<?php echo $j ?> input:eq(<?php echo $i ?>)').val('<?php echo $charlist[$i] ?>');
			
	   		})
       </script>
       
       <?php 
		
	   		} // end for char
		} // end if
	    } // end for word
		?>
       
       <div id="word-wrapper">
       
       		<div id="message_for_cross">
            	<div id="message_crossword">
                
                </div>
                <div id="tip_crossword">
               
                	<div id="tip_button">
                    <input type="hidden" class="helpcounter" id="helpcounter" value="5" disabled>
                    <input id="helpbut" class="helpbut" type="button" value="Купить подсказку">
                    </div>
                    <p class="prompt">Вы сможете открыть любую</strong></p>
            		<p class="prompt">букву кроссвода за <strong>5 баллов</strong></p>
                    
                    <div id="message_button" class="buttonnone"><button>Готово</button></div>
                    
                
                </div>
                
                <div class="clearfix"></div> 
            </div>
            
            <div id="message_for_word">
            	<div id="message_word"></div>
            </div>
       
       		<div id="word-title">
            <h4>Контрольное слово :</h4>
            </div>
            
            
            
            <div class="clearfix"></div> 
            
            <div id="word-descript">
            	<div class="floatleft">
            	<p class="prompt">За правильное разгадывание кроссворда: <strong>50 баллов</strong></p>
            	<p class="prompt">За правильное разгадывание контрольного слова: <strong>20 баллов</strong></p>
                <p class="prompt">За повторное разгадывание баллы не начисляются</p>
                </div>
                
                <div class="clearfix"></div> 
            </div>
            
            
            	
                
           
            
            
       </div>
 	

	</div>
  		