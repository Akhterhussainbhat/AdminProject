<?php
$sid=$_GET['id'];
include("../includes/connection.php");
if(!isset($_SESSION['username'])){
	echo("<script>location.href = 'loginadmin.php';</script>");
}else
include("../includes/header.php");




$sql= "SELECT * from subcat where id='$sid'";
$result= mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);


if(isset($_POST['submit'])){
	$Name=$_POST['cateid'];
	$Title=$_POST['title'];
	$Description=$_POST['description'];	
	
	if(!empty($_FILES['image']['name'])){
$file_name= $_FILES['image']['name'];
$file_temp=$_FILES['image']['tmp_name'];
$file_destination="../uploadPicture/".$file_name;
 move_uploaded_file($file_temp,$file_destination);
}
else{
	$file_destination=$data['image'];
}
$sql1= "UPDATE subcat set catid='$Name', title='$Title',description='$Description',image='$file_destination' where id='$sid'";
  
  $edit = mysqli_query($conn,$sql1);  
  if($edit){
	 echo("<script>location.href = 'viewsubcategory.php';</script>");
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
                <h3 class="card-title">Product Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action=" " method="POST"  enctype="multipart/form-data">
                <div class="card-body">
				
				<div class="form-group">
                    <label for="catid">CatId</label>
                    <select class="form-control" name="cateid" >
					
					<?php
					$sql2= "SELECT * from formtable  ";
					$result2= mysqli_query($conn,$sql2);
					while($fetch2= mysqli_fetch_assoc($result2)){
						?>
						<option value="<?php echo $fetch2['id']?>"<?php if($fetch2['id']== $data['catid']){echo "selected";}?>> <?php echo $fetch2['title']?></option>
					<?php
					}	
					?>
					</select>
                  </div>
				  
                  <div class="form-group">
                    <label for="title"> Product TiTle</label>
                    <input type="text" value="<?php echo $data['title'];?>" name="title" class="form-control" id="title" placeholder="Title">
                  </div>
				  
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="textarea" value="<?php echo $data['description'];?>" name="description" class="form-control" id="description" placeholder="Description">
                  </div>
				  
				  <div class="form-group">
                    <label for="image">Product Image</label>
                   <input type="file"  id="image" name="image"/>
                  </div>
  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
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
</body>
</html>