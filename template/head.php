<header>
<a href="/"><img src="/imges/logohead.png" alt="Тайшет сегодня"></a>
	<form name="search" action="search.php" method="post">
	<input type="text" name="zpr" id="search_box" class="search_box" value="Поиск" onfocus="if(this.value =='Поиск')this.value ='';" onblur="if(this.value=='')this.value='Поиск';"><button type="submit" class="search_button" name="submit" value="Search">GO</button>
	</form>
	<nav>
<?php
echo'<ul class="top-menu">
		<li><a href="'.$menu[0][1].'"';
		if($get_in==0){ echo 'style="color:#29c5e6;"'; }
		echo '>'.$menu[0][0].'</a></li><li><a href="'.$menu[1][1].'"';
		if($get_in==1){ echo 'style="color:#29c5e6;"'; }
		echo '>'.$menu[1][0].'</a></li><li><a href="'.$menu[2][1].'"';
		if($get_in==2){ echo 'style="color:#29c5e6;"'; }
		echo '>'.$menu[2][0].'</a></li><li><a href="'.$menu[3][1].'"';
		if($get_in==3){ echo 'style="color:#29c5e6;"'; }
		echo '>'.$menu[3][0].'</a></li><li><a href="'.$menu[4][1].'"';
		if($get_in==4){ echo 'style="color:#29c5e6;"'; }
		echo '>'.$menu[4][0].'</a></li><li><a href="'.$menu[5][1].'"';
		if($get_in==5){ echo 'style="color:#29c5e6;"'; }
		echo '>'.$menu[5][0].'</a></li></ul>';
?>
</nav>
</header>