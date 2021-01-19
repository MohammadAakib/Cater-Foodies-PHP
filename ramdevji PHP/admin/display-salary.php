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
                            <h4>Salary Table:</h4>
                            <?php
                            include 'class\myclass.php';
                            $sql = "SELECT
                                    `tbl_salary`.`salary_id`
                                    , `tbl_employee`.`employee_name`
                                    , `tbl_emp_designation`.`emp_designation_name`
                                    , `tbl_salary`.`salary_date`
                                    , `tbl_salary`.`salary_amount`
                                    , `tbl_salary`.`salary_method`
                                FROM
                                    `ramdevji_db`.`tbl_salary`
                                    INNER JOIN `ramdevji_db`.`tbl_employee` 
                                        ON (`tbl_salary`.`employee_id` = `tbl_employee`.`employee_id`)
                                    INNER JOIN `ramdevji_db`.`tbl_emp_designation` 
                                        ON (`tbl_employee`.`emp_designation_id` = `tbl_emp_designation`.`emp_designation_id`)";
                           $q = mysqli_query($conn,$sql) or die(mysqli_error($conn));

                            echo "<table class='table table-bordered'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th> ";
                            echo "<th>Employee Name</th> ";
                            echo "<th>Employee Designation</th> ";
                            echo "<th>Date</th> ";
                            echo "<th>Amount</th>";
                            echo "<th>Method</th> ";
                            echo "<th>Action</th> ";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($q)) {
                                echo "<tr>";
                                echo "<td>{$row['salary_id']} </td>";
                                echo "<td>{$row['employee_name']} </td>";
                                echo "<td>{$row['emp_designation_name']} </td>";
                                echo "<td>{$row['salary_date']} </td>";
                                echo "<td>{$row['salary_amount']}</td>";
                                echo "<td>{$row['salary_method']}</td>";
                                echo "<td> <a Onclick='return confirmdelete()'; href='delete-salary.php?deleteid={$row['salary_id']}'>Delete | </a> <a href='edit-salary.php?editid={$row['salary_id']}'>Edit</a></td>";
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