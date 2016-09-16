<table align="center" width="780px">
 <tr><td height="30px"></td></tr>
 <tr><td><font class="shrift-stock"><b>Добавление статьи:</b></font></td></tr>
 <tr><td height="10px"></td></tr>
 <tr>
  <td>
   <form method="post" action="dob.php?stock=action" enctype="multipart/form-data">
    <table align="center" width="750px" cellpadding="0" cellspacing="0">
     <tr><td height="40px"><font class="shrift-stock">Заголовок статьи:</font></td></tr>
	 <tr><td align="left"><textarea type="text" name="text-zag" class="textarea-z"></textarea></td></tr>
	 <tr><td height="40px"><font class="shrift-stock">Текст статьи:</font></td></tr>
	 <tr><td align="left"><textarea type="text" name="text-stock" class="textarea"></textarea></td></tr><input type="text" name="big" value="<? echo $new_filename; ?>" style="display:none;"/><input type="text" name="date" value="<? echo date(r); ?>" style="display:none;"/>
     <tr><td height="40px"><font class="shrift-stock">Ссылка на источник:</font></td></tr>
	 <tr><td align="left"><textarea type="text" name="linkist" class="textarea-z"></textarea></td></tr>
	 <tr><td colspan="2" align="center" height="40px"><input type="submit" name="knopka" value="Добавить статью" /></td></tr>
     <tr><td bgcolor="#ECECEC" height="2px" colspan="2" width="100%"></td></tr>
    </table>  
   </form>
  </td>
 </tr>
 </table>  