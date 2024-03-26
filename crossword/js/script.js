(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		
		
		//$('.entry-17:eq(0)').append('<span class="myindex">17</span>');
						 
		
		var puzzleData = [
				{
					clue: "Заболевание, передаваемое половым путем.",
					answer: "гонорея",
					position: 1,
					orientation: "across",
					startx: 13,
					starty: 4
				},
				{
					clue: "Состояние, при котором происходит количественное и качественное изменение кишечного микробиоценоза.",
					answer: "дисбактериоз",
					position: 4,
					orientation: "across",
					startx: 4,
					starty: 9
				},
				{
					clue: "Образуется альфа-клетками поджелудочной железы. Усиливает процесс образования в печени фосфолипидов и этим способствует лучшему окислению жирных кислот.",
					answer: "Липокаин",
					position: 8,
					orientation: "across",
					startx: 13,
					starty: 7
				},
				
				
				
			 	
				{
					clue: "Наследственное заболевание, нарушение пищеварения, вызванное повреждением ворсинок тонкой кишки глютеном.",
					answer: "целиакия",
					position: 3,
					orientation: "down",
					startx: 18,
					starty: 3
				},
				
				{
					clue: "Воспаленный поверхностный лимфатический узел крупного калибра.",
					answer: "бубон",
					position: 2,
					orientation: "down",
					startx: 16,
					starty: 1
				},
				{
					clue: "Процедура эффективной глубокой  очистки толстого кишечника с выраженным оздоровительным эффектом.",
					answer: "гидроколонотерапия",
					position: 5,
					orientation: "down",
					startx: 5,
					starty: 8
				},
				{
					clue: "Воспаление слизистой оболочки пищевода.",
					answer: "эзофагит",
					position: 6,
					orientation: "down",
					startx: 8,
					starty: 5
				},
				{
					clue: "Маточное кровотечение, не связанное с овуляцией, повторяющееся через нерегулярные промежутки времени.",
					answer: "МЕТРОРРАГИЯ",
					position: 7,
					orientation: "down",
					startx: 11,
					starty: 8
				},
				{
					clue: "Инфекционное заболевание, возбудителем которого является цитомегаловирус, широко распространено, но часто протекает скрыто.",
					answer: "Цитомегалия",
					position: 9,
					orientation: "down",
					startx: 14,
					starty: 6
				},
				{
					clue: "Заболевание, при котором маленькие островки ткани, напоминающие слизистую оболочку полости матки располагаются вне матки.",
					answer: "эндометриоз",
					position: 10,
					orientation: "across",
					startx: 2,
					starty: 12
				},
				{
					clue: "Макромолекулярные вещества, которые вырабатываются иммунной системой в ответ на проникновение чужеродных агентов.",
					answer: "Антитела",
					position: 11,
					orientation: "down",
					startx: 3,
					starty: 11
				},
				{
					clue: "Защитный рефлекторный акт, который происходит при различных изменениях внешней среды или внутренней среды организма.",
					answer: "Рвота",
					position: 12,
					orientation: "down",
					startx: 9,
					starty: 12
				},
				{
					clue: "Панкреатический гормон, регулирующий углеводный обмен. Вырабатывается альфа-клетками островков Лангерганса, а также слизистой оболочкой желудка и кишечника.",
					answer: "Глюкагон",
					position: 13,
					orientation: "across",
					startx: 14,
					starty: 12
				},
				{
					clue: "Нарушение проходимости полого органа за счёт  поражения стенки органа.",
					answer: "Окклюзия",
					position: 14,
					orientation: "down",
					startx: 17,
					starty: 11
				},
				{
					clue: "Воспалительное заболевание слизистой оболочки двенадцатиперстной кишки.",
					answer: "Дуоденит",
					position: 15,
					orientation: "down",
					startx: 20,
					starty: 10
				},
				{
					clue: "Суженная часть пищеварительного тракта.",
					answer: "Стеноз",
					position: 16,
					orientation: "across",
					startx: 1,
					starty: 16
				},
				{
					clue: "Сеть современных лабораторий, которая входит в медицинский холдинг Medicover.",
					answer: "Синэво",
					position: 17,
					orientation: "down",
					startx: 1,
					starty: 16
				},
				{
					clue: "Воспаление оболочки стенки желудка, приводящее к нарушению его функций.",
					answer: "Гастрит",
					position: 18,
					orientation: "across",
					startx: 4,
					starty: 22
				},
				{
					clue: "Экспериментальный метод молекулярной биологии, позволяющий добиться значительного увеличения малых концентраций определённых фрагментов нуклеиновых кислот в биологическом материале.",
					answer: "ПЦР",
					position: 19,
					orientation: "down",
					startx: 8,
					starty: 20
				},
				{
					clue: "Неприятное чувство жжения с локализацией преимущественно в нижнем отделе пищевода. Оно известно большинству людей и нередко является признаком заболеваний желудочно-кишечного тракта.",
					answer: "Изжога",
					position: 20,
					orientation: "across",
					startx: 5,
					starty: 24
				}
				,
				{
					clue: "",
					answer: "аггравация",
					position: 21,
					orientation: "across",
					startx: 7,
					starty: 35
				}
				
				
			] 
	
		//$('#puzzle-wrapper').crossword(puzzleData);
		$('#puzzle-wrapper').crossword(puzzleData, "#helpbut", "#helpcounter");
		
	})
	
})(MyJ)