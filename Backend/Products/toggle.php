<?php
	  include("../includes/connection.php");
       $catId = $_POST['catId'];
	   $sql = "select * from products where id = $catId";
	   $result = mysqli_query($conn,$sql);
	   $data = mysqli_fetch_assoc($result);
	   $status = $data['status'];
	    
		if($status == '1'){
			
			$status = '0';
			
		}
		else{
			
			$status = '1';
			
		}
	
	 $update = "update products set status = '$status' where id = $catId";
	 $result1 = mysqli_query($conn,$update);
	 if($result1){
		 echo $status;
	 }
?>