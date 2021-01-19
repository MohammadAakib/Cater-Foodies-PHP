<?php
    include 'class/myclass.php';
    include 'class/session-check.php';
    $order_id = $_GET['order_id'];
    if (!isset($_GET['order_id']) || empty($_GET['order_id']))
    {
       header("location:order.php");
    }
    $query_order_master = mysqli_query($conn,"select * from tbl_order_master where order_id='{$order_id}'")or die(mysqli_error($conn));
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
			<li class="active">Order</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!--  about-page -->
	<div class="about">
            <div class="container"> 
                <h3 class="w3ls-title w3ls-title1">Order</h3>
                    <div class="table-responsive margin-top">
                        <table id="cart-table" class="table table-condensed">
                            <thead>
                                <th>SrNo</th>
                                <th>Image</th>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </thead>
                            <tbody>
                              <?php
                                $queryorder_details = mysqli_query($conn,"select *from tbl_order_details where order_id='{$order_id}' order by order_id desc ")or die(mysqli_error($conn));                  
                                $x=1;
                                $subtotaltemp ="0";
                                $grandtotal="0";
                                while($row = mysqli_fetch_array($queryorder_details))
                                {
                                    $product_id =  $row["food_id"];
                                    $queryproduct = mysqli_query($conn,"SELECT * FROM `tbl_food` where food_id='{$product_id}'")or die(mysqli_error($conn));
                                    $product_details=  mysqli_fetch_array($queryproduct);
                                    $product_name =  $product_details["food_name"];
                                    $product_img =  $product_details["food_image"];
                              ?>
                                    <tr>
                                      <td><?php echo $x++;?></td>
                                      <td><img src="admin/<?php echo $product_img;?>" style="width:50px;height: 50px;" alt=" " class="img-responsive" /></td>
                                      <td><?php echo $product_name;?></td>
                                      <td>Rs. <?php echo $row["price"];?></td>
                                      <td><?php echo $row["qty"];?></td>
                                      <td>Rs. <?php $subtotaltemp =$row["qty"]*$row["price"]; echo $subtotaltemp;?></td>
                                    </tr>
                              <?php
                                       $grandtotal += $subtotaltemp;
                                }
                                $finalsum = $grandtotal;
                              ?>
                                <?php echo $finalsum;?>
                                <?php echo $finalsum+200;?>
                            </tbody>
                        </table>
                    </div><!-- end table -->
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