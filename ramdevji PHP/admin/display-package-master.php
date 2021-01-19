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
                            <h4>Package Table:</h4>
                            <?php
                            include 'class\myclass.php';
                            $sql = "SELECT
                                `tbl_package_master`.`package_master_id`
                                , `tbl_package`.`package_id`
                                , `tbl_package`.`package_name`
                                , `tbl_package`.`package_details`
                                , `tbl_package_master`.`package_amount`
                            FROM
                                `ramdevji_db`.`tbl_package_master`
                                INNER JOIN `ramdevji_db`.`tbl_package` 
                                    ON (`tbl_package_master`.`package_id` = `tbl_package`.`package_id`)";
                            $q = mysqli_query($conn,$sql) or die(mysqli_error($conn));

                            echo "<table class='table table-bordered'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th> ";
                            echo "<th>Package Name</th>";
                            echo "<th>Package Details</th> ";
                            echo "<th>Package Amount</th> ";
                            echo "<th>Action</th> ";
                            echo "</tr>";
                            echo "</thead>";

                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($q)) {
                                echo "<tr>";
                                echo "<td>{$row['package_master_id']} </td>";
                                echo "<td>{$row['package_name']}</td>";
                                echo "<td>{$row['package_details']}</td>";
                                echo "<td>{$row['package_amount']}</td>";
                                echo "<td> <a Onclick='return confirmdelete()'; href='delete-package-master.php?deleteid={$row['package_master_id']} && delete-package.php?deleteid={$row['package_id']}'>Delete |"
                                . " </a> <a href='edit-package.php?editid={$row['package_id']}'>Edit</a></td>";
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