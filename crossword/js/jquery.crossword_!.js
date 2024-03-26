
/**
* Jesse Weisbeck's Crossword Puzzle (for all 3 people left who want to play them)
*
*/


(function($){
	
	$.fn.crossword = function(entryData, helpButton, helpValue) {
			/*
				Qurossword Puzzle: a javascript + jQuery crossword puzzle
				"light" refers to a white box - or an input

				DEV NOTES: 
				- activePosition and activeClueIndex are the primary vars that set the ui whenever there's an interaction
				- 'Entry' is a puzzler term used to describe the group of letter inputs representing a word solution
				- This puzzle isn't designed to securely hide answerers. A user can see answerers in the js source
					- An xhr provision can be added later to hit an endpoint on keyup to check the answerer
				- The ordering of the array of problems doesn't matter. The position & orientation properties is enough information
				- Puzzle authors must provide a starting x,y coordinates for each entry
				- Entry orientation must be provided in lieu of provided ending x,y coordinates (script could be adjust to use ending x,y coords)
				- Answers are best provided in lower-case, and can NOT have spaces - will add support for that later
			*/
			
			var puzz = {}; // put data array in object literal to namespace it into safety
			puzz.data = entryData;
			
			
							
			
			var helpActive = false;
			if ((typeof helpButton !== "undefined") && (typeof helpValue !== "undefined")) {
				$(helpButton).click(function(event){
					if (helpActive == true) {
						
						helpActive = false;
					} else {
						helpActive = true;
						
					}
						
					return false;
				});
			}
			
			// append clues markup after puzzle wrapper div
			// This should be moved into a configuration object
			//this.after('<div id="puzzle-clues"><h2>Across</h2><ol id="across"></ol><h2>Down</h2><ol id="down"></ol></div>');
			//var wordcontrol =0;
			var word = [1,2,3,4,5,6,7,8,9,10],
			    reyting = 0,
			 	meter = 0;
				slovo = 0;
				var all_minus = object_crossword.all_minus;
				$(helpValue).val(all_minus/5);
				var j = 0;
			
			// initialize some variables
			var tbl = ['<table id="puzzle">'],
			    puzzEl = this,
				clues = $('#puzzle-clues'),
				clueLiEls,
				coords,
				entryCount = puzz.data.length,
				entries = [], 
				rows = [],
				cols = [],
				solved = [],
				tabindex,
				$actives,
				activePosition = 0,
				activeClueIndex = 0,
				currOri,
				targetInput,
				mode = 'interacting',
				solvedToggle = false,
				z = 0;

			var puzInit = {
				
				init: function() {
					currOri = 'across'; // app's init orientation could move to config object
					
					// Reorder the problems array ascending by POSITION
					puzz.data.sort(function(a,b) {
						return a.position - b.position;
					});

					// Set keyup handlers for the 'entry' inputs that will be added presently
					puzzEl.delegate('input', 'keyup', function(e){
						mode = 'interacting';
						
						
						// need to figure out orientation up front, before we attempt to highlight an entry
						switch(e.which) {
							case 39:
							case 37:
								currOri = 'across';
								break;
							case 38:
							case 40:
								currOri = 'down';
								break;
							default:
								break;
						}
						
						if ( e.keyCode === 9) {
							return false;
						} else if (
							e.keyCode === 37 ||
							e.keyCode === 38 ||
							e.keyCode === 39 ||
							e.keyCode === 40 ||
							e.keyCode === 8 ||
							e.keyCode === 46 ) {			
												

							
							if (e.keyCode === 8 || e.keyCode === 46) {
								currOri === 'across' ? nav.nextPrevNav(e, 37) : nav.nextPrevNav(e, 38); 
							} else {
								nav.nextPrevNav(e);
							}
							
							e.preventDefault();
							return false;
						} else {
							
							//console.log('input keyup: '+solvedToggle);
							
							puzInit.checkAnswer(e);

						}

						e.preventDefault();
						return false;					
					});
			
					// tab navigation handler setup
					puzzEl.delegate('input', 'keydown', function(e) {

						if ( e.keyCode === 9) {
							
							mode = "setting ui";
							if (solvedToggle) solvedToggle = false;

							//puzInit.checkAnswer(e)
							nav.updateByEntry(e);
							
						} else {
							return true;
						}
												
						e.preventDefault();
									
					});
					
					// tab navigation handler setup
					puzzEl.delegate('input', 'click', function(e) {
						mode = "setting ui";
						if (solvedToggle) solvedToggle = false;

						//console.log('input click: '+solvedToggle);
					
						nav.updateByEntry(e);
						//console.log(nav.updateByEntry(e));
						e.preventDefault();
						
						
									
					});
					
					
					// click/tab clues 'navigation' handler setup
					clues.delegate('li', 'click', function(e) {
						mode = 'setting ui';
						
						if (!e.keyCode) {
							nav.updateByNav(e);
						} 
						e.preventDefault(); 
					});
					
					
					// highlight the letter in selected 'light' - better ux than making user highlight letter with second action
					puzzEl.delegate('#puzzle', 'click', function(e) {
						$(e.target).focus();
						$(e.target).select();
						
					});
					
					// DELETE FOR BG
					puzInit.calcCoords();
					
					// Puzzle clues added to DOM in calcCoords(), so now immediately put mouse focus on first clue
					clueLiEls = $('#puzzle-clues li');
					$('#' + currOri + ' li' ).eq(0).addClass('clues-active').focus();
				
					// DELETE FOR BG
					puzInit.buildTable();
					puzInit.buildEntries();
										
				},
				
				/*
					- Given beginning coordinates, calculate all coordinates for entries, puts them into entries array
					- Builds clue markup and puts screen focus on the first one
				*/
				calcCoords: function() {
					/*
						Calculate all puzzle entry coordinates, put into entries array
					*/
					for (var i = 0, p = entryCount; i < p; ++i) {		
						// set up array of coordinates for each problem
						entries.push(i);
						entries[i] = [];

						for (var x=0, j = puzz.data[i].answer.length; x < j; ++x) {
							entries[i].push(x);
							coords = puzz.data[i].orientation === 'across' ? "" + puzz.data[i].startx++ + "," + puzz.data[i].starty + "" : "" + puzz.data[i].startx + "," + puzz.data[i].starty++ + "" ;
							entries[i][x] = coords; 
						}

						// while we're in here, add clues to DOM!
						
// dgamoni edit !!!  del  clues standart ------------------------------------------------------------
						//$('#' + puzz.data[i].orientation).append('<li tabindex="1" data-position="' + i + '">' + puzz.data[i].clue + '</li>'); 
					}				
					
					// Calculate rows/cols by finding max coords of each entry, then picking the highest
					for (var i = 0, p = entryCount; i < p; ++i) {
						for (var x=0; x < entries[i].length; x++) {
							cols.push(entries[i][x].split(',')[0]);
							rows.push(entries[i][x].split(',')[1]);
						};
					}

					rows = Math.max.apply(Math, rows) + "";
					cols = Math.max.apply(Math, cols) + "";
		
				},
				
				/*
					Build the table markup
					- adds [data-coords] to each <td> cell
				*/
				buildTable: function() {
					for (var i=1; i <= rows; ++i) {
						tbl.push("<tr>");
							for (var x=1; x <= cols; ++x) {
								tbl.push('<td data-coords="' + x + ',' + i + '"></td>');		
							};
						tbl.push("</tr>");
					};

					tbl.push("</table>");
					puzzEl.append(tbl.join(''));
				},
				
				/*
					Builds entries into table
					- Adds entry class(es) to <td> cells
					- Adds tabindexes to <inputs> 
				*/
				buildEntries: function() {
					var puzzCells = $('#puzzle td'),
						light,
						$groupedLights,
						hasOffset = false,
						positionOffset = entryCount - puzz.data[puzz.data.length-1].position; // diff. between total ENTRIES and highest POSITIONS
						
					for (var x=1, p = entryCount; x <= p; ++x) {
						var letters = puzz.data[x-1].answer.split('');
						//console.log(letters);

						for (var i=0; i < entries[x-1].length; ++i) {
							light = $(puzzCells +'[data-coords="' + entries[x-1][i] + '"]');
							
							// check if POSITION property of the entry on current go-round is same as previous. 
							// If so, it means there's an across & down entry for the position.
							// Therefore you need to subtract the offset when applying the entry class.
							if(x > 1 ){
								if (puzz.data[x-1].position === puzz.data[x-2].position) {
									hasOffset = true;
								};
							}
							
							if($(light).empty()){
								$(light)
									.addClass('entry-' + (hasOffset ? x - positionOffset : x) + ' position-' + (x-1) )
									.append('<input maxlength="1" val="" type="text" tabindex="-1" />');
									//console.log(x);
							}
						};
						
					};	
					
					
					// !!!! index !!! i-1  Put entry number in first 'light' of each entry, skipping it if already present
					for (var i=1, p = entryCount; i-1 < p; ++i) {
						$groupedLights = $('.entry-' + i);
						if(!$('.entry-' + i +':eq(0) span').length){
							$groupedLights.eq(0)
								.append('<span class="myindex">' + puzz.data[i-1].position + '</span>');
								
						}
						// only crossword 1 append index 17
						if(i==17) {$groupedLights.eq(1).append('<span class="myindex">17</span>');}
					}	
					
					util.highlightEntry();
					util.highlightClue();
					$('.active').eq(0).focus();
					$('.active').eq(0).select();
										
				},
				
				
				/*
					- Checks current entry input group value against answer
					- If not complete, auto-selects next input for user
				*/
				checkAnswer: function(e) {
					
					var valToCheck, currVal;
					
					util.getActivePositionFromClassGroup($(e.target));
				//console.log(ActivePosition);
				
					valToCheck = puzz.data[activePosition].answer.toLowerCase();
					
					//console.log(valToCheck[1]);

					currVal = $('.position-' + activePosition + ' input')
						.map(function() {
					  		return $(this)
								.val()
								.toLowerCase();
								//console.log(currVal);
						})
						.get()
						.join('');
				
					
    		

					
					if(valToCheck === currVal){	
						$('.active')
							.addClass('done')
							.removeClass('active');
					
						$('.clues-active').addClass('clue-done');

						solved.push(valToCheck);
						solvedToggle = true;
						
						// считаем отгаданные слова
						meter++;
						
			
			 
//------------- если ввели контрольное словоправильно		
			if((currVal=='аггравация') && (slovo == 0)){
				reyting = 20;
				meter--;
				slovo = 1;
				$('.entry-21 input').prop('disabled', true);
//------------- ajax  -----------------------------------			
				var data = {
						action: 'my_action',
						whatever: object_crossword.opt,      // We pass php values differently!
						reyting: reyting
							};
				// We can also pass the url value separately from ajaxurl for front end AJAX implementations
				jQuery.post(
				object_crossword.ajaxurl,
				data,
				function(response) {
				//alert('reyting: ' + response);
				$('#message_word').text('Поздравляю! Вы разгадали контрольное слово и вам начисленно 20 баллов.');
				
				
				
				
				
				$('.rating').text(response);
				});
//-----------------------------------------------------				
				$(helpValue).val(parseInt($(helpValue).val())+4);
				//console.log(object_crossword.opt);
				//console.log(object_crossword.ajaxurl);
				}


//---------првоверяем счетчик слов если 20 - кроссворд разгадан			
			if((meter == 20) && !(currVal=='аггравация')){
				reyting_c =  50;
			//------------------ ajax для кроссворда---------------				
				var data = {
						action: 'my_action',
						whatever: object_crossword.opt,      // We pass php values differently!
						reyting_c: reyting_c
							};
				// We can also pass the url value separately from ajaxurl for front end AJAX implementations
				jQuery.post(
				object_crossword.ajaxurl,
				data,
				function(response) {
				//alert('reyting_c: ' + response);
	// коллбэки то что будем делать если кроссворд разгадан
	
				//добавляем сообщение
				
				$('#message_crossword').html('Поздравляю! Вы разгадали кроссворд.<br> Вам начисленно 50 баллов. Нажмите кнопку готово<br> чтобы отправить администратору на проверку.');	
				
				//добавляем кнопку готово
				$('#message_button').removeClass('buttonnone');
				//убираем кнопки подсказки
				$('#tip_button').addClass('buttonnone');
				$('#tip_crossword .prompt').addClass('buttonnone');
				// назначаем шинину для qtip2
				//$('.qtip').css({'max-width' : '354px'});
				
				// обновляем рейтин в шапке, 
				$('.rating').text(response);
				// закрываем кроссворд для редактирования
				$('#puzzle input').prop('disabled', true);
				
				});
//-----------------------------------------------------	
			}
			
			//console.log(' рейтинг ' + reyting);			
			//console.log(' счетчик ' + meter);			
						
						
			//console.log(currVal[4]);
			//console.log(wordcontrol);
//------------- заполняем автоматически контрольное слово-----------------
			if((activePosition ==3) || (activePosition ==5) ){word[1]=currVal[4].toUpperCase(); $('.entry-21 input:first').val(word[1]).addClass('done');}
			
			if((activePosition ==8)){word[2]=currVal[6].toUpperCase(); $('.entry-21 input:eq(1)').val(word[2]).addClass('done');}
			if((activePosition ==12)){word[3]=currVal[0].toUpperCase(); $('.entry-21 input:eq(1)').val(word[3]).addClass('done');}
			
			if((activePosition ==19)){word[4]=currVal[4].toUpperCase(); $('.entry-21 input:eq(2)').val(word[4]).addClass('done');}
			
			if((activePosition ==17)){word[5]=currVal[4].toUpperCase(); $('.entry-21 input:eq(3)').val(word[5]).addClass('done');}
			if((activePosition ==18)){word[6]=currVal[2].toUpperCase(); $('.entry-21 input:eq(3)').val(word[6]).addClass('done');}
			
			if((activePosition ==6)){word[7]=currVal[7].toUpperCase(); $('.entry-21 input:eq(4)').val(word[7]).addClass('done');}
			
			if((activePosition ==16)){word[8]=currVal[4].toUpperCase(); $('.entry-21 input:eq(5)').val(word[8]).addClass('done');}
			
			if((activePosition ==10)){word[9]=currVal[7].toUpperCase(); $('.entry-21 input:eq(6)').val(word[9]).addClass('done');}
			
			if((activePosition ==8)){word[10]=currVal[0].toUpperCase(); $('.entry-21 input:eq(7)').val(word[10]).addClass('done');}
			
			if((activePosition ==9)){word[11]=currVal[8].toUpperCase(); $('.entry-21 input:eq(8)').val(word[11]).addClass('done');}
			
			if((activePosition ==4)){word[12]=currVal[17].toUpperCase(); $('.entry-21 input:eq(9)').val(word[12]).addClass('done');}
			//console.log(word[1]);
			//console.log(activePosition);
// формируем массив контрольного слова из уже полученных букв
		var	myword = ($('.entry-21 input:eq(0)').val() + $('.entry-21 input:eq(1)').val() + $('.entry-21 input:eq(2)').val() + $('.entry-21 input:eq(3)').val() + $('.entry-21 input:eq(4)').val() + $('.entry-21 input:eq(5)').val() + $('.entry-21 input:eq(6)').val() + $('.entry-21 input:eq(7)').val() + $('.entry-21 input:eq(8)').val() + $('.entry-21 input:eq(9)').val()).toLowerCase();
			//console.log(myword);
			
//------------- ajax  проверка контрольного слова открытого автоматически		
			if((myword == 'аггравация') && (slovo == 0)){
				reyting = 20;
				slovo = 1;
				//meter--;
				$('.entry-21 input').prop('disabled', true);
			//--------------------------------------------------				
				var data = {
						action: 'my_action',
						whatever: object_crossword.opt,      // We pass php values differently!
						reyting: reyting
							};
				// We can also pass the url value separately from ajaxurl for front end AJAX implementations
				jQuery.post(
				object_crossword.ajaxurl,
				data,
				function(response) {
				//alert('reyting: ' + response);
				$('#message_word').text('Поздравляю! Вы разгадали контрольное слово и вам начисленно 20 баллов.');
				$('.rating').text(response);
				});
			}
//-----------------------------------------------------	
// функция проверки . Если слово пересекается с уже разгаданным словом и пользователь вводит букву,
// которая не соответствует пересекающейся букве, слово подсвечивается красным цветом и не сохраняется.




			
						return;
						
					}
					
					
					
					currOri === 'across' ? nav.nextPrevNav(e, 39) : nav.nextPrevNav(e, 40);
					
					//z++;
					//console.log(z);
					//console.log('checkAnswer() solvedToggle: '+solvedToggle);

				}				


			}; // end puzInit object
			

			var nav = {
				
				nextPrevNav: function(e, override) {

					var len = $actives.length,
						struck = override ? override : e.which,
						el = $(e.target),
						p = el.parent(),
						ps = el.parents(),
						selector;
				
					util.getActivePositionFromClassGroup(el);
					util.highlightEntry();
					util.highlightClue();
					
					$('.current').removeClass('current');
					
					selector = '.position-' + activePosition + ' input';
					
					//console.log('nextPrevNav activePosition & struck: '+ activePosition + ' '+struck);
						
					// move input focus/select to 'next' input
					switch(struck) {
						case 39:
							p
								.next()
								.find('input')
								.addClass('current')
								.select();

							break;
						
						case 37:
							p
								.prev()
								.find('input')
								.addClass('current')
								.select();

							break;

						case 40:
							ps
								.next('tr')
								.find(selector)
								.addClass('current')
								.select();

							break;

						case 38:
							ps
								.prev('tr')
								.find(selector)
								.addClass('current')
								.select();

							break;

						default:
						break;
					}
															
				},
	
				updateByNav: function(e) {
					var target;
					
					$('.clues-active').removeClass('clues-active');
					$('.active').removeClass('active');
					$('.current').removeClass('current');
					currIndex = 0;

					target = e.target;
					activePosition = $(e.target).data('position');
					
					util.highlightEntry();
					util.highlightClue();
										
					$('.active').eq(0).focus();
					$('.active').eq(0).select();
					$('.active').eq(0).addClass('current');
					
					// store orientation for 'smart' auto-selecting next input
					currOri = $('.clues-active').parent('ol').prop('id');
										
					activeClueIndex = $(clueLiEls).index(e.target);
					//console.log('updateByNav() activeClueIndex: '+activeClueIndex);
					
				},
			
				// Sets activePosition var and adds active class to current entry
				updateByEntry: function(e, next) {
					var classes, next, clue, e1Ori, e2Ori, e1Cell, e2Cell;
					
					if(e.keyCode === 9 || next){
						// handle tabbing through problems, which keys off clues and requires different handling		
						activeClueIndex = activeClueIndex === clueLiEls.length-1 ? 0 : ++activeClueIndex;
					
						$('.clues-active').removeClass('.clues-active');
												
						next = $(clueLiEls[activeClueIndex]);
						currOri = next.parent().prop('id');
						activePosition = $(next).data('position');
												
						// skips over already-solved problems
						util.getSkips(activeClueIndex);
						activePosition = $(clueLiEls[activeClueIndex]).data('position');
						
																								
					} else {
						activeClueIndex = activeClueIndex === clueLiEls.length-1 ? 0 : ++activeClueIndex;
					
						util.getActivePositionFromClassGroup(e.target);
						
						clue = $(clueLiEls + '[data-position=' + activePosition + ']');
						activeClueIndex = $(clueLiEls).index(clue);
						
						currOri = clue.parent().prop('id');
						
					}
						
						util.highlightEntry();
						util.highlightClue();
						
						//$actives.eq(0).addClass('current');	
						//console.log('nav.updateByEntry() reports activePosition as: '+activePosition);	
				}
				
			}; // end nav object

			
			var util = {
				highlightEntry: function() {
					// this routine needs to be smarter because it doesn't need to fire every time, only
					// when activePosition changes
					$actives = $('.active');
					$actives.removeClass('active');
					$actives = $('.position-' + activePosition + ' input').addClass('active');
					$actives.eq(0).focus();
					$actives.eq(0).select();
				},
				
				highlightClue: function() {
					var clue;				
					$('.clues-active').removeClass('clues-active');
					$(clueLiEls + '[data-position=' + activePosition + ']').addClass('clues-active');
					
					if (mode === 'interacting') {
						clue = $(clueLiEls + '[data-position=' + activePosition + ']');
						activeClueIndex = $(clueLiEls).index(clue);
					};
				},
				
				getClasses: function(light, type) {
					if (!light.length) return false;
					
					var classes = $(light).prop('class').split(' '),
					classLen = classes.length,
					positions = []; 

					// pluck out just the position classes
					for(var i=0; i < classLen; ++i){
						if (!classes[i].indexOf(type) ) {
							positions.push(classes[i]);
							//console.log(positions.push(classes[i]));
						}
					}
					
					return positions;
					//console.log(positions);
				},

				getActivePositionFromClassGroup: function(el){

						classes = util.getClasses($(el).parent(), 'position');
						//console.log(classes);

						if(classes.length > 1){
							// get orientation for each reported position
							e1Ori = $(clueLiEls + '[data-position=' + classes[0].split('-')[1] + ']').parent().prop('id');
							e2Ori = $(clueLiEls + '[data-position=' + classes[1].split('-')[1] + ']').parent().prop('id');
							//console.log(e1Ori + ' ' + e2Ori);
							
							// test if clicked input is first in series. If so, and it intersects with
							// entry of opposite orientation, switch to select this one instead
							e1Cell = $('.position-' + classes[0].split('-')[1] + ' input').index(el);
							e2Cell = $('.position-' + classes[1].split('-')[1] + ' input').index(el);
							//console.log(e1Cell + ' ' + e2Cell);

							if(mode === "setting ui"){
								currOri = e1Cell === 0 ? e1Ori : e2Ori; // change orientation if cell clicked was first in a entry of opposite direction
							}

							if(e1Ori === currOri){
								activePosition = classes[0].split('-')[1];		
							} else if(e2Ori === currOri){
								activePosition = classes[1].split('-')[1];
							}
						} else {
							activePosition = classes[0].split('-')[1];						
						}
//-------------------------------

						//nowdrow = $(el).attr('class');
						if ((typeof nowdrow !== "undefined") && ((nowdrow.indexOf("done") != -1)) && (
						($(el).val() !== solved[0][$('.position-' + classes[0].split('-')[1] + ' input').index(el)]) ||
						($(el).val() !== solved[0][$('.position-' + classes[1].split('-')[1] + ' input').index(el)])
						)) {
							if (solved[0][$('.position-' + classes[0].split('-')[1] + ' input').index(el)]) {
								$(el).val(solved[0][$('.position-' + classes[0].split('-')[1] + ' input').index(el)]);
							} else {
								$(el).val(solved[0][$('.position-' + classes[1].split('-')[1] + ' input').index(el)]);
							}
							
							$(el).animate({backgroundColor:"#FF0000", backgroundColor:"#FF0000", backgroundColor:"#FF0000", backgroundColor:"#FF0000"}, 50);
							$(el).animate({backgroundColor:"#FFF", backgroundColor:"#FFF", backgroundColor:"#FFF", backgroundColor:"#FFF"}, 700);
						}
						
				//-------------	
				
				//-------ajax--------------------------------------
							
							
							//console.log(object_crossword.all_minus);
							
						
							var z = 0;
							var minus = all_minus/5;
							//$(helpValue).val(minus);
							//console.log('minus' + all_minus);
							//console.log('j' + j);
														
					//-------ajax							
						if ((helpActive == true) && ($(helpValue).val() > 0) ) {
							
							
							mrt = puzz.data[activePosition].answer.toLowerCase();
							if (classes.length == 2) {
								$(el).val (mrt[$('.position-' + classes[1].split('-')[1] + ' input').index(el)]);
							} else {
								$(el).val (mrt[$('.position-' + classes[0].split('-')[1] + ' input').index(el)]);
							}
							
							j++;
							z = (j * 5);
							
							
							//console.log('_minus' + all_minus);
							//console.log('j' + j);
							//console.log('_z' + z);
														
							var data = {
								action: 'my_action',
								//whatever: object_crossword.all_minus,      // We pass php values differently!
								z: z
								
									};
								
							jQuery.post(
								object_crossword.ajaxurl,
								data,
								function(response) {
								//alert('minus: ' + response);
								$('#message_word').text('Вы использовали подсказку, с вас сняли 5 баллов');
								$('.rating').text(response);
								
						$(".entry-21").find(":input[type='text']").prop('disabled', false);
						//---------------
						$("#puzzle").find('[data-coords]').each(function(index){
							
						$input = $(this).find(":input");
							
			 			if($(this).attr('data-coords') == '8,9'){
   			 			//alert('hello');
			 			$input.prop('disabled', false);
			 			} else
						if($(this).attr('data-coords') == '14,6'){
   			 			//alert('hello');
			 			$input.prop('disabled', false);
			 			} else
						if($(this).attr('data-coords') == '10,12'){
   			 			//alert('hello');
			 			$input.prop('disabled', false);
			 			} else
						if($(this).attr('data-coords') == '14,12'){
   			 			//alert('hello');
			 			$input.prop('disabled', false);
			 			} else
						if($(this).attr('data-coords') == '11,15'){
   			 			//alert('hello');
			 			$input.prop('disabled', false);
			 			} else
						if($(this).attr('data-coords') == '3,18'){
   			 			//alert('hello');
			 			$input.prop('disabled', false);
			 			} else
						if($(this).attr('data-coords') == '1,20'){
   			 			//alert('hello');
			 			$input.prop('disabled', false);
			 			} else
						if($(this).attr('data-coords') == '8,22'){
   			 			//alert('hello');
			 			$input.prop('disabled', false);
			 			} else
						if($(this).attr('data-coords') == '9,24'){
   			 			//alert('hello');
			 			$input.prop('disabled', false);
			 			} else
						if($(this).attr('data-coords') == '5,25'){
   			 			//alert('hello');
			 			$input.prop('disabled', false);
			 			}
						});
				  //--------------------------------------------
				  
				  });
							
							
														
							$(helpValue).val($(helpValue).val()-1);
							console.log('val' + $(helpValue).val());
							//console.log('minus' + minus);
							 
							//---------
							helpActive = false;
							 
						}



//---------------------------
						//e3Cell = $('.position-' + classes[1].split('-')[1] + ' input').index(el);
						//console.log(e3Cell);
						
												
						$('.position-' + activePosition).click(function (event) {
							
							
    						//console.log($(this).attr('data-coords'));
							
							str = $(this).attr('data-coords');
							
							//if ( $(this).is('[data-coords="str"]') ) { $(this).find(':input').addClass('durdom'); }
							
							//console.log(ret);
							
							
							var substr = str.split(',');
							
							//console.log(substr[0]);
						
						
						
						//$(this).val(puzz.data[activePosition].answer[z]);
						//bukva=null;
			//---------------------------
						z = Math.abs(puzz.data[activePosition].startx - substr[0] - puzz.data[activePosition].answer.length);
						//console.log(z);
						bukva = puzz.data[activePosition].answer[z];
						//console.log(puzz.data[activePosition].answer[z]);
						});
			//-----------------------------
						//return bukva;
						//$('.entry-21 input:eq(1)').val(word[2])
						
						//console.log('getActivePositionFromClassGroup activePosition: '+activePosition);
						//console.log(puzz.data[activePosition].answer);
						//console.log(puzz.data[activePosition].answer.length);
						//console.log(puzz.data[activePosition].startx);
//-----------------------
						//console.log(puzz.data[activePosition]);
						//if(activePosition ==3){console.log(wordcontrol);}
						
				},
				
				//openletter : function(activePosition) {
				//},
				
				
				
				checkSolved: function(valToCheck) {
					for (var i=0, s=solved.length; i < s; i++) {
						if(valToCheck === solved[i]){
							return true;
						}

					}
				},
				
				getSkips: function(position) {
					if ($(clueLiEls[position]).hasClass('clue-done')){
						activeClueIndex = position === clueLiEls.length-1 ? 0 : ++activeClueIndex;
						util.getSkips(activeClueIndex);						
					} else {
						return false;
					}
				}
				
			}; // end util object

				
			puzInit.init();
			
			
	
							
	}
	
	
						
	//$("td").find("[data-coords='" + 7,35 +"']").remove;
	//$("td[data-coords='" + 7,35 +"']").addClass('clicked');
	//var my = $(".entry-21").data('data-coords','7,35');
	//console.log(my);
	//$('.entry-4 input:eq(4)').addClass('wselect');
	
})(MyJ);