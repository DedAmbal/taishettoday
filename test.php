<?php //начало php-скрипта
$new_file=fopen("name_file","w");
//Переменная new_file получает указатель на файл name_file.
fwrite($new_file,"Это первая строка файла");
//в файл name_file записывается строка: «Это первая строка файла»
fclose($new_file);
//закрываем файл name_file
?> //конец php-скрипта