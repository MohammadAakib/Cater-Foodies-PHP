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
            <script>
                function confirmdelete()
                {
                    var x=confirm("Are you want to delete it?");
                    if(x)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
            </script>
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
                </div>
                <?php
                include 'profile.php';
                ?>
                <div class="clearfix"> </div>

            </div>
            <!-- //header-ends -->
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="tables">
                        <h3 class="title1">Tables</h3>
                        <div class="bs-example widget-shadow" data-example-id="bordered-table"> 
                            <h4>Order Deatails Table:</h4>
                            <?php
                            include 'class\myclass.php';
                            
                            $sql="SELECT
                                `tbl_booking_details`.`booking_details_id`
                                , `tbl_customer`.`customer_name`
                                , `tbl_customer`.`customer_mobile`
                                , `tbl_customer`.`customer_address`
                                , `tbl_utensil_booking_master`.`system_date`
                                , `tbl_utensil_booking_master`.`booking_date`
                                , `tbl_utensil`.`utensil_name`
                                , `tbl_utensil_booking_master`.`time`
                                , `tbl_booking_details`.`price`
                                , `tbl_booking_details`.`qty`
                                , `tbl_booking_details`.`subtotal`
                                , `tbl_utensil_booking_master`.`total`
                                , `tbl_utensil_booking_master`.`payment_method`
                                , `tbl_utensil_booking_master`.`status`
                            FROM
                                `ramdevji_db`.`tbl_booking_details`
                                INNER JOIN `ramdevji_db`.`tbl_utensil_booking_master` 
                                    ON (`tbl_booking_details`.`booking_id` = `tbl_utensil_booking_master`.`booking_id`)
                                INNER JOIN `ramdevji_db`.`tbl_customer` 
                                    ON (`tbl_utensil_booking_master`.`customer_id` = `tbl_customer`.`customer_id`)
                                INNER JOIN `ramdevji_db`.`tbl_utensil` 
                                    ON (`tbl_booking_details`.`utensil_id` = `tbl_utensil`.`utensil_name`)
                                INNER JOIN `ramdevji_db`.`tbl_utensil_master` 
                                    ON (`tbl_utensil_master`.`utensil_id` = `tbl_utensil`.`utensil_id`)";
                            
                            $q = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                            echo "<table class='table table-bordered'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th> ";
                            echo "<th>Customer Name</th>";
                            echo "<th>Customer Mobile</th>";
                            echo "<th>Customer Address</th>";
                            echo "<th>Booking Date</th>";
                            echo "<th>Order Date</th>";
                            echo "<th>Utensil Name</th>";
                            echo "<th>Time</th>";
                            echo "<th>Price</th>";
                            echo "<th>Quantity</th>";
                            echo "<th>Subtotal</th>";
                            echo "<th>Total</th>";
                            echo "<th>payment_method</th>";
                            echo "<th>Status</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($q)) {
                                echo "<tr>";
                                echo "<td>{$row['booking_details_id']} </td>";
                                echo "<td>{$row['customer_name']} </td>";
                                echo "<td>{$row['customer_mobile']}</td>";
                                echo "<td>{$row['customer_address']} </td>";
                                echo "<td>{$row['system_date']} </td>";
                                echo "<td>{$row['booking_date']}</td>";
                                echo "<td>{$row['utensil_name']} </td>";
                                echo "<td>{$row['time']} </td>";
                                echo "<td>{$row['price']}</td>";
                                echo "<td>{$row['qty']} </td>";
                                echo "<td>{$row['subtotal']} </td>";
                                echo "<td>{$row['total']}</td>";
                                echo "<td>{$row['payment_method']} </td>";
                                echo "<td>{$row['status']}</td>";
                                //echo "<td> <a Onclick='return confirmdelete()'; href='delete-utensil-booking-master.php?deleteid={$row['booking_id']}'>Delete</a> <a href='edit-customer.php?editid={$row['customer_id']}'>Edit</a></td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            ?>
                        </div>
                    </div>
                </div>
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