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
			 $(this).css({'height' : '121px'});
			 }
			});
			
			$("#puzzle").find('[data-coords]').each(function(index){
			
			  $input = $(this).find(':input');
			  
				
			 if($(this).attr('data-coords') == '8,9'){
			 //$input.addClass('mes');
   			 //alert('hello');
			 
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '14,6'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '10,12'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '14,12'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '11,15'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '3,18'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '1,20'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '8,22'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '9,24'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '5,25'){
   			 //alert('hello');
			 $input.css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			});
			
			 
   				//$(".entry-21").find(":input[type='text']").prop('disabled', true);
			
			$('#helpbut').click(function() {
   				$(".entry-21").find(":input[type='text']").prop('disabled', true);
				
					$puzzle.each(function(index){
						$input = $(this).find(':input');
						
			 			if($(this).attr('data-coords') == '8,9'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
						//$input.addClass('mes');
						
			 			} else
						if($(this).attr('data-coords') == '14,6'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '10,12'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '14,12'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '11,15'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '3,18'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '1,20'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '8,22'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '9,24'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			} else
						if($(this).attr('data-coords') == '5,25'){
   			 			//alert('hello');
			 			$input.prop('disabled', true);
			 			}
						
					
						
						
						
				}); // end each
				
				
   											
   			
			}); // end click
			
			 

			
						
		
 


	}) //end document.ready




