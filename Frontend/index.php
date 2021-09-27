<?php 
include("../Backend/includes/connection.php");
include("includepages/header.php");
/*if(!isset($_SESSION['username'])){
echo("<script>location.href = 'login.php';</script>");	
}*/


$sql= "SELECT *from formtable";
$result=mysqli_query($conn,$sql);

$data=mysqli_fetch_array($result);

/*if(isset($_POST['ifsc'])){
	$ifsc=$_POST['ifsc'];
	$json=file_get_contents('https://ifsc.razorpay.com/'.$ifsc);
	echo $json;
}*/

?>
<!--<form method="post">
<input type="textbox" name="ifsc" required/>
<input type="submit" name="submit"/>
</form>-->
  <section class="categories">
	 
        <div class="container-fluid">
		
            <div class="row">
			
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="../Backend/uploadPicture/<?php echo $data['image'];?>" >
                    <div style="margin-top:70%" class="categories__text">
                        <h1><?php echo $data['title'];?> </h1>
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" >
			
                <div class="row">
				<?php while($row= mysqli_fetch_array($result)){
					
	               ?>
                    <div class="col-sm-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="../Backend/uploadPicture/<?php echo $row['image'];?>" >
						
                            <div style="margin-top:60%" class="categories__text">
                                <h4><?php echo $row['title'];?></h4>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                   
					<?php }?>  
                </div>
				
            </div>

        </div>
    </div>
</section>
<!-- Categories Section End -->
<section class="product spad">
    <div class="container">
	
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            
            <div class="col-lg-8 col-md-8">
			
                <ul class="filter__controls">
				 <li class="active" data-filter="*">All</li>
				<?php foreach($result as $val1){
				
				?>
				<li data-filter=".<?php echo $val1['title'];?>"><?php echo $val1['title'];?></li>
				<?php }
			
			?>
                </ul>
			
            </div>
            </div>
        
        <div class="row property__gallery">
		<?php
		$sql1= "SELECT  formtable.title as cattitle, subcat.*, products.* from products JOIN subcat on subcat.id=products.subcatid join formtable on
		subcat.catid=formtable.id ORDER BY RAND() LIMIT 8 ";
	$result1= mysqli_query($conn,$sql1);


		foreach($result1 as $row2){
			?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $row2['cattitle'];?>">
			
                <div class="product__item">
				
                    <div class="product__item__pic set-bg" data-setbg="../Backend/uploadPicture/<?php echo $row2['image'];?>">
                        <div class="label new">New</div>
                        <ul class="product__hover">
                            <li><a href="../Backend/uploadPicture/<?php echo $row2['image'];?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#"><?php echo $row2['Producttitle'];?></a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price"><span style="color:green"><?php echo $row2['actualPrice'];?></span>&nbsp <b style="color:blue"><?php echo $row2['discount'];?>%off</b>&nbsp &nbsp   ₹<?php echo $row2['salesPrice'];?></div>
                    </div>
					
                </div>
				
            </div>
            <?php 
		}
		?>
        </div>
    </div>
	</div>
</section>
<!-- Product Section End -->
<?php
include("includepages/footer.php");
?>

