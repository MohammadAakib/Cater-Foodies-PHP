<?php
    include 'class/myclass.php';
    include 'class/session-check.php';
    if(isset($_GET["uid"]))
    {
      $uid=  $_GET["uid"];
    }
    else
    {
        header("location:home.php");
    }
    $query = mysqli_query($conn,"SELECT * FROM `tbl_package` where package_id='{$uid}'") or die(mysqli_error($conn));
    $row_un = mysqli_fetch_array($query);
    $query_pack = mysqli_query($conn,"SELECT * FROM `tbl_package_master` where package_id='{$uid}'") or die(mysqli_error($conn));
    $row_pack = mysqli_fetch_array($query_pack);
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
			<li class="active">Checkout</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!--  about-page -->
	<div class="about">
            <div class="container"> 
		<h3 class="w3ls-title w3ls-title1">Checkout</h3>
                    <form method="post" id="checkout-form" action="package-booking-process.php" class="shopform">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget-title">
                                    <h4>Billing Details</h4>
                                </div>
                                
                                <div class="row">
                                    <input type="hidden" name="package_id" value="<?php echo $uid;?>">
                                    <input type="hidden" name="cus_id" value="<?php echo $user_id;?>">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label>Full Name *</label>
                                        <input type="text" name="user_name" id="user_name" value="<?php echo $user_name;?>" onkeyup ="Validatestring(this)" class="form-control" placeholder="Enter Full Name">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label>Mobile *</label>
                                        <input type="text" maxlength="10" onkeyup ="Validate(this)" value="<?php echo $user_mobile;?>" name="user_mobile" id="user_mobile" class="form-control" placeholder="Enter Mobile">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label>Address *</label>
                                        <textarea name="user_address" id="user_address" class="form-control" placeholder="Enter Address"><?php echo $user_address;?></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label>No of person *</label>
                                        <input type="text" name="qty" id="qty" value=""  class="form-control" placeholder="Enter No Of Person">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label>Price *</label>
                                        <input type="text" name="package_amount" id="utensil_price" value="<?php echo $row_pack["package_amount"];?>"  class="form-control" placeholder="Enter No Of QTY" readonly="">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label>Booking Date *</label>
                                        <input type="date" name="booking_date" id="booking_date"  class="form-control" placeholder="Enter No Of QTY">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label>Payment Method *</label>
                                        <select  name="payment_method" id="name2" class="form-control" placeholder="Company Name" required="">
                                            <option value="">-Select-</option>
                                            <option value="Cash On Delivery">Cash On Delivery</option>
                                            <option value="Online">Online</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <br><br>
                                        <button type="submit" class="btn btn-primary">Checkout</button>
                                    </div>
                                </div><!-- end row -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </form>
            </div>
	</div>
	<!-- //about-page --> 
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