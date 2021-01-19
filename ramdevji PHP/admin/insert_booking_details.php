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
                            <h3 class="title1">Booking Deatils :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                   

                                    <div class="form-group">
                                        <label for="booking_id" class="col-sm-2 control-label">Booking ID</label>
                                        <?php
                                                require 'class\myclass.php';
                                                $sq= mysqli_query($conn,"select * from tbl_utensil_booking_master") or die(mysqli_error($conn));
                                                echo "<select name='booking_id'>";
                                                while ($row1 = mysqli_fetch_array($sq)) {
                                                    echo "<option value='{$row1['booking_id']}'>{$row1['booking_date']}</option>";
                                                }                            
                                                echo "</select>";
                                            ?>
                                    </div>
                                     <div class="form-group">
                                        <label for="utensil_id" class="col-sm-2 control-label">Utensil Id</label>
                                        <?php
                                                require 'class\myclass.php';
                                                $sq= mysqli_query($conn,"select * from tbl_utensil") or die(mysqli_error($conn));
                                                echo "<select name='utensil_id'>";
                                                while ($row1 = mysqli_fetch_array($sq)) {
                                                    echo "<option value='{$row1['utensil_id']}'>{$row1['utensil_name']}</option>";
                                                }                            
                                                echo "</select>";
                                            ?>
                                    </div>
                                     <div class="form-group">
                                        <label for="status" class="col-sm-2 control-label">Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="price" required="" placeholder="Enter price">
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
                                
                                $booking_id= $_POST['booking_id'];
                                $utensil_id = $_POST['utensil_id'];
                                $price = $_POST['price'];
                                

                                $q = mysqli_query($conn, "insert into tbl_booking_details(booking_id,utensil_id,price) values('{booking_id}','{$utensil_id}','{$price}')") or die(mysqli_error($conn));

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
       
    </body>
</html>