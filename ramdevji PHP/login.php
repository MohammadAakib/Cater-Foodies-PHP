<?php
include 'class/myclass.php';

if($_POST)
{
    $customer_email=$_POST['customer_email'];
    $customer_password=$_POST['customer_password'];
    $sq= mysqli_query($conn, "select * from tbl_customer where customer_email='{$customer_email}' and customer_password='{$customer_password}'") or die(mysqli_error($conn));
    $count= mysqli_num_rows($sq);
    $row= mysqli_fetch_array($sq);
    
    if($count>0)
    {
        $_SESSION['customerid']= $row['customer_id'];
        $_SESSION['customername']= $row['customer_name'];
        header("location:home.php");        
    }
 else
    {
        echo "<script>alert('Invalid User Name Or Password');</script>";
    }
}
?>
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
			<li class="active">Login</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- login-page -->
	<div class="login-page about">
		<img class="login-w3img" src="images/img3.jpg" alt="">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Login to your account</h3>  
			<div class="login-agileinfo"> 
				<form action="#" method="post"> 
                                    <input class="agile-ltext" type="email" name="customer_email" placeholder="Username" required="">
					<input class="agile-ltext" type="password" name="customer_password" placeholder="Password" required="">
					<div class="wthreelogin-text"> 
						<ul> 
							<li>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i> 
									<span> Remember me ?</span> 
								</label> 
							</li>
							<li><a href="#">Forgot password?</a> </li>
						</ul>
						<div class="clearfix"> </div>
					</div>   
					<input type="submit" value="LOGIN">
				</form>
                            <p>Don't have an Account? <a href="signup.php"> Sign Up Now!</a></p> 
			</div>	 
		</div>
	</div>
	<!-- //login-page -->  
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