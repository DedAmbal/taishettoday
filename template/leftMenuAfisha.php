<div id="heading">
	<h1>Афиша</h1>
</div>
<aside>
<nav>
	<ul class="aside-menu">
	<?php 
	$db = new PDO("sqlite:admin/post3.db");
  	$res = $db->query("SELECT COUNT(id) FROM afisha WHERE name_tipe = 'постоянные события';");
  	$resTwo = $db->query("SELECT COUNT(id) FROM afisha WHERE name_tipe = 'кино';");
  	$resThree = $db->query("SELECT COUNT(id) FROM afisha WHERE name_tipe = 'сауны';");
  	$resFore = $db->query("SELECT COUNT(id) FROM afisha WHERE name_tipe = 'спорт';");
  	$resFive = $db->query("SELECT COUNT(id) FROM afisha WHERE name_tipe = 'отдых';");
  	$resSix = $db->query("SELECT COUNT(id) FROM afisha WHERE name_tipe = 'обучение';");
  	$rows= $res->fetchColumn();
    /*$resOne = count($rows);*/
  	$rowsTwo= $resTwo->fetchColumn();
    /*$resTwo = count($rowsTwo);*/
    $rowsThree= $resThree->fetchColumn();
    /*$resThree = count($rowsThree);*/
    $rowsFore= $resFore->fetchColumn();
    /*$resFore = count($rowsFore);*/
    $rowsFive= $resFive->fetchColumn();
    /*$resFive = count($rowsFive);*/
     $rowsSix= $resSix->fetchColumn();
  	
		echo("<li><a href=\"afisha.php\">В кино</a><p class=\"blueBlock\">".$rowsTwo."</p></li>");
		echo("<li><a href=\"saunaAfisha.php\">Сауны<p class=\"blueBlock\">".$rowsThree."</p></a></li>");
		echo("<li><a href=\"sportAfisha.php\">Спорт<p class=\"blueBlock\">".$rowsFore."</p></a></li>");
		echo("<li><a href=\"restAfisha.php\">Отдых<p class=\"blueBlock\">".$rowsFive."</p></a></li>");
		echo("<li><a href=\"aducationAfisha.php\">Обучение<p class=\"blueBlock\">".$rowsSix."</p></a></li>");
		echo("<li><a href=\"sityAfisha.php\">Мероприятия<p class=\"blueBlock\">".$rows."</p></a></li>");
		?>
	</ul>
</nav>
</aside>