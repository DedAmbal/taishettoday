<table align="center" width="780px">
 <tr><td height="30px"></td></tr>
 <tr><td><font class="shrift-stock"><b>Добавление статьи:</b></font></td></tr>
 <tr><td height="10px"></td></tr>
 <tr>
  <td>
   <form method="post" action="dob.php?afisha=action" enctype="multipart/form-data">
    <table align="center" width="750px" cellpadding="0" cellspacing="0">
     <tr><td height="40px"><font class="shrift-stock">Тип события:</font></td></tr>
	 <tr><td align="left"><textarea type="text" name="name_tipe" class="textarea-z"></textarea></td></tr>
     <tr><td height="40px"><font class="shrift-stock">Заголовок события:</font></td></tr>
	 <tr><td align="left"><textarea type="text" name="text-zag" class="textarea-z"></textarea></td></tr>
	 <tr><td height="40px"><font class="shrift-stock">Описание события:</font></td></tr>
	 <tr><td align="left"><textarea type="text" name="tipe" class="textarea"></textarea></td></tr><input type="text" name="big" value="<? echo $new_filename; ?>" style="display:none;"/><input type="text" name="date" value="<? echo date(r); ?>" style="display:none;"/>
     <tr><td height="40px"><font class="shrift-stock">Время когда произойдет:</font></td></tr>
	 <tr><td align="left"><textarea type="text" name="timeist" class="textarea-z"></textarea></td></tr>
	 
	 <tr><td height="40px"><font class="shrift-stock">Контакты:</font></td></tr>
	 <tr><td align="left"><textarea type="text" name="tel" class="textarea-z"></textarea></td></tr>
	 
	 <tr><td height="40px"><font class="shrift-stock">Где произойдет событие:</font></td></tr>
	 <tr><td align="left"><textarea type="text" name="place" class="textarea-z"></textarea></td></tr>
	 
	 <tr><td height="40px"><font class="shrift-stock">Стоимость:</font></td></tr>
	 <tr><td align="left"><textarea type="text" name="money" class="textarea-z"></textarea></td></tr>
	 
	 <tr><td colspan="2" align="center" height="40px"><input type="submit" name="knopka" value="Добавить события" /></td></tr>
     <tr><td bgcolor="#ECECEC" height="2px" colspan="2" width="100%"></td></tr>
    </table>  
   </form>
  </td>
 </tr>
 </table>  