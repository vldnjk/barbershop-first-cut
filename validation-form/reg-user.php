<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    
    if(mb_strlen($login) < 5 || mb_strlen($login) > 90){
        echo "Недопустимая длина логина";
        exit();
    } else if (mb_strlen($name) < 1 || mb_strlen($name) > 50){
        echo "Недопустимая длина имени";
        exit();
    } else if (mb_strlen($pass) < 4 || mb_strlen($pass) > 16){
        echo "Недопустимая длина пароля (от 4 до 16 символов)";
        exit();
    }
    
    $pass = md5($pass."secret-sault"); 
 //   require "/blocks/connect.php";
    $mysql = new mysqli('localhost','root','root','register-bd','3306');
    $sql = "INSERT INTO users (login, pass, name) VALUES('$login', '$pass', '$name')";
    $mysql->query($sql);
    $mysql->close();

    header('Location: /');
?>