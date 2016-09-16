<? ?>
<table align="center" width="780px">
<tr><td><font class="shrift-stock"><b>Редактирование меню:</b></font></td></tr>
 <tr><td height="10px"></td></tr>
 <tr><td>Выбрать пункт меню:</td></tr>
<?
  include_once("conf.php");
 $db = $conn;
  $res = $db->query("SELECT * FROM menu ORDER BY id;");
   foreach ($res as $array)
			  {
			   	if(strlen($array['name'])>130) { $rezhim = substr($array['name'],0,130);	
		               $zagl = stripcslashes($rezhim."..."); }	
		        else { $zaglov = $array['name']; $zagl = stripcslashes($zaglov); }
 echo("<tr><td><a href=\"\" onclick=\"if(getElementById('s".$array['id']."').style.display == 'none') { getElementById('s".$array['id']."').style.display = 'block'; } else { getElementById('s".$array['id']."').style.display = 'none'; } return false;\">".$zagl."</a></td></tr><tr><td><div class=\"blocknews\" style=\"display:none;\" id=\"s".$array['id']."\"><form method=\"post\" action=\"dob.php?menu=red_menu&red_menu=click&nimer=".$array['id']."\" enctype=\"multipart/form-data\"><table><tr><td>Тип меню </td><td><textarea name=\"tipe\" class=\"textarea-z\">".$array['tipe']."</textarea></td></tr><tr><td>Название пункта меню </td><td><textarea name=\"name\" class=\"textarea-z\">".$array['name']."</textarea></td></tr><tr><td>Ссылка на источник </td><td><textarea name=\"link\" class=\"textarea-z\">".$array['link']."</textarea></td></tr><tr><td><input type=\"submit\" value=\"Редактировать\"/></td></tr></form><tr><td><a href=\"dob.php?menu=red_menu&delete=click&nomer=".$array['id']."\">Удалить меню</a></td></tr></table></div>");
			   }		   
?>
</table> 
<?  if($_GET['delete']=="click") {
      $nomer = $_GET['nomer'];
	  $res = $db->query("SELECT * FROM menu WHERE id=$nomer ;");
	foreach ($res as $array)  
	  $db->query("DELETE FROM menu WHERE id=$nomer ;");	
      echo '<script type="text/javascript"> function bodyOnLoad() { window.setTimeout(goToOtherPage, 1000); } function goToOtherPage() { window.location.href = "dob.php?menu=red_menu"; } </script>';
}    
    if($_GET['red_menu']=="click") {
       $nomer = $_GET['nimer'];
       $name = $_POST['name'];                  
       $link = $_POST['link'];
       $tipe = $_POST['tipe'];
	  $db->query( "UPDATE menu SET name='$name' WHERE id=$nomer ;");
	  $db->query( "UPDATE menu SET link='$link' WHERE id=$nomer ;");
	  $db->query( "UPDATE menu SET tipe='$tipe' WHERE id=$nomer ;");	
      echo '<script type="text/javascript"> function bodyOnLoad() { window.setTimeout(goToOtherPage, 1000); } function goToOtherPage() { window.location.href = "dob.php?menu=red_menu"; } </script>';
}
?>