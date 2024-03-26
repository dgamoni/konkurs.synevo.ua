
	jQuery(document).ready(function($){
		
					
	$("#puzzle").find(":input[type='text']").prop('disabled', true);
	
	
	//$('#puzzle').click(function() { 
           // $('#puzzle').block({ 
              //  message: '<h1>Для того чтобы начать разгадывать кроссворд нужно зарегистрироваться.</h1>',
				//centerY: 0, 
               // css: { top: '10px', left: '', right: '' },
				//overlayCSS: { backgroundColor: '#00f' }
           // }); 
			//setTimeout($.unblockUI, 2000);
     // });   
	
	$("#puzzle tr").qtip({
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