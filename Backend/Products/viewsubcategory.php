<?php
include("../includes/connection.php");
if(!isset($_SESSION['username'])){
	echo("<script>location.href = 'loginadmin.php';</script>");
}else
include("../includes/header.php");

$sql= "SELECT formtable.title as cattitle, subcat.* FROM formtable JOIN subcat ON subcat.catid =formtable.id";
$result=mysqli_query($conn,$sql);
if(isset($_POST['submitbtn'])){
	 echo("<script>location.href = 'addsubcategory.php';</script>");

}
else{
	echo "not submit";
}

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
            <h1>View your SubCategory</h1>
			<a href='<?php echo addsub?>'><input type='submit' class="btn btn-danger" value='addsubcategory'></a>
		
          </div>
		  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">View SubCategory</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title">SubCategory Details</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">id</th>
					  <th> Cat Title</th>
                      <th> SubCat Title</th>
                      <th>Description</th>
					  <th> Image</th>
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
      <td><?php echo $rows['title'];?></td>
	  <td><?php echo $rows['description'];?></td>
	<td><img src="<?php echo $rows['image'];?>" height="50px" width="50px"></td>
	  <td>
	<a href='<?php echo deletesub?>?id=<?php echo $rows['id']; ?> '><input type='submit' onClick="return confirm('Do you want to delete element?')" class="btn btn-danger"value='Delete'></a>
	<a href='<?php echo editsub?>?id=<?php echo $rows['id']; ?>'><input type='submit' class="btn btn-primary" value='Edit'></a>
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
</body>
</html>
