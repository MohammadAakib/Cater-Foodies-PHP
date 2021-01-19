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
                            <h3 class="title1">Customer Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="customer_name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="name" class="form-control1" name="customer_name" required="" placeholder="Enter name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="customer_email" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="customer_email" required="" placeholder="Enter Email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="customer_mobile" class="col-sm-2 control-label">Mobile</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="customer_mobile" required="" placeholder="Enter Mobile">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="customer_address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="customer_address" required="" placeholder="Enter address">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="customer_password" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="customer_password" required="" placeholder="Enter password">
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
                                $customer_name = $_POST['customer_name'];
                                $customer_email = $_POST['customer_email'];
                                $customer_mobile = $_POST['customer_mobile'];
                                $customer_address = $_POST['customer_address'];
                                $customer_password = $_POST['customer_password'];


                                $q = mysqli_query($conn, "insert into tbl_customer(customer_name,customer_email,customer_mobile,customer_address,customer_password) values('{$customer_name}','{$customer_email}','{$customer_mobile}','{$customer_address}','{$customer_password}')") or die(mysqli_error($conn));

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