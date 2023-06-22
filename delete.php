<?php
$conn = new mysqli('localhost','root','root','register-bd','3306');

$delete = mysqli_real_escape_string($conn, $_GET["id"]);
$sql ="DELETE FROM appointment WHERE id = '$delete'";
mysqli_query($conn, $sql);
header('Location: /appointment.php');


?>