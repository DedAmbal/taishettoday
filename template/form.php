<?php

if(isset($_POST['submit'])) {

	//Проверка Поля ИМЯ
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}

	//Проверка поля ТЕМА
	if(trim($_POST['subject']) == '') {
		$hasError = true;
	} else {
		$subject = trim($_POST['subject']);
	}

	//Проверка правильности ввода EMAIL
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//Проверка наличия ТЕКСТА сообщения
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	//Если ошибок нет, отправить email
	if(!isset($hasError)) {
  $body = "Name: $name \n\nEmail: $email \n\nSubject: $subject \n\nComments:\n $comments";
 mail('Dusha2b63Gur@yandex.ru', "My Subject", "$body");
  $email = true;
  }
  }
?>
<h2>Форма обратной связи</h2>
<div id="contact-wrapper">

	<?php if(isset($hasError)) { //Если найдены ошибки ?>
		<p class="error">Проверьте, пожалуйста, правильность заполения всех полей.</p>
	<?php } ?>

	<?php if(isset($emailSent) && $emailSent == true) { //Если письмо отправленл ?>
		<p><strong>Email успешно отправлен!</strong></p>
		<p>Спасибо  <strong><?php echo $name;?></strong> за использование контактной формы! Ваш email был отправлен и я свяжусь с Вами в кратчайшие сроки.</p>
	<?php } ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
		<div>
		    <label for="name"><strong>Имя:</strong></label>
			<input type="text" size="50" name="contactname" id="contactname" value="" class="required" />
		</div>

		<div>
			<label for="email"><strong>Email:</strong></label>
			<input type="text" size="50" name="email" id="email" value="" class="required email" />
		</div>

		<div>
			<label for="subject"><strong>Тема:</strong></label>
			<input type="text" size="50" name="subject" id="subject" value="" class="required" />
		</div>

		<div>
			<label for="message"><strong>Сообщение:</strong></label>
			<textarea rows="5" cols="50" name="message" id="message" class="required"></textarea>
		</div>
	    <input type="submit" value="Send Message" name="submit" />
	</form>
</div>