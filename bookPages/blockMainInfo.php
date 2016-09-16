
	<?php if($_GET['open']=='click')
{
echo "<div class=\"pageBookBlockMain\">";

$start = "novosti";
   $db = new PDO("sqlite:admin/post3.db");
    $fog = $_GET['nom'];
  	$res = $db->query("SELECT * FROM stocks WHERE id=$fog ;");
	foreach ($res as $array) 
         {
	echo("<div class=\"zagolPages\">".$array['zag']."</br></div><div class=\"textPageBook\">".stripcslashes($array['text'])."</div>");
         }

echo "</div>";

}
 ?>




