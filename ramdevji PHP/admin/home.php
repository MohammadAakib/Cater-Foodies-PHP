<?php
session_start();

if(!isset($_SESSION['adminid']))
{
    header("location:login.php");
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
		<div class=" sidebar" role="navigation">
            <?php
             include 'navbar.php';
            ?>
		</div>
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
			<?php
                                    include 'profile.php';
                        ?>
			<div class="clearfix"> </div>	
		</div>
               
		<!-- //header-ends -->
		<!-- main content start-->
                <div id="page-wrapper">
                    <h1 align="center">
                        <?php
                             echo "Welcome  ".$_SESSION['adminname'];
                        ?>
                    </h1>
		</div>
		<!--footer-->
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