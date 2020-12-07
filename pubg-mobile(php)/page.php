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
            $result2 = mysqli_query($db, "SELECT id FROM 'users' WHERE email='$email' AND password='$password'");
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
            $result = mysqli_query($db, "SELECT * FROM 'users' WHERE id='$id'");
            $myrow = mysqli_fetch_array($result);
//Извлекаем все данные пользователя с данным id
            if (empty($myrow['email'])) {
              exit("Пользователя не существует! Возможно он был удален.");
            }
//если такого не существует
?>
            <html>
            <head>
            <title><?php echo $myrow['login']; ?></title>
            </head>
            <body>
            <h2>Пользователь "<?php echo $myrow['login']; ?>"</h2>
<?php
print <<<HERE
            |<a href='page.php?id=$myrow2[id]'>Моя страница</a>
            |<a href='index.php'>Главная страница</a>
            |<a href='exit.php'>Выход</a><br><br>
HERE;
//выше вывели меню
?>
            </body>
            </html>