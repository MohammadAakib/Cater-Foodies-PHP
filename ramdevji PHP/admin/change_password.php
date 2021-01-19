

<?php

require './class/myclass.php';

if (isset($_POST['btnupdatepassword'])) {
    $password = $_POST['password'];
    $np = $_POST['np'];
    $cnp = $_POST['cnp'];
    $id = $_SESSION['admin_id'];

    if ($result == 1) {
        if ($np == $cnp) {
            if ($np == $password) {
                echo "<script>";
                echo 'alert("Your new password can not be same as old password.");';
                echo 'window.location.replace("update-password.php");';
                echo "</script>";
            } else {
                $upq = mysqli_query($con, "update tbl_admin set admin_password='$np' where admin_id='$id'") or die(mysqli_error($con));
                if ($upq) {
                    echo "<script>";
                    echo 'alert("Password Changed.");';
                    echo 'window.location.replace("update-password.php");';
                    echo "</script>";
                }
            }
        } else {
            echo "<script>";
            echo 'alert("New password and confirm password do not match.");';
            echo 'window.location.replace("update-password.php");';
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo 'alert("Current password is incorrect.");';
        echo 'window.location.replace("update-password.php");';
        echo "</script>";
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Minimal an Admin Panel Category Flat Bootstrap Responsive Website Template | Forms :: w3layouts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Mainly scripts -->
        <script src="js/jquery.metisMenu.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>
        <!-- Custom and plugin javascript -->
        <link href="css/custom.css" rel="stylesheet">
        <script src="js/custom.js"></script>
        <script src="js/screenfull.js"></script>
        <script>
            $(function () {
                $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

                if (!screenfull.enabled) {
                    return false;
                }



                $('#toggle').click(function () {
                    screenfull.toggle($('#container')[0]);
                });



            });
        </script>
        <style>
            img {
                border-radius: 50%;

            }
        </style>

        <!----->

    </head>
    <body>
        <div id="wrapper">
            <!----->
            <nav class="navbar-default navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1> <a class="navbar-brand" href="index.php">Admin</a></h1>         
                </div>
                <div class=" border-bottom">
                    <div class="full-left">
                        <section class="full-top">
                            <button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
                        </section>
                        <form class=" navbar-left-right">
                            <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'Search...';
                                    }">
                            <input type="submit" value="" class="fa fa-search">
                        </form>
                        <div class="clearfix"> </div>
                    </div>

                </div><!-- /.navbar-collapse -->
                <div class="clearfix">

                </div>
                <?php
                if(isset($_SESSION['admin_id'])){
                    include 'sidebar.php'; 
                }
                elseif(isset($_SESSION['faculty_id'])){
                    include 'faculty-sidebar.php';
                }
                ?>
            </nav>
            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="content-main">
                    <!--grid-->
                    <div class="grid-form">
                        <div class="grid-form1">
                            <h1 id="forms-example" class="">Update Password.</h1>
                            <form method="post">
                                <div class="form-group">
                                    <label for='password'> Enter Current Password</label>
                                    <input type='password' class="form-control" name='password' placeholder="Enter Current Password" required>
                                </div>

                                <div class="form-group">
                                    <label for='np'> Enter New Password </label>
                                    <input type='password' class="form-control" name='np' placeholder="Enter New password" required>
                                </div>

                                <div class="form-group">
                                    <label for='cnp'> Confirn New Password</label>
                                    <input type='text' class="form-control" name='cnp' placeholder="Enter New Password Again" required>
                                </div>

                                <input type="submit" class="btn btn-default" name="btnupdatepassword" value="Update Password">
                            </form>
                        </div>
                        <div class="copy">
                            <p> &copy; 2020 Minimal. All Rights Reserved</p>	    
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!--scrolling js-->
            <script src="js/jquery.nicescroll.js"></script>
            <script src="js/scripts.js"></script>
            <!--//scrolling js-->
            <!---->

    </body>
</html>