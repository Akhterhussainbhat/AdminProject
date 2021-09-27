<?php 
	if(isset($_POST['submit'])){
		$searchdata=$_POST['searchdata'];
	$sql =" select * from products where Producttitle like '%$searchdata%' or productdescription like '%$searchdata%'";
	$result= mysqli_query($conn,$sql);
	
	
	
	/*if($data->num_rows > 0){*/
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result)){
			echo $row['Producttitle'];?>
			<img src="../../Backend/uploadPicture/<?php echo $row['image'];?>" height="50px" width="50px">
			<?php
		}
	}else{
		echo "No data is found to your search";
	}
		
	
	}
	?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sports And Study</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo baseurl?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo baseurl?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo baseurl?>/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo baseurl?>/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo baseurl?>/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo baseurl?>/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo baseurl?>/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo baseurl?>/css/style.css" type="text/css">
	
	<link rel="stylesheet" https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.0.5/rangeslider.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	 
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="<?php echo frontindex ?>"><img src="<?php echo baseurl?>/img/logo.png" alt=""></a>
        </div>
		
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-1 col-lg-2">
                    <div class="header__logo">
                        <a href="<?php echo frontindex ?>"><img src="<?php echo baseurl?>/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <nav class="header__menu">
					

					   <ul>
                            <li class="active"><a href="<?php echo frontindex ?>">Home</a></li>
                            <li><a href="<?php echo shop ?>">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    
                                    <li><a href="<?php echo shop_cart ?>">Shop Cart</a></li>
                                    <li><a href="<?php echo checkout_cart ?>">Checkout</a></li>
                                    <li><a href="<?php echo blog_detail ?>">Blog Details</a></li>
									
                                </ul>
                            </li>
                            <li><a href="<?php echo blogs ?>">Blog</a></li>
                            <li><a href="<?php echo contact ?>">Contact</a></li>
							<li><a href="<?php echo wishlist ?>">WishList</a></li>
							<li><a href="<?php echo orders ?>">My Orders</a></li>
							
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4">
                    <div class="header__right">
					<?php if(isset($_SESSION['username'])){?>
					
					 <div class="header__right__auth">
						   <span><?php echo "Welcome " .$_SESSION['username'];?></span>
							 <a href="<?php echo logout ?>">/ <b>LogOUt</b> </a>
						<?php
					}
						else{
							?>
                            <a href="<?php echo login ?>">Login</a>
                            <a href="<?php echo registration ?>">/ Registration</a>
							 </div>
						<?php }?>
                       
                        <ul class="header__right__widget">
                            <!--<li><span class="icon_search search-switch"></span></li>-->
							<?php 
							$wsql ="SELECT * from wishlist";
	                         $wresult= mysqli_query($conn,$wsql);
	                         $wrow= mysqli_num_rows($wresult);
	                         if($wrow){
							 ?>
                            <li><a href="<?php echo wishlist ?>"><span class="icon_heart_alt"></span>
                                <div class="tip"><?php echo $wrow;?></div>
                            </a></li>
							 <?php }?>
							<?php 
							$cisql ="SELECT * from cart";
	                         $ciresult= mysqli_query($conn,$cisql);
	                         $cirow= mysqli_num_rows($ciresult);
	                         if($cirow){
							 ?>
                            <li><a href="<?php echo shop_cart ?>" ><span id="cart_item" class="icon_bag_alt"></span>
                                <div id="cart_item" class="tip"><?php echo $cirow;?></div>
                            </a></li>
							 <?php }?>
                        </ul>
                    </div>
                </div>
				<form action="" method="post">
					<!--form-->
					<input type="search" id="searchdata" required name="searchdata" style="border-radius:10px"/>&nbsp; &nbsp; <input type="submit" name="submit" class="btn btn-sm btn-primary" value="search"/>
                       </form>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
	
<script >

/*$(document).on('click','ul li', function(){
 $(this).addClass('active').siblings().removeClass('active');

});*/
</script>
  
  