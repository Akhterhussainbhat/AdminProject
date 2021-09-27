<?php 
include("../includes/connection.php");
if(isset($_POST['value']))
{
    $value=$_POST['value'];
    $id=$_POST['id'];
    $q="UPDATE `orders` SET status='$value' WHERE id='$id' ";
    mysqli_query($conn,$q);
    echo "Order status changed";

}
  
?>