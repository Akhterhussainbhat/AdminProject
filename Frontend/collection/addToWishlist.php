<?php 
include("../../Backend/includes/connection.php");

if(isset($_POST['pid'])){
	$pid=$_POST['pid'];
	$ssql= "SELECT * from cart where pcode=$pid";
$result = mysqli_query($conn,$ssql);
$data= mysqli_fetch_assoc($result);
     $wid=$data['id'];
	$wname=$data['pname'];
	$wprice=$data['pprice'];
	$wimage=$data['pimage'];
	$wtotal=$data['total'];
	$wcode= $data['pcode'];
// add an element to wishlist
$ssql= "SELECT wcode from wishlist where wcode=$wcode";
$sresult = mysqli_query($conn,$ssql);
$sdata= mysqli_fetch_assoc($sresult);
$code=$sdata['wcode'];

   if(!$code){
	   $isql="INSERT INTO wishlist (wimage,wname, wprice, wtotal,wcode) VALUES ('$wimage', '$wname','$wprice','$wtotal','$wcode')";
   $iresult=mysqli_query($conn,$isql);
   echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Item is added to your WishList</strong> 
</div>'; 
   }
   else{
	   echo
	   '<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong> This Item is already in  your wishlist</strong> 
</div>'; 	   
   }
   
    
}
if(isset($_GET['remove'])){
	$id=$_GET['remove'];
	$dsql="DELETE FROM wishlist where id='$id'";
	$dresult=mysqli_query($conn,$dsql);
	if($dresult){
		echo("<script>location.href = 'wishlist.php';</script>");
}
}