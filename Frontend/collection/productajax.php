
<?php 
include("../../Backend/includes/connection.php");
$proAjax=$_POST['proAjax'];
	$sql= "SELECT *from products where subcatid='$proAjax'";
     $result2=mysqli_query($conn,$sql);
	 
		?>
		<div class="row" id="productlist">
		<?php foreach($result2 as $row3){
			?>
 <div class="col-lg-4 col-md-6">
						
                            <div class="product__item">
							
                                <div class="product__item__pic set-bg" data-setbg="../../Backend/uploadPicture/<?php echo $row3['image'];?>" style="background-image: url(../../Backend/uploadPicture/<?php echo $row3['image'];?>);">
                                   
                                    <ul class="product__hover">
                                        <li><a href="../../Backend/uploadPicture/<?php echo $row3['image'];?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
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
                                    <div class="product__price"><span style="color:green"><?php echo $row3['actualPrice'];?></span>&nbsp <b style="color:blue"><?php echo $row3['discount'];?>%off</b>&nbsp &nbsp   ₹<?php echo $row3['salesPrice'];?></div>
												  
                                </div>
								 
                            </div>
							
                        </div>
					
	<?php }
	?>
	</div>