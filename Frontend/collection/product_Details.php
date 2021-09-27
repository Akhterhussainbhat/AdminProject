
<?php 
ob_start();
include("../../Backend/includes/connection.php");
include("../includepages/header.php");
$id=$_GET['id'];
$sql= "SELECT * from products where id=$id ";
$result= mysqli_query($conn,$sql);
$data= mysqli_fetch_assoc($result);


?>
<div id="message" class="mt-2 mr-2"></div>
 <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-1">
                                <img src="../../Backend/uploadPicture/<?php echo $data['image'];?>" height="80px" alt="">
                            </a>
							<?php
							$sql1= "SELECT * from productimages where proid=$id  ";
                             $result1= mysqli_query($conn,$sql1);
                             $i=2;
							while($data1=mysqli_fetch_assoc($result1)){
							?>
                            <a class="pt" href="<?php echo product_detail?>?id=<?php echo $data1['proid'];?>#product-<?php echo $i++;?>">
                                <img height="70px" src="../../Backend/allProductImages/<?php echo $data1['product_image'];?>">
                            </a>
                            <?php
							}
							?>
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="../../Backend/uploadPicture/<?php echo $data['image'];?>" height="400px" alt="">
                               <?php
							$sql1= "SELECT * from productimages where proid=$id  ";
                             $result1= mysqli_query($conn,$sql1);
                             $i=2;
							while($data1=mysqli_fetch_assoc($result1)){
							?>
                                <img data-hash="product-<?php echo $i++;?>" class="product__big__img" height="400px" src="../../Backend/allProductImages/<?php echo $data1['product_image'];?>" alt="">
                             <?php
							}
							?>
							</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3><?php echo $data['Producttitle'];?> <span>Brand: Sports And Study Brand</span></h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div>
                        <div class="product__details__price"> $<?php echo $data['salesPrice'];?><span>$<?php echo $data['actualPrice'];?></span></div>
                        <p><?php echo $data['productdescription'];?></p>
                        <div class="product__details__button">
                           
                            <a href="#" onclick="add_To_Cart('<?php echo $data['id'];?>')" class="cart-btn"><span  class="icon_bag_alt"></span> Add to cart</a>
                            <ul>
                                <li><a href="#" onclick="add_To_Wishlist('<?php echo $data['id'];?>')"><span class="icon_heart_alt"></span></a></li>
                                                            </ul>
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            In Stock
                                            <input type="checkbox" checked
											id="stockin">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </li>
                               
                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <h6>Specification</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <h6>Reviews ( 2 )</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			<?php 
              //$_COOKIE['recently_view']=$id;
            
              //unset($_COOKIE['recently_view']);
			
			  if(isset($_COOKIE['recently_view'])){
				  
				  $arrRecent=unserialize($_COOKIE['recently_view']);
				
				   $recentid= implode(",",$arrRecent);      
				 
				   $res= "SELECT * from products where id IN($recentid)";
          $recentresult= mysqli_query($conn,$res);
				   
				?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5> Recently View Products</h5>
                    </div>
                </div>
				
				<?php 
				
				while($row=mysqli_fetch_assoc($recentresult)){
					?>
                <div class="col-lg-3 col-md-4 col-sm-6">
				
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../../Backend/uploadPicture/<?php echo $row['image'];?>">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="../../Backend/uploadPicture/<?php echo $row['image'];?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?php echo $row['Producttitle'];?></a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price"><span style="color:green">₹<?php echo $row['actualPrice'];?></span>&nbsp <b style="color:blue"><?php echo $row['discount'];?>%off</b>&nbsp &nbsp   ₹<?php echo $row['salesPrice'];?></div>
                        </div>
                    </div>
				
                </div>
                <?php }
				?>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<?php
	        //$arrRec=array();
			$arrRec=unserialize($_COOKIE['recently_view']);
			if(($key=array_search($id,$arrRec))!==false){
				unset($arrRec[$key]);
			}
			 
			$arrRec[]=$id;
			$car=setcookie('recently_view',serialize($arrRec),time()+60*60*24*365);
			  }
			 
			/*$arrRec[]=$id;
			setcookie('recently_view',serialize($arrRec),time()+60*60*24*365);*/
			?>
			 
    <!-- Product Details Section End -->
<?php
include("../includepages/footer.php");
ob_flush();
?>
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>

	function add_To_Cart(id){
		
	$.ajax({
		url:"addToCart.php",
		type:"POST",
		data:{'pid':id},
		success:function(result){
			
			$("#message").html(result);
			
		},
	});
}
</script>
<script>

	function add_To_Wishlist(id){
		
	$.ajax({
		url:"addToWishlist.php",
		type:"POST",
		data:{'pid':id},
		success:function(result){
			
			$("#message").html(result);
			
		},
	});
}
</script>

