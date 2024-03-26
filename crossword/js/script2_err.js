(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		
		
		//$('.entry-17:eq(0)').append('<span class="myindex">17</span>');
						 
		
		var puzzleData = [
				{
					clue: "Заболевание, передаваемое половым путем.",
					answer: "Гарднереллез",
					position: 1,
					orientation: "across",
					startx: 2,
					starty: 4
				},
				{
					clue: "Состояние, при котором происходит количественное и качественное изменение кишечного микробиоценоза.",
					answer: "Катаракта",
					position: 2,
					orientation: "down",
					startx: 3,
					starty: 3
				},
				{
					clue: "",
					answer: "Дисменорея",
					position: 3,
					orientation: "down",
					startx: 5,
					starty: 4
				},
				
				
				
			 	
				{
					clue: "Наследственное заболевание, нарушение пищеварения, вызванное повреждением ворсинок тонкой кишки глютеном.",
					answer: "Олегранулема",
					position: 4,
					orientation: "down",
					startx: 7,
					starty: 2
				},
				
				{
					clue: "Воспаленный поверхностный лимфатический узел крупного калибра.",
					answer: "Электрокардиография",
					position: 5,
					orientation: "down",
					startx: 10,
					starty: 3
				},
				{
					clue: "Процедура эффективной глубокой  очистки толстого кишечника с выраженным оздоровительным эффектом.",
					answer: "ДИСТРОФИЯ",
					position: 6,
					orientation: "across",
					startx: 13,
					starty: 8
				},
				{
					clue: "Воспаление слизистой оболочки пищевода.",
					answer: "Синэво",
					position: 7,
					orientation: "down",
					startx: 14,
					starty: 7
				},
				{
					clue: "Маточное кровотечение, не связанное с овуляцией, повторяющееся через нерегулярные промежутки времени.",
					answer: "Рефлорация",
					position: 8,
					orientation: "down",
					startx: 17,
					starty: 8
				},
				{
					clue: "Инфекционное заболевание, возбудителем которого является цитомегаловирус, широко распространено, но часто протекает скрыто.",
					answer: "Фибротест",
					position: 9,
					orientation: "down",
					startx: 20,
					starty: 7
				},
				{
					clue: "Заболевание, при котором маленькие островки ткани, напоминающие слизистую оболочку полости матки располагаются вне матки.",
					answer: "Трихомониаз",
					position: 10,
					orientation: "across",
					startx: 8,
					starty: 14
				},
				{
					clue: "Макромолекулярные вещества, которые вырабатываются иммунной системой в ответ на проникновение чужеродных агентов.",
					answer: "Микоплазмоз",
					position: 11,
					orientation: "down",
					startx: 13,
					starty: 14
				},
				{
					clue: "Защитный рефлекторный акт, который происходит при различных изменениях внешней среды или внутренней среды организма.",
					answer: "Рубец",
					position: 12,
					orientation: "across",
					startx: 17,
					starty: 13
				},
				{
					clue: "Панкреатический гормон, регулирующий углеводный обмен. Вырабатывается альфа-клетками островков Лангерганса, а также слизистой оболочкой желудка и кишечника.",
					answer: "Ангиэктазия",
					position: 13,
					orientation: "across",
					startx: 8,
					starty: 16
				},
				{
					clue: "Нарушение проходимости полого органа за счёт  поражения стенки органа.",
					answer: "Автоматизм",
					position: 14,
					orientation: "down",
					startx: 8,
					starty: 16
				},
				{
					clue: "Воспалительное заболевание слизистой оболочки двенадцатиперстной кишки.",
					answer: "Абсцесс",
					position: 15,
					orientation: "down",
					startx: 15,
					starty: 16
				},
				{
					clue: "Суженная часть пищеварительного тракта.",
					answer: "Приапизм",
					position: 16,
					orientation: "across",
					startx: 1,
					starty: 20
				},
				{
					clue: "Сеть современных лабораторий, которая входит в медицинский холдинг Medicover.",
					answer: "Сифилис",
					position: 17,
					orientation: "down",
					startx: 3,
					starty: 19
				},
				{
					clue: "Воспаление оболочки стенки желудка, приводящее к нарушению его функций.",
					answer: "Агевзия",
					position: 18,
					orientation: "across",
					startx: 13,
					starty: 20
				},
				{
					clue: "Экспериментальный метод молекулярной биологии, позволяющий добиться значительного увеличения малых концентраций определённых фрагментов нуклеиновых кислот в биологическом материале.",
					answer: "Облысение",
					position: 19,
					orientation: "across",
					startx: 1,
					starty: 23
				},
				{
					clue: "Неприятное чувство жжения с локализацией преимущественно в нижнем отделе пищевода. Оно известно большинству людей и нередко является признаком заболеваний желудочно-кишечного тракта.",
					answer: "ПСА",
					position: 20,
					orientation: "across",
					startx: 2,
					starty: 25
				}
				,
				{
					clue: "",
					answer: "аскаридоз",
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