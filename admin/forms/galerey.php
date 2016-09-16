<? ?>
<table align="center" width="780px">
 <tr><td height="10px"></td></tr>
 <tr>
  <td>
   <table align="center" width="100%" cellpadding="0" cellspacing="0">
     <tr><td bgcolor="#ECECEC" height="2px" colspan="3" width="100%"></td></tr><tr><td height="20px"></td></tr></table>
   <link rel="stylesheet" type="text/css" href="default.css">
   <link rel="stylesheet" type="text/css" href="imgareaselect-default.css"> 
   <form method="post" action="dob.php?galerey=dob&gal=radius&prewi=dobi" enctype="multipart/form-data">
    <table align="center" width="100%" cellpadding="0" cellspacing="0">
     <tr>
       <td><font class="shrift-stock">Добавить фотографию для новости(если есть):</font></td>
       <td align="left" height="40px"><input type="file" name="file"/></td>
       <td></td>  
     </tr>
     <tr><td colspan="3" align="center" height="40px"><input type="submit" name="send" value="Загрузить"/</td></tr>
	 <tr><td colspan="3" height="30px"><a href="dob.php?galerey=dob&crop=no">Пропустить загрузку изображения</a></td></tr>
    </table>  
   </form>
 <?
if ($_GET['prewi']=="dobi")
     {
      $localhost = "/home/host1241978/taishettoday.ru/htdocs/preweb/admin/photos/";
      $path_img = "photos/";
      move_uploaded_file( $_FILES['file']['tmp_name'],$localhost.$_FILES['file']['name']);	
      $file_input = $path_img.$_FILES['file']['name'];
      //-----адрес изображения во временной папке-----//
        $file="photos/vremeno.txt";
        $fp = fopen($file, "w");
        fwrite($fp, $file_input);
        fclose ($fp);
      //----------------------------------------------//
      list($j_width, $j_height) = getimagesize($file_input);
	  if ($j_width > 800)
           {
           $width_prew = "800";
           $del_w = $j_width / $width_prew;
           $del_two_w = $width_prew;
           $del_h = $j_height / $del_w; 
           $del_two_h = ceil($del_h);
        // Создаем маленькое изображение
           $new_i = imagecreatetruecolor($del_two_w, $del_two_h);
        // Создаем оригинальное изображение
           $current_image_i = imagecreatefromjpeg($file_input);
        // resamling (actual cropping)
           imagecopyresized($new_i, $current_image_i, 0, 0, 0, 0,$del_two_w, $del_two_h, $j_width, $j_height);
        // creating our new image
           $new_filename_i = $file_input;
           imagejpeg($new_i, $new_filename_i, 100);
           }
         else
           { 
           	$del_two_w = $j_width;
           	$del_two_h = $j_height;
           	$new_filename_i = $file_input;
           }
?>   
    </td>
   </tr>
   <tr><td align="center"><img id="photo" src="<? echo $new_filename_i; ?>" alt="" title="" style="margin: 0 0 10 0px; color:#6c6c6c;" vspace="10" border="2" />
        <form action="dob.php?galerey=dob&crop=yes" method="post">
         <input type="hidden" name="x1" value="" />
         <input type="hidden" name="y1" value="" />
         <input type="hidden" name="x2" value="" />
         <input type="hidden" name="y2" value="" />
         <input type="hidden" name="w" value="" />
         <input type="hidden" name="h" value="" />   
         <input type="submit" value="Вырезать" />      
        </form>
              <script type="text/javascript" src="jquery-1.5.1.min.js"></script>
              <script type="text/javascript" src="jquery.imgareaselect.pack.js"></script>
              <script type="text/javascript"> 
               function preview(img, selection) 
                        {
                    var scaleX = 337 / (selection.width || 1);
                    var scaleY = 260 / (selection.height || 1);
                       $('#photo + div > img').css({
                        width: Math.round(scaleX * <? echo "$del_two_w"; ?>) + 'px',
                        height: Math.round(scaleY * <? echo "$del_two_w"; ?>) + 'px',
                        marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
                        marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
                        });
                        } 

                       $(document).ready(function () {
                       $('<div><img src="<? echo $new_filename_i; ?>" style="position: relative; color:#6c6c6c;" border="2" /><div>') .css({
                         float: 'left',
                         position: 'relative',
                         overflow: 'hidden',
                         width: '337px',
                         height: '260px',
                         color: '#6c6c6c'
                        }) .insertAfter($('#photo')); 
						
                       $('#photo').imgAreaSelect({
                                   aspectRatio: '337:260',
                                   handles: true,
                                   onSelectChange: preview,
                                   onSelectEnd: function ( image, selection ) {
                                  $('input[name=x1]').val(selection.x1);
                                  $('input[name=y1]').val(selection.y1);
                                  $('input[name=x2]').val(selection.x2);
                                  $('input[name=y2]').val(selection.y2);
                                  $('input[name=w]').val(selection.width);
                                  $('input[name=h]').val(selection.height);
                                   }
                        });
                       }); 
              </script>
<? 
     }
if ($_GET['crop']=="yes")
     {  
      $file="photos/vremeno.txt"; 
      $open = fopen($file,"r"); 
      $read = fgets($open);       
      // Original image
      $filename = $read;
      //die(print_r($_POST));
	  $sluch = rand();
      $new_filename = $sluch.'.jpg';
      // Get dimensions of the original image
      list($current_width, $current_height) = getimagesize($filename);
      // The x and y coordinates on the original image where we
      // will begin cropping the image, taken from the form
      $x1 = $_POST['x1'];
      $y1 = $_POST['y1'];
      $x2 = $_POST['x2'];
      $y2 = $_POST['y2'];
      $w = $_POST['w'];  
      $h = $_POST['h'];     
      //die(print_r($_POST));
      // This will be the final size of the image
      $crop_width = 337;
      $crop_height = 260;
      // Create our small image
      $new = imagecreatetruecolor($crop_width, $crop_height);
      // Create original image
      $current_image = imagecreatefromjpeg($filename);
      // resamling (actual cropping)
      imagecopyresampled($new, $current_image, 0, 0, $x1, $y1, $crop_width, $crop_height, $w, $h);
      // creating our new image
      imagejpeg($new, $new_filename, 95);
      unlink($read);
      fclose ($open);
      echo '<img src="'.$new_filename.'" style="position: relative; color:#6c6c6c;" border="2" />';
     }
?>
  </td>
 </tr>
 <tr><td height="100px"></td></tr>
</table> 
<? if($_GET['crop']=="yes"){ $new_filename = "admin/".$new_filename; include "forms/form.php"; }    if($_GET['crop']=="no"){ $new_filename = "no"; include "forms/form.php"; } ?>