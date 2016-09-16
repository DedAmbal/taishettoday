<div id="heading">
	<h1>Библиотека</h1>
</div>
<aside>
<nav>
<ul class="aside-menu">
<?php 
    $db = new PDO("sqlite:admin/post3.db");
  	$res = $db->query("SELECT * FROM menu WHERE tipe = 'библиотека';");
	foreach ($res as $array) {
		$block_link = $array['link'];
		$block_name = $array['name'];
		 echo("<li>");
		 echo("<a href=".$block_link.">".$block_name."</a>");
		 echo("</li>");
		 }
		
	?>	
</ul>
</nav>
</aside>