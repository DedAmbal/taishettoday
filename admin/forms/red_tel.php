<? ?>
<table align="center" width="780px">
<tr><td><font class="shrift-stock"><b>Редактирование телефонов:</b></font></td></tr>
 <tr><td height="10px"></td></tr>
 <tr><td>Выбрать телефон:</td></tr>
<?
include_once("conf.php");
 $db = $conn;
  $res = $db->query("SELECT * FROM tel ORDER BY id;");
    foreach ($res as $array)
			   {
			   	if(strlen($array['org'])>130) { $rezhim = substr($array['org'],0,130);	
		               $zagl = stripcslashes($rezhim."..."); }	
		        else { $zaglov = $array['org']; $zagl = stripcslashes($zaglov); }
           echo("<tr><td><a href=\"\" onclick=\"if(getElementById('s".$array['id']."').style.display == 'none') { getElementById('s".$array['id']."').style.display = 'block'; } else { getElementById('s".$array['id']."').style.display = 'none'; } return false;\">".$zagl."</a></td></tr><tr><td><div class=\"blocknews\" style=\"display:none;\" id=\"s".$array['id']."\"><form method=\"post\" action=\"dob.php?tel=red&red=click&nimer=".$array['id']."\" enctype=\"multipart/form-data\"><table><tr><td>Тип организации: </td><td><textarea name=\"id\" class=\"textarea-z\">".$array['tipe']."</textarea></td></tr><tr><td>Название организации: </td><td><textarea name=\"org\" class=\"textarea-z\">".$array['org']."</textarea></td></tr><tr><td>Адресс организации: </td><td><textarea name=\"adress\" class=\"textarea-z\">".$array['adress']."</textarea></td></tr><tr><td>Телефон организации: </td><td><textarea name=\"tel_nom\" class=\"textarea-z\">".$array['tel_nom']."</textarea></td></tr><tr><td><input type=\"submit\" value=\"Редактировать\"/></td></tr></form><tr><td><a href=\"dob.php?tel=red_tel&delete=click&nomer=".$array['id']."\">Удалить телефон</a></td></tr></table></div>");
			   }		   
?>
</table> 
<?  if($_GET['delete']=="click") {
      $numer = $_GET['id'];
	  $res = $db->query("SELECT * FROM tel WHERE id=$numer ;");
	foreach ($res as $array)  
         {
		  if($array['img']=="no") { $vremyan = $array['img']; } else { $vremyani = $array['img']; unlink($vremyani); }
		 }
	  $db->query("DELETE FROM tel WHERE id=$numer ;");	
      echo '<script type="text/javascript"> function bodyOnLoad() { window.setTimeout(goToOtherPage, 1000); } function goToOtherPage() { window.location.href = "dob.php?tel=red_tel"; } </script>';
}    
    if($_GET['red_tel']=="click") {
      $numer = $_GET['nimer'];
	  $org = $_POST['org'];
	  $adress = $_POST['adress'];
	  $tel_nom = $_POST['tel_nom'];
	  $db->query("UPDATE tel SET org='$org' WHERE id=$numer ;");
	  $db->query("UPDATE tel SET adress='$adress' WHERE id=$numer ;");
	  $db->query("UPDATE tel SET tel_nom='$tel_nom' WHERE id=$numer ;");	
      echo '<script type="text/javascript"> function bodyOnLoad() { window.setTimeout(goToOtherPage, 1000); } function goToOtherPage() { window.location.href = "dob.php?tel=red_tel"; } </script>';
}
?>