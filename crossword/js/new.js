/*********************
//* standart jQuery  document ready script theme 
//* autor: Andrey Monin
//* this theme "crossword" 
*********************/



	jQuery(document).ready(function($){
		
		
		

			
			$(".login-form-submit").find("label[for='remember-me']").addClass("remembr");
			//$(".done").prop('disabled', true);						
		
		// qtip ---------------------
 			$(".helpbut").qtip({
		content: 'Выберите желаемую букву с помощью курсора',
		position: {
			my: 'bottom center',
			at: 'top center',
			//target: 'mouse',
			//viewport: $(window), // Keep it on-screen at all times if possible
			adjust: {
				x: 0,  y: 0
			}
		},
		show: {
				//target: $('h1:first'),
				event: 'click',
				solo: true // Only show one tooltip at a time
			},
		hide: {
			fixed: true // Helps to prevent the tooltip from hiding ocassionally when tracking!
		},
		style: 	{
					classes: 'qtip-shadow qtip-bootstrap',
					width: 200
					
				}
			}); // end qtip
			
			jQuery('.helpbut').on('click', function() {
   				 jQuery('.entry-1 :input, .entry-2 :input, .entry-3 :input, .entry-4 :input, .entry-5 :input, .entry-6 :input, .entry-7 :input, .entry-8 :input, .entry-9 :input, .entry-10 :input, .entry-11 :input, .entry-12 :input, .entry-13 :input, .entry-14 :input, .entry-15 :input, .entry-16 :input, .entry-17 :input, .entry-18 :input, .entry-19 :input, .entry-20 :input ').css('cursor', 'help');
				
				jQuery('#puzzle').on('click', function() { 
				$('.entry-1 :input, .entry-2 :input, .entry-3 :input, .entry-4 :input, .entry-5 :input, .entry-6 :input, .entry-7 :input, .entry-8 :input, .entry-9 :input, .entry-10 :input, .entry-11 :input, .entry-12 :input, .entry-13 :input, .entry-14 :input, .entry-15 :input, .entry-16 :input, .entry-17 :input, .entry-18 :input, .entry-19 :input, .entry-20 :input ').css('cursor', 'text');
				})
      			//$(this).css('cursor', 'wait');
 			 });
			  
	


	}) //end document.ready




