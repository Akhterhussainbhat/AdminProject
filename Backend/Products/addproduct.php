<?php
include("../includes/connection.php");
if(!isset($_SESSION['username'])){
	echo("<script>location.href = 'loginadmin.php';</script>");
}else
include("../includes/header.php");
if(isset($_POST['submit'])){
	$CatId= $_POST['cateid'];
	$SubCatID= $_POST['subCatId'];
	$ProductTitle= $_POST['producttitle'];
	$ProductDescription=$_POST['productdescription'];
	$ActualPrice= $_POST['actualPrice'];
	$Discount= $_POST['discount'];
	$SalesPrice=$_POST['salesPrice'];
	$status=1;
	$file_name=$_FILES['image']['name'];
	$file_temp= $_FILES['image']['tmp_name'];
	$file_destination="../uploadPicture/".$file_name;
	move_uploaded_file($file_temp, $file_destination);
	
	
	$sql="INSERT INTO products(catid,subcatid,producttitle,productdescription,actualPrice,discount,salesPrice,status,image)VALUES('$CatId','$SubCatID','$ProductTitle','$ProductDescription','$ActualPrice','$Discount','$SalesPrice','$status', '$file_destination')";
	$result= mysqli_query($conn,$sql);
	$id=mysqli_insert_id($conn);
	if(isset($_GET['id']) && $_GET['id']!=''){
	

	}else{
    		
	if(isset($_FILES['images'])){
		foreach($_FILES['images']['name'] as $key=>$val){
			$file_name1=$_FILES['images']['name'][$key];
	//$file_temp= $_FILES['images']['tmp_name'][$key];
	//$file_destination1="../uploadPicture/".$file_name1;
	move_uploaded_file($_FILES['images']['tmp_name'][$key], "../allProductImages/".$file_name1);
	$sql1="INSERT INTO productimages(proid,product_image) VALUES('$id','$file_name1')";
	   $result1=mysqli_query($conn,$sql1);	
		}	
	}	
	}	
	if($result){
	echo("<script>location.href = 'viewproduct.php';</script>");
  }
  else{
	  echo "error  is in your inserting data please check your code before insert your data";
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
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
			<a href='<?php echo viewproducturl?>'><input type='submit'  class="btn btn-danger" value='ViewProduct'></a>
		
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-green">
              <div class="card-header">
                <h3 class="card-title">Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="" method="POST"  enctype="multipart/form-data">
                <div class="card-body">
				
				 <div class="form-group">
                    <label for="cateid"> Category Title</label>
                    <select class="form-control" id="cateid" name="cateid"  >
					<option  value="" >Select Your Category </option>
					<?php
					$sql2= "SELECT * from formtable ";
					$result2= mysqli_query($conn,$sql2);
					while($fetch2= mysqli_fetch_assoc($result2)){
						?>
						<option value="<?php echo $fetch2['id']?>"><?php echo $fetch2['title']?></option>
					<?php
					}	
					?>
					</select>
                  </div>
				  <div class="form-group" id="subcatdiv">
                    <label for="catid">Sub Category Title</label>
                    <input type="text" name="subCatId" class="form-control"  placeholder="please select your category">
                  </div>

	                 <div class="form-group">
                    <label for="producttitle"> Product TiTle</label>
                    <input type="text" name="producttitle" class="form-control" id="producttitle" placeholder="Product Title">
                  </div>
				
                  <div class="form-group">
                    <label for="productdescription">Product Description</label>
                    <input type="textarea" name="productdescription" class="form-control" id="productdescription" placeholder="Product Description">
                  </div>
				  <div class="form-group">
                    <label for="actualPrice">Actual Price</label>
                    <input type="number" name="actualPrice" class="form-control" id="actualPrice" placeholder="Atual Price">
                  </div>
				  <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="number" name="discount" class="form-control" id="discount" placeholder="Enter Discount from 1-100%">
                  </div>
				   <div class="form-group" >
				   <label for="salesprice">Sales Price</label>
				   <input  type="number" name="salesPrice"  class="form-control" id="salesprice"  placeholder="Sales price of your product">
				
				   </div>
				  <div class="row" id="image_box">
				  <div class="form-group col-lg-8">
				  <label for="image">Product Image</label>
				  
				  <input type='file' id="uploadfile" name="image" class="form-control" onchange="readURL(this);"/><br>
                  <img id="blah" src="" width="150px" height="150px" alt="this image will be stored"/>
                    
                  </div>
				   
				  <div class="col-lg-4 mt-4">
				  <button type="button" name="submit" onclick="add_more_images()" class="btn btn-primary">Add Image</button>
				  </div>
                 </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>&nbsp &nbsp &nbsp &nbsp
				  <button type="reset" name="reset" class="btn btn-danger">Reset</button>
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
$( "#cateid" ).change(function () {

    var cateid = $(this).val();
	
        $.ajax({
            url: "dynamicajax.php",
           type:"POST",
            data: {cateid:cateid},
            success: function(data) {
                $("#subcatdiv").replaceWith(data);      
            },
        });
});
 $("#actualPrice,#discount").keyup( function() {
            var main = $('#actualPrice').val(); //1000
            var disc = $('#discount').val();//10
            var dec = (disc / 100).toFixed(2); //.1
            var mult = main * dec; // 100
            var discont = main - mult;
            $('#salesprice').val(discont);
        });	
});
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
   $("#camerbtn").click(function(){
	   $("#uploadfile").click();
   });
</script>
<script type="text/javascript">
var total_image=1;
   function add_more_images(){
	   var html='<div class="form-group col-lg-4" id="all_img_'+total_image+'"><label for="image">Product Image</label> <input type="file" id="uploadfile" name="images[]" class="form-control" required/> <button type="button" onclick=remove_image("'+total_image+'") class="btn btn-sm btn-danger">Remove</button></div>';
	  $('#image_box').append(html);
   } 
    function remove_image(id){
		$('#all_img_'+id).remove();
		
		
	}
</script>





















