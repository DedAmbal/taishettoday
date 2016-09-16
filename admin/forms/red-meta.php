<? ?>
<table align="center" width="780px">
<tr><td><font class="shrift-stock"><b>Редактирование мета-тегов:</b></font></td></tr>
 <tr><td height="10px"></td></tr>
 <tr><td>Выбрать страницу:</td></tr>
<?
  include_once("conf.php");
 $db = $conn; 
  $res = $db->query("SELECT * FROM meta ORDER BY id;");
   foreach ($res as $array)
			   {
		 		   	if(strlen($array['title'])>130) { $rezhim = substr($array['title'],0,130);	
		               $zagl = stripcslashes($rezhim."..."); }	
		        else { $zaglov = $array['title']; $zagl = stripcslashes($zaglov); }
  
           echo("<tr><td><a href=\"\" onclick=\"if(getElementById('s".$array['id']."').style.display == 'none') { getElementById('s".$array['id']."').style.display = 'block'; } else { getElementById('s".$array['id']."').style.display = 'none'; } return false;\">".$zagl."</a> </td></tr><tr><td><div class=\"blocknews\" style=\"display:none;\" id=\"s".$array['id']."\"><form method=\"post\" action=\"dob.php?metared=click&redmeta=click&nimer=".$array['id']."\" enctype=\"multipart/form-data\"><table><tr><td>Title: </td><td><textarea name=\"title\" class=\"textarea-z\">".$array['title']."</textarea></td></tr><tr><td>Description: </td><td width=\"600px\"><textarea name=\"description\" class=\"textarea\">".stripcslashes($array['description'])."</textarea></td></tr><tr><td>Keywords: </td><td><textarea name=\"keywords\" class=\"textarea-z\">".$array['keywords']."</textarea></td></tr><tr><td>Страница: </td><td><textarea name=\"page\" class=\"textarea-z\">".$array['page']."</textarea></td></tr><tr><td><input type=\"submit\" value=\"Редактировать\"/></td></tr></form><tr><td><a href=\"dob.php?stock=red&delete=click&nomer=".$array['id']."\">Удалить описание</a></td></tr></table></div>");
			   }		   
?>
</table> 
<?  if($_GET['delete']=="click") {
      $numer = $_GET['nomer'];
	  $res = $db->query( "SELECT * FROM meta WHERE id=$numer ;");
	while ($array = sqlite_fetch_array($res))  
         {
		 }
	 $db->query("DELETE FROM meta WHERE id=$numer ;");	
      echo '<script type="text/javascript"> function bodyOnLoad() { window.setTimeout(goToOtherPage, 1000); } function goToOtherPage() { window.location.href = "dob.php?metared=click"; } </script>';
}    
    if($_GET['redmeta']=="click") {
			$numer = $_GET['nimer'];
			$title = $_POST['title'];                  
      $title = stripcslashes(nl2br($title));
			$description = $_POST['description'];                  
      $description = stripcslashes(nl2br($description));
			$keywords = $_POST['keywords'];                  
      $keywords = stripcslashes(nl2br($keywords));
			$page = $_POST['page'];   
			          
			 
	 $db->query( "UPDATE meta SET title='$title' WHERE id=$numer ;");
	 $db->query( "UPDATE meta SET description='$description' WHERE id=$numer ;");
	  $db->query("UPDATE meta SET keywords='$keywords' WHERE id=$numer ;");
		$db->query("UPDATE meta SET page='$page' WHERE id=$numer ;");	
      echo '<script type="text/javascript"> window.location.href = "dob.php?metared=click"; </script>';
}
?>