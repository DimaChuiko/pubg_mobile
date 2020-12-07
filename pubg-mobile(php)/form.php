<div class="user-modal">
      <div class="user-modal-container">
        <ul class="switcher">
          <li><a href="#0">РЕГИСТРАЦИЯ</a></li>
          <li><a href="#0">ВХОД</a></li>
        </ul>
      <!-- form singUp -->
      <div id="signup">
        <form class="form" action="save_user.php" method="post" id="registerform" enctype="multipart/form-data">
          <p><label>Ваш ник PUBG<i class="colorOrage">*</i><br>
          <input name="name_pubg" size="30" type="text" value="" placeholder="Введите НИК"></label>
        </p>
        <p><label>Ваш ID в PUBG<i class="colorOrage">*</i><br>
          <input name="id_pubg" size="30" type="text" placeholder="Введите ID"></label>
        </p>
        <p><label>Придумайте пароль<i class="colorOrage">*</i><br>
          <input name="password" size="30" type="password" placeholder="Введите пароль"></label>
        </p>
        <p><label>Повторите пароль<i class="colorOrage">*</i><br>
          <input name="password_confirm" type="password" size="30" placeholder="Повторите пароль"></label>
        </p>
        <p><label>Изображение профиля<br>
          <input type="file" name="fupload"></label>
        </p>
        <p><label>Ваш E-mail<i class="colorOrage">*</i><br>
          <input name="email" size="30" type="email" placeholder="Введите E-mail"></label>
        </p>
        <p class="checkBox">
          <input type="checkbox" name="politic" value="">
          ПРИНИМАЮ ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ
          И ПОЛИТИКУ КОНФИДЕНЦИАЛЬНОСТИ
        </p>
        <p><input id="btn" type="submit" value="РЕГИСТРАЦИЯ"></p>
        </form>
        <!-- <a href="#0" class="cd-close-form">Close</a> -->
      </div>
      <!--            form login             -->
      <div id="login">
<?php
            if (!isset($myrow['avatar']) or $myrow['avatar']=='') {

//проверяем, не извлечены ли данные пользователя из базы.
//Если нет, то он не вошел, либо пароль в сессии неверный. Выводим окно для входа.
//Но мы не будем его выводить для вошедших, им оно уже не нужно.
print <<<HERE
        <form class="form" action="testreg.php" method="post" id="loginform">
        <p><label>Введите пароль<i class="colorOrage">*</i><br>
         <input name="password" size="25" type="password" placeholder="Введите пароль"></label>
HERE;
            if (isset($_COOKIE['password']))
//есть ли переменная с логином в COOKIE. Должна быть,    если пользователь при предыдущем входе нажал на чекбокс "Запомнить    меня"
            {
//если да, то вставляем в форму ее значение. При этом    пользователю отображается, что его логин уже вписан в нужную графу
            echo ' value="'.$_COOKIE['password'].'">';
            }
print <<<HERE
          </p>
<!-- В текстовое поле (name="password" type="text") пользователь вводит свой логин -->
          <p><label>Ваш E-mail<i class="colorOrage">*</i><br>
          <input name="email" size="30" type="email" placeholder="Введите E-mail"></label>
HERE;
            if (isset($_COOKIE['email']))//есть    ли переменная с паролем в COOKIE. Должна быть,    если пользователь при предыдущем входе нажал на чекбокс "Запомнить    меня"
            {
            //если да, то вставляем в форму ее значение. При этом пользователю    отображается, что его пароль уже вписан в нужную графу
            echo ' value="'.$_COOKIE['email'].'">';
            }
print <<<HERE
          </p>
<!-- В поле для паролей (name="email" type="email") пользователь вводит свой пароль -->
          <p><input name="save" type="checkbox" value='1'> Запомнить меня.</p>
          <p><input name="autovhod" type="checkbox" value='1'> Автоматический вход.</p>
          <p class="form-bottom-message"><a href="#0">Забыли пароль?</a></p>
<!-- ссылка на регистрацию, ведь как-то же должны гости туда попадать -->
          <p><input id="btn1" type="submit" value="ВХОД"></p>
            </form>
            <!-- <a href="#0" class="close-form">Close</a> -->
HERE;
}
else
            {
//при удачном входе пользователю выдается все, что расположено ниже между звездочками.
//*****************************************************************************
print <<<HERE
|<a href='user_office.php?id=$_SESSION[id]'>Моя страница</a>
|<a href='index.php'>Главная страница</a>
|<a href='exit.php'>Выход</a><br><br>

<!-- Между оператором "print <<<HERE" выводится html код с нужными переменными из php -->
        Вы вошли на сайт, как $_SESSION[email] (<a href='exit.php'>выход</a>)<br>
<!-- выше ссылка на выход из аккаунта -->
<a href='user_office.php'>
Эта ссылка доступна только зарегистрированным пользователям</a><br>
            Ваш аватар:<br>
            <img alt='$_SESSION[email]' src='$myrow[avatar]'>
<!-- Выше отображается аватар. Его адрес содержит переменная $myrow[avatar] -->
<!-- Именно здесь можно добавлять формы для отправки комментариев и прочего... -->
HERE;
//*****************************************************************************
//при удачном входе пользователю выдается все, что расположено ВЫШЕ между звездочками.
            }
