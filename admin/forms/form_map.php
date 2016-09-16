<table align="center" width="780px">
 <tr><td height="30px"></td></tr>
 <tr><td><font class="shrift-stock"><b>Добавление меток на карту:</b></font></td></tr>
 <tr><td height="10px"></td></tr>
 <tr>
  <td>
  <form method="post" action="dob.php?afisha=action" enctype="multipart/form-data">
  <table align="center" width="750px" cellpadding="0" cellspacing="0">
  <tr><td height="40px"><font class="shrift-stock">Тип метки на карте:</font></td></tr>
	 <tr><td align="left"><textarea type="text" name="map_tipe" class="textarea-z"></textarea></td></tr>
  <tr><td height="40px"><font class="shrift-stock">Метки в формате json:</font></td></tr>
	 <tr><td align="left"><textarea type="text" name="json_map" class="textarea"></textarea></td></tr><input type="text" name="big" value="<? echo $new_filename; ?>" style="display:none;"/><input type="text" name="date" value="<? echo date(r); ?>" style="display:none;"/>
  </table>
  </form>
  </td>
  </tr>
  </table>