<?php
function searchArticles($search){
	   $query_search = "";
	   $db = new PDO("sqlite:admin/post3.db");
	   $res = $db->query("SELECT * FROM 'stocks' WHERE 'text' LIKE '%слово%' OR WHERE 'zag' LIKE '%слово%'");
	   return $resultSetToArray($res);
}
?>