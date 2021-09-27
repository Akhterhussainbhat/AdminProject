<?php 
include("../../Backend/includes/connection.php");
include("../includepages/header.php");
$sql= "SELECT * from wishlist";
$result= mysqli_query($conn,$sql);
$grand_total=0;
?>
<div id="message" class="mt-2 mr-2"></div>
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
  <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Cart</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
							<?php 
							while($row=mysqli_fetch_array($result)){
							?>
                            <tbody>
                                <tr>
                                    <td class="cart__product__item">
                                        <img height="100px" src="../../Backend/uploadPicture/<?php echo $row['wimage'];?>" alt="">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $row['wname'];?></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price"><?php 
			                               echo number_format($row['wprice'] ,2)?></td>
                                    <td class="cart__quantity">
                                        <div>
                                            <button  onclick="add_To_Cart('<?php echo $row['id'];?>')" class="btn btn-md bg-success" type="submit" >Add to cart</button>
                                        </div>
                                    </td>
                                    <td class="cart__total"><?php echo number_format($row['wtotal'] ,2)?></td>
                                    <td class="cart__close"><a href="addToWishlist.php?remove=<?=$row['id'];?>" onclick="return confirm('Are you want remove item');"><span class="icon_close"></span></a></td>
                                </tr>
                               
                            </tbody>
							<?php $grand_total+=$row['wtotal'];
							}
							?>
							 
							
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="<?php echo frontindex ?>">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span><?php echo  number_format($grand_total,2);?></span></li>
                            <li>Total <span><?php echo  number_format($grand_total,2);?></span></li>
                        </ul>
                        <a href="<?php echo checkout_cart ?>" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

<?php
include("../includepages/footer.php");
?>
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
//$(document).ready(function(){
	function add_To_Cart(id){
		
	$.ajax({
		url:"addToCart.php",
		type:"POST",
		data:{'pid':id},
		success:function(result){
			alert(result);
			$("#message").html(result);
			
		},
	});
}
</script>