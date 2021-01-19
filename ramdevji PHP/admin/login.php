
<?php
session_start();
include '.\class\myclass.php';

if($_POST)
{
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $sq= mysqli_query($conn, "select * from tbl_admin where admin_email='{$admin_email}' and admin_password='{$admin_password}'") or die(mysqli_error($conn));
    $count= mysqli_num_rows($sq);
    $row= mysqli_fetch_array($sq);
    
    if($count>0)
    {
        $_SESSION['adminid']= $row['admin_id'];
        $_SESSION['adminname']= $row['admin_name'];
        header("location:home.php");        
    }
 else
    {
        echo "<script>alert('Invalid User Name Or Password');</script>";
    }
}
?>

<!DOCTYPE HTML>
<html>
<?php
include 'head.php';
?>
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
                                    <a href="home.php">
						<h1>RAMDEVJI CATRES</h1>
						<span>AdminPanel</span>
					</a>
				</div>
				<!--//logo-->
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Login Page</h3>
				<div class="widget-shadow">
					<div class="login-top">
                                            <h4>Welcome back to RAMDEVJI CATRES AdminPanel ! <!-- <br> Not a Member? <a href="registration.php">  Sign Up »</a> </h4> !-->
					</div>
					<div class="login-body">
  
                                            <form method="post">
                                                <input type="email" class="user" name="admin_email" placeholder="Enter your email" required="">
                                                <input type="password" name="admin_password" class="lock" placeholder="password" required="">
                                                    <input type="submit" name="Login" value="Login">
							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
								<!-- <div class="forgot">
									<a href="#">forgot password?</a>
								</div> !-->
								<div class="clearfix"> </div>
							</div>
						</form>
					</div> 
				</div>
				
				<div class="login-page-bottom">
				</div>
			</div>
		</div>
		<div class="footer">
		   <p>&copy; 2019 RAMDEVJI CATRES Admin Panel. All Rights Reserved</p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
	<?php
             include 'java-script.php';
        ?>
</body>
</html>