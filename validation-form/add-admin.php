<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    $status = filter_var(trim($_POST['status']), FILTER_SANITIZE_STRING);
    $role = filter_var(trim($_POST['role']), FILTER_SANITIZE_STRING);
    
    
    $pass = md5($pass."secret-sault"); 
    //require "blocks/connect.php"
    $mysql = new mysqli('localhost','root','root','register-bd','3306');
    $sql = "INSERT INTO staff (login, pass, name, status, role) VALUES('$login', '$pass', '$name', '$status', '$role')";
    $mysql->query($sql);
    $mysql->close();

    header('Location: /admin.php');
?>