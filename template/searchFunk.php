<?php
$db = new PDO("sqlite:C:\OpenServer\domains\gulp\build\admin\post3.db");
function searchArticles($db, $words){
	   $query_search = "";
	   $res = $db->query("SELECT * FROM stocks WHERE text LIKE '%$words%' OR WHERE zag LIKE '%$words%'");
	   return $resultSetToArray($res);
}




/*function search($db, $text){
	$query = $db->query("SELECT * FROM stocks WHERE zag LIKE %$text% OR text LIKE %$text%");
	if(false == $query)return false;
	echo "<table width='100%'><tr><td>Заголовок</td><td>Полный текст</td></tr>";
	while($row = $query -> fetchArray(SQLITE3_ASSOC)){
		echo "<p><tr><td>[$row['zag']]</td><td>[$row['text']]</p>"
	}
	echo "</table>"
}*/
?>