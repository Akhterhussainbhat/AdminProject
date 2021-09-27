<?php
include("../includes/connection.php");
if(!isset($_SESSION['username'])){
	echo("<script>location.href = 'loginadmin.php';</script>");
}else
include("../includes/header.php");
$sql= "SELECT  formtable.title as cattitle, subcat.title as subcattitle, products.* from formtable JOIN subcat on formtable.id=subcat.catid join products on subcat.id=products.subcatid";
$result=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
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
            <h1>View your Products</h1>
			<a href='<?php echo addproducturl?>'><input type='submit' class="btn btn-danger" value='addproduct'></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo indexUrl?>">Home</a></li>
              <li class="breadcrumb-item active">View Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title">Product Details</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">id</th>
					  <th>Cat Title</th>
                      <th>SubCat Title</th>
					  <th>Product Title</th>
                      <th>product Description</th>
					  <th>Actual Price </th>
					  <th>Discount</th>
					  <th>Sales price</th>
					  <th>status</th>
					  <th>Image</th>
					  <th>Choose one</th>
                    </tr>
                  </thead>
				  
				  <?php
				  $i=1;
				  while($rows=mysqli_fetch_assoc($result)){
					  
				  ?>
                 <tbody>
    <tr>
	<td><?php echo $i++;?></td>
      <td><?php echo $rows['cattitle'];?></td>
	  <td><?php echo $rows['subcattitle'];?></td>
      <td><?php echo $rows['Producttitle'];?></td>
	  <td><?php echo $rows['productdescription'];?></td>
	  <td><?php echo $rows['actualPrice'];?></td>
	  <td><?php echo $rows['discount'];?>%</td>
	  <td> <?php echo $rows['salesPrice'];?></td>
	  
	   <td> 
	   <center
	    <div class="form-check form-switch">
  <input class="form-check-input" <?php if($rows['status']=='1'){echo "checked";}?>  onclick="toggleStatus(<?php echo $rows['id']?>)" type="checkbox" id="check" >
</div>
</center>
</td>
	   
						
					
	<td><img src="<?php echo $rows['image'];?>" height="50px" width="50px"></td>
	  <td>
	<a href='<?php echo deleteproducturl?>?id=<?php echo $rows['id']; ?> '><input type='submit' onClick="return confirm('Do you want to delete element?')" class="btn btn-danger"value='Delete'></a>
	<a href='<?php echo editproducturl?>?id=<?php echo $rows['id']; ?>'><input type='submit' class="btn btn-primary" value='Edit'></a>
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
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>

function toggleStatus(id){
		var id = id ;
		
		$.ajax({
			url:"toggle.php",
			type:"post",
			data:{catId:id},
			success :function(result){
				
				if(result == '1'){
				   swal("Done!","status is ON","success");		
				}
				else{
					swal("Done!","status is OFF","success");  
					 
				}
			}
		});
	 }
</script>
</body>
</html>
