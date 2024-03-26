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
	   $sword = get_user_meta( $user_id_sinevo, 'sword', true );
	   //var_dump($sword[1]);
	    
		$count1 = count($sword);
		for ($ii = 0; $ii < $count1; $ii++) {
        //echo "Хорошо: " . $sword[$i] . "\n";
		?>
		<script>
	   		jQuery(document).ready(function($){
		   
	   		$('.position-20 input:eq(<?php echo $ii ?>)').val('<?php echo $sword[$ii] ?>');
			
	   		})
       	</script>
		<?php
    	} 
	   
	   for ($j = 0; $j <= 20; $j++) {
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
                    <p class="prompt">Вы можете открыть любую</strong></p>
            		<p class="prompt">букву кроссворда за <strong>5 баллов</strong></p>
                    
                   
                    
                
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
                
                 <div style="margin-left: 47px;" id="message_button" ><button id="status_true">Готово</button></div>
                 <script>
				 jQuery(document).ready(function($){ 
				 		var check =0;
						$("#status_true").click(function () { 
						
						check =1;
						var data = {
						action: 'my_action',
						check: check,      // We pass php values differently!
						
							};
				// We can also pass the url value separately from ajaxurl for front end AJAX implementations
						jQuery.post(
						object_crossword.ajaxurl,
						data,
						function(response) {
				//alert('check: ' + response);
						$('#status_true').prop('disabled', true);
						$('#message_word').text('Вы отправили кроссворд на проверку');
						$('#puzzle input').prop('disabled', true);
				
						});
				//---------------------------
						//$('#message_crossword').html('Вы отправили кроссворд на роверку');
						
						
						 
						 })	
				 }); 
                  </script>
                
                <div class="clearfix"></div> 
            </div>
            
            
            	
                
           
            
            
       </div>

	<div id="printcross">
	   <a href="<?php bloginfo('template_url'); ?>/img/Synevo__Crossword__Website__Print_version__0201.pdf" target="_blank">Версия для печати</a>
       </div>
 	

	</div>
  		