<? ?>
<table align="center" width="780px">
<tr><td><font class="shrift-stock"><b>Редактирование событий:</b></font></td></tr>
 <tr><td height="10px"></td></tr>
 <tr><td>Выбрать событие:</td></tr>
<?
 include_once("conf.php");
 $db = $conn;
  $res = $db->query("SELECT * FROM afisha ORDER BY id;");
   foreach ($res as $array)
			   {
			   	if(strlen($array['zag'])>130) { $rezhim = substr($array['zag'],0,130);	
		               $zagl = stripcslashes($rezhim."..."); }	
		        else { $zaglov = $array['zag']; $zagl = stripcslashes($zaglov); }
           echo("<tr><td><a href=\"\" onclick=\"if(getElementById('s".$array['id']."').style.display == 'none') { getElementById('s".$array['id']."').style.display = 'block'; } else { getElementById('s".$array['id']."').style.display = 'none'; } return false;\">".$zagl."</a> (".$array['date'].")</td></tr><tr><td><div class=\"blocknews\" style=\"display:none;\" id=\"s".$array['id']."\"><form method=\"post\" action=\"dob.php?afisha=red_afisha&red_afisha=click&nimer=".$array['id']."\" enctype=\"multipart/form-data\"><table><tr><td>Тип события: </td><td><textarea name=\"name_tipe\" class=\"textarea-z\">".$array['name_tipe']."</textarea></td></tr><tr><td>Заголовок: </td><td><textarea name=\"zagolov\" class=\"textarea-z\">".$array['zag']."</textarea></td></tr><tr><td>Текст: </td><td width=\"600px\"><textarea name=\"ostext\"class=\"textarea\">".stripcslashes($array['tipe'])."</textarea></td></tr>
<tr><td>Время когда произойдет: </td><td><textarea name=\"timeist\" class=\"textarea-z\">".$array['time']."</textarea></td></tr>
<tr><td>Где будет событие: </td><td><textarea name=\"place\" class=\"textarea-z\">".$array['place']."</textarea></td></tr>
<tr><td>Контакты:</td><td><textarea name=\"tel\" class=\"textarea-z\">".$array['tel']."</textarea></td></tr>
<tr><td>Цена: </td><td><textarea name=\"money\" class=\"textarea-z\">".$array['money']."</textarea></td></tr>           
<tr><td><input type=\"submit\" value=\"Редактировать\"/></td></tr></form><tr><td><a href=\"dob.php?afisha=red_afisha&delete=click&nomer=".$array['id']."\">Удалить событие</a></td></tr></table></div>");
			   }		   
?>
</table> 
<?  if($_GET['delete']=="click") {
      $numer = $_GET['nomer'];
	  $res = $db->query("SELECT * FROM afisha WHERE id=$numer ;");
	 foreach ($res as $array)  
         {
		  if($array['img']=="no") { $vremyan = $array['img']; } else { $vremyani = $array['img']; unlink($vremyani); }
		 }
	  $db->query("DELETE FROM afisha WHERE id=$numer ;");	
      echo '<script type="text/javascript"> function bodyOnLoad() { window.setTimeout(goToOtherPage, 1000); } function goToOtherPage() { window.location.href = "dob.php?afisha=red_afisha"; }</script>';
}    
    if($_GET['red_afisha']=="click") {
      $numer = $_GET['nimer'];
	  $zagal = $_POST['zagolov'];
	  $ositext = stripcslashes($_POST['ostext']);
	  $timefor = $_POST['timeist'];
	  $placefor = $_POST['place'];
	  $telfor = $_POST['tel'];
	  $moneyfor = $_POST['money'];
	  $view = $_POST['name_tipe'];
	  $db->query("UPDATE afisha SET zag='$zagal' WHERE id=$numer ;");
	  $db->query("UPDATE afisha SET tipe='$ositext' WHERE id=$numer ;");
	  $db->query("UPDATE afisha SET time='$timefor' WHERE id=$numer ;");
	  $db->query("UPDATE afisha SET place='$placefor' WHERE id=$numer ;");
	  $db->query("UPDATE afisha SET tel='$telfor' WHERE id=$numer ;");
	  $db->query("UPDATE afisha SET money='$moneyfor' WHERE id=$numer ;");
	  $db->query("UPDATE afisha SET name_tipe='$view' WHERE id=$numer ;");	
      echo '<script type="text/javascript"> function bodyOnLoad() { window.setTimeout(goToOtherPage, 1000); } function goToOtherPage() { window.location.href = "dob.php?afisha=red_afisha"; } </script>';
}
?>