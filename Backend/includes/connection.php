<?php
$conn = mysqli_connect('localhost','root','','adminpanel');
if(!$conn){
	echo '<script>failed</script>';
}
else{
	session_start();
}
define ('indexUrl',"http://localhost/AdminProject/Backend/index.php");
define ('baseUrl',"http://localhost/AdminProject/Backend/assets");
define ('baseurl',"http://localhost/AdminProject/FrontEnd/assets");
define ('frontindex',"http://localhost/AdminProject/FrontEnd/index.php");
define ('shop',"http://localhost/AdminProject/FrontEnd/collection/shop.php");
define ('shop_cart',"http://localhost/AdminProject/FrontEnd/collection/shop_cart.php");
define ('checkout_cart',"http://localhost/AdminProject/FrontEnd/collection/checkOut_cart.php");
define ('contact',"http://localhost/AdminProject/FrontEnd/collection/contact.php");
define ('login',"http://localhost/AdminProject/FrontEnd/collection/login.php");
define ('logout',"http://localhost/AdminProject/FrontEnd/collection/logout.php");
define ('orders',"http://localhost/AdminProject/FrontEnd/collection/track_order.php");
define ('blogs',"http://localhost/AdminProject/FrontEnd/collection/blogs.php");
define ('wishlist',"http://localhost/AdminProject/FrontEnd/collection/wishList.php");
define ('blog_detail',"http://localhost/AdminProject/FrontEnd/collection/blog_details.php");
define ('product_detail',"http://localhost/AdminProject/FrontEnd/collection/product_Details");
define ('baseinclude',"http://localhost/AdminProject/");
define ('profileUrl',"http://localhost/AdminProject/Backend/Adminpages/profile.php");
define ('changeUrl',"http://localhost/AdminProject/Backend/Adminpages/changepassword.php");
define ('logoutUrl',"http://localhost/AdminProject/Backend/Adminpages/logout.php");
define ('addUrl',"http://localhost/AdminProject/Backend/Products/addcategory.php");
define ('viewUrl',"http://localhost/AdminProject/Backend/Products/viewcategory.php");
define ('deleteUrl',"http://localhost/AdminProject/Backend/Products/deletecategory.php");
define ('addsub',"http://localhost/AdminProject/Backend/Products/addsubcategory.php");
define ('viewsub',"http://localhost/AdminProject/Backend/Products/viewsubcategory.php");
define ('editsub',"http://localhost/AdminProject/Backend/Products/editsubcategory.php");
define ('deletesub',"http://localhost/AdminProject/Backend/Products/deletesubcategory.php");
define ('editUrl',"http://localhost/AdminProject/Backend/Products/editcategory.php");
define ('loginadminUrl',"http://localhost/AdminProject/Backend/Adminpages/loginadmin.php");
define ('imagepath',"http://localhost/AdminProject/Backend/uploadPicture/");
define ('addproducturl',"http://localhost/AdminProject/Backend/Products/addproduct.php");
define ('viewproducturl',"http://localhost/AdminProject/Backend/Products/viewproduct.php");
define ('deleteproducturl',"http://localhost/AdminProject/Backend/Products/deleteproduct.php");
define ('editproducturl',"http://localhost/AdminProject/Backend/Products/editproduct.php");
define ('checkorder',"http://localhost/AdminProject/Backend/Products/checkOrder.php");
define ('registration',"http://localhost/AdminProject/FrontEnd/collection/registration.php");




?>