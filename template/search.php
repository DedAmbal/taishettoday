
<?php
include_once("admin/conf.php");
function search($words){
	$words = htmlspecialchars($words);
	$words = strtolower($words);
	if($words == "")return false;
	$query_search = "";
	$arroyworlds=explode(" ", $words);
	foreach($arroyworlds as $key => $value){
	if (isset ($arroyworlds[$key-1]))
		$query_search = " AND";
	$query_search ='`title` LIKE "%'.$value.'%" OR `keywords` LIKE "%'.$value.'%" OR `description` LIKE "%'.$value.'%"';
	}
	$query = "SELECT * FROM meta WHERE $query_search";
	$db = new PDO("sqlite:admin/post3.db");
	$result_set = $db->query($query);
	$i = 0;
	while($row = $result_set->fetch(PDO::FETCH_ASSOC)){
		$results[$i] = $row;
		$i++;
	}
	return $results;
}

// Стартовая точка
if (isset($_POST['submit'])) {
$words = $_POST['zpr'];
$results = search($words);
echo "<h2 align='center'>Результаты поиска</h2>";
if($results === false) echo "Вы задали пустой запрос";
if(count($results) == 0) echo "Ничего не найдено";
else
	for($i = 0; $i < count($results); $i++)
		echo "<h3><a href=\"http://taishettoday.ru".$results[$i]['page']."\">".$results[$i]['title']."</a></h3><br />";
}

?>