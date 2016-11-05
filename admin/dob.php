<?
 session_start();
 $zag = "Администратор сайта";
 include "config.php";
 include_once("conf.php");
 if(!$_SESSION['login'] & !$_SESSION['password'])
   {
 
?>
   <table align="center" width="800px"><tr><td align="center" height="100px">
           <font class="shrift"><? echo "У вас нет права доступа на эту страницу"; ?></font>
   </td></tr></table>
<?	
   }
 else
   {
    if(!$_SESSION['login'] & !$_SESSION['password'])
	  {
?>
    <table align="center" width="800px"><tr><td align="center" height="100px">
           <font class="shrift"><? echo "У вас нет права доступа на эту страницу"; ?></font>
    </td></tr></table>       
<?	
	  }
	else
      {
       include "menu.php";	// выводим меню
       
       if ($_GET['tel']=="click") { include "forms/form_tel.php"; }// форма работы с телефонами
       if ($_GET['tel']=="red_tel") { include "forms/red_tel.php"; }// форма работы с редакцией телефоннов
       if ($_GET['menu']=="click") { include "forms/form_menu.php"; }// форма работы с телефонами
       if ($_GET['menu']=="red_menu") { include "forms/red_menu.php"; }// форма работы с редакцией телефоннов
	   if ($_GET['citati']=="click") { include "forms/quotes.php"; } // форма работы с Метатегами
	   if ($_GET['metared']=="click") { include "forms/red-meta.php"; }// форма редактирования мета-тегов
	   if ($_GET['afisha']=="click") { include "forms/afisha.php"; } 
	   if ($_GET['afisha']=="red_afisha") { include "forms/red_afisha.php"; } 
       if ($_GET['stock']=="dob") { include "forms/form.php"; } // форма добавления Новости
       if ($_GET['stock']=="red") { include "forms/red.php"; } // форма редактирования Новости
       if ($_GET['foto']=="click") { include "forms/foto.php"; } // форма добавления метки на карту
       if ($_GET['foto']=="red_foto") { include "forms/red_foto.php"; } // форма редактирования метки на карте
	   if ($_GET['admin']=="exit") // Выход из админки
          {
          	$_SESSION['login'] = "1";
            $_SESSION['password'] = "1";
            session_destroy();
          	echo '<script type="text/javascript">window.location = "http://preweb.taishettoday.ru" </script>'; 
          } 
       if ($_GET['afisha']=="dob") { include "forms/afisha.php"; } // Форма добавления фотографии в галерею
// ------------ Обработка и добавление событий в афишу ----------------       
       if ($_GET['afisha']=="action") 
          { 
            $db = $conn;
            if (!$db) { echo('<font class="shrift-stock">&nbsp;&nbsp;Не удалось открыть базу данных!</font>'); }
            else
               {
			   $prezag = $_POST['text-zag'];
			   $zagolovok = stripcslashes($prezag);                  
               $textis = $_POST['tipe'];
               $text = stripcslashes(nl2br($textis));
			   $img = $_POST['big'];
			   $date = $_POST['date'];
			   $time = $_POST['timeist'];
			   $place = $_POST['place'];
			   $tel = $_POST['tel'];
			   $money = $_POST['money'];
			   $view = $_POST['name_tipe'];
			   $adress = $_POST['adress'];
			   }                
               $query_insert = $db->query("INSERT INTO afisha(name_tipe, img, zag, date, time, place, tel, money, tipe, adress) VALUES ('$view' ,'$img', '$zagolovok', '$date', '$time', '$place', '$tel', '$money', '$text', '$adress');");	
    
               if ($query_insert) { echo ('<font class="shrift-stock">&nbsp;&nbsp;Событие добавлено.&nbsp;&nbsp;</font>'); }
               }
          }  
          // ------------ Обработка и добавление меток на карту ---------------- 
          if ($_GET["foto"]=="action")
          {
		  	$db = $conn;
		  	if (!$db) { echo('<font class="shrift-stock">&nbsp;&nbsp;Не удалось открыть базу данных!</font>'); }
				else{
					$tipe = $_POST["foto_tipe"];
					$title = $_POST["foto_title"];
					$alt = $_POST["foto_alt"];
					$img = $_POST["foto_img"];
				}
				 $query_insert = $db->query("INSERT INTO foto(tipe, title, alt, img) VALUES ('$tipe', '$title', '$alt', '$img');");
				 if ($query_insert) { echo ('<font class="shrift-stock">&nbsp;&nbsp;Фото добавлены.&nbsp;&nbsp;</font>'); }
		  }
          
          
          // ------------ Обработка и добавление пунктов меню ----------------       
       if ($_GET['menu']=="action") 
          { 
            $db = $conn; 
            if (!$db) { echo('<font class="shrift-stock">&nbsp;&nbsp;Не удалось открыть базу данных!</font>'); }
            else
               {
			   $name = $_POST['name'];
			   $name_menu = stripcslashes($name);                  
               $link = $_POST['link'];
               $tipe = $_POST['tipe'];
			   $tipe_menu = stripcslashes($tipe);
			   }                
               $query_insert = $db->query("INSERT INTO menu(name, tipe, link) VALUES ('$name' ,'$tipe', '$link');");	
    
               if ($query_insert) { echo ('<font class="shrift-stock">&nbsp;&nbsp;Пункт меню добавлен.&nbsp;&nbsp;</font>'); }
               }
          } 
