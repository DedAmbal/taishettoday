<? ?>
<table align="center" width="780px">
<tr><td><font class="shrift-stock"><b>Редактирование статей:</b></font></td></tr>
 <tr><td height="10px"></td></tr>
 <tr><td>Выбрать статью:</td></tr>
<?
include_once("conf.php");
 $db = $conn;
  $res = $db->query("SELECT * FROM stocks ORDER BY id;");
  foreach ($res as $array)
			   {
			   	if(strlen($array['zag'])>130) { $rezhim = substr($array['zag'],0,130);	
		               $zagl = stripcslashes($rezhim."..."); }	
		        else { $zaglov = $array['zag']; $zagl = stripcslashes($zaglov); }
           echo("<tr><td><a href=\"\" onclick=\"if(getElementById('s".$array['id']."').style.display == 'none') { getElementById('s".$array['id']."').style.display = 'block'; } else { getElementById('s".$array['id']."').style.display = 'none'; } return false;\">".$zagl."</a> (".$array['date'].")</td></tr><tr><td><div class=\"blocknews\" style=\"display:none;\" id=\"s".$array['id']."\"><form method=\"post\" action=\"dob.php?stock=red&red=click&nimer=".$array['id']."\" enctype=\"multipart/form-data\"><table><tr><td>Заголовок: </td><td><textarea name=\"zagolov\" class=\"textarea-z\">".$array['zag']."</textarea></td></tr><tr><td>Текст: </td><td width=\"600px\"><textarea name=\"ostext\" class=\"textarea\">".stripcslashes($array['text'])."</textarea></td></tr><tr><td>Ссылка на источник: </td><td><textarea name=\"linkov\" class=\"textarea-z\">".$array['link']."</textarea></td></tr><tr><td><input type=\"submit\" value=\"Редактировать\"/></td></tr></form><tr><td><a href=\"dob.php?stock=red&delete=click&nomer=".$array['id']."\">Удалить новость</a></td></tr></table></div>");
			   }		   
?>
</table> 
<?  if($_GET['delete']=="click") {
      $numer = $_GET['nomer'];
	  $res = $db->query("SELECT * FROM stocks WHERE id=$numer ;");
	  foreach ($res as $array)  
         {
		  if($array['img']=="no") { $vremyan = $array['img']; } else { $vremyani = $array['img']; unlink($vremyani); }
		 }
	  $db->query("DELETE FROM stocks WHERE id=$numer ;");	
      echo '<script type="text/javascript"> function bodyOnLoad() { window.setTimeout(goToOtherPage, 1000); } function goToOtherPage() { window.location.href = "dob.php?stock=red"; } </script>';
}    
    if($_GET['red']=="click") {
      $numer = $_GET['nimer'];
	  $zagal = $_POST['zagolov'];
	  $ositext = stripcslashes($_POST['ostext']);
	  $linikov = $_POST['linkov'];
	  $db->query("UPDATE stocks SET zag='$zagal' WHERE id=$numer ;");
	  $db->query("UPDATE stocks SET text='$ositext' WHERE id=$numer ;");
	  $db->query("UPDATE stocks SET link='$linikov' WHERE id=$numer ;");	
      echo '<script type="text/javascript"> function bodyOnLoad() { window.setTimeout(goToOtherPage, 1000); } function goToOtherPage() { window.location.href = "dob.php?stock=red"; } </script>';
}
?>