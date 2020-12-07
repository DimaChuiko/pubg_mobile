<?php
    if (isset($_POST['name_pubg'])) { $name_pubg = $_POST['name_pubg']; if ($name_pubg =='') { unset($name_pubg);} }
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['id_pubg'])) { $id_pubg=$_POST['id_pubg']; if ($id_pubg =='') { unset($id_pubg);} }

    if (isset($_POST['password'])) { $password = $_POST['password']; if ($password =='') { unset($password);} }

    if (isset($_POST['password_confirm'])) { $password_confirm = $_POST['password_confirm']; if ($password_confirm =='') { unset($password_confirm);} }

    if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($email) or empty($password))
//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $name_pubg = stripslashes($name_pubg);
    $name_pubg = htmlspecialchars($name_pubg);
    $id_pubg = stripslashes($id_pubg);
    $id_pubg = htmlspecialchars($id_pubg);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
//удаляем лишние пробелы
    $name_pubg = trim($name_pubg);
    $id_pubg = trim($id_pubg);
    $password = trim($password);
    $email = trim($email);

// дописываем новое********************************************
    if (!empty($_FILES['fupload']['name']))
// проверяем, отправил ли пользователь изображение
    {
    $fupload = $_FILES['fupload']['name']; $fupload = trim($fupload);
    if ($fupload == '' or empty($fupload)) {
    unset($fupload);
// если переменная $fupload пуста, то удаляем ее
    }
}
    if (!isset($fupload) or empty($fupload) or $fupload =='')
    {
//если переменной не существует (пользователь не отправил изображение), то присваиваем ему заранее приготовленную картинку с надписью "нет аватара"
    $avatar = "avatars/net-avatara.jpg";
//можете нарисовать net-avatara.jpg или взять в исходниках
    }
    else
    {
// иначе - загружаем изображение пользователя
    $path_to_90_directory = 'avatars/';
// папка, куда будет загружаться начальная картинка и ее сжатая копия
    if (preg_match('/[.](JPG)|(jpg)|(gif)|(GIF)|(png)|(PNG)$/', $_FILES['fupload']['name']))
// проверка формата исходного изображения
    {
    $filename = $_FILES['fupload']['name'];
    $source = $_FILES['fupload']['tmp_name'];
    $target = $path_to_90_directory . $filename;
    move_uploaded_file($source, $target);
// загрузка оригинала в папку $path_to_90_directory
    if (preg_match('/[.](GIF)|(gif)$/', $filename)) {
    $im = imagecreatefromgif($path_to_90_directory.$filename);
// если оригинал был в формате gif, то создаем изображение в этом же формате. Необходимо для последующего сжатия
    }
    if (preg_match('/[.](PNG)|(png)$/', $filename)) {
    $im = imagecreatefrompng($path_to_90_directory.$filename);
// если оригинал был в формате png, то создаем изображение в этом же формате. Необходимо для последующего сжатия
    }
    if (preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename)) {
    $im = imagecreatefromjpeg($path_to_90_directory.$filename);
// если оригинал был в формате jpg, то создаем изображение в этом же формате. Необходимо для последующего сжатия
    }

    $date = time(); //вычисляем время в настоящий момент.
    imagejpeg($im, $path_to_90_directory.$date.".jpg");
//сохраняем изображение формата jpg в нужную папку, именем будет текущее время. Сделано,    чтобы у аватаров не было одинаковых имен.
//почему именно jpg? Он занимает очень мало места + уничтожается анимирование gif изображения, которое отвлекает пользователя. Не очень приятно читать его комментарий, когда краем глаза замечаешь какое-то движение.
    $avatar = $path_to_90_directory.$date.".jpg";
//заносим в переменную путь до аватара.
    $delfull = $path_to_90_directory.$filename;
    unlink ($delfull);
// удаляем оригинал загруженного изображения, он нам больше не нужен. Задачей было - получить миниатюру.
    }
    else
    {
// в случае несоответствия формата, выдаем соответствующее сообщение
    exit ("Аватар должен быть в формате <strong>JPG,GIF или PNG</strong>");
    }
//конец процесса загрузки и присвоения переменной $avatar адреса загруженной авы
    }
   /* $password = md5($password);//шифруем пароль
    $password = strrev($password);// для надежности добавим реверс
    $password = $password."333"; */
// подключаемся к базе
    include ("bd.php");
// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
// проверка на существование пользователя с таким же логином
    $result = mysqli_query($db, "SELECT id FROM users WHERE email='$email'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    // если такого нет, то сохраняем данные
    $result2 = mysqli_query($db, "INSERT INTO users (`id`, `name_pubg`, `id_pubg`, `avatar`, `password`, `email`)
     VALUES (NULL, '$name_pubg', '$id_pubg', '$avatar', '$password', '$email')");
    // Проверяем, есть ли ошибки
    if ($result2 == 'TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
    }
    else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    ?>