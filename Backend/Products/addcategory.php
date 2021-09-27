<?php
include("../includes/connection.php");
if(!isset($_SESSION['username'])){
	echo("<script>location.href = 'loginadmin.php';</script>");
}else
include("../includes/header.php");
if(isset($_POST['submit'])){
	$Title=$_POST['title'];
	$Description=$_POST['description'];	
	$Status= $_POST['status'];
		$file_name= $_FILES['image']['name'];
$file_temp=$_FILES['image']['tmp_name'];
$file_destination="../uploadPicture/".$file_name;
 move_uploaded_file($file_temp,$file_destination);
$sql="INSERT INTO formtable(title,description,status, image)VALUES('$Title','$Description', '$Status','$file_destination')";
$result=mysqli_query($conn,$sql);
if($result){
	echo("<script>location.href = 'viewcategory.php';</script>");
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
</head>
<body>
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add your Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="" method="POST"  enctype="multipart/form-data">
                <div class="card-body">
				
                  <div class="form-group">
                    <label for="title"> Category TiTle</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                  </div>
				 
                  <div class="form-group">
                    <label for="description"> Category Description</label>
                    <input type="textarea" name="description" class="form-control" id="description" placeholder="Description">
                  </div>
				  
				  <div class="form-group">
                    <label for="image">Category Image</label>
                   <input type="file"  id="image" name="image"/>
                  </div>
				  <div>		
				
<label for="status">Status: </label>
<select name="status">
<option value="1">Active</option>
<option value="0">inActive</option>
</select><br>
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
