<?php
  include("../includes/connection.php");
  $s_id=$_GET['id'];
$sql= "Delete from products where id = '$s_id'";
//echo $sql;
//die;
$result= mysqli_query($conn,$sql);

header("Location:viewproduct.php");
?>
                   