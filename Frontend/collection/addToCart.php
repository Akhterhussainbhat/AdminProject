<?php 
include("../../Backend/includes/connection.php");

if(isset($_POST['pid'])){
	$pid=$_POST['pid'];
	$ssql= "SELECT * from products where id=$pid";
$result = mysqli_query($conn,$ssql);
$data= mysqli_fetch_assoc($result);
     $pid=$data['id'];
	$pname=$data['Producttitle'];
	$pprice=$data['salesPrice'];
	$pimage=$data['image'];
	$pcode=$data['id'];
	$qty=1;
// add an element in cart
$ssql= "SELECT pcode from cart where pcode=$pid";
$sresult = mysqli_query($conn,$ssql);
$sdata= mysqli_fetch_assoc($sresult);
$code=$sdata['pcode'];
   if(!$code){
	   $isql="INSERT INTO cart (pimage,pname, pprice, qty, total,pcode) VALUES ('$pimage', '$pname','$pprice','$qty','$pprice','$pcode')";
   $iresult=mysqli_query($conn,$isql);
   echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Item is added to your Cart</strong> 
</div>'; 
   }
   else{
	   echo
	   '<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong> This Item is already in  your Cart</strong> 
</div>'; 	   
   }
   
    
}
/// delete element from cart
if(isset($_GET['remove'])){
	$id=$_GET['remove'];
	$dsql="DELETE FROM cart where id='$id'";
	$dresult=mysqli_query($conn,$dsql);
	if($dresult){
		echo("<script>location.href = 'shop_cart.php';</script>");
}
}

if(isset($_POST['cqty'])){
	
	$cid=$_POST['cid'];
	$cprice=$_POST['cprice'];
	$cqty=$_POST['cqty'];
	$tprice= $cqty*$cprice;
	$usql= "UPDATE cart set id='$cid',total='$tprice',qty='$cqty' where id=$cid";
	$result1 = mysqli_query($conn,$usql);	
}


   ?>