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
                            <h3 class="title1">Utensil Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="utensil_name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control1" name="utensil_name" required="" placeholder="Enter Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="utensil_quantity" class="col-sm-2 control-label">Quantity</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control1" name="utensil_quantity" required="" placeholder="Enter Quntity">
                                        </div>
                                    </div>
<!--
                                     <div class="form-group">
                                        <label for="utensil_time" class="col-sm-2 control-label">Time</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control1" name="utensil_time" required="" placeholder="Enter Time">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="utensil_address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control1" name="utensil_address" required="" placeholder="Enter Addrees">
                                        </div>
                                    </div>-->

                                    
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
                            
                                $utensil_name = $_POST['utensil_name'];
                                $utensil_quantity = $_POST['utensil_quantity'];
                                //$utensil_time = $_POST['utensil_time'];   ,utensil_time,utensil_address
                                //$utensil_address = $_POST['utensil_address'];    ,'{$utensil_time}','{$utensil_address}'
                            
                                $q = mysqli_query($conn, "insert into tbl_utensil(utensil_name,utensil_quantity) values('{$utensil_name}','{$utensil_quantity}')") or die(mysqli_error($conn));

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
</html>