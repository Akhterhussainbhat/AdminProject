<?php 
include("../../Backend/includes/connection.php");
include("../includepages/header.php");

$sql1 = "SELECT * from cart";
$result= mysqli_query($conn,$sql1);
$grandtotal=0;


if(isset($_POST['submit'])){
	$arr= array();
	
$sql ="SELECT * from cart ";
$result1= mysqli_query($conn,$sql);

	while($rows=mysqli_fetch_assoc($result1)){
		$pro_id= $rows['pcode'];
		
		 array_push($arr,$pro_id);
		
	}
	$proid= implode(",",$arr);
	$d=strtotime("+7 day");
     $dt=date("Y-m-d h:i:s",$d);
	
	$track_num = str_pad(mt_rand(1,9999999999),12,"AK",STR_PAD_LEFT);
	 $order_id = str_pad(mt_rand(1,8888888888),17,"HUSSAI",STR_PAD_BOTH);
	$sqli="INSERT INTO orders(track_id,product_id,status,date,order_id)VALUES('$track_num','$proid','0','$dt','$order_id')";
	mysqli_query($conn,$sqli);
	echo("<script>location.href = 'track_order.php';</script>");
}
?>
<!-- rzp_test_Xc3On2dpt6nsCS -->
<!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="<?php echo frontindex ?>"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
                </div>
            </div>
            <form action="#"  method="POST" class="checkout__form">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>First Name <span>*</span></p>
                                    <input type="text" name="name" id="name" placeholder="Enter name">
                                </div>
                            </div>
                           
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Country <span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" placeholder="Street Address">
   
                                </div>
                               
                                <div class="checkout__form__input">
                                    <p>Country/State <span>*</span></p>
                                    <input type="text">
                                </div>
                               
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                           
                          
                            </div>
                        </div>
						
						
						
					
						<!---Key Id	Created At	Expiry	Action
rzp_test_Xc3On2dpt6nsCS-->
                        <div class="col-lg-4">
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
										<?php 
										$i=1;
						while($row= mysqli_fetch_assoc($result)){
							?>
                                        <li><?php echo $i++;?>. <?php echo $row['pname'];?><span>  Rs: <?php echo $row['total'];?></span></li>
                                     <?php    
                                    $grandtotal= $grandtotal+$row['total'];?>
									<?php }?>
									</ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Subtotal <span>Rs: <?php echo $grandtotal;?></span></li>
                                        <li>Total <span>Rs: <?php echo $grandtotal;?></span></li>
                                    </ul>
                                </div>
                                <div class="checkout__order__widget">
                                    <label for="o-acc">
                                        Create an acount?
                                        <input type="checkbox" id="o-acc">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Create am acount by entering the information below. If you are a returing customer
                                    login at the top of the page.</p>
                                    <label for="check-payment">
                                        Cheque payment
                                        <input type="checkbox" id="check-payment">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="paypal">
                                        PayPal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
								<?php //echo orders;?>
                                <button type="submit" <?php echo orders?> name="submit" class="site-btn">Place oder</button>
                            </div>
                        </div>
						
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->





<?php
include("../includepages/footer.php");
?>
<!--<button id="rzp-button1">Pay</button>-->
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

function pay_now(){
	
	var name=$('#name').val();
	
	var amt= $('#amt').val();
	
var options = {
    "key": "rzp_test_Xc3On2dpt6nsCS", // Enter the Key ID generated from the Dashboard
    "amount": "100", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "SportsAndStudy",
    "description": "pay with sports and study",
    "image": "https://example.com/your_logo",
    /*"order_id": "order_Ef80WJDPBmAeNt", //Pass the `id` obtained in the previous step
    "account_id": "acc_Ef7ArAsdU5t0XL",*/
    "handler": function (response){
		$.ajax({
			type:"post"
			url(
		});
       
    }
};
var rzp1 = new Razorpay(options);
//document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    //e.preventDefault();

}
</script>