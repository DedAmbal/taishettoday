
	
<div class="pageBookBlock">
	<?php
	
	$start = "novosti";
    $db = new PDO("sqlite:admin/post3.db");
  
  if($_GET['novosti']=="click" or $start=="novosti") {
   $res = $db->query("SELECT * FROM stocks WHERE id > 50 LIMIT 4;");
   
   if($_GET['news']=="click") { $start = "novosti";
    $fog = $_GET['nom'];
  	$res = $db->query("SELECT * FROM stocks WHERE id=$fog;");
	foreach ($res as $array)   
         {
	echo("<div><a href=\"index.php\">Вернуться на главную</a></div><div class=\"zagol\">".$array['zag']."</div><div class=\"text\">".stripcslashes($array['text'])."</div>");
         }
		 }   
   else{
   foreach ($res as $array)   
         { 
		 if(strlen($array['text'])>300) { $osnovtexti = substr($array['text'],0,300);	
		 $osnovtext = stripcslashes($osnovtexti."..."); }	
		 else { $osnovtext = stripcslashes($array['text']); }
         echo("<div class=\"smallBlogArticle\">");
         
         echo("<p class=\"zagol\">".$array['zag']."</p>");

		 echo("<p>".$osnovtext."</p>");
	   if(strlen($array['text'])>300){
		 echo("<div class=\"text\"><a href=\"/".$array['id']."\">Читать главу</a></div>");}
		 echo("</div>");
         }   
       }
     }
	
	?>
</div>





