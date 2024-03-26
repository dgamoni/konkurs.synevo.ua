
	jQuery(document).ready(function($){
		
					
	$("#puzzle").find(":input[type='text']").prop('disabled', true);
	$("#tip_button").find(":button").prop('disabled', true);
	
	
	$("#myask").css({'display' : 'none'});
	
	//$('#puzzle').click(function() { 
           // $('#puzzle').block({ 
              //  message: '<h1>Для того чтобы начать разгадывать кроссворд нужно зарегистрироваться.</h1>',
				//centerY: 0, 
               // css: { top: '10px', left: '', right: '' },
				//overlayCSS: { backgroundColor: '#00f' }
           // }); 
			//setTimeout($.unblockUI, 2000);
     // });   
	
	$(".entry-1, .entry-2, .entry-3, .entry-4, .entry-5, .entry-6, .entry-7, .entry-8, .entry-9, .entry-10, .entry-11, .entry-12, .entry-13, .entry-14, .entry-15, .entry-16, .entry-17, .entry-18, .entry-19, .entry-20, .entry-21").qtip({
		content: 'Для того чтобы начать разгадывать кроссворд нужно зарегистрироваться',
		position: {
			my: 'bottom left',
			target: 'mouse',
			viewport: $(window), // Keep it on-screen at all times if possible
			adjust: {
				x: 10,  y: 10
			}
		},
		hide: {
			fixed: true // Helps to prevent the tooltip from hiding ocassionally when tracking!
		},
		style: 	{
					classes: 'qtip-shadow qtip-bootstrap'
				}
	});
					
					

 
 


	}) //end document.ready