<?php
    setcookie('user', $user['name'], time() - 3600, "/barber.php");
    header('Location: /barber.php');
?>