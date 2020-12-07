<?php
// вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!
session_start();
include ("bd.php");
// файл bd.php должен быть в той же папке, что и    все остальные, если это не так, то просто измените путь
if (!empty($_SESSION['password']) and !empty($_SESSION['email']))
            {
//если существует логин и пароль в сессиях, то проверяем их и    извлекаем аватар
            $password = $_SESSION['password'];
            $email = $_SESSION['email'];
            $result = mysqli_query($db, "SELECT id,avatar FROM users WHERE email='$email' AND password='$password'");
            $myrow = mysqli_fetch_array($result);
//извлекаем нужные данные о пользователе
            }
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
        <!-- <a href='exit.php' class="rulesLink">Выход</a> -->
     <nav class="main-nav">
     <a href="#0" class="privatOffice custom-btn">
      <span class="textBut">Личный кабинет</span>
      <img src="img/noun_profile.png" alt="image">
    </a>
    </nav>
  </div>
        <!-- form_block -->
    <?php require 'form.php'; ?>
    <!-- //form_block -->
</div>
</header>
<!-- banner -->
<?php require 'banner.php'; ?>
<!-- //banner -->
<!-- main -->
<main class="mainContent">
  <!-- tournaments -->
	 <section class="tournaments">
    <div class="gridContainer flex2">
	 	<div class="blockH2">
	 		<h2>Турниры</h2>
      <p class="pH2">Выберете турнир.<br> Рядом с турниром
      будет указана цена за 1 килл.</p>
	 	</div>
    <!--                                                 article
      <article class="article tournament">
        <h3>PUBG MOBILE ТУРНИР 1</h3>
        <p class="pH3">ОТ <b class="colorOrage">20</b> ГРН ЗА КИЛ</p>
        <div class="blockPlayers">
        <span class="playersSingUp">75 /</span><span class="playersTotal"> 100</span>
        </div>
        <div class="infoGame">
          <p class="modeGame">Режим: <span class="mode"><b class="colorOrage">Дуо</b></span></p>
          <p class="mapeGame">Карта: <span class="mape"><b class="colorOrage">Эрангель</b></span></p>
          <p class="faceGame">Лицо: <span class="face"><b class="colorOrage">от третьего</b></span></p>
          <p class="timeGame">Начало :
            <span class="timeMSK"><b class="colorOrage">22:00</b> (МСК) </span>
            <span class="timeKiev"><b class="colorOrage">21:00</b> (КИЕВ)</span>
            </p>
        </div>
        <a href="" class="singUp">Записаться</a>
      </article>
      <article class="article tournament">
        <h3>PUBG MOBILE ТУРНИР 2</h3>
        <p class="pH3">ОТ <b class="colorOrage">20</b> ГРН ЗА КИЛ</p>
        <div class="blockPlayers">
        <span class="playersSingUp">75 /</span><span class="playersTotal"> 100</span>
        </div>
        <div class="infoGame">
          <p class="modeGame">Режим: <span class="mode"><b class="colorOrage">Дуо</b></span></p>
          <p class="mapeGame">Карта: <span class="mape"><b class="colorOrage">Эрангель</b></span></p>
          <p class="faceGame">Лицо: <span class="face"><b class="colorOrage">от третьего</b></span></p>
          <p class="timeGame">Начало :
            <span class="timeMSK"><b class="colorOrage">22:00</b> (МСК) </span>
            <span class="timeKiev"><b class="colorOrage">21:00</b> (КИЕВ)</span>
          </p>
        </div>
        <a href="" class="singUp">Записаться</a>
      </article>
      <article class="article tournament">
        <h3>PUBG MOBILE ТУРНИР 3</h3>
        <p class="pH3">ОТ <b class="colorOrage">20</b> ГРН ЗА КИЛ</p>
        <div class="blockPlayers">
        <span class="playersSingUp">75 /</span><span class="playersTotal"> 100</span>
        </div>
        <div class="infoGame">
          <p class="modeGame">Режим: <span class="mode"><b class="colorOrage">Дуо</b></span></p>
          <p class="mapeGame">Карта: <span class="mape"><b class="colorOrage">Эрангель</b></span></p>
          <p class="faceGame">Лицо: <span class="face"><b class="colorOrage">от третьего</b></span></p>
          <p class="timeGame">Начало :
            <span class="timeMSK"><b class="colorOrage">22:00</b> (МСК) </span>
            <span class="timeKiev"><b class="colorOrage">21:00</b> (КИЕВ)</span>
          </p>
        </div>
        <a href="" class="singUp">Записаться</a>
      </article>
      <article class="article tournament">
        <h3>PUBG MOBILE ТУРНИР 4</h3>
        <p class="pH3">ОТ <b class="colorOrage">20</b> ГРН ЗА КИЛ</p>
        <div class="blockPlayers">
        <span class="playersSingUp">75 /</span><span class="playersTotal"> 100</span>
        </div>
        <div class="infoGame">
          <p class="modeGame">Режим: <span class="mode"><b class="colorOrage">Дуо</b></span></p>
          <p class="mapeGame">Карта: <span class="mape"><b class="colorOrage">Эрангель</b></span></p>
          <p class="faceGame">Лицо: <span class="face"><b class="colorOrage">от третьего</b></span></p>
          <p class="timeGame">Начало :
            <span class="timeMSK"><b class="colorOrage">22:00</b> (МСК) </span>
            <span class="timeKiev"><b class="colorOrage">21:00</b> (КИЕВ)</span>
          </p>
        </div>
        <a href="" class="singUp">Записаться</a>
      </article>
      <article class="article tournament">
        <h3>PUBG MOBILE ТУРНИР 5</h3>
        <p class="pH3">ОТ <b class="colorOrage">20</b> ГРН ЗА КИЛ</p>
        <div class="blockPlayers">
        <span class="playersSingUp">75 /</span><span class="playersTotal"> 100</span>
        </div>
        <div class="infoGame">
          <p class="modeGame">Режим: <span class="mode"><b class="colorOrage">Дуо</b></span></p>
          <p class="mapeGame">Карта: <span class="mape"><b class="colorOrage">Эрангель</b></span></p>
          <p class="faceGame">Лицо: <span class="face"><b class="colorOrage">от третьего</b></span></p>
          <p class="timeGame">Начало :
            <span class="timeMSK"><b class="colorOrage">22:00</b> (МСК) </span>
            <span class="timeKiev"><b class="colorOrage">21:00</b> (КИЕВ)</span>
          </p>
        </div>
        <a href="" class="singUp">Записаться</a>
      </article>
      <article class="article tournament">
        <h3>PUBG MOBILE ТУРНИР 6</h3>
        <p class="pH3">ОТ <b class="colorOrage">20</b> ГРН ЗА КИЛ</p>
        <div class="blockPlayers">
        <span class="playersSingUp">75 /</span><span class="playersTotal"> 100</span>
        </div>
        <div class="infoGame">
          <p class="modeGame">Режим: <span class="mode"><b class="colorOrage">Дуо</b></span></p>
          <p class="mapeGame">Карта: <span class="mape"><b class="colorOrage">Эрангель</b></span></p>
          <p class="faceGame">Лицо: <span class="face"><b class="colorOrage">от третьего</b></span></p>
          <p class="timeGame">Начало :
            <span class="timeMSK"><b class="colorOrage">22:00</b> (МСК) </span>
            <span class="timeKiev"><b class="colorOrage">21:00</b> (КИЕВ)</span>
          </p>
        </div>
        <a href="" class="singUp">Записаться</a>
      </article>
                                                                //article -->
      <div class="article tournamentInfo">
        <p class="textInfo">Уважаемый посетитель, данный сайт находится на стадии завершения. Следите за нашими обновлениями чтоб не упустить возможность участвовать в наших турнирах.</p>
      </div>
    </div>
	 </section>
   <!-- //tournaments -->
   <!-- platform -->
