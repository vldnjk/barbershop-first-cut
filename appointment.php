<!DOCTYPE html>
<html lang="ru">

<head>
  <meta name="description" content="Webpage description goes here" />
  <meta charset="utf-8">
  <title>Барбершоп "FIRST CUT"</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <p><img src="barber_logo.png" id="logo" alt="First Cut Logo" width="150" height="150" /></p>
</head>
<body>
<?php
            $conn = new mysqli('localhost','root','root','register-bd','3306');   
?>
    <div class="container mt-4">
       <h1> Запись в барбершоп FIRST CUT</h1>
       <p>Привет <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a href="/exit.php">здесь</a> </p>
       <form action="/validation-form/add-appoint.php" method="post">
  
        <!-- <input type="text" name="user" id="user" placeholder = "user..." class="form-control"> -->
        <?php
            $query_barber ="SELECT name FROM staff WHERE role = 2";
            $result_barber = $conn->query($query_barber);
            if($result_barber->num_rows> 0){
            $barbers= mysqli_fetch_all($result_barber, MYSQLI_ASSOC);
            }
        ?>
        <select name="barber">
            <option>Выберите сотрудника</option>
            <?php 
            foreach ($barbers as $barber) {
            ?>
            <option><?php echo $barber['name']; ?> </option>
            <?php 
            }
        ?>
         </select>
        <?php
            $query_service ="SELECT service FROM service";
            $result_service = $conn->query($query_service);
            if($result_service->num_rows> 0){
            $services= mysqli_fetch_all($result_service, MYSQLI_ASSOC);
            }
        ?>
        <select name="service">
            <option>Выберите услугу</option>
            <?php 
            foreach ($services as $service) {
            ?>
            <option><?php echo $service['service']; ?> </option>
            <?php 
            }
        ?>
         </select>
        <input type="date" name="date" id="date" placeholder = "data..." class="form-control">
        <Br></Br>
        <button type="submit" name="sendTask" class="btn btn-success"> Записаться </button>
       </form>

       <?php
            $cookies=$_COOKIE['user'];
            $query_appointment ="SELECT barber, date, id FROM appointment WHERE name='$cookies' ORDER BY ";
            $result_appointment = $conn->query($query_appointment);
            if($result_barber->num_rows> 0){
            $options= mysqli_fetch_all($result_appointment, MYSQLI_ASSOC);
            }
        ?>
        <td>Ваши записи:</td>
        <title>Таблица</title>
        <style type="text/css">
        TABLE {
            width: 300px; /* Ширина таблицы */
            border-collapse: collapse; /* Убираем двойные линии между ячейками */
        }
        TD, TH {
            padding: 3px; /* Поля вокруг содержимого таблицы */
            border: 1px solid black; /* Параметры рамки */
        }
        TH {
            background: #2BE890; /* Цвет фона */
        }
        </style>        


        <?php
        /* Все варианты сортировки */
        $sort_list = array(
            'date_asc'   => '`date`',
            'date_desc'  => '`date` DESC',
            'barber_asc'  => '`barber`',
            'barber_desc' => '`barber` DESC',   
        );
        
        /* Проверка GET-переменной */
        $sort = @$_GET['sort'];
        if (array_key_exists($sort, $sort_list)) {
            $sort_sql = $sort_list[$sort];
        } else {
            $sort_sql = reset($sort_list);
        }
        
        /* Функция вывода ссылок */
        function sort_link_th($title, $a, $b) {
            $sort = @$_GET['sort'];
        
            if ($sort == $a) {
                return '<a class="active" href="?sort=' . $b . '">' . $title . ' <i>▲</i></a>';
            } elseif ($sort == $b) {
                return '<a class="active" href="?sort=' . $a . '">' . $title . ' <i>▼</i></a>';  
            } else {
                return '<a href="?sort=' . $a . '">' . $title . '</a>';  
            }
        }
        ?>

        <table border="2"><tr><th><?php echo sort_link_th('Барбер', 'barber_asc', 'barber_desc'); ?> </th><th><?php echo sort_link_th('Дата', 'date_asc', 'date_desc'); ?></th><th> Отменить запись </th></tr>
        
            <?php 
            foreach ($options as $option) {
            ?><tr>
            <? $var_id = $option['id']; ?>
            <td><?php echo $option['barber']; ?> </td>
            <td><?php echo $option['date']; ?> </td>
            <?php
            echo '<td><a href="/delete.php?id='.$var_id.'"><button type="submit" name="sendTask" class="btn btn-warning"> Отменить </button></a></td>'
            ?>
            </tr>
            <?php 
            }
        ?>
         </table>


       
</body>
</html>