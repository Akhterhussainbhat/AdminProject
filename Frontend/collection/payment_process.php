<?php 
include("../../Backend/includes/connection.php");

if(isset($_POST['amt'])&&isset($_POST['name'])){
//$payment_id=$_POST['payment_id'];
$amt=$_POST['amt'];
$name=$_POST['name'];
$payment_status="Pending";
$added_on=date('Y-m-d h:i:s');
$sql ="INSERT INTO payment(name,amount,payment_status,added_on) VALUES('$name','$amt','$payment_status','$added_on')";
$result=mysqli_query($conn,$sql);
 $_SESSION['OID']=mysqli_insert_id($conn);

	
if(isset($_POST['payment_id'])&&isset($_SESSION['OID'])){
$payment_id=$_POST['payment_id'];

$sql ="UPDATE  payment set payment_status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'";
$result1=mysqli_query($conn,$sql);

}	
	
	





?>
