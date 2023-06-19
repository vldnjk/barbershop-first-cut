<?php
    setcookie('user', $user['name'], time() - 3600, "/admin.php");
    header('Location: /admin.php');
?>