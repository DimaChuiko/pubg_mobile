<?php
//вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!
session_start();
include ("bd.php");
// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
if (isset($_GET['id'])) {$id =$_GET['id']; }
//id "хозяина" странички
            else {
              exit("Вы зашли на страницу без параметра!");
            }
//если не указали id, то выдаем ошибку
            if (!preg_match("|^[\d]+$|", $id)) {
            exit("<p>Неверный формат запроса! Проверьте URL</p>");
//если id не число, то выдаем ошибку
            }
if (!empty($_SESSION['email']) and !empty($_SESSION['password']))
            {
//если существует логин и пароль в сессиях, то проверяем, действительны ли они
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $result2 = mysqli_query("SELECT 'id' FROM 'users' WHERE email='$email' AND password='$password'",$db);
            $myrow2 = mysqli_fetch_array($result2);
            if (empty($myrow2['id']))
            {
//Если не действительны (может мы удалили этого пользователя из базы за плохое поведение)
          exit("Вход на эту страницу разрешен только зарегистрированным пользователям!");
               }
            }
            else {
//Проверяем, зарегистрирован ли вошедший
          exit("Вход на эту страницу разрешен только зарегистрированным пользователям!");}
            $result = mysqli_query("SELECT * FROM 'users' WHERE id='$id'",$db);
            $myrow = mysqli_fetch_array($result);
//Извлекаем все данные пользователя с данным id
            if (empty($myrow['email'])) {
              exit("Пользователя не существует! Возможно он был удален.");
            }
//если такого не существует
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>pubg_mobile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Web-Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300i,300,400,500,700&display=swap" rel="stylesheet">
    <!-- //Web-Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/ajax.js"></script>
    <link rel="stylesheet" href="css/main.css" type="text/css" media="all">
</head>
<body>
<!-- wrapper -->
<div class="wrapper">
<!-- header -->
<header class="header">
    <div class="gridContainer flex">
      <a href="index.php" class="logoHeader custom-btn"></a> <!--logo-->
      <div class="menuBlock">
        <a href="rules.php" class="rulesLink">Правила</a>
        <a href="index.php" class="rulesLink">Главная</a>
     <!-- <nav class="main-nav">
     <a href="#0" class="privatOffice custom-btn">
      <span class="textBut">Личный кабинет</span>
      <img src="img/noun_profile.png" alt="image"></a>
    </nav> -->
  </div>
    <!-- form_block -->
    <!-- //form_block -->
</div>
</header>
<!-- main -->
<main class="mainContent">
  <!-- user_office -->
  <section class="user_office">
    <div class="gridContainer flex5">
      <div id="office" class="office">
        <div classs="blockH4">
          <div class="blockFoto">
            <img src="img/noun_profil.png" alt="">
          </div>
          <div class="blockText">
            <h4>МОЙ ПРОФИЛЬ</h4><a href="exit.php" class="exit"></a>
            <p>Приглашено партнёров: <b class="colorOrage">0</b></p>
            <p>Пригласительная ссылка:<br>
            <a href="#" id="linkTour">https://pubgarena.com.ua/9847845875</a></p>
            <button class="btn" data-clipboard-target="#linkTour">Копировать</button>
          </div>
        </div>
        <form action="" class="form">
          <p><label>Ваш ник PUBG<br>
            <input name="u_name" size="30" type="text" value=""></label>
          </p>
          <p><label>Ваш ID в PUBG<br>
            <input name="u_nicename" size="30" type="text"></label>
          </p>
          <p><label>Килов<br>
            <input name="" size="30" type="text"></label>
          </p>
          <p><label>Турниров<br>
            <input name="" size="30" type="text"></label>
          </p>
           <p><label>Ваш E-mail<br>
            <input name="u_email" size="30" type="email"></label>
          </p>
           <p><label>Баланс<br>
            <input name="" size="30" type="text"></label>
          </p>
           <p>
            <input type="submit" value="ПОПОЛНИТЬ">
          </p>
           <p>
            <input type="submit" value="ВЫВЕСТИ">
          </p>
        </form>
      </div>
    </div>
  </section>
  <!-- //user_office -->
</main>
<!-- //main -->
<?php
print <<<HERE
            |<a href='user_office.php?id=$myrow2[id]'>Моя страница</a>
            |<a href='index.php'>Главная страница</a>
            |<a href='exit.php'>Выход</a><br><br>
HERE;
//выше вывели меню
?>
<footer class="footer">
    <a href="index.html" class="logoFooter"></a> <!-- logo -->
  <div class="textFooter">
    <p class="infoSite">Платформа по проведению турниров PUBG mobile<br>
    ну и другая инормация<br>
    контакты<br>
    ссылки и сотальное будет здесь</p>
  </div>
</footer>
<!--                 //footer                 -->
</div>
<!--                  script       -->
    <script type="text/javascript"
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="js/modal.min.js"></script>
    <!-- <script src="js/main.min.js"></script> -->
</body>
</html>