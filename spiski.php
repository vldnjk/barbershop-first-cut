<?php
 $conn = new mysqli('localhost','root','root','register-bd','3306');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    $query_service ="SELECT service FROM service";
    $result = $conn->query($query_service);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
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
