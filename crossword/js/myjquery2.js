/*********************
//* standart jQuery  document ready script theme 
//* autor: Andrey Monin
//* this theme "crossword" 
*********************/



	jQuery(document).ready(function($){
		
		
		
		$puzzle = $("#puzzle").find('[data-coords]');
		
			$puzzle.each(function(index){
			 if($(this).attr('data-coords') == '1,26'){
   			 //alert('hello');
			 $(this).css({'height' : '149px'});
			 }
			});
			
			$("#puzzle").find('[data-coords]').each(function(index){
			
			  $input = $(this).find(':input');
			  
				
			 if($(this).attr('data-coords') == '6,8'){
			 //$input.addClass('mes');
   			 //alert('hello');
			 
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '15,8'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '10,10'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '4,20'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '10,17'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '18,20'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '4,4'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '20,11'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '8,24'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 
			});
			
			 
   				//$(".entry-21").find(":input[type='text']").prop('disabled', true);
			
			$('#helpbut').click(function() {
   				$(".entry-21").find(":input[type='text']").prop('disabled', true);
				
					$puzzle.each(function(index){
						$input = $(this).find(':input');
						
			 			if($(this).attr('data-coords') == '6,8'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
						//$input.addClass('mes');
						
			 			} else
						if($(this).attr('data-coords') == '15,8'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '10,10'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '4,20'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '10,17'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '18,20'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '4,4'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '20,11'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '8,24'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} 
						
					
						
						
						
				}); // end each
				
				 
   											
   			
			}); // end click
			
			  
				
 


	}) //end document.ready




