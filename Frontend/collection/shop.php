<?php 
include("../../Backend/includes/connection.php");
include("../includepages/header.php");
$sql= "SELECT *from formtable";
$result=mysqli_query($conn,$sql);
?>
<div id="message" class="mt-2 mr-2"></div>
 <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
							
                            <div class="categories__accordion">
							
                                <div class="accordion" id="accordionExample">
								<?php 
								foreach( $result as $row1){
								
								?>
                                    <div class="card">
									
                                        <div class="card-heading active">
										
                                            <a data-toggle="collapse" data-target="#collapseOne<?php echo $row1['id'];?>"><?php echo $row1['title'];?></a>
                                        
										</div>
					
                                        <div id="collapseOne<?php echo $row1['id'];?>" class="collapse show<?php echo $row1['id'];?>" data-parent="#accordionExample">
                                            <div  class="card-body">
                                               
												<?php 
												$subid=$row1['id'];
												$sql= "SELECT *from subcat where catid=$subid";
                                                  $result1=mysqli_query($conn,$sql);
                                                   foreach($result1 as $row2){
													   ?>
													    <ul>
                                                    <li ><a value="<?php echo $row2['id'];?>" href="#" onclick="return onClickFunction('<?php echo $row2['id'];?>')"><?php echo $row2['title'];?></a></li>
                                                  
                                                </ul>
												 <?php }?>
                                            </div>
                                        </div>
										
                                    </div> 
                                   <?php }?>
								
                                </div>
								
                            </div>
							
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Shop by price</h4>
                            </div>
                            <div class="filter-range-wrap">
							<?php
                    $minmax= "SELECT MIN(salesPrice) as minimum_range ,MAX(salesPrice) as maximum_range from products";
					$result=mysqli_query($conn,$minmax);
					$data= mysqli_fetch_assoc($result);
?>
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="<?php echo $data['minimum_range'];?>" data-max="<?php echo $data['maximum_range'];?>"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price:</p>
                                        <input type="text"  id="minamount" >
                                        <input type="text"  id="maxamount" >
                                    </div>
                                </div>
                            </div>
                            <a  href="#" onclick="filterProducts()">Filter</a>
                        </div>
                       
                        
                    </div>
                </div>
				<?php 
				$sql= "SELECT *from products ORDER BY RAND()";
     $result2=mysqli_query($conn,$sql);
	 
		 
	 
		?>
                <div class="col-lg-9 col-md-9"  >
                    <div class="row" id="productlist">
					<?php foreach($result2 as $row3){
			?>
					
					<a href="<?php echo product_detail?>?id=<?php echo $row3['id'];?>">
   
	
                        <div class="col-lg-4 col-md-6" >
						
                            <div class="product__item">
							
                                <div class="product__item__pic set-bg" data-setbg="../../Backend/uploadPicture/<?php echo $row3['image'];?>">
        
                                    <ul class="product__hover">
                                        <li><a href="../../Backend/uploadPicture/<?php echo $row3['image'];?> class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#" onclick="add_To_Wishlist('<?php echo $row3['id'];?>')"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#" onclick="add_To_Cart('<?php echo $row3['id'];?>')" ><span class="icon_bag_alt"></span></a></li>
                                   
							   </ul>
							   
                                </div>
								
								
                                <div class="product__item__text">
								
                                    <h6><a href="#"><?php echo $row3['Producttitle'];?></a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price"><span style="color:green"><?php echo $row3['actualPrice'];?></span>&nbsp <b style="color:blue"><?php echo $row3['discount'];?>%off</b>&nbsp &nbsp   ₹<?php echo number_format($row3['salesPrice'],2);?></div>
												  
                                </div>
								 
                            </div>
							</a>
							
                        </div>
						 </a>
						
					<?php }?>
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include("../includepages/footer.php");
?>
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
<script >
function onClickFunction(proAjax){
        $.ajax({
            url: "productajax.php",
           type:"POST",
            data: {'proAjax':proAjax
			
			},
			
            success: function(data) {
	  $("#productlist").replaceWith(data);  
            },    
});
}
</script>
<script>
function filterProducts(){
    var minimum_price=$("#minamount").val();
     var maximum_price=$("#maxamount").val();
     $.ajax({
             url: "filter_price_shop.php",
            type:"POST",
            data: {'minimum_price':minimum_price,'maximum_price':maximum_price },
             success: function(data) {
				
	   $("#productlist").replaceWith(data);
	  
             },
			
 });
 }
</script>
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

