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
                            <h4>Food Order Deatails Table:</h4>
                            <?php
                            include 'class\myclass.php';

                            
                            $sql="SELECT
                                `tbl_order_details`.`order_details_id`
                                , `tbl_customer`.`customer_name`
                                , `tbl_customer`.`customer_mobile`
                                , `tbl_customer`.`customer_address`
                                , `tbl_order_master`.`system_date`
                                , `tbl_order_master`.`order_date`
                                , `tbl_category`.`category_name`
                                , `tbl_food`.`food_name`
                                , `tbl_food`.`food_image`
                                , `tbl_food`.`food_price`
                                , `tbl_order_details`.`price`
                                , `tbl_order_details`.`qty`
                                , `tbl_order_master`.`no_of_person`
                                , `tbl_order_master`.`total_amount`
                                , `tbl_order_master`.`grand_total`
                                , `tbl_order_master`.`payment_method`
                                , `tbl_order_master`.`status`
                            FROM
                                `ramdevji_db`.`tbl_food`
                                INNER JOIN `ramdevji_db`.`tbl_order_details` 
                                    ON (`tbl_food`.`food_id` = `tbl_order_details`.`food_id`)
                                INNER JOIN `ramdevji_db`.`tbl_category` 
                                    ON (`tbl_food`.`category_id` = `tbl_category`.`category_id`)
                                INNER JOIN `ramdevji_db`.`tbl_order_master` 
                                    ON (`tbl_order_master`.`order_id` = `tbl_order_details`.`order_id`)
                                INNER JOIN `ramdevji_db`.`tbl_customer` 
                                    ON (`tbl_customer`.`customer_id` = `tbl_order_master`.`customer_id`)";
                            $q = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            
                            echo "<table class='table table-bordered'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th> ";
                            echo "<th>Customer Name</th>";
                            echo "<th>Customer Mobile No.</th>";
                            echo "<th>Customer Address</th>";
                            echo "<th>Booking Date</th>";
                            echo "<th>Order Date</th>";
                            echo "<th>Category Name</th>";
                            echo "<th>Food Name</th>";
                            echo "<th>Image</th>";
                            echo "<th>Price</th>";
                            echo "<th>Quantity</th>";
                            echo "<th>No Of Person</th>";
                            echo "<th>Total Amount</th>";
                            echo "<th>Grand Total</th>";
                            echo "<th>Payment</th>";
                            echo "<th>Status</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";

                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($q)) {
                                echo "<tr>";
                                echo "<td>{$row['order_details_id']} </td>";
                                echo "<td>{$row['customer_name']} </td>";
                                echo "<td>{$row['customer_mobile']}</td>";
                                echo "<td>{$row['customer_address']}</td>";
                                echo "<td>{$row['system_date']} </td>";
                                echo "<td>{$row['order_date']} </td>";
                                echo "<td>{$row['category_name']}</td>";
                                echo "<td>{$row['food_name']}</td>";
                                echo "<td><img src='{$row['food_image']}'height='50' width='50'></td>";
                                //echo "<td>{$row['food_price']} </td>";
                                echo "<td>{$row['price']}</td>";
                                echo "<td>{$row['qty']}</td>";
                                echo "<td>{$row['no_of_person']} </td>";
                                echo "<td>{$row['total_amount']}</td>";
                                echo "<td>{$row['grand_total']}</td>";
                                echo "<td>{$row['payment_method']}</td>";
                                echo "<td>{$row['status']}</td>";
                                echo "<td><a href='edit-order-details.php?editid={$row['order_details_id']}'>Edit</a></td>";
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