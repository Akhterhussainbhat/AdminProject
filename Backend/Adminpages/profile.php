<?php
include("../includes/connection.php");


if(!isset($_SESSION['username'])){
	echo("<script>location.href = 'loginadmin.php';</script>");
}else
	


include("../includes/header.php");
$sql= "SELECT * from adminprofile where id=1";
$result= mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result);




if(isset($_POST['submitbtn'])) 
{
	
$Name= $_POST['name'];
$Email= $_POST['email'];
$Address = $_POST['address'];
$Education= $_POST['education'];
$Skills=$_POST['skills'];
if(!empty($_FILES['image']['name'])){
	
$file_name= $_FILES['image']['name'];
$file_temp=$_FILES['image']['tmp_name'];
$file_destination="../uploadPicture/".$file_name;
move_uploaded_file($file_temp,$file_destination);
 }
else{
	$file_destination=$data['image'];
}
$sql1= "UPDATE adminprofile set name='$Name',email='$Email',address='$Address' ,education='$Education',skills='$Skills',image='$file_destination' where id=1";
$edit = mysqli_query($conn,$sql1);
  
    if($edit)
    {
      	 echo("<script>location.href = 'profile.php';</script>");
    }   else{
           echo "error"; 
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>

.error{
	color:red;
}
</style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                      src="<?php echo $data['image'];?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $data['name'];?></h3>

                <p class="text-muted text-center"><?php echo $data['email'];?></p>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  <?php echo $data['education'];?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i>Address</strong>

                <p class="text-muted"><?php echo $data['address'];?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <?php echo $data['skills'];?>
                </p>
</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Admin Profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  </div>
                  <!-- /.tab-pane -->
              
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="" method="POST" id="form" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="<?php echo $data['name'];?>" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="<?php echo $data['email'];?>" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" name="address" value="<?php echo $data['address'];?>" class="form-control" id="inputName2" placeholder="Address">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Education</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="education" value="<?php echo $data['education'];?>" id="inputExperience" placeholder="Education"/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" name="skills" value="<?php echo $data['skills'];?>" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
					  
					   <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input  type="file"  id="image" name="image"/><br>
						  <img src="../upload_picture/<?=$data['image'];?>" height="70px" width="70px" />

                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="submitbtn" class="btn btn-primary">UpDate</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>


<?php
include("../includes/footer.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
	
$("#form").validate({
rules: {
name : {
required: true,
minlength: 3,
},
email: {
required: true,
minlength: 3
},
address: {
required: true,
},
education: {
required: true,
},
skills: {
required: true,
},
messages : {
name: {
	required: "Please enter your old name",
minlength: "Name should be at least 3 characters"
},
email: {
	required: "Please enter your new password",
minlength: "Name should be at least 3 characters"
},
address: {
required: "Please enter your new password",
minlength: "Name should be at least 3 characters"
},

}
}

});
});
</script>

   