<?php 
include("../../Backend/includes/connection.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div style="padding:10%">
    <form  action="payment_process.php" method="POST">
  <div class="form-group">
    
    <input type="text" class="form-control" name="name" id="name"  placeholder="Name" />
   
  </div>
  <div class="form-group">
    
    <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" />
  </div>
  
  <button type="button" class="btn btn-primary" onclick="pay_now()" id="btn"  name="submit" >Submit</button>
  
</form>
</div>


<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
function pay_now(){
	
	var name=$('#name').val();
	
	var amount= $('#amount').val();
	$.ajax({
			type:"POST",
			url:"payment_process",
			data:"&amount="+amount+"&name="+name,
			success:function(result){
				alert(this.data);

	
var options = {
	
    "key": "rzp_test_Xc3On2dpt6nsCS", 
    "amount": amount*1, 
    "currency": "INR",
    "name": "SportsAndStudy",
    "description": "pay with sports and study",
//"image": "https://example.com/your_logo",
    /*"order_id": "order_Ef80WJDPBmAeNt", 
    "account_id": "acc_Ef7ArAsdU5t0XL",*/
    "handler": function (response){
		$.ajax({
			type:"POST",
			url:"payment_process",
			data:"payment_id="+response.razorpay_payment_id,
			success:function(result){
				alert(result);
			}
		});   
    }
};
			
var rzp1 = new Razorpay(options);
    rzp1.open();
	}
	});					
}
</script>
</body>
</html>