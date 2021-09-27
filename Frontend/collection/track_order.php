<?php 
include("../../Backend/includes/connection.php");
include("../includepages/header.php");
$sql= "SELECT * FROM orders";
$result=mysqli_query($conn,$sql);

?>

<head>
<link rel="stylesheet" href="<?php echo baseurl?>/css/track.css" type="text/css">
</head>
<div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
	
		<?php 
		while($row=mysqli_fetch_array($result)){
			
			
			$status=$row['status'];
			$status_msg="Order Confirmed";
			if($status==1){
				$status_msg="Picked by Courier";
			}
			if($status==2){
				$status_msg="On The Way";
			}
			if($status==3){
				$status_msg="Ready for Pick Up";
			}
			?>
        <div class="card-body border">
		
            <h6>Order ID: <?php echo $row['order_id']?></h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br><?php echo $row['date'];?> </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> SPORTS AND STUDY, | <i class="fa fa-phone"></i> +91-6005598533 </div>
                    <div class="col"> <strong>Status:</strong> <br> <?php echo $status_msg;?> </div>
                    <div class="col"> <strong>Tracking ID:</strong> <br> <?php echo $row['track_id'];?> </div>
                </div>
            </article>
            <div class="track">
			<?php
			$class1= $status>=1?"step active" :"step";
			$class2= $status>=2?"step active" :"step";
			$class3= $status>=3?"step active" :"step";
			?>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="<?php echo $class1;?>"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="<?php echo $class2;?>"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="<?php echo $class3;?>"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
            </div>
            <hr>
            <ul class="row">
			<?php 
			$products=explode(",",$row['product_id']);
			//print_r($products);
			//exit;
                 foreach($products as $pro){
				$sql1="SELECT * FROM cart where id=$pro";
				$result1=mysqli_query($conn,$sql1);
				while($data= mysqli_fetch_assoc($result1)){	
							?>
                <li class="col-md-3">
                    <figure class="itemside mb-">
                        <div class="aside"><img src="../../Backend/uploadPicture/<?php echo $data['pimage'];?>" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title"><br>Quantity: </p> <span class="text-muted"><?php echo $data['qty'];?> </span>
                        </figcaption>
                    </figure>
                </li>
				<?php 
				 }
				 }
				 ?>
            </ul> 
        </div>
		<?php }?>
		 <hr>
            <a href="<?php echo checkout_cart?>" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left" ></i> Back to orders</a>
    </article>
</div>
<?php
include("../includepages/footer.php");
?>