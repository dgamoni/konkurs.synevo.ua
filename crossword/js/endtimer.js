/*********************
//* standart jQuery  document ready script theme 
//* autor: Andrey Monin
//* this theme "crossword" 
*********************/



	jQuery(document).ready(function($){
		
			$("#puzzle").find(":input[type='text']").prop('disabled', true);
			$("#tip_button").find(":button").prop('disabled', true);
 			$(".dhmcountdown").text("конкурс закончен");


	}) //end document.ready




