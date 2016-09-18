
<section>
	<?php 
    $db = sqlite_open("admin/post.db");
  	$res = sqlite_query($db, "SELECT * FROM afisha WHERE name_tipe = 'мероприятия';");
	while ($array = sqlite_fetch_array($res)) {
		$block_img = $array['img'];
		$block_zag = $array['zag'];
		$block_time = $array['time'];
		$block_place = $array['place'];
        $block_tel = $array['tel'];
        $block_money = $array['money'];
        $block_text = $array['tipe'];
         echo("<div class=\"pageAfishaBlock\">");
		 echo("<div class=\"imgAfishaBlock\">");
		 echo("<img src=".$block_img." title=\"".$block_zag."\" alt=\"".$block_zag."\" />");
		 echo("<p class=\"spravkaAfisha\">");
		 echo("<a href=\"#\" class=\"celendar\"></a><span>".$block_time."</span><br>");
		 echo("<a href=\"#\" class=\"situation\"></a><span>".$block_place."</span><br>");
		 echo("<a href=\"#\" class=\"tel\"></a><span>".$block_tel."</span><br>");
		 echo("<a href=\"#\" class=\"banknote\"></a><span>".$block_money."</span><br>");
		 echo("</p>");
		 echo("</div>");
		 echo("<div class=\"contentAfishaBlock\">");
		 echo("<p class=\"headerAfish\">".$block_zag."</p><hr>");
		 echo("<p>".$block_text."</p>");
		 echo("</div>");
		 echo("</div>");
		 }	
	?>
</section>










