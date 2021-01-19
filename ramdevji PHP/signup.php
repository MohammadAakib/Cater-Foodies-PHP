<!DOCTYPE html>
<html lang="en">
<?php
include 'head.php';
?>
<body> 
	<!-- banner -->
	<div class="banner about-w3bnr">
		<!-- header -->
		<div class="header">
			<!-- //header-one -->  
                        <?php
                            include 'header_one.php';
                        ?>
			<!-- //header-one -->    
			<!-- navigation -->
			<?php
                            include 'navbar.php';
                        ?>
			<!-- //navigation --> 
		</div>
		<!-- //header-end --> 
		<!-- banner-text -->
		<div class="banner-text">	
			<div class="container">
				<h2>Delicious food from the <br> <span>Best Chefs For you.</span></h2> 
			</div>
		</div>
	</div>
	<!-- //banner -->    
	<!-- breadcrumb -->  
	<div class="container">	
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Sign Up</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- sign up-page -->
	<div class="login-page about">
		<img class="login-w3img" src="images/img3.jpg" alt="">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Sign Up to your account</h3>  
			<div class="login-agileinfo"> 
				<form action="#" method="post"> 
                                    <input class="agile-ltext" type="text" name="customer_name" placeholder="Customer Name" required="">
					<input class="agile-ltext" type="email" name="customer_email" placeholder="Customer Email" required="">
                                        <input class="agile-ltext" type="text" name="customer_mobile" placeholder="Customer Mobile" required="">
					<input class="agile-ltext" type="text" name="customer_address" placeholder="Customer Address" required="">
					<input class="agile-ltext" type="password" name="customer_password" placeholder="Password" required="">
					<input class="agile-ltext" type="password" name="confirm_password" placeholder="Confirm Password" required="">
					<div class="wthreelogin-text"> 
						<ul> 
							<li>
								<label class="checkbox">
                                                                    <input type="checkbox" name="checkbox"><i></i> 
									<span> I agree to the terms of service</span> 
								</label> 
							</li> 
						</ul>
						<div class="clearfix"> </div>
					</div>   
					<input type="submit" value="Sign Up" name="signup">
				</form>
                            <p>Already have an account?  <a href="login.php"> Login Now!</a></p> 
			</div>	 
		</div>
	</div>
	<!-- //sign up-page -->  
	<!-- subscribe -->
	<?php
                        include 'subscrib.php';
        ?>
	<!-- //subscribe --> 
	<!-- footer -->
	<?php
        include 'footer.php';
        ?>
	<!-- //footer -->
	
        <!-- //Java-Script -->
        <?php
        include 'script.php';
        ?>
        <!-- //Java-Script --> 
</body>
</html>

<?php
$connection= mysqli_connect('localhost','root','','ramdevji_db');
if(isset($_POST['signup']))
{
    
    $customer_name=$_POST['customer_name'];
    $customer_email=$_POST['customer_email'];
    $customer_mobile=$_POST['customer_mobile'];
    $customer_address=$_POST['customer_address'];
    $customer_password=$_POST['customer_password'];
    $confirm_password=$_POST['confirm_password'];
    if($customer_password == $confirm_password)
    {
            $signup= mysqli_query($connection,"insert into tbl_customer(customer_name,customer_email,customer_mobile,customer_address,customer_password) values('$customer_name','$customer_email','$customer_mobile','$customer_address','$customer_password')")or die(mysqli_error($connection));
            if($signup)
            {
                echo "<script>alert('Registration Done!');window.location='login.php'</script>";
                
            }
    }
 else {
        echo "<script>alert('Customer password and confirm password must be same');</script>";
}
}
?>