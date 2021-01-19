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
			<li class="active">Order</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!--  about-page -->
	<div class="about">
            <div class="container"> 
                <h3 class="w3ls-title w3ls-title1">Order</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Sr No</th>
                                <th>Booking Date</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Payment Method</th>
                                <th>No Of Person</th>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                              <?php
                                $queryordermaster = mysqli_query($conn,"select *from tbl_order_master where customer_id='{$user_id}' order by order_id desc ")or die(mysqli_error($conn));                  
                                $x=1;
                                $count= mysqli_num_rows($queryordermaster);
                                if($count >0)
                                {
                                    while($row = mysqli_fetch_array($queryordermaster))
                                    {
                              ?>
                                        <tr>
                                            <td><?php echo $x++;?></td> 
                                            <td><?php echo date("d-m-Y",strtotime($row["system_date"]));?></td>
                                            <td><?php echo date("d-m-Y",strtotime($row["order_date"]));?></td>   
                                            <td><?php echo $row["status"];?></td>
                                            <td><?php echo $row["payment_method"];?></td> 
                                            <td><?php echo $row["no_of_person"];?></td>    
                                            <td><?php echo $row["grand_total"];?></td>   
                                            <td><a href="order-detail.php?order_id=<?php echo $row["order_id"];?>"><i class="fa fa-eye"></i></a></td>
                                            <td>
                                              <?php 
                                                if("Pending" == $row["status"])
                                                {
                                              ?>
                                                    <form method="post" action="order-delete.php">
                                                        <input type="hidden" value="<?php echo $row["order_id"];?>" name="order_id">
                                                        <button type="submit" name="delete" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
                                                    </form>
                                          <?php }
                                              else{}?>
                                            </td>
                                        </tr>  
                                    
                             <?php  }
                                } ?>
                            </tbody>
                        </table>
                    </div>
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