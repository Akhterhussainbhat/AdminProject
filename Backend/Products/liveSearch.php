<html>
<head>
</head>
<body>
<form action="" method="post"/>
<div class="form_group">
<input type="text" class="form_control" id="searchme" name="searchme"/>
</div>
<input type="submit" name="submit" class="btn btn-primary" value="Search"/>
</form>
<div id="searchdata"></div>
</body>
</html>
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
 $("#searchme").on("keyup", function(){
	var search= $("#searchme").val();

    $.ajax({
	url:"checkmylogin.php",
	type:"post",
	data:{search:search},
	success:function(result){
		$("#searchdata").html(result);
	}
		
	})

 });	
 </script>