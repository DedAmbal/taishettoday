

	<div class="main_page">
	<?php
  $db = new PDO("sqlite:admin/post3.db");
  	$res = $db->query("SELECT * FROM afisha ORDER BY id DESC;");
	foreach ($res as $array) {
		$block_img = $array['img'];
		$block_zag = $array['zag'];
		$block_time = $array['time'];
		$block_place = $array['place'];
        $block_tel = $array['tel'];
        $block_money = $array['money'];
        $block_text = $array['tipe'];
        $block_tipe = $array['name_tipe'];
        $block_adress = $array['adress'];
    echo("<div class=\"row\">");
    echo("<div class=\"card\">");
    echo("<div class=\"wrapper\" style=\"background: url(".$block_img.") center / cover no-repeat;\">");
    echo("<div class=\"date\">");
    echo("<span>".$block_tipe."</span>");
    echo("</div>");
    echo("<div class=\"data\">");
    echo("<div class=\"content\">");
    echo("<h1 class=\"title\"><a href=\"http://taishettoday.ru/".$block_adress."\">".$block_zag."</a></h1>");
    echo("<p class=\"text\">");
    echo("<a href=\"#\" class=\"celendar\"></a><span>".$block_time."</span><br>");
	echo("<a href=\"#\" class=\"situation\"></a><span>".$block_place."</span><br>");
	echo("<a href=\"#\" class=\"tel\"></a><span>".$block_tel."</span><br>");
	echo("<a href=\"#\" class=\"banknote\"></a><span>".$block_money."</span><br>");
    echo("</p>");
    echo("</div>");
    echo("</div>");
    echo("</div>");
    echo("</div>");
	  }
?>
</div>
