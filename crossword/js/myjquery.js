/*********************
//* standart jQuery  document ready script theme 
//* autor: Andrey Monin
//* this theme "crossword" 
*********************/



	jQuery(document).ready(function($){
		
		
		$("#puzzle").find('[data-coords]').each(function(index){
			 if($(this).attr('data-coords') == '1,26'){
   			 //alert('hello');
			 $(this).css({'height' : '121px'});
			 }
			});
			
			$("#puzzle").find('[data-coords]').each(function(index){
			 if($(this).attr('data-coords') == '8,9'){
   			 //alert('hello');
			 $(this).find(':input').css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '14,6'){
   			 //alert('hello');
			 $(this).find(':input').css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '10,12'){
   			 //alert('hello');
			 $(this).find(':input').css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '14,12'){
   			 //alert('hello');
			 $(this).find(':input').css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '11,15'){
   			 //alert('hello');
			 $(this).find(':input').css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '3,18'){
   			 //alert('hello');
			 $(this).find(':input').css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '1,20'){
   			 //alert('hello');
			 $(this).find(':input').css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '8,22'){
   			 //alert('hello');
			 $(this).find(':input').css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '9,24'){
   			 //alert('hello');
			 $(this).find(':input').css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			 else if($(this).attr('data-coords') == '5,25'){
   			 //alert('hello');
			 $(this).find(':input').css({'background-color' : 'rgb(190, 188, 188)'});
			 }
			});
						
		//if ( $("#puzzle td").is('[data-coords]') ) { $(this).addClass('durdom'); }
		
			//$('#message_button').removeData('qtip').qtip({
			//	content: {
			//		text: 'Вы разгадали кроссворд.<br> Вам начисленно 50 баллов. Нажмите кнопку готово<br> чтобы отправить администратору на проверку.', 
			//		title: {
			//			text: 'Поздравляю!',
			//			button: true
			//		}
			//	},
			//	position: {
			//		my: 'right bottom', // Use the corner...
			//		at: 'left center' // ...and opposite corner
			//	},
			//	show: {
			//		event: false, // Don't specify a show event...
			//		ready: true // ... but show the tooltip when ready
			//	},
			//	hide: false, // Don't specify a hide event either!
			//	style: {
			//		classes: 'qtip-shadow qtip-bootstrap'
			//	}
			//});
			
				
				
				
				
	
            //$('#secondary-right').block({ 
            //    message: '<h1>Processing</h1>', 
            //    css: { border: '3px solid #a00' } 
            //}); 
        

 			//$(".menu  li").last().css({'padding-right' : '0px'});
			
			//$(".nonepuzzle").find(":input[type='text']").prop('disabled', true);
 


	}) //end document.ready




