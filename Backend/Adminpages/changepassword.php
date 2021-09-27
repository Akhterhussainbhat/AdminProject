<?php
include("../includes/connection.php");
if(!isset($_SESSION['username'])){
	echo("<script>location.href = 'loginadmin.php';</script>");
}else
include("../includes/header.php");
if(isset($_POST['recover-submit'])){
$old_password=$_POST['oldpassword'];
$new_password=$_POST['newpassword'];
$con_password=$_POST['confirmpassword'];
$sql="select * from changepass where id='1'";
$result=mysqli_query($conn,$sql);
$chg_pwd1=mysqli_fetch_array($result);

$data_pwd=$chg_pwd1['password'];

if($data_pwd==$old_password){
if($new_password==$con_password){
$up_pwd="update changepass set password='$new_password' where id='1'";
$res=mysqli_query($conn,$up_pwd);
?>
<script>alert("you are changing your password");</script>
<?php
}
}
else{
?>
 <script>alert("your entered details are wrong ! so Please Correct them after that you can be valid");</script>
<?php
}
}
?>
?>
<html>
<head>
<style>
.form-gap {
    padding-top: 70px;
}
.error{
	color:red;
}
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

 </head>
 <body>
 <div class="content-wrapper">
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change your password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Change Password?</h2>
                  <p>You can change your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
						<input id="oldpassword" name="oldpassword" placeholder="Old Password" class="form-control" type="password"><br><br>
						
						
						<input id="newpassword" name="newpassword" placeholder="New password" class="form-control"  type="password"><br><br>
                          
                          <input id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required class="form-control"  type="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" id="click" value="Change Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</div>
<?php
include("../includes/footer.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
$("#register-form").validate({
rules: {
oldpassword : {
required: true,
minlength: 3,
},
newpassword: {
required: true,
minlength: 3
},
confirmpassword: {
required: true,
},
messages : {
oldpassword: {
	required: "Please enter your old password",
minlength: "Name should be at least 3 characters"
},
newpassword: {
	required: "Please enter your new password",
minlength: "Name should be at least 3 characters"
},
confirmpassword: {
required: "Please enter your new password",
minlength: "Name should be at least 3 characters"
},

}
}

});
});
</script>
</body>
</html>