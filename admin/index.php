<?php
 session_start();
?>
<?php
    $zag = "Администрация";
    include "config.php";

    if(!$_SESSION['login'] & !$_SESSION['password'])
    {
?>
 <table align="center" width="800px">
  <tr><td height="100px"></td></tr>
  <tr>
   <td>
    <div class="radius">
     <form method="post" action="index.php">
      <table align="center" width="350px" cellpadding="0" cellspacing="0">
       <tr><td height="40px"><font class="admin-font">введите имя:</font></td><td align="right"><input type="text" size="20" name="ima" /></td></tr>    
       <tr><td bgcolor="#ECECEC" height="2px" colspan="2" width="100%"></td></tr>
       <tr><td height="40px"><font class="admin-font">введите пароль:</font></td><td align="right"><input type="password" size="20" name="sekret" /></td></tr>
       <tr><td bgcolor="#ECECEC" height="2px" colspan="2" width="100%"></td></tr>
       <tr><td colspan="2" align="center" height="40px"><input type="submit" name="knopka" value="Войти хочу" /></td></tr>
       <tr><td bgcolor="#ECECEC" height="2px" colspan="2" width="100%"></td></tr>
       <tr>
         <td colspan="2" height="40px" align="center"><font face="Verdana, Geneva, sans-serif" color="#000033" style="font-size:16px;">
<?php
	$log = $_POST['ima'];
	if(empty($log))
	{
	 echo "Введите имя и пароль";
	}
	else
	{
	 $_SESSION['login'] = $_POST['ima'];
     $_SESSION['password'] = $_POST['sekret'];
     $_SESSION['kpb'] = "admin";
     $_SESSION['cod'] = "109Taishet";
     if($_SESSION['login'] != $_SESSION['kpb'])
     {
	  echo "Логин введён неверно!";
	  unset($_SESSION['login']);
      unset($_SESSION['password']);
      session_destroy();
     }
	 else
	 {
	  if($_SESSION['password'] != $_SESSION['cod'])
	  {
	   echo "Неверный пароль!"; 
	   unset($_SESSION['login']);
       unset($_SESSION['password']);
       session_destroy();
	  }
	  else
	  {
	   echo '<script type="text/javascript"> window.location = "dob.php" </script>';
	  }	
	 }
	}
   }
   else
   {
    echo '<script type="text/javascript">
                                              window.location = "dob.php"
                                           </script>';	
   }
?>
      </font>
     </div>
    </td>
   </tr>   
  </table>  
 </form>
 </td></tr>
	</table>  
<?php include "end_page.php"; ?>