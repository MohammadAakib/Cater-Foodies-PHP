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
                            <h4>Food Details Table:</h4>
                            <?php
                            include 'class\myclass.php';
                            $sql =" SELECT
    `tbl_food`.`food_id`
    , `tbl_category`.`category_name`
    , `tbl_food`.`food_name`
    , `tbl_food`.`food_image`
    , `tbl_food`.`food_price`
FROM
    `ramdevji_db`.`tbl_food`
    INNER JOIN `ramdevji_db`.`tbl_category` 
        ON (`tbl_food`.`category_id` = `tbl_category`.`category_id`)";
                            $q = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                            echo "<table class='table table-bordered'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th> ";
                            echo "<th>Category Name</th>";
                            echo "<th>Food Name</th>";
                            echo "<th>Image</th> ";
                            echo "<th>Food Price</th> ";
                            echo "<th>Action</th> ";
                            echo "</tr>";
                            echo "</thead>";

                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($q)) {
                                echo "<tr>";
                                echo "<td>{$row['food_id']} </td>";
                                echo "<td>{$row['category_name']} </td>";
                                echo "<td>{$row['food_name']}</td>";
                                echo "<td><img src='{$row['food_image']}'height='50' width='50'></td>";
                                echo "<td>{$row['food_price']}</td>";
                                
                                echo "<td> <a Onclick='return confirmdelete()'; href='delete-food.php?deleteid={$row['food_id']}'>Delete | </a> <a href='edit-food.php?editid={$row['food_id']}'>Edit</a></td>";
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