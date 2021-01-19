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
                            <h4>Booking Deatails Table:</h4>
                            <?php
                            include 'class\myclass.php';

                            $sql="SELECT
                                    `tbl_emp_booking_detail`.`emp_booking_detail_id`
                                    , `tbl_customer`.`customer_name`
                                    , `tbl_customer`.`customer_mobile`
                                    , `tbl_customer`.`customer_address`
                                    , `tbl_employee_booking`.`system_date`
                                    , `tbl_employee_booking`.`booking_date`
                                    , `tbl_emp_designation`.`emp_designation_name`
                                    , `tbl_emp_booking_detail`.`price`
                                    , `tbl_emp_booking_detail`.`qty`
                                    , `tbl_emp_booking_detail`.`subtotal`
                                    , `tbl_employee_booking`.`total`
                                    , `tbl_employee_booking`.`status`
                                FROM
                                    `ramdevji_db`.`tbl_employee_booking`
                                    INNER JOIN `ramdevji_db`.`tbl_emp_booking_detail` 
                                        ON (`tbl_employee_booking`.`employee_booking_id` = `tbl_emp_booking_detail`.`employee_booking_id`)
                                    INNER JOIN `ramdevji_db`.`tbl_emp_designation` 
                                        ON (`tbl_emp_designation`.`emp_designation_id` = `tbl_emp_booking_detail`.`emp_designation_id`)
                                    INNER JOIN `ramdevji_db`.`tbl_customer` 
                                        ON (`tbl_customer`.`customer_id` = `tbl_employee_booking`.`customer_id`)
                                    INNER JOIN `ramdevji_db`.`tbl_employee` 
                                        ON (`tbl_employee`.`emp_designation_id` = `tbl_emp_designation`.`emp_designation_id`)";
                            
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
                            echo "<th>Employee Designation</th>";
                           
                            echo "<th>price</th>";
                            echo "<th>Quantity</th>";
                            echo "<th>Subtotal</th>";
                            echo "<th>Total</th>";
                            echo "<th>Status</th>";
                            //echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";

                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($q)) {
                                echo "<tr>";
                                echo "<td>{$row['emp_booking_detail_id']} </td>";
                                echo "<td>{$row['customer_name']} </td>";
                                echo "<td>{$row['customer_mobile']} </td>";
                                echo "<td>{$row['customer_address']}</td>";
                                echo "<td>{$row['system_date']} </td>";
                                echo "<td>{$row['booking_date']} </td>";
                                echo "<td>{$row['emp_designation_name']}</td>";
                                echo "<td>{$row['price']} </td>";
                                echo "<td>{$row['qty']} </td>";
                                echo "<td>{$row['subtotal']}</td>";
                                echo "<td>{$row['total']} </td>";
                                echo "<td>{$row['status']} </td>";
                                //echo "<td> <a href='edit-employee_booking.php?editid={$row['booking_details_id']}'>Edit</a></td>";
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