(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		
		
		//$('.entry-17:eq(0)').append('<span class="myindex">17</span>');
						 
		
		var puzzleData = [
				{
					clue: "Заболевание, передаваемое половым путем.",
					answer: "Синэво",
					position: 1,
					orientation: "across",
					startx: 2,
					starty: 3
				},
				{
					clue: "Состояние, при котором происходит количественное и качественное изменение кишечного микробиоценоза.",
					answer: "Гистероскопия",
					position: 2,
					orientation: "across",
					startx: 7,
					starty: 2
				},
				{
					clue: "",
					answer: "Гомоцистеин",
					position: 3,
					orientation: "down",
					startx: 7,
					starty: 2
				},
				
				
				
			 	
				{
					clue: "Наследственное заболевание, нарушение пищеварения, вызванное повреждением ворсинок тонкой кишки глютеном.",
					answer: "Тошнота",
					position: 4,
					orientation: "down",
					startx: 13,
					starty: 1
				},
				
				{
					clue: "Воспаленный поверхностный лимфатический узел крупного калибра.",
					answer: "гайморит",
					position: 5,
					orientation: "across",
					startx: 1,
					starty: 7
				},
				{
					clue: "Процедура эффективной глубокой  очистки толстого кишечника с выраженным оздоровительным эффектом.",
					answer: "Плацента",
					position: 6,
					orientation: "down",
					startx: 2,
					starty: 5
				},
				{
					clue: "Воспаление слизистой оболочки пищевода.",
					answer: "Остеопороз",
					position: 7,
					orientation: "across",
					startx: 7,
					starty: 5
				},
				{
					clue: "Маточное кровотечение, не связанное с овуляцией, повторяющееся через нерегулярные промежутки времени.",
					answer: "Опухоль",
					position: 8,
					orientation: "down",
					startx: 15,
					starty: 5
				},
				{
					clue: "Инфекционное заболевание, возбудителем которого является цитомегаловирус, широко распространено, но часто протекает скрыто.",
					answer: "Сальпингит",
					position: 9,
					orientation: "across",
					startx: 1,
					starty: 12
				},
				{
					clue: "Заболевание, при котором маленькие островки ткани, напоминающие слизистую оболочку полости матки располагаются вне матки.",
					answer: "Диетология",
					position: 10,
					orientation: "across",
					startx: 4,
					starty: 9
				},
				{
					clue: "Макромолекулярные вещества, которые вырабатываются иммунной системой в ответ на проникновение чужеродных агентов.",
					answer: "Обструкция",
					position: 11,
					orientation: "down",
					startx: 10,
					starty: 9
				},
				{
					clue: "Защитный рефлекторный акт, который происходит при различных изменениях внешней среды или внутренней среды организма.",
					answer: "Гимен",
					position: 12,
					orientation: "across",
					startx: 2,
					starty: 19
				},
				{
					clue: "Панкреатический гормон, регулирующий углеводный обмен. Вырабатывается альфа-клетками островков Лангерганса, а также слизистой оболочкой желудка и кишечника.",
					answer: "Кольпит",
					position: 13,
					orientation: "down",
					startx: 3,
					starty: 14
				},
				{
					clue: "Нарушение проходимости полого органа за счёт  поражения стенки органа.",
					answer: "Аденоидит",
					position: 14,
					orientation: "across",
					startx: 5,
					starty: 17
				},
				{
					clue: "Воспалительное заболевание слизистой оболочки двенадцатиперстной кишки.",
					answer: "Агенезия",
					position: 15,
					orientation: "down",
					startx: 5,
					starty: 17
				},
				{
					clue: "Суженная часть пищеварительного тракта.",
					answer: "Кандидоз",
					position: 16,
					orientation: "across",
					startx: 10,
					starty: 15
				},
				{
					clue: "Сеть современных лабораторий, которая входит в медицинский холдинг Medicover.",
					answer: "Витилиго",
					position: 17,
					orientation: "across",
					startx: 4,
					starty: 23
				},
				{
					clue: "Воспаление оболочки стенки желудка, приводящее к нарушению его функций.",
					answer: "Экзема",
					position: 18,
					orientation: "across",
					startx: 7,
					starty: 21
				},
				{
					clue: "Экспериментальный метод молекулярной биологии, позволяющий добиться значительного увеличения малых концентраций определённых фрагментов нуклеиновых кислот в биологическом материале.",
					answer: "Миома",
					position: 19,
					orientation: "down",
					startx: 11,
					starty: 21
				},
				{
					clue: "Неприятное чувство жжения с локализацией преимущественно в нижнем отделе пищевода. Оно известно большинству людей и нередко является признаком заболеваний желудочно-кишечного тракта.",
					answer: "Антрум",
					position: 20,
					orientation: "across",
					startx: 11,
					starty: 25
				}
				,
				{
					clue: "",
					answer: "миоглобин",
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