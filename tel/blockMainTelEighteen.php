<section>
<div class="pageTelBlock">
 <table class="table">
<?php 
    $db = new PDO("sqlite:admin/post3.db");
  	$res = $db->query('SELECT * FROM tel WHERE tipe = "охота и рыбалка";');
    echo '<thead>';
    echo '<tr>';
    echo '<th>Организация</th>';
    echo '<th>Адресс</th>';
    echo '<th>Номер телефона</th>';
    echo '</tr>';
    echo '</thead>';
foreach ($res as $array)
{
    	$block_org = $array['org'];
		$block_adress = $array['adress'];
		$block_tel_nom = $array['tel_nom'];
    
    echo '<tr>';
    echo '<th>'.$block_org.'</th>';
    echo '<th>'.$block_adress.'</th>';
    echo '<th>'.$block_tel_nom.'</th>';
    echo '</tr>';
    
}
?>    
</table>
</div>
</section>