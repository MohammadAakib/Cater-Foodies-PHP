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
                            <h3 class="title1">Package Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="Package_name" class="col-sm-2 control-label">Package Name</label>
                                        <div class="col-sm-8">
                                            <select name="package_name">
                                                <option>South Indian Dish</option>
                                                <option>Punjabi Dish</option>
                                                <option>Gujarati Dish</option>
                                                <option>Fast Food</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="package_details" class="col-sm-2 control-label">Package Details</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="package_details" required="" placeholder="Enter Package Details">
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
                                
                                $package_name= $_POST['package_name'];
                                $package_details = $_POST['package_details'];
                                

                                $q = mysqli_query($conn, "insert into tbl_package(package_name,package_details) values('{$package_name}','{$package_details}')") or die(mysqli_error($conn));

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