// ------------ Обработка и добавление статей ----------------       
       if ($_GET['stock']=="action") 
          { 
          $db = $conn;
            if (!$db) { echo('<font class="shrift-stock">&nbsp;&nbsp;Не удалось открыть базу данных!</font>'); }
            else
               {
			   $prezag = $_POST['text-zag'];
			   $zagolovok = stripcslashes($prezag);                  
               $textis = $_POST['text-stock'];
               $text = stripcslashes(nl2br($textis));
			   $img = $_POST['big'];
			   $date = $_POST['date'];
			   $link = $_POST['linkist'];
			   }                
               /*$query_table = sqlite_query($db, "CREATE TABLE stocks (id INTEGER PRIMARY KEY, text TEXT, img TEXT, zag TEXT);");*/
               $query_insert = $db->query("INSERT INTO stocks(text, img, zag, date, link) VALUES ('$text' ,'$img', '$zagolovok', '$date', '$link');");	
    
               if ($query_insert) { echo ('<font class="shrift-stock">&nbsp;&nbsp;Статья добавлена.&nbsp;&nbsp;</font>'); }
               }       
// ------------ Обработка и добавление телефонов ----------------       
       if ($_GET['tel']=="action") 
          { 
            $db = $conn;
            if (!$db) { echo('<font class="shrift-stock">&nbsp;&nbsp;Не удалось открыть базу данных!</font>'); }
            else
               {
			   $orgPre = $_POST['org'];
			   $org = stripcslashes($orgPre);                  
               $adressPre = $_POST['adress'];
               $adress = stripcslashes(nl2br($adressPre));
			   $tipe = $_POST['tipe'];
			   $tel_nom = $_POST['tel_nom'];
			   }                
               
               $query_insert = $db->query("INSERT INTO tel(org, adress, tipe, tel_nom) VALUES ('$org' ,'$adress', '$tipe', '$tel_nom');");	
    
               if ($query_insert) { echo ('<font class="shrift-stock">&nbsp;&nbsp;Телефон добавлен.&nbsp;&nbsp;</font>'); }
               }
          
// ------------ Конец обработки и добавления Акции----------------                     
  if($_GET['citati']=="action"){
	 	$db = $conn; 
            if (!$db) { echo('<font class="shrift-stock">&nbsp;&nbsp;Не удалось открыть базу данных!</font>'); }
            else
               {
			   $title = $_POST['title'];                  
         $title = stripcslashes(nl2br($title));
				 $description = $_POST['description'];                  
         $description = stripcslashes(nl2br($description));
				 $keywords = $_POST['keywords'];                  
         $keywords = stripcslashes(nl2br($keywords));
				 $page = $_POST['page'];             
			   
			   }                
               
               $query_insert = $db->query("INSERT INTO meta(title, description, keywords, page) VALUES ('$title' ,'$description', '$keywords', '$page');");	
    
               if ($query_insert) { echo ('<font class="shrift-stock">&nbsp;&nbsp;Мета-теги добавлены&nbsp;&nbsp;</font>'); }
	 }
      
  include "end_page.php";  
?>
