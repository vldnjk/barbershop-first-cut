<?php
    //$name = filter_var(trim($_POST['user']), FILTER_SANITIZE_STRING);
    $name = $_COOKIE['user'];
    $barber = $_POST['barber'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    //require "/blocks/connect.php";    
    $mysql = new mysqli('localhost','root','root','register-bd','3306');
    $sql = "INSERT INTO appointment (name, barber, service, date) VALUES('$name', '$barber', '$service', '$date')";
    $mysql->query($sql);
    $mysql->close();

    header('Location: /');
?>
И ТРИ ИНСЕРТА ИЗ В ТЬОБЛИЧУКЕ