<section class="platform">
    <div class="gridContainer flex3">
     <h2>Наша платформа</h2>
     <p class="pH2">На нашей платформе вы сможете поучавствовать на платных и бесплатных турнирах в игре Рubg Mobile.<br>
     Наш сайт работает недавно, но турниры проводим около года.<br> Отзывы с турниров вы сможете посмотреть в нашем инстаграм и телеграм канале.</p>
     <div class="blockLink">
      <div class="societyLink">
        <a href="https://instagram.com/ultimate4pubg?igshid=17d3naysx3zmy" class="linkInstagram"></a>
        <a href="https://t.me/Ultimate4PUBG" class="linkTelegram"></a>
      </div>
      <a href="" class="linkRegistry custom-btn">РЕГИСТРАЦИЯ</a>
    </div>
  </div>
</section>
   <!-- //platform -->
</main>
<!-- //main -->
<!-- footer -->
<footer class="footer">
    <a href="index.html" class="logoFooter"></a> <!--logo-->
  <div class="textFooter">
    <p class="infoSite">Платформа по проведению турниров PUBG mobile<br>
    ну и другая инормация<br>
    контакты<br>
    ссылки и сотальное будет здесь</p>
  </div>
</footer>
<!-- //footer -->
</div>
<!-- //wrapper -->
<!-- script -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/modal.min.js" type="text/javascript"></script>
    <!-- <script src="js/my.min.js" type="text/javascript"></script> -->
</body>
</html>