<?php
session_start();

$conn=mysqli_connect('localhost','root','','adminpanel');
//$adminid=$_GET['id'];
//$db=mysqli_select_db(,$conn);
if(isset($_POST['username'])){
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$sql= mysqli_query($conn,"Select * from admindetails where name='$user' and password='$pass' ");
$result= mysqli_fetch_array($sql);
$username=$result['username'];
$sepassword=$result['password'];
if($user==$username && $pass=$sepassword ){
	$_SESSION['id']=$result['id'];
 echo "success";
}
else{
	header('location:loginadmin.php');
	
}
/*$count=mysqli_num_rows($result);
$_SESSION['adminid']='$id';	
if(mysqli_num_rows($result)>0){
	header('location:second.php');
}
else{
	echo "invalid user";
}*/
}
?>

<!DOCTYPE html>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
 
 
<style>

* {
  margin: 0;
  padding: 0;
}

body {
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
}


.container {
  width: 500px;
  margin: 25px auto;
}

form {
  padding: 20px;
  background: #2c3e50;
  color: #fff;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}
form label,
form input,
form button {
  border: 0;
  margin-bottom: 3px;
  display: block;
  width: 100%;
}
form input {
  height: 25px;
  line-height: 25px;
  background: #fff;
  color: #000;
  padding: 0 6px;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
form button {
  height: 30px;
  line-height: 30px;
  background: #e67e22;
  color: #fff;
  margin-top: 10px;
  cursor: pointer;
}
form .error {
  color: #ff0000;
}

</style>
</head>
<body>
<center>
<div class="container">
  <h2>Registration</h2>
  <form action="" name="registration" id="form" method="POST">
    <label for="firstname">UserName</label>
    <input type="text" name="username" id="firstname" placeholder="username"/><br><br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="password"/><br><br>
    <button type="submit" name="submit">Register</button>
  </form>
</div>
  </center>
   <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

 <script>
  $(document).ready(function(){
	$('#form').validate({
    rules: {
      username: "required",
      
      password: {
        required: true,
        minlength: 4
      }
    },
});
});
</script>

</body>


</html>