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
			<!-- header-one --> 
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
			<li class="active">Employee</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- menu list -->   	
	<div class="wthree-menu">  
            <img src="images/i2.jpg" class="w3order-img" alt=""/>
            <div class="container">
		<h3 class="w3ls-title">Employee</h3>
		
                    <div class="menu-agileinfo"> 
                        <?php 
                            $query = mysqli_query($conn,"select * from tbl_emp_designation")or die(mysqli_error($conn));
                            while($row=mysqli_fetch_array($query))
                            {
                        ?>
                                <div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids"> 
                                    <form action="employee-process.php" method="post">
					<input type="hidden" name="eid" value="<?php echo $row["emp_designation_id"];?>">
                                        <input type="hidden" name="qtye" value="1">
					<button type="submit" name="submit" class="btn btn-primary btn-lg"><?php echo $row["emp_designation_name"];?></button>
                                    </form>
                                    
                                 <!--   <?php echo $row["emp_designation_id"];?> 
                                    <?php echo $row["emp_designation_name"];?>   -->
				</div> 
                      <?php } ?>
                       <div class="clearfix"> </div> 
                    </div> 
            </div> 
	</div>
	<!-- //menu list -->    
	<!-- add-products -->
	<div class="add-products">  
		<div class="container">
			<h3 class="w3ls-title w3ls-title1">Today's Offers</h3>
			<div class="add-products-row">
				<div class="w3ls-add-grids">
					<a href="products.php"> 
						<h5>Special Offer Today Only</h5>
						<h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<div class="w3ls-add-grids w3ls-add-grids-right">
					<a href="products.php"> 
						<h5>On Order Lunch Today</h5>
						<h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div> 
				<div class="clearfix"> </div> 
			</div>  	 
		</div>
	</div>
	<!-- //add-products --> 
        
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