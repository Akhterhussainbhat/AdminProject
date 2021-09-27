<?php
  include("../includes/connection.php");
  $s_id=$_GET['id'];
$sql= "Delete from subcat where id = '$s_id'";
//echo $sql;
//die;
$result= mysqli_query($conn,$sql);

header("Location:viewsubcategory.php");
?>