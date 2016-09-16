<? ?>
<table align="center" width="780px">
<tr><td><font class="shrift-stock"><b>Редактирование меток на карте:</b></font></td></tr>
 <tr><td height="10px"></td></tr>
 <tr><td>Выбрать метоку:</td></tr>
<?
include_once("conf.php");
 $db = $conn;
  $res = $db->query("SELECT * FROM map ORDER BY id;");
  foreach ($res as $array)
			   {
			   	if(strlen($array['tipe'])>130) { $rezhim = substr($array['tipe'],0,130);	
		               $zagl = stripcslashes($rezhim."..."); }	
		        else { $zaglov = $array['tipe']; $zagl = stripcslashes($zaglov); }
		    echo("<tr><td><a href=\"\" onclick=\"if(getElementById('s".$array['id']."').style.display == 'none') { getElementById('s".$array['id']."').style.display = 'block'; } else { getElementById('s".$array['id']."').style.display = 'none'; } return false;\">".$zagl."</a></td></tr><tr><td><div class=\"blocknews\" style=\"display:none;\" id=\"s".$array['id']."\"><form method=\"post\" action=\"dob.php?map=red_map&red_map=click&nimer=".$array['id']."\" enctype=\"multipart/form-data\"><table><tr><td>Тип метки: </td><td><textarea name=\"tipe_map\" class=\"textarea-z\">".$array['tipe']."</textarea></td></tr><tr><td>json метки на карте: </td><td width=\"600px\"><textarea name=\"place\"class=\"textarea\">".stripcslashes($array['place'])."</textarea></td></tr><tr><td><input type=\"submit\" value=\"Редактировать\"/></td></tr></form><tr><td><a href=\"dob.php?map=red_map&delete=click&nomer=".$array['id']."\">Удалить телефон</a></td></tr></table></div>");     
		        }
?>
</table>
<?
if($_GET['delete']=="click") {
      $numer = $_GET['id'];
	  $res = $db->query("SELECT * FROM map WHERE id=$numer ;");
	foreach ($res as $array)  
         {
		  if($array['img']=="no") { $vremyan = $array['img']; } else { $vremyani = $array['img']; unlink($vremyani); }
		 }
	  $db->query("DELETE FROM map WHERE id=$numer ;");	
      echo '<script type="text/javascript"> function bodyOnLoad() { window.setTimeout(goToOtherPage, 1000); } function goToOtherPage() { window.location.href = "dob.php?map=red_map"; } </script>';
}  
 if($_GET['red_map']=="click") {
      $numer = $_GET['nimer'];
	  $tipe = $_POST['tipe_map'];
	  $place = $_POST['place'];
	  $db->query("UPDATE map SET tipe='$tipe' WHERE id=$numer ;");
	  $db->query("UPDATE map SET place='$place' WHERE id=$numer ;");	
      echo '<script type="text/javascript"> function bodyOnLoad() { window.setTimeout(goToOtherPage, 1000); } function goToOtherPage() { window.location.href = "dob.php?map=red_map"; } </script>';
}  
?> 
