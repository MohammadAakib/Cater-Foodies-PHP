<?php
include 'class/myclass.php';
?>
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
                    <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Dishes</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- products -->
	<div class="products">	 
            <div class="container">
		<div class="col-md-9 product-w3ls-right"> 
                    <div class="product-top">
                        <h4>Food Collection</h4>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="products-row">
                      <?php 
                        if(isset($_GET["cid"]))
                        {
                            $cid =  $_GET["cid"];
                            $searchc = "where category_id='{$cid}'";
                        }
                        else
                        {
                          $searchc = "";
                        }
                        $query = mysqli_query($conn, "select * from tbl_food $searchc")or die(mysqli_error($conn));
                        $count = mysqli_num_rows($query);
                        if($count >0)
                        {     
                            while($row=mysqli_fetch_array($query))
                            {
                      ?>
                                <div class="col-xs-6 col-sm-4 product-grids">
                                    <div class="flip-container">
					<div class="flipper agile-products">
                                            <div class="front"> 
                                                <img src="admin/<?php echo $row["food_image"];?>" style="width:226px;height: 130px" class="img-responsive" alt="img">
                                                <div class="agile-product-text">              
                                                    <h5><?php echo $row["food_name"];?></h5>  
						</div> 
                                            </div>
                                            <div class="back">
						<h4><?php echo $row["food_name"];?></h4>
						<h6><?php echo $row["food_price"];?><sup>Rs</sup></h6>
                                                <form action="cart-process.php" method="post">
                                                    <input type="hidden" name="pid" value="<?php echo $row["food_id"];?>">
                                                    <input type="hidden" name="qty" value="1">
                                                    <button type="submit" name="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                                                </form>
                                            </div>
					</div>
                                    </div> 
                                </div> 
                    <?php   }
                        }
                        else
                        {
                            echo "<br><br><h3><center>No Record Found</center></h3>";
                        }
                    ?>
                        <div class="clearfix"> </div>
                    </div>
                </div>
		<div class="col-md-3 rsidebar">
                    <div class="rsidebar-top">
			<div class="slider-left">
                            <h4>CHOOSE BY Category</h4>            
                            <div class="row row1 scroll-pane">
                              <?php 
                                $query_cat = mysqli_query($conn,"select * from tbl_category")or die(mysqli_error($conn));
                                while($row_cat=mysqli_fetch_array($query_cat))
                                {
                              ?>
                                    <label class="checkbox"><a href="products.php?cid=<?php echo $row_cat["category_id"];?>"><?php echo $row_cat["category_name"];?></a></label>
                                                        
                         <?php  }  ?>
                            </div> 
			</div>
                    </div>
		</div>
		<div class="clearfix"> </div> 
            </div>
	</div>
	<!-- //products --> 

	<!-- modal --> 
	
	<!-- //modal -->
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