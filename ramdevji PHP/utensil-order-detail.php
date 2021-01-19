<?php
    include 'class/myclass.php';
    include 'class/session-check.php';
    $order_id = $_GET['order_id'];
    if (!isset($_GET['order_id']) || empty($_GET['order_id'])) 
    {
       header("location:utensil-order.php");
    }
    $query_order_master = mysqli_query($conn,"select * from tbl_utensil_booking_master where booking_id='{$order_id}'")or die(mysqli_error($conn));
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
                                <th>Utensil Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </thead>
                            <tbody>
                              <?php
                                $queryorder_details = mysqli_query($conn,"select *from tbl_booking_details where booking_id='{$order_id}' order by booking_id desc ")or die(mysqli_error($conn));                  
                                $x=1;
                                $subtotaltemp ="0";
                                $grandtotal="0";
                                while($row = mysqli_fetch_array($queryorder_details))
                                {
                                    $product_id =  $row["utensil_id"];
                                    $queryproduct = mysqli_query($conn,"SELECT * FROM `tbl_utensil` where utensil_id='{$product_id}'")or die(mysqli_error($conn));
                                    $product_details=  mysqli_fetch_array($queryproduct);
                                    $product_name =  $product_details["utensil_name"];
                              ?>
                                   <tr>
                                        <td><?php echo $x++;?></td>
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