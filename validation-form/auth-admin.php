<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    
    
    $pass = md5($pass."stasibass1337sault"); 

    //require "blocks/connect.php"
    $mysql = new mysqli('localhost','root','root','register-bd','3306');
    $result = $mysql->query("SELECT * FROM users WHERE login = '$login' AND pass = '$pass'");
    $user = $result->fetch_assoc();
    if(count($user) == 0){
        echo "Такой пользователь не найден";
        exit();
    }

    setcookie('user', $user['name'], time() + 3600, "/");
    

    $mysql->close();

    header('Location: /');
?>