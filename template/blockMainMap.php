<div id="heading">
	<h1>Карта Тайшета</h1>
</div>
<div class="mapLeftMap">
<nav>
	<ul class="aside-menu" style="display:none;" id="id1">
	<?php foreach (glob("json/*.json") as $filename) 
       { 
          $p_one = strrpos($filename, "/") + 1;
          $p_two = strpos($filename, ".") - 5;
          $name = mb_substr($filename, $p_one, $p_two);
          $name = str_replace('.json', '', $name);
					switch($name)
					{
		case 'avtotools': $name = '<li>Автозапчасти</li>'; break;
		case 'pharmacy': $name = '<li>Аптеки</li>'; break;
		case 'bank': $name = '<li>Банки и банкоматы</li>'; break;	
		case 'hospital': $name = '<li>Больницы</li>'; break;
		case 'tailor': $name = '<li>Утварь для дома</li>'; break;
		case 'administration': $name = '<li>Городское управление</li>'; break;
		case 'hotel': $name = '<li>Гостиницы</li>'; break;
		case 'pet': $name = '<li>Зоомагазины</li>'; break;	
		case 'kindergarten': $name = '<li>Детские сады</li>'; break;
		case 'monument': $name = '<li>Достопримечательности</li>'; break;
		case 'toy': $name = '<li>Игрушки</li>'; break;	
		case 'net': $name = '<li>Интернет провайдеры</li>'; break;			
		case 'tools': $name = '<li>Инструменты для дома</li>'; break;
		case 'restaurant': $name = '<li>Кафе, рестораны</li>'; break;	
		case 'furniture': $name = '<li>Мебель</li>'; break;	
		case 'Phones': $name = '<li>Мобильные операторы</li>'; break;
		case 'natarius': $name = '<li>Натариусы</li>'; break;	
		case 'boots': $name = '<li>Обувь</li>'; break;
		case 'oboy': $name = '<li>Обои</li>'; break;
		case 'clothes': $name = '<li>Одежда</li>'; break;
		case 'fish': $name = '<li>Охота и рыбалка</li>'; break;
		case 'hairsalon': $name = '<li>Парикмахерские</li>'; break;	
		case 'pension': $name = '<li>Пенсионные фонды</li>'; break;						
		case 'postal': $name = '<li>Почты</li>'; break;
		case 'fun': $name = '<li>Развлечения в Тайшете</li>'; break;
		case 'wedding': $name = '<li>Свадебные салоны</li>'; break;
		case 'computer': $name = '<li>Сотовые и компьютеры</li>'; break;
		case 'sport': $name = '<li>Спорт</li>'; break;
		case 'equipment': $name = '<li>Техника и электорника</li>';break;
		case 'theater': $name = '<li>Театры и музеи</li>'; break;
		case 'store': $name = '<li>Торговые центры</li>'; break;
		case 'tur': $name = '<li>Тур. фирмы</li>'; break;
		case 'books': $name = '<li>Книги и концтовары</li>'; break;
		case 'jewelry': $name = '<li>Ювелирные салоны</li>'; break;					
		case 'photo': $name = '<li>Фото и ксерокопии</li>'; break;
		case 'church': $name = '<li>Церкви</li>'; break;					
		case 'school': $name = '<li>Школы</li>'; break;
		case 'dry-cleaning': $name = '<li>Химчистки</li>'; break;
		case 'parcovca': $name = '<li>Автостоянки</li>'; break;
		
		}
					
					
					echo '<a href="javascript:void(0);" onclick="changeView(this, \''.$filename.'\');">'.$name.'</a> '; 
       }; 
          
?>
	</ul>
</nav>
</div>
<section>
	<div id="blockMainMap">
	
	
	</div>
</section>
