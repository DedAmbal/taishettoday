
<section>
	<?php 
    $db = new PDO("sqlite:admin/post3.db");
  	$res = $db->query("SELECT * FROM afisha WHERE name_tipe = 'спорт';");
	foreach ($res as $array) {
		$block_img = $array['img'];
		$block_zag = $array['zag'];
		$block_time = $array['time'];
		$block_place = $array['place'];
        $block_tel = $array['tel'];
        $block_money = $array['money'];
        $block_text = $array['tipe'];
        $block_tipe = $array['name_tipe'];
		 echo("<div class=\"blog-card alt\">");
	     echo("<div class=\"photo\" style=\"background: url(".$block_img.") center / cover no-repeat;\"></div>");
	     echo("<ul class=\"details\">");
		 echo("<li class=\"author\">".$block_tel."</li>");
		 echo("<li class=\"date\">".$block_money."</li>");
		 echo("<li class=\"author\"><a href=\"#\">".$block_place."</a></li>");
		 echo("<li class=\"date\">".$block_time."</li>");
		 echo("</ul>");
		 echo("<div class=\"description\">");
		 echo("<h1>".$block_zag."</h1>");
		 echo("<h2>".$block_tipe."</h2>");
		 echo("<p class=\"summary\">".$block_text."</p>");
	     echo("</div>");
		 echo("</div>");
		 }
	?>
</section>

   






