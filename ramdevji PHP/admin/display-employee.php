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
                        <h3 class="title1"></h3>
                        <div class="bs-example widget-shadow" data-example-id="bordered-table"> 
                            <h4>Employee Table:                                                             
                             <button type="button" name="btnadd" onclick="window.location = 'insert-employee.php';" class="btn btn-default">Add</button>
                            </h4>
                            <?php
                            include 'class\myclass.php';
                            $sql="SELECT
                                `tbl_employee`.`employee_id`
                                , `tbl_employee`.`employee_name`
                                , `tbl_emp_designation`.`emp_designation_name`
                                , `tbl_employee`.`employee_mobile`
                                , `tbl_employee`.`employee_address`
                                , `tbl_emp_designation`.`price`
                                , `tbl_employee`.`employee_photo`
                            FROM
                                `ramdevji_db`.`tbl_employee`
                                INNER JOIN `ramdevji_db`.`tbl_emp_designation` 
                                    ON (`tbl_employee`.`emp_designation_id` = `tbl_emp_designation`.`emp_designation_id`)";
                            $q = mysqli_query($conn,$sql);

                           
                            echo "<table class='table table-bordered'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th> ";
                            echo "<th>Name</th>";
                            echo "<th>Designation</th> ";
                            echo "<th>Mobile No.</th> ";
                            echo "<th>Address</th>";
                            echo "<th>Salary</th>";
                            echo "<th>Photo</th>";
                            echo "<th>Action</th> ";
                           
                            echo "</tr>";
                            echo "</thead>";

                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($q)) 
                            {
                             echo "<tr>";
                                echo "<td>{$row['employee_id']} </td>";
                                echo "<td>{$row['employee_name']}</td>";
                                echo "<td>{$row['emp_designation_name']}</td>";
                                echo "<td>{$row['employee_mobile']}</td>";
                                echo "<td>{$row['employee_address']}</td>";
                                echo "<td>{$row['price']}</td>";
                                echo "<td><img src='{$row['employee_photo']}'height='50' width='50'></td>";
                                
                                echo "<td> <a Onclick='return ConformDelete' href='delete-employee.php?deleteid={$row['employee_id']}'>Delete | </a>
                                 <a href='edit-employee.php?editid={$row['employee_id']}'>Edit</a></td>";
                            echo "<tr>";
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
<script>
    function ConformDelete()
    {
        var x = Conform("Are You sure you want to delete ? ");
        if(x)
        {
            return true;
        }
        else{
            return false;
        }
    }
</script>

<?php
require 'class\myclass.php';
    if (isset($_GET['deleteid']))
    {
        $delete = $_GET['deleteid'];
        mysqli_query($conn, "delete from tbl_employee where employee_id='{$delete}'") or die(mysqli_error($conn));
        header("location:display-employee.php");
    }
?>