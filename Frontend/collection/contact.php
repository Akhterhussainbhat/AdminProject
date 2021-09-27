<?php 
include("../../Backend/includes/connection.php");
include("../includepages/header.php");
if(isset($_POST['submit'])){
	$name= $_POST['name'];
	$email= $_POST['email'];
	$website= $_POST['website'];
	$message= $_POST['message'];
	$sql = "INSERT INTO contactashon(name,email,website,message)VALUES('$name','$email','$website','$message')";
	$result=mysqli_query($conn,$sql);
	if($result){
		echo "Thank You For Showing Intrest With Us";
	}
else{
echo "SomeThing Is Wrong";
}
}
?>

 <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Contact info</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Address</h6>
                                    <p>165 ,Muqdam Mohalla, Paris Abad ,Budgam, Srinagar , Jammu and kashmir</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Phone</h6>
                                    <p><span>+91-6005598533</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Support</h6>
                                    <p>Support.AkhterHussainbhat@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact__form">
                            <h5>SEND MESSAGE</h5>
                            <form action="" method="POST">
                                <input type="text" name="name" placeholder="Name">
                                <input type="text" name="email" placeholder="Email">
                                <input type="text" name="website" placeholder="Website">
                                <textarea name="message" placeholder="Message"></textarea>
                                <button type="submit" name="submit" class="site-btn">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                        <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48158.305462977965!2d-74.13283844036356!3d41.02757295168286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e440473470d7%3A0xcaf503ca2ee57958!2sSaddle%20River%2C%20NJ%2007458%2C%20USA!5e0!3m2!1sen!2sbd!4v1575917275626!5m2!1sen!2sbd"
                        height="780" style="border:0" allowfullscreen="">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->


<?php
include("../includepages/footer.php");
?>