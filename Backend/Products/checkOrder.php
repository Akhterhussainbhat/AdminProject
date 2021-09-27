<?php
include("../includes/connection.php");
if(!isset($_SESSION['username'])){
	echo("<script>location.href = 'loginadmin.php';</script>");
}else
include("../includes/header.php");
$sql= "SELECT * FROM orders";
$result=mysqli_query($conn,$sql);
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo baseUrl ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo baseUrl ?>/dist/css/adminlte.min.css">
</head>
<body>
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View your order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">View Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title">Order Details</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">id</th>
                      <th>Track ID</th>
                      <th>Product ID</th>
					  <th>Date</th>
					  <th>Order ID</th>
					  <th>Status</th>
					  <th>Choose Status</th>
                    </tr>
                  </thead>
				  
				  <?php
				  $i=1;
				  while($rows=mysqli_fetch_assoc($result)){
					  
				  ?>
                 <tbody>
    <tr>
      <td><?php echo $i++;?></td>
      <td><?php echo $rows['track_id'];?></td>
	  <td><?php echo $rows['product_id'];?></td>
	  <td><?php echo $rows['date'];?></td>
	  <td><?php echo $rows['order_id'];?></td>
	   <?php
      $status=$rows['status'];
      $status_msg="Order confirmed";
            if($status==1){
                $status_msg="Picked by courier";
            }
            if($status==2){
                $status_msg="On the way";
            }
            if($status==3){
                $status_msg="Ready for pickup";
            }
            ?>
	   <td><?php echo $status_msg;?></td>
	    <td> <select name="status" class="status" id="<?php echo $rows['id'];?>" class="form-control" >
          <option value="0">Order confirmed</option>
          <option value="1">Picked by courior</option>
          <option value="2">On the way</option>
          <option value="3">Ready for pickup</option>
      </td>
      
    </tr>
  </tbody>
  <?php
								}
						  ?>
                </table>
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
		  </div>
		  <?php
include("../includes/footer.php");
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>


$(".status").change(function() {
    var id=$(this).attr('id');
    var val=$(this).val(); 
   
    $.ajax({
        url: 'updateOrder.php',
        type: 'post',
        data: {"value":val , "id": id},
        
        success: function(response) {
            swal.fire({
            'text':response,
            confirmButtonText: `OK`,
            'icon':'success',
            'type':'success',
             

     
        }).then(function(){
            window.location="checkOrder.php";
        });
           }
          });
    });



      
  </script>
