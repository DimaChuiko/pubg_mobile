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
        <a href="index.php" class="rulesLink">Главная</a>
        <!-- <a href="user_office.php" class="rulesLink">Кабинет</a> -->
     <nav class="main-nav">
     <a href="#0" class="privatOffice custom-btn">
      <span class="textBut">Личный кабинет</span>
      <img src="img/noun_profile.png" alt="image"></a>
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
  <!-- rules -->
  <section class="rules">
    <div class="gridContainer flex4">
        <h2>Правила</h2>
        <ol>Участвовать могут только зарегистрированные пользователи (указывать исключительно верные данные, чтобы мы могли добавить вас в игровое лобби).
          <li> 1. Выбрать турнир. Рядом с турниром будет указана цена за 1 килл и после двух киллов вы окупаетесь. С каждым новым киллом ваш заработок растет;</li>
          <li> 2. Оплатить участие;</li>
          <li> 3. Выбрать, вы будете участвовать в одиночку или со своими друзьями (смотрите на режим турнира, там будет указано возможное количество людей в одной команде);</li>
          <li> 4. За 60 и за 30 минут до начала турнира в Телеграм бот вам придет уведомление с напоминанием о турнире. За 10 минут до начала в Телеграм бот вам придут логин и пароль от лобби, а также номер команды, в которую вам необходимо будет вступить, аналогичные данные для входа появятся в окне самого турнира на сайте;</li>
          <li> 5. После окончания турнира в течение 15 минут в Телеграм бот вам придут результаты турнира, и в случае совершения киллов на ваш баланс будут начислены заработанные денежные средства.
            Запрещено:<br>
             • Участие в турнирах с эмуляторов;<br>
             • Вставать не в свою ячейку в лобби (режимы Дуо и Сквад);<br>
             • Отправлять логин и пароль для входа в лобби третьим лицам;<br>
             • Использовать чит-коды;<br>
            Каждое из нарушений влечет за собой удаление из Турнира без возврата денежных средств!</li>
        </ol>
      </div>
  </section>
  <!-- //rules -->
</main>
<!-- //main -->
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
    <!-- <script src="js/my.min.js"></script> -->
</body>
</html>