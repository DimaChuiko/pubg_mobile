<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db = mysqli_connect ("ut380919.mysql.tools", "ut380919_db", "SaY2X4QP") or die('Error. Can`t connect to MySQL server.');
    mysqli_select_db ($db ,"ut380919_db");
?>