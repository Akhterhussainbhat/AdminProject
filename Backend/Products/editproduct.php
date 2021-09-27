<?php
$sid=$_GET['id'];
include("../includes/connection.php");
if(!isset($_SESSION['username'])){
	echo("<script>location.href = 'loginadmin.php';</script>");
}else
include("../includes/header.php");
$sql= "SELECT  formtable.title as cattitle, subcat.title as subcattitle, products.* from formtable JOIN subcat on formtable.id=subcat.catid join products on subcat.id=products.subcatid where products.id='$sid'  ";
$result= mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);




if(isset($_POST['submit'])){
	$CatId=$_POST['cateid'];
	$SubCatId=$_POST['subcatid'];
	$ProductTitle=$_POST['producttitle'];
	$ProductDescription=$_POST['productdescription'];
	$ActualPrice=$_POST['actualPrice'];
	$Discount=$_POST['discount'];
	$SalesPrice=$_POST['salesPrice'];
	if(!empty($_FILES['image']['name'])){
$file_name= $_FILES['image']['name'];
$file_temp=$_FILES['image']['tmp_name'];
$file_destination="../uploadPicture/".$file_name;
 move_uploaded_file($file_temp,$file_destination);
}
else{
	$file_destination=$data['image'];
}
$sql1= "UPDATE products set catid='$CatId',subcatid='$SubCatId', Producttitle='$ProductTitle',productdescription='$ProductDescription',actualPrice='$ActualPrice',discount='$Discount',salesPrice='$SalesPrice', image='$file_destination' where id='$sid'";
  
  $edit = mysqli_query($conn,$sql1);  
  if($edit){
	 echo("<script>location.href = 'viewproduct.php';</script>");
  }
  else{
	  echo "error";
  }
}
?>

<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Validation Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo baseUrl ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="content-wrapper">
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">SubCategory Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form id="quickForm" action="" method="POST"  enctype="multipart/form-data">
                <div class="card-body">
				  <div class="form-group">
                    <label for="catid"> Category Title</label>
                    <select class="form-control" id="cateid" name="cateid"  >
					<option value="" >Select Your Category </option>
					<?php
					$sql2= "SELECT * from formtable";
					$result2= mysqli_query($conn,$sql2);
					while($fetch2= mysqli_fetch_assoc($result2)){
						?>
						<option value="<?php echo $fetch2['id']?>" <?php if($fetch2['id']== $data['catid']){echo "selected";}?>> <?php echo $fetch2['title']?></option>
					<?php
					}	
					?>
					</select>
                  </div>
				     <div class="form-group" id="subcatdiv">
                    <label for="catid">Sub Category Title</label>
                    <select class="form-control" id="subcatid" name="subcatid">
					<?php
					$sql3= "SELECT * from subcat ";
					$result3= mysqli_query($conn,$sql3);
					while($fetch3= mysqli_fetch_assoc($result3)){
						?>
						<option value="<?php echo $fetch3['id']?>"<?php if($fetch3['id']==$data['subcatid']){ echo "selected";}?>><?php echo $fetch3['title']?></option>
					<?php
					}	
					?>
					</select>
                  </div>
	                  <div class="form-group">
                    <label for="producttitle"> Product TiTle</label>
                    <input type="text" name="producttitle" value="<?php echo $data['Producttitle'];?>" class="form-control" id="producttitle" placeholder="Product Title">
                  </div>
				
                  <div class="form-group">
                    <label for="productdescription">Product Description</label>
                    <input type="textare" name="productdescription" value="<?php echo $data['productdescription'];?>" class="form-control" id="productdescription" placeholder="Product Description">
                  </div>
				  				  <div class="form-group">
                    <label for="actualPrice">Actual Price</label>
                    <input type="number" name="actualPrice" value="<?php echo $data['actualPrice'];?>" class="form-control" id="actualPrice" placeholder="Atual Price">
                  </div>
				  <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="number" name="discount" value="<?php echo $data['discount'];?>" class="form-control" id="discount" placeholder="Enter Discount from 1-100%">
                  </div>
				   <div class="form-group" >
				   <label for="salesPrice">Sales Price</label>
				   <input type="number" name="salesPrice" value="<?php echo $data['salesPrice'];?>"  class="form-control" id="salesPrice" placeholder="Sales price of your product">
				   </div>
				  
				  <div class="form-group">
                    <label for="image">Product Image</label>
                   <input type="file"  id="image" name="image"/>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit"  onClick="return confirm('Do you want to update Successfully?')"class="btn btn-primary">Submit</button>&nbsp &nbsp &nbsp &nbsp
				  
                </div>
				
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
	</div>
	<?php
include("../includes/footer.php");
?>
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script >
$(document).ready(function(){
	$( "#cateid" ).change(function (){
    var cateid = $(this).val();
        $.ajax({
            url: "proEditAjax.php",
           type:"POST",
            data: {cateid:cateid},
            success: function(data) {
                $("#subcatdiv").replaceWith(data); 
            },
        });
});
$("#discount,#actualPrice").keyup( function() {
            var main = $('#actualPrice').val();
            var disc = $('#discount').val();
            var dec = (disc / 100).toFixed(2); 
            var mult = main * dec; 
            var discont = main - mult;
            $('#salesPrice').val(discont);
        });
});
</script>