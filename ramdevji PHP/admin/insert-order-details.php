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
                    <div class="forms">
                        <div class="row">
                            <h3 class="title1">Order Details Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                    

                                    
                                    </div>
                                        <div class="form-group">
                                        <label for="order_id" class="col-sm-2 control-label">Order ID</label>
                                        <?php
                                                require 'class\myclass.php';
                                                $sq= mysqli_query($conn,"select * from tbl_order_master") or die(mysqli_error($conn));
                                                echo "<select name='order_id'>";
                                                while ($row1 = mysqli_fetch_array($sq)) {
                                                    echo "<option value='{$row1['order_id']}'>{$row1['order_date']}</option>";
                                                }                            
                                                echo "</select>";
                                            ?>
                                    </div>
                                         <div class="form-group">
                                        <label for="food_id" class="col-sm-2 control-label">Food ID</label>
                                        <?php
                                                require 'class\myclass.php';
                                                $sq= mysqli_query($conn,"select * from tbl_food") or die(mysqli_error($conn));
                                                echo "<select name='food_id'>";
                                                while ($row1 = mysqli_fetch_array($sq)) {
                                                    echo "<option value='{$row1['food_id']}'>{$row1['food_name']}</option>";
                                                }                            
                                                echo "</select>";
                                            ?>
                                    </div>
                                         <div class="form-group">
                                        <label for="price" class="col-sm-2 control-label">Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="price" required="" placeholder="Enter Price">
                                        </div>
                                        </div>
                                    <div>
                                        <center>
                                            <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                            <button type="reset" name="cancel" class="btn btn-default">Cancel</button>
                                        </center> 
                                    </div>
                                    
                                </form>
                            </div>

                            <?php
                            include 'class\myclass.php';

                            if (isset($_POST['submit'])) {
                                
                                //$order_details_id= $_POST['order_details_id'];
                                $order_id = $_POST['order_id'];
                                $food_id = $_POST['food_id'];
                                $price = $_POST['price'];
                                

                                $q = mysqli_query($conn, "insert into tbl_order_details(order_id,food_id,price) values('{$order_id}','{$food_id}','{$price}')") or die(mysqli_error($conn));

                                if ($q) {
                                    echo "<script>alert('Data Inserted');</script>";
                                }
                            }
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
         <?php
                include 'class\myclass.php';
                $q= mysqli_query($conn,'select * from tbl_package')or die(mysqli_error($conn));
                echo "<select>";
                while ($row = mysql_fetch_array($q)) {
                    echo "<option value={$row['package_id']}>{$row['package_name']}</option>";
                    
                    }                   
                echo "</select>";
        ?>
    </body>
</html>