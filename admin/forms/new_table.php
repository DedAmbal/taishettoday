<form method="post" action="sqlite.php">
 <table align="center" width="350px" cellpadding="0" cellspacing="0">
  <?
   $quer = $res = $db->query("SELECT * FROM sqlite_master WHERE type='table'"); /*sqlite_master выводит */ 
    $quer as $totaltables;
    if ($totaltables['name'] != "0")  
       {
  ?>
  <tr>
   <td height="40px"><font face="Verdana, Geneva, sans-serif" color="#000033" style="font-size:16px;">Выберите таблицу:</font></td><td align="right">
   /*<?
        echo("<select>");
        $i = 1;
        echo("<option value=".$totaltables->Database.">".$i.". ".$totaltables->Database."</option>");
        $i = $i 1;
        echo ("</select>");
   ?>*/    
   </td>
  </tr>
  <tr>
   <td height="40px"><font face="Verdana, Geneva, sans-serif" color="#000033" style="font-size:16px;">Введите имя таблицы:</font></td><td align="right"><input type="text" size="40" name="name-table" /></td>
  </tr>
  <tr><td bgcolor="#ECECEC" height="2px" colspan="2" width="100%"></td></tr>
  <tr>
   <td height="40px"><font face="Verdana, Geneva, sans-serif" color="#000033" style="font-size:16px;">Введите пароль:</font></td><td align="right"><input type="password" size="20" name="pass" /></td>
  </tr>
  <tr><td bgcolor="#ECECEC" height="2px" colspan="2" width="100%"></td></tr>
  <tr>
   <td colspan="2" align="center" height="40px"><input type="submit" name="knopka" value="Добавить данные в базу" /></td>
  </tr>
  <tr><td bgcolor="#ECECEC" height="2px" colspan="2" width="100%"></td></tr>
  <?
       }
   else
       {
  ?>     	
  <tr>
   <td height="40px"><font face="Verdana, Geneva, sans-serif" color="#000033" style="font-size:16px;">Таблицы нет. Создайте таблицу.</font></td><td align="right"></td>
  </tr>	
 <?
       }  
  ?>
 </table>  
</form>