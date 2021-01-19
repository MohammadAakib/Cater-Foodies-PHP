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
                            <h4>Package Order Detail Table:</h4>
                            <?php
                            include 'class\myclass.php';
                            
                            $sql="SELECT
                                    `tbl_package_booking`.`package_booking_id`
                                    , `tbl_customer`.`customer_name`
                                    , `tbl_customer`.`customer_mobile`
                                    , `tbl_customer`.`customer_address`
                                    , `tbl_package_booking`.`system_date`
                                    , `tbl_package_booking`.`booking_date`
                                    , `tbl_package`.`package_name`
                                    , `tbl_package`.`package_details`
                                    , `tbl_package_master`.`package_amount`
                                    
                                    , `tbl_package_booking`.`no_of_person`
                                    , `tbl_package_booking`.`grand_total`
                                    , `tbl_package_booking`.`payment_method`
                                    , `tbl_package_booking`.`status`
                                FROM
                                    `ramdevji_db`.`tbl_package_booking`
                                    INNER JOIN `ramdevji_db`.`tbl_customer` 
                                        ON (`tbl_package_booking`.`customer_id` = `tbl_customer`.`customer_id`)
                                    INNER JOIN `ramdevji_db`.`tbl_package` 
                                        ON (`tbl_package_booking`.`package_id` = `tbl_package`.`package_id`)
                                    INNER JOIN `ramdevji_db`.`tbl_package_master` 
                                        ON (`tbl_package_master`.`package_id` = `tbl_package`.`package_id`)";
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
                            echo "<th>Package Name</th>";
                            echo "<th>Package Details</th>";
                            echo "<th>Package Amount</th>";
                            
                            echo "<th>No of Person</th>";
                            echo "<th>Grand Total</th>";
                            echo "<th>Payment Method</th>";
                            echo "<th>Status</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";

                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($q))
                            {
                                echo "<tr>";
                                echo "<td>{$row['package_booking_id']} </td>";
                                echo "<td>{$row['customer_name']} </td>";
                                echo "<td>{$row['customer_mobile']}</td>";
                                echo "<td>{$row['customer_address']}</td>";
                                echo "<td>{$row['system_date']} </td>";
                                echo "<td>{$row['booking_date']} </td>";
                                echo "<td>{$row['package_name']}</td>";
                                echo "<td>{$row['package_details']}</td>";
                                echo "<td>{$row['package_amount']} </td>";
                                echo "<td>{$row['no_of_person']}</td>";
                                echo "<td>{$row['grand_total']}</td>";
                                echo "<td>{$row['payment_method']}</td>";
                                echo "<td>{$row['status']}</td>";
                                echo "<td> <a href='edit-package-order-detail.php?editid={$row['package_booking_id']}'>Edit</a></td>";
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