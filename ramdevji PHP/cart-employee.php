<?php
include 'class/myclass.php';
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
			<li class="active">Cart Employee</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!--  about-page -->
	<div class="about">
            <div class="container"> 
		<h3 class="w3ls-title w3ls-title1">Cart Employee</h3>
                  <?php
                    if (isset($_SESSION['productcart2']) && !empty($_SESSION['productcart2'])) 
                    {
                  ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Sr No</th>
                                    <th>Employee Designation Name</th>
                                    <th>Price</th>
                                    <th>QTY</th>
                                    <th>Total</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                  <?php
                                    $i = 0;
                                    $x = 0;
                                    $grandtotal = array();
                                    foreach ($_SESSION['productcart2'] as $key => $value)
                                    {
                                        $qty = $_SESSION['qtycart2'][$key];
                                        $queryproduct = mysqli_query($conn, "SELECT * FROM `tbl_emp_designation` where emp_designation_id='{$value}'")or die(mysqli_error($conn));
                                        $product_details = mysqli_fetch_array($queryproduct);
                                        $product_id = $product_details["emp_designation_id"];
                                        $product_title = $product_details["emp_designation_name"];
                                        $product_price = $product_details["price"];
                                        $subtotaltemp = $product_price * $qty;
                                        $x++
                                  ?>
                                        <tr>
                                            <td><?php echo $x; ?></td>
                                            <td>  <?php echo $product_title; ?></td>
                                            <td> Rs. <?php echo $product_price; ?></td>
                                            <td>
                                                <form method="post" action="cart-update2.php"> 
                                                    <input type="number" min="1" max="100" class="entry value1"  style="background-color: white;" value="<?php echo $qty; ?>" name="quantity">
                                                    <input type="hidden" name="id" value="<?php echo $key; ?>">
                                                    <input type="hidden" name="pid" value="<?php echo $value; ?>">
                                                    <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-refresh"></i></button>
                                                </form>
                                            </td>
                                            <td>Rs.<?php echo $subtotaltemp; ?></td>
                                            <td>
                                                <form method="post" action="cart-remove2.php">
                                                    <input type="hidden" value="<?php echo $key; ?>" name="id">
                                                    <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-remove"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                            <?php   }   ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="checkout row">
                            <div class="col-md-12 text-center">
                              <?php
                                if(isset($_SESSION['customerid']))
                                {
                              ?>
                                    <a href="checkout-employee.php" class="btn btn-primary">PROCEED TO CHECKOUT</a> 
                         <?php  }  
                                else
                                { 
                          ?>
                                    <a href="login.php" class="btn btn-primary">LOGIN</a> 
                         <?php  }  ?>
                                <a href="employee.php" class="btn btn-default">CONTINUE SHOP</a>
                            </div>
                        </div>
              <?php }
                    else
                    {
                        echo "<center><h4>Your Cart is Empty</h4></center>";
                    
                    }
              ?>
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