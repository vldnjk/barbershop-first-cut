<!DOCTYPE html>
<html lang="ru">

<head>
  <meta name="description" content="Webpage description goes here" />
  <meta charset="utf-8">
  <title>Барбершоп "FIRST CUT" ПАНЕЛЬ АДМИНИСТРИРОВАНИЯ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <p><img src="barber_logo.png" id="logo" alt="First Cut Logo" width="150" height="150" /></p>
</head>
<body>
    <div class="container mt-4">
        <?php
            if($_COOKIE['user'] == ''):
        ?>

        <div class="row">
            <div class="col">
                <h1>Форма авторизации</h1>
                <form action="validation-form/auth.php" method="post">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"> <br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"> <br>
                    <button class="btn btn-success" type="submit">Авторизоваться</button>
                </form>
            </div>
        </div>   
    </div>
    <?php else:?>
        <p>Привет <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a href="/exit.php">здесь</a> </p>
    <?php endif;?>
   
</body>
</html>