<?php
include 'class/myclass.php';
include 'class/session-check.php';
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
                    <div class="table-responsive">
                       <table class="table">
                          <thead>
                            <th>Sr No</th>
                            <th>Employee Designation Name</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Total</th>
                          </thead>
                                
                          <tbody>
                            <?php
                                $i = 0;
                                $x=0;
                                $grandtotal = array();
                                foreach ($_SESSION['productcart2'] as $key => $value) 
                                {
                                    $qty = $_SESSION['qtycart2'][$key];
                                    $queryproduct = mysqli_query($conn,"SELECT * FROM `tbl_emp_designation` where emp_designation_id='{$value}'")or die(mysqli_error($conn));
                                 
                                    $product_details=  mysqli_fetch_array($queryproduct);
                                    $product_id =  $product_details["emp_designation_id"];
                                    $product_title =  $product_details["emp_designation_name"];
                                    $product_price =  $product_details["price"];
                                    $subtotaltemp = $product_price * $qty;
                                    $x++
                                    ?>
                                    <tr>
                                       <td><?php echo $x; ?></td>
                                       <td>  <?php echo $product_title; ?></td>
                                        <td> Rs. <?php echo $product_price; ?></td>
                                        <td>   <?php echo $qty; ?></td>
                                        <td>Rs.<?php echo $subtotaltemp; ?></td>
                                    </tr>
                        <?php 
                                    $grandtotal[] = $subtotaltemp;

                                }
                                      $finalsum = array_sum($grandtotal);
                        ?>
                          </tbody>
                          
                          <tfoot>
                            <tr>
                                <td colspan="3"></td><td>Subtotal</td><td>Rs. <?php echo $finalsum; ?></td>
                            </tr>
                            <tr>
                              <td colspan="3"></td><td>Shipping Charge</td><td>Rs. 200</td>
                            </tr>
                            <tr>
                               <td colspan="3"></td><td>Grand Total</td><td>Rs. <?php echo $finalsum + 200; ?></td>
                            </tr>
                          </tfoot>
                       </table>
                    </div>
                        <form method="post" id="checkout-form" action="checkout-emp-process.php" class="shopform">
                          <div class="row">
                             <div class="col-md-6">
                                <div class="widget-title">
                                  <h4>Billing Details</h4>
                                </div>
                                <div class="row">
                                  <input type="hidden" name="total" value="<?php echo $finalsum;?>">
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
                                    <label>Booking Date *</label>
                                    <input type="date" name="booking_date" id="booking_date" value=""  class="form-control" placeholder="Enter No Of Person">
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