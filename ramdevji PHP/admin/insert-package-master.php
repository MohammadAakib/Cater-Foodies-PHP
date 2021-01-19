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
                            <h3 class="title1">Package Master Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    
                                    <div class="form-group">
                                        <label for="package_id" class="col-sm-2 control-label">Package Master </label>
                                        <?php
                                                require 'class\myclass.php';
                                                $sq= mysqli_query($conn,"select * from  tbl_package") or die(mysqli_error($conn));
                                                echo "<select name='package_id'>";
                                                while ($row1 = mysqli_fetch_array($sq)) {
                                                    echo "<option value='{$row1['package_id']}'>{$row1['package_name']}</option>";
                                                }                            
                                                echo "</select>";
                                            ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="utensil_price" class="col-sm-2 control-label">Amount</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control1" name="package_amount" required="" placeholder="Enter Amount">
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
                        </div>

                        <?php
                        include 'class\myclass.php';

                        if (isset($_POST['submit'])) 
                            {
                                $package_name = $_POST['package_id'];
                                $package_amount = $_POST['package_amount'];
                                $q = mysqli_query($conn, "insert into tbl_package_master(package_id,package_amount) values('{$package_name}','{$package_amount}')") or die(mysqli_error($conn));

                            if ($q)
                            {
                                echo "<script>alert('Data Inserted');</script>";
                            }
                        }
                        ?>
                        
                    </div>

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
<script src="js/classie.js"></script>
<script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

    showLeftPush.onclick = function () {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };

    function disableOther(button) {
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
    }
</script>
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"></script>
</body>
</html
