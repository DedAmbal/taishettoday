<?php
$beta = $_SERVER['REQUEST_URI'];
// ----- галвное меню
  $menu[0][0]='Главная';
  $menu[0][1]='/index.php';
  $menu[1][0]='Афиша';
  $menu[1][1]='/afisha.php';
  $menu[2][0]='Библиотека';
  $menu[2][1]='/library.php';
  $menu[3][0]='Расписания';
  $menu[3][1]='/raspisaniya_avtobusov_taishet.php';
  $menu[4][0]='Фото галерея';
  $menu[4][1]='/galary.php';
  $menu[5][0]='Телефоны';
  $menu[5][1]='/telefon.php';
  
  if(strripos($beta, $menu[0][1])!==false) { $title_two = "Главная страница"; $get_in = 0; }
  if(strripos($beta, $menu[1][1])!==false) { $title_two = "Афиша"; $get_in = 1; }
  if(strripos($beta, $menu[2][1])!==false) { $title_two = "Библиотека Тайшета"; $get_in = 2; }
  if(strripos($beta, $menu[3][1])!==false) { $title_two = "Расписания в Тайшете"; $get_in = 3; }
  if(strripos($beta, $menu[4][1])!==false) { $title_two = "Фотоотчеты Тайшета"; $get_in = 4; }
  if(strripos($beta, $menu[5][1])!==false) { $title_two = "Телефоны Тайшета"; $get_in = 5; }
  
   $db = new PDO("sqlite:admin/post3.db");
	$res = $db->query("SELECT * FROM meta WHERE page='$beta';");
	foreach ($res as $row)
	{
		$page_title = $row['title'];
		$page_description = $row['description'];
		$page_keywords = $row['keywords'];
	}

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">';
echo '<html><head><meta charset="utf-8">';
echo '<title>'.$page_title.'</title>';
echo '<link rel="icon" href="/favicon.png">';
echo '<meta name="description" content="'.$page_description.'"/>';
echo '<meta name="keywords" content="'.$page_keywords.'"/>';
echo '<script type="text/javascript" src="/js/main.js"></script><script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><script src="jquery.validate.pack.js" type="text/javascript"></script>';
echo '<link rel="stylesheet" href="/css/main.css" type="text/css"/>';
echo '</head><body>';
?>
