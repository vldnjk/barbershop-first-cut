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
       <form action="/zapisaca.php" method="post">
       <p>Привет <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a href="/exit.php">здесь</a> </p>
        <input type="text" name="user" id="user" placeholder = "user..." class="form-control">
         <!-- <input type="text" name="barber" id="barber" placeholder = "barbner..." class="form-control">
        <input type="text" name="service" id="service" placeholder = "service..." class="form-control"> -->
        <?php
            $query_barber ="SELECT name FROM staff WHERE role = 2";
            $result_barber = $conn->query($query_barber);
            if($result_barber->num_rows> 0){
            $options= mysqli_fetch_all($result_barber, MYSQLI_ASSOC);
            }
        ?>
        <select name="name">
            <option>Выберите сотрудника</option>
            <?php 
            foreach ($options as $option) {
            ?>
            <option><?php echo $option['name']; ?> </option>
            <?php 
            }
        ?>
         </select>
        <?php
            $query_service ="SELECT service FROM service";
            $result_service = $conn->query($query_service);
            if($result_service->num_rows> 0){
            $options= mysqli_fetch_all($result_service, MYSQLI_ASSOC);
            }
        ?>
        <select name="service">
            <option>Выберите услугу</option>
            <?php 
            foreach ($options as $option) {
            ?>
            <option><?php echo $option['service']; ?> </option>
            <?php 
            }
        ?>
         </select>
        <input type="date" name="date" id="date" placeholder = "data..." class="form-control">
        <Br></Br>
        <button type="submit" name="sendTask" class="btn btn-success"> OTPRAVIT</button>
       </form>

       <?php
            $query_appointment ="SELECT name FROM appointment";
            $result_appointment = $conn->query($query_appointment);
            if($result_barber->num_rows> 0){
            $options= mysqli_fetch_all($result_appointment, MYSQLI_ASSOC);
            }
        ?>
        <select name="name">
            <option>ваши записи</option>
            <?php 
            foreach ($options as $option) {
            ?>
            <option><?php echo $option['name']; ?> </option>
            <?php 
            }
        ?>
         </select>


       
</body>
</html>