?>
</div>
<div id="reset-password">
<?php
 if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') {    unset($email);} }
//заносим введенный пользователем e-mail, если он    пустой, то уничтожаем переменную
 if (isset($email) ) {
//если существуют необходимые переменные

                     include ("bd.php");
//файл bd.php должен быть в той же папке, что и все остальные, если это не так, то    просто измените путь
$result = mysql_query($db, "SELECT id FROM 'users' WHERE email='$email'");
//такой ли у пользователя е-мейл
                     $myrow = mysql_fetch_array($result);
                     if (empty($myrow['id']) or $myrow['id']=='') {
//если активированного пользователя с таким логином и е-mail адресом нет
                              exit ("Пользователя с    таким e-mail адресом не обнаружено ни в одной базе ЦРУ :) <a href='index.php'>Главная страница</a>");
                              }
//если пользователь с таким логином и е-мейлом найден, то необходимо сгенерировать для него случайный пароль, обновить его в базе и    отправить на е-мейл
                     $datenow = date('YmdHis');//извлекаем    дату
                     $new_password = md5($datenow);// шифруем    дату
                     $new_password = substr($new_password,    2, 6);
//извлекаем из шифра 6 символов начиная    со второго. Это и будет наш случайный пароль. Далее запишем его в базу,    зашифровав точно так же, как и обычно.
                    $new_password_sh = strrev(md5($new_password))."b3p6f";//зашифровали
                    mysql_query($db, "UPDATE 'users' SET password='$new_password_sh' WHERE login='$email'");
                    // обновили в базе
                    // формируем сообщение
                     $message = "Здравствуйте, ".$email."! Мы сгененриоровали для Вас пароль, теперь Вы сможете войти на сайт, используя его. После входа желательно его сменить. Пароль:\n".$new_password;
                     // текст сообщения
                     mail($email, "Восстановление пароля", $message, "Content-type:text/plane; Charset=windows-1251\r\n");
                     // отправляем сообщение
                     echo "<html><head><meta http-equiv='Refresh' content='5; URL=index.php'></head><body>На Ваш e-mail отправлено письмо с паролем. Вы будете перемещены через 5 сек. Если не хотите ждать, то <a href='index.php'>нажмите сюда.</a></body></html>";
                     // перенаправляем пользователя
                     }
                     else {//если данные еще не введены
                      echo '
            <p class="form-message">Забыли пароль? Пожалуйста, введите свой адрес электронной почты.<br>Вы получите ссылку для создания нового пароля.</p>
    <form class="form" id="resetpass">
      <p><label class="image-replace email" for="reset-email">Ваш E-mail<br>
          <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="Введите E-mail"></label></p>
      <p><input id="btn2" class="full-width has-padding" type="submit" value="Сброс пароля"></p>
        </form>
      <p class="form-bottom-message"><a href="#0">Назад</a></p>';
            }
            ?>
            <!-- <a href="#0" class="close-form">Close</a> -->
      </div>
</div>
</div>