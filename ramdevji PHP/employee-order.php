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
			<li class="active">Employee Order</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!--  about-page -->
	<div class="about">
            <div class="container"> 
                <h3 class="w3ls-title w3ls-title1">Employee Order</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Sr No</th>
                                <th>Booking Date</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Payment Method</th>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                              <?php
                                $queryordermaster = mysqli_query($conn,"select *from tbl_employee_booking where customer_id='{$user_id}' order by employee_booking_id desc ")or die(mysqli_error($conn));                  
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
                                            <td><?php echo date("d-m-Y",strtotime($row["booking_date"]));?></td>   
                                            <td><?php echo $row["status"];?></td>   
                                            <td><?php echo $row["payment_method"];?></td>  
                                            <td><?php echo $row["total"];?></td>    
                                            <td><a href="employee-order-detail.php?order_id=<?php echo $row["employee_booking_id"];?>"><i class="fa fa-eye"></i></a></td>
                                            <td>
                                                <?php 
                                                if("Pending" == $row["status"])
                                                {
                                                ?>
                                                    <form method="post" action="order-delete_3.php">
                                                        <input type="hidden" value="<?php echo $row["employee_booking_id"];?>" name="order_id">
                                                        <button type="submit" name="delete" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
                                                    </form>
                                     <?php      }      ?>
                                            </td>
                                        </tr>  
                      <?php         }
                                }  
                      ?>
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