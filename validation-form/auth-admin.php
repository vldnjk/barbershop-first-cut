<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    
    
    $pass = md5($pass."secret-sault"); 

 //   require "/blocks/connect.php";
    $mysql = new mysqli('localhost','root','root','register-bd','3306');
    $result = $mysql->query("SELECT * FROM staff WHERE login = '$login' AND pass = '$pass'");
    $user = $result->fetch_assoc();
    if(count($user) == 0){
        echo "Такой пользователь не найден";
        exit();
    }
    if ($user['role'] == 1){
         setcookie('user', $user['name'], time() + 3600, "/admin.php");
         $mysql->close();
         header('Location: /admin.php');
    }
    elseif ($user['role'] == 2){
        setcookie('user', $user['name'], time() + 3600, "/barber.php");
        $mysql->close();
        header('Location: /barber.php');
    }
 
    $mysql->close();
    header('Location: /');
    
?>