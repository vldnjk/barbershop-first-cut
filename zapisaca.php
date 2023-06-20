<?php 

    $user = filter_var(trim($_POST['user']), FILTER_SANITIZE_STRING);
    $barber = filter_var(trim($_POST['barber']), FILTER_SANITIZE_STRING);
    $service = filter_var(trim($_POST['service']), FILTER_SANITIZE_STRING);
    $date = filter_var(trim($_POST['date']), FILTER_SANITIZE_STRING);
    if($service == ''){
        echo 'Veevdiete znachenit';
        exit();
    }

    $mysql = new mysqli('localhost','root','root','register-bd','3306');
    $sql = "INSERT INTO appointment (name, barber_name, service, date) VALUES('$user','$barber','$service','$date')";
    $mysql->query($sql);
    $mysql->close();
    header('Location: /add-zapis.php');
?>