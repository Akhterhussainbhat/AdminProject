<?php 
include("../../Backend/includes/connection.php");
include("../includepages/header.php");
$sql= "SELECT * from cart";
$result= mysqli_query($conn,$sql);
$grand_total=0;
?>
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
                                    <th>Quantity</th>
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
                                        <img src="../../Backend/uploadPicture/<?php echo $row['pimage'];?>" height="100px" alt="">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $row['pname'];?></h6>
                                           <input  type="hidden" class="pid" value="<?php echo $row['id'];?>">
										   <input  type="hidden" class="pprice" value="<?php echo $row['pprice'];?>">
                                        </div>
                                    </td>
									
                                    <td class="cart__price pprice"><?php 
			                               echo number_format($row['pprice'] ,2)?></td>
                                    <td class="cart__quantity">
                                        <div >
					
							          <input style="width:50px" min="1" max="100" type="number"  class="itemQty" value="<?php echo $row['qty'];?>">
									  
                                        </div>
                                    </td>
                                    <td class="cart__total"><?php echo number_format($row['total'] ,2)?></td>
                                    <td class="cart__close" ><a href="addToCart.php?remove=<?=$row['id'];?>" onclick="return confirm('Are you want remove item');"><span class="icon_close"></span></a></td>
                                </tr>
                             
                            </tbody>
							<?php $grand_total+=$row['total'];?>
							<?php
							}
							?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="<?php echo shop ?>">Continue Shopping</a>
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
                            <li>Total <span><?php echo  number_format($grand_total,2);?> </span></li>
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
$(".itemQty").on('change',function(){
	var $all=$(this).closest('tr');
	 var cid = $all.find(".pid").val();
	  var cprice = $all.find(".pprice").val();
	   var cqty = $all.find(".itemQty").val();
	  
	$.ajax({
		url:"addToCart.php",
     type:"POST",
     data:{cid:cid,cprice:cprice,cqty:cqty},
     success:function(result){	
	  console.log(result);
	 }
		});
		 location.reload(true);
		
	
});
